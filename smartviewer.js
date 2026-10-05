/*!
 * SmartViewer embed v1.0 - free DICOM viewer for any website
 * https://smartjoans.space/dicom/api.html
 *
 * <script src="https://smartjoans.space/dicom/smartviewer.js"></script>
 * SmartViewer.open({ title: 'CT Brain', files: ['/studies/1/IM1.dcm', '/studies/1/IM2.dcm'] });
 *
 * Your page reads the images (URLs on your own server, File objects from an
 * <input type="file">, Blobs or ArrayBuffers) and hands them to the viewer
 * inside the browser. Images are never uploaded to smartjoans.space.
 * Works with http and LAN servers; no CORS setup needed for your files.
 */
(function (global) {
  'use strict';

  var current = document.currentScript;
  var VIEWER_URL = current && current.src ? new URL('./', current.src).href : 'https://smartjoans.space/dicom/';
  var VIEWER_ORIGIN = new URL(VIEWER_URL).origin;
  var PARALLEL = 4;
  var BATCH = 8;
  var READY_SECONDS = 30;

  function nameFromUrl(url) {
    try {
      var last = new URL(url, location.href).pathname.split('/').pop();
      return decodeURIComponent(last || '') || 'image.dcm';
    } catch (e) {
      return 'image.dcm';
    }
  }

  /** Any supported item -> Promise<{ name, data: ArrayBuffer }> */
  function readItem(item, credentials) {
    if (typeof item === 'string') {
      item = { url: item };
    }

    if (item instanceof ArrayBuffer) {
      return Promise.resolve({ name: 'image.dcm', data: item });
    }

    if (typeof Blob !== 'undefined' && item instanceof Blob) {
      return item.arrayBuffer().then(function (buf) {
        return { name: item.name || 'image.dcm', data: buf };
      });
    }

    if (item && item.data instanceof ArrayBuffer) {
      return Promise.resolve({ name: item.name || 'image.dcm', data: item.data });
    }

    if (item && typeof Blob !== 'undefined' && item.data instanceof Blob) {
      return item.data.arrayBuffer().then(function (buf) {
        return { name: item.name || item.data.name || 'image.dcm', data: buf };
      });
    }

    if (item && item.url) {
      return fetch(item.url, { credentials: credentials || 'same-origin' }).then(function (r) {
        if (!r.ok) {
          throw new Error('Could not download ' + item.url + ' (HTTP ' + r.status + ')');
        }
        return r.arrayBuffer();
      }).then(function (buf) {
        return { name: item.name || nameFromUrl(item.url), data: buf };
      });
    }

    return Promise.reject(new Error('Unsupported file item. Use a URL, File, Blob or ArrayBuffer.'));
  }

  function css(el, styles) {
    Object.keys(styles).forEach(function (k) { el.style[k] = styles[k]; });
    return el;
  }

  /**
   * SmartViewer.open(options)
   *   files        Array of URLs / File / Blob / ArrayBuffer / { name, url | data }   (required)
   *   title        Text shown in the bar and while loading
   *   mode         'overlay' (default, full screen on your page - best on phones) or 'tab'
   *   credentials  fetch credentials for URLs: 'same-origin' (default), 'include' or 'omit'
   *   onProgress   function (doneFiles, totalFiles)
   *   onDone       function (seriesCount)   - viewer has opened the images
   *   onError      function (error)
   *   onClose      function ()
   * Returns { close() }
   */
  function open(options) {
    options = options || {};
    var items = Array.prototype.slice.call(options.files || []);
    var session = Math.random().toString(36).slice(2) + Date.now().toString(36);
    var url = VIEWER_URL + '?from=page&session=' + encodeURIComponent(session);
    var state = { ready: false, closed: false, outbox: [] };
    var win = null;
    var wrap = null;
    var oldOverflow = '';
    var pinger = null;

    var api = { close: function () { close(false); } };

    function fail(err) {
      if (state.closed) { return; }
      try { post({ type: 'smartviewer-cancel', message: err.message }); } catch (e) {}
      if (typeof options.onError === 'function') {
        options.onError(err);
      } else if (global.console) {
        console.error('SmartViewer:', err);
      }
    }

    function close(fromHistory) {
      if (state.closed) { return; }
      state.closed = true;
      clearInterval(pinger);
      window.removeEventListener('message', onMessage);
      window.removeEventListener('popstate', onPopState);

      if (wrap) {
        wrap.parentNode && wrap.parentNode.removeChild(wrap);
        document.body.style.overflow = oldOverflow;
        if (!fromHistory && history.state && history.state.smartviewer === session) {
          history.back();
        }
      }

      if (typeof options.onClose === 'function') { options.onClose(); }
    }

    function onPopState() {
      close(true);
    }

    function post(msg, transfer) {
      msg.session = session;
      if (state.ready && win) {
        win.postMessage(msg, VIEWER_ORIGIN, transfer || []);
      } else {
        state.outbox.push([msg, transfer || []]);
      }
    }

    function onMessage(e) {
      if (e.origin !== VIEWER_ORIGIN || e.source !== win || !e.data || e.data.session !== session) { return; }

      if (e.data.type === 'smartviewer-ready' && !state.ready) {
        state.ready = true;
        clearInterval(pinger);
        var queue = state.outbox;
        state.outbox = [];
        queue.forEach(function (m) { win.postMessage(m[0], VIEWER_ORIGIN, m[1]); });
      }

      if (e.data.type === 'smartviewer-loaded' && typeof options.onDone === 'function') {
        options.onDone(e.data.count);
      }
    }

    if (!items.length) {
      setTimeout(function () { fail(new Error('No files were given to SmartViewer.open().')); }, 0);
      return api;
    }

    // ---------- open the viewer ----------
    if (options.mode === 'tab') {
      win = window.open(url, '_blank');
      if (!win) {
        setTimeout(function () { fail(new Error('The browser blocked the new tab. Call SmartViewer.open() from a click.')); }, 0);
        return api;
      }
    } else {
      wrap = css(document.createElement('div'), {
        position: 'fixed', top: '0', right: '0', bottom: '0', left: '0',
        zIndex: '2147483000', background: '#000',
        display: 'flex', flexDirection: 'column'
      });

      var bar = css(document.createElement('div'), {
        display: 'flex', alignItems: 'center', gap: '10px',
        background: '#161c24', color: '#e6ebf1',
        padding: 'calc(6px + env(safe-area-inset-top, 0px)) 10px 6px',
        borderBottom: '1px solid #2e3947',
        font: '600 14px "Segoe UI", system-ui, -apple-system, sans-serif'
      });

      var title = css(document.createElement('div'), {
        flex: '1', minWidth: '0', whiteSpace: 'nowrap', overflow: 'hidden', textOverflow: 'ellipsis'
      });
      title.textContent = 'SmartViewer' + (options.title ? ' - ' + options.title : '');

      var btn = css(document.createElement('button'), {
        background: '#27313e', color: '#fff', border: '1px solid #3a4655', borderRadius: '8px',
        padding: '7px 12px', font: 'inherit', fontSize: '13px', cursor: 'pointer'
      });
      btn.type = 'button';
      btn.textContent = '\u2715 Close';
      btn.addEventListener('click', function () { close(false); });

      var frame = css(document.createElement('iframe'), { flex: '1', width: '100%', border: '0', background: '#000' });
      frame.src = url;
      frame.title = 'SmartViewer';
      frame.setAttribute('allow', 'fullscreen; clipboard-write');
      frame.setAttribute('allowfullscreen', '');

      bar.appendChild(title);
      bar.appendChild(btn);
      wrap.appendChild(bar);
      wrap.appendChild(frame);
      document.body.appendChild(wrap);

      oldOverflow = document.body.style.overflow;
      document.body.style.overflow = 'hidden';

      try { history.pushState({ smartviewer: session }, ''); } catch (e) {}
      window.addEventListener('popstate', onPopState);

      win = frame.contentWindow;
    }

    window.addEventListener('message', onMessage);

    var started = Date.now();
    pinger = setInterval(function () {
      if (state.ready || state.closed) { clearInterval(pinger); return; }
      if (Date.now() - started > READY_SECONDS * 1000) {
        clearInterval(pinger);
        fail(new Error('SmartViewer did not open. Check the internet connection.'));
        return;
      }
      try { win.postMessage({ type: 'smartviewer-ping', session: session }, VIEWER_ORIGIN); } catch (e) {}
    }, 500);

    // ---------- send the images ----------
    post({ type: 'smartviewer-begin', label: options.title || '', count: items.length, totalBytes: 0 });

    var next = 0, done = 0, batch = [], failed = false;

    function flush() {
      if (!batch.length) { return; }
      var transfer = batch.map(function (b) { return b.data; });
      post({ type: 'smartviewer-files', files: batch }, transfer);
      batch = [];
    }

    function worker() {
      if (failed || state.closed || next >= items.length) { return Promise.resolve(); }
      var item = items[next++];

      return readItem(item, options.credentials).then(function (file) {
        if (state.closed) { return; }
        batch.push(file);
        done++;
        if (batch.length >= BATCH) { flush(); }
        if (typeof options.onProgress === 'function') { options.onProgress(done, items.length); }
        return worker();
      });
    }

    var workers = [];
    for (var i = 0; i < Math.min(PARALLEL, items.length); i++) { workers.push(worker()); }

    Promise.all(workers).then(function () {
      if (state.closed) { return; }
      flush();
      post({ type: 'smartviewer-end' });
    }).catch(function (err) {
      failed = true;
      fail(err);
    });

    return api;
  }

  global.SmartViewer = { open: open, url: VIEWER_URL, version: '1.0' };
})(window);