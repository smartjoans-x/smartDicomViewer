<?php
/**
 * SmartViewer - main page (PHP)
 *
 * The page HTML is sent from here. The viewer program itself is NOT in this page:
 * it is sent by core.php only to this site, with a short-lived signed link,
 * and it refuses to run anywhere except the allowed https address.
 * So a page saved with "Save as" / "Download" does not work when opened locally.
 *
 * Files:
 *   /dicom/index.php              this page
 *   /dicom/core.php               sends the viewer program (private/viewer-core.js)
 *   /dicom/private/config.php     allowed hosts, link lifetime, signing key
 *   /dicom/private/viewer-core.js the viewer program (not reachable directly)
 *   /dicom/private/.htaccess      blocks direct access to /private
 */

declare(strict_types=1);

require __DIR__ . '/private/config.php';
/*

// Only answer on the real site
$host = strtolower((string)preg_replace('/:\d+$/', '', (string)($_SERVER['HTTP_HOST'] ?? '')));

if (!in_array($host, SV_ALLOWED_HOSTS, true)) {
    http_response_code(403);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'SmartViewer is available at https://smartjoans.space/dicom/';
    exit;
}
*/

header('Content-Type: text/html; charset=utf-8');
header('Cache-Control: no-store, max-age=0');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: same-origin');

$svExp = time() + SV_TOKEN_TTL;
$svSig = sv_sign($svExp);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DICOM Viewer</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&family=IBM+Plex+Sans+Condensed:wght@400;500&display=swap" rel="stylesheet">

<!-- Core libraries -->
<!-- Core libraries (Local) -->
<script src="private/js/hammer.min.js"></script>
<script src="private/js/cornerstone.min.js"></script>
<script src="private/js/cornerstoneMath.min.js"></script>
<script src="private/js/cornerstoneTools.min.js"></script>
<script src="private/js/dicomParser.min.js"></script>
<script src="private/js/cornerstoneWADOImageLoader.min.js"></script>
<!-- ZIP reader (opens .zip files in the browser) -->
<script src="private/js/jszip.min.js" defer></script>
<!-- PDF maker (E-Film) -->
<script src="private/js/jspdf.umd.min.js" defer></script>

<style>
  :root {
    --chrome: #161c24;
    --chrome-2: #1d2530;
    --chrome-3: #27313e;
    --line: #2e3947;
    --ink: #e6ebf1;
    --ink-dim: #93a1b2;
    --ink-faint: #64717f;
    --amber: #f2b33d;
    --amber-soft: rgba(242, 179, 61, 0.14);
    --cyan: #7fd4e6;
    --danger: #ff7a6b;
    --font: "IBM Plex Sans", "Segoe UI", system-ui, -apple-system, sans-serif;
    --font-cond: "IBM Plex Sans Condensed", "Arial Narrow", "Segoe UI", sans-serif;
  }
  * { box-sizing: border-box; margin: 0; padding: 0; }
  html, body { height: 100%; }
  body {
    background: #000;
    color: var(--ink);
    font-family: var(--font);
    font-size: 13px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
  }
  button, select, input { font-family: inherit; }
  :focus-visible { outline: 2px solid var(--amber); outline-offset: 1px; }

  /* ---------- Patient bar ---------- */
  .patient-bar {
    background: var(--chrome);
    border-bottom: 1px solid var(--line);
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 10px 16px;
    min-height: 64px;
  }
  .menu-btn { display: none; }
  .patient {
    flex: 1;
    min-width: 0;
    display: flex;
    flex-direction: column;
    gap: 5px;
  }
  .patient-name {
    font-size: 21px;
    font-weight: 700;
    letter-spacing: 0.2px;
    line-height: 1.15;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .patient-name.empty { color: var(--ink-faint); font-weight: 500; font-size: 17px; }
  .patient-name .sex-age { color: var(--amber); font-weight: 600; font-size: 16px; margin-left: 10px; }
  .chips { display: flex; flex-wrap: wrap; gap: 6px 16px; color: var(--ink-dim); font-size: 12.5px; }
  .chip b { color: var(--ink); font-weight: 500; margin-left: 4px; }
  .open-actions { display: flex; gap: 8px; flex-shrink: 0; }

  /* Patient tabs (several patients open) */
  .pt-tabs {
    display: flex; align-items: stretch; gap: 6px;
    padding: 6px 10px; background: #12171e; border-bottom: 1px solid var(--line);
    overflow-x: auto; overflow-y: hidden; scrollbar-width: thin; scrollbar-color: var(--chrome-3) transparent;
    -webkit-overflow-scrolling: touch;
  }
  .pt-tabs[hidden] { display: none; }
  .pt-tabs-label { align-self: center; color: var(--ink-faint); font-size: 11.5px; white-space: nowrap; padding-right: 4px; }
  .pt-tab {
    flex: 0 0 auto; display: flex; flex-direction: column; align-items: flex-start; gap: 1px;
    max-width: 240px; padding: 6px 12px; cursor: pointer; text-align: left;
    background: var(--chrome-2); color: var(--ink-dim);
    border: 1px solid var(--line); border-radius: 8px; font: inherit;
    transition: background 0.15s, border-color 0.15s;
  }
  .pt-tab:hover { border-color: var(--ink-faint); color: var(--ink); }
  .pt-tab.active { background: var(--amber-soft); border-color: var(--amber); color: var(--ink); box-shadow: inset 0 0 0 1px var(--amber); }
  .pt-tab-name { font-weight: 600; font-size: 13px; max-width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .pt-tab.active .pt-tab-name { color: var(--amber); }
  .pt-tab-sub { font-size: 11px; color: var(--ink-faint); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%; }

  .btn {
    background: var(--chrome-2);
    color: var(--ink);
    border: 1px solid var(--line);
    padding: 7px 12px;
    border-radius: 6px;
    font-size: 13px;
    cursor: pointer;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
  }
  .btn:hover { background: var(--chrome-3); }
  .btn.primary { background: var(--amber); color: #1a1406; border-color: var(--amber); font-weight: 600; }
  .btn.primary:hover { filter: brightness(1.07); }
  input[type="file"] { display: none; }

  /* ---------- Toolbar ---------- */
  .toolbar {
    background: var(--chrome-2);
    border-bottom: 1px solid var(--line);
    display: flex;
    align-items: center;
    gap: 4px;
    padding: 5px 10px;
    overflow-x: auto;
    scrollbar-width: thin;
  }
  .tgroup { display: flex; gap: 2px; padding-right: 8px; margin-right: 6px; border-right: 1px solid var(--line); }
  .tgroup:last-child { border-right: 0; }
  .tbtn {
    background: transparent;
    color: var(--ink-dim);
    border: 1px solid transparent;
    border-radius: 5px;
    min-width: 46px;
    padding: 4px 7px;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1px;
    font-size: 11px;
    font-family: var(--font-cond);
  }
  .tbtn .ic { font-size: 16px; line-height: 18px; color: var(--ink); font-family: var(--font); }
  .tbtn:hover { background: var(--chrome-3); color: var(--ink); }
  .tbtn.active { background: var(--amber-soft); border-color: var(--amber); color: var(--amber); }
  .tbtn.active .ic { color: var(--amber); }
  .tbtn:disabled { opacity: 0.35; cursor: default; }
  .preset {
    background: var(--chrome);
    color: var(--ink);
    border: 1px solid var(--line);
    border-radius: 5px;
    padding: 6px 8px;
    font-size: 12px;
    align-self: center;
  }

  /* ---------- Main layout ---------- */
  .main { flex: 1; display: flex; min-height: 0; position: relative; }

  .series-panel {
    width: 210px;
    background: var(--chrome);
    border-right: 1px solid var(--line);
    display: flex;
    flex-direction: column;
    flex-shrink: 0;
  }
  .panel-head {
    padding: 10px 12px;
    color: var(--ink-dim);
    font-size: 12px;
    border-bottom: 1px solid var(--line);
    display: flex;
    justify-content: space-between;
  }
  /* The list scrolls; the cards never shrink, so every thumbnail stays a full, clear square */
  .series-list {
    flex: 1; min-height: 0;
    overflow-y: auto; overflow-x: hidden;
    overscroll-behavior: contain;
    -webkit-overflow-scrolling: touch;
    padding: 8px; display: flex; flex-direction: column; gap: 8px;
    scrollbar-width: thin; scrollbar-color: var(--chrome-3) transparent;
  }
  .series-list::-webkit-scrollbar { width: 8px; }
  .series-list::-webkit-scrollbar-track { background: transparent; }
  .series-list::-webkit-scrollbar-thumb { background: var(--chrome-3); border-radius: 4px; }
  .series-list::-webkit-scrollbar-thumb:hover { background: var(--ink-faint); }
  .series-card {
    flex: 0 0 auto;
    display: block;
    padding: 0;
    font: inherit;
    border: 1px solid var(--line);
    border-radius: 6px;
    background: var(--chrome-2);
    cursor: pointer;
    overflow: hidden;
    text-align: left;
    color: inherit;
    width: 100%;
  }
  .series-card:hover { border-color: var(--ink-faint); }
  .series-card.active { border-color: var(--amber); box-shadow: inset 0 0 0 1px var(--amber); }
  .thumb { width: 100%; aspect-ratio: 1 / 1; flex: none; background: #000; position: relative; pointer-events: none; overflow: hidden; }
  @supports not (aspect-ratio: 1 / 1) {
    .thumb { height: 0; padding-bottom: 100%; }
  }
  .thumb .tcount {
    position: absolute; right: 6px; bottom: 5px; z-index: 2;
    background: rgba(0,0,0,0.7); padding: 1px 6px; border-radius: 3px; font-size: 11px; color: var(--ink);
  }
  .thumb .tmod {
    position: absolute; left: 6px; top: 5px; z-index: 2;
    color: var(--amber); font-weight: 600; font-size: 11px; text-shadow: 0 1px 2px #000;
  }
  .series-meta { padding: 6px 8px 8px; }
  .series-meta .sd { font-size: 12px; font-weight: 500; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .series-meta .sn { font-size: 11px; color: var(--ink-faint); margin-top: 1px; }

  .viewer {
    flex: 1;
    position: relative;
    background: #000;
    min-width: 0;
    overflow: hidden;
  }
  /* Multi layout */
  .vp-grid {
    position: absolute; inset: 0;
    display: grid; gap: 2px;
    grid-template-columns: minmax(0, 1fr); grid-template-rows: minmax(0, 1fr);
    background: var(--chrome-2);
  }
  .vp { position: relative; background: #000; min-width: 0; min-height: 0; overflow: hidden; }
  .vp-grid.multi .vp.active { box-shadow: inset 0 0 0 2px var(--amber); }
  .vp-grid.multi .vp.active::after { content: ""; }
  .vp.drop-target { box-shadow: inset 0 0 0 2px var(--amber), inset 0 0 0 9999px rgba(242, 179, 61, 0.08) !important; }
  .vp-el { position: absolute; inset: 0; touch-action: none; }
  .vp-grid.scroll-mode .vp-el, .vp-grid.scroll-mode .vp-el canvas { cursor: ns-resize !important; }
  .vp-hint {
    position: absolute; inset: 0; z-index: 1; pointer-events: none;
    display: flex; align-items: center; justify-content: center; text-align: center;
    padding: 12px; color: var(--ink-faint); font-size: 12.5px; line-height: 1.5;
  }
  .vp.has-image .vp-hint { display: none; }
  .vp-edge {
    position: absolute; left: 50%; bottom: 46px; transform: translate(-50%, 8px);
    z-index: 7; pointer-events: none; max-width: 90%;
    background: rgba(22, 28, 36, 0.92); color: var(--ink);
    border: 1px solid var(--amber); border-radius: 18px;
    padding: 6px 14px; font-size: 12.5px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    opacity: 0; transition: opacity 0.15s, transform 0.15s;
  }
  .vp-edge.show { opacity: 1; transform: translate(-50%, 0); }
  .vp-grid.maximized .vp:not(.max) { display: none; }
  .vp-grid.maximized .vp.max { grid-row: 1 / -1; grid-column: 1 / -1; }
  .vp-grid.multi .ov { font-size: 11.5px; }
  .vp-grid.multi .ov .big { font-size: 12.5px; }
  .vp-grid.dense .ov-tr, .vp-grid.dense .ov-tl div:not(.big) { display: none; }
  .vp-grid.dense .ov-br div:not(.big) { display: none; }
  #preload { color: var(--ink-faint); font-size: 11.5px; white-space: nowrap; }
  .viewer.dragging::after {
    content: "Drop the DICOM folder to open it";
    position: absolute; inset: 12px;
    border: 2px dashed var(--amber);
    border-radius: 10px;
    background: rgba(242, 179, 61, 0.06);
    display: flex; align-items: center; justify-content: center;
    color: var(--amber); font-size: 16px; font-weight: 600;
    z-index: 30; pointer-events: none;
  }

  /* Corner overlays */
  .ov {
    position: absolute;
    z-index: 5;
    pointer-events: none;
    font-family: var(--font-cond);
    font-size: 12.5px;
    line-height: 1.45;
    color: #f4f6f8;
    text-shadow: 0 0 3px #000, 0 1px 2px #000;
    max-width: 46%;
  }
  .ov div { white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .ov .big { font-family: var(--font); font-weight: 600; font-size: 14px; color: var(--amber); }
  .ov-tl { top: 10px; left: 12px; }
  .ov-tr { top: 10px; right: 12px; text-align: right; }
  .ov-bl { bottom: 10px; left: 12px; }
  .ov-br { bottom: 10px; right: 12px; text-align: right; }
  .viewer.no-overlay .ov { display: none; }

  .empty-state {
    position: absolute; inset: 0;
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    gap: 10px; z-index: 10; background: #000; text-align: center; padding: 24px;
  }
  .empty-state h2 { font-size: 20px; font-weight: 600; }
  .empty-state p { color: var(--ink-dim); max-width: 46ch; line-height: 1.5; }
  .empty-state .row { display: flex; gap: 10px; margin-top: 8px; flex-wrap: wrap; justify-content: center; }
  .empty-state.hidden { display: none; }

  .loading {
    position: absolute; inset: 0; z-index: 20;
    background: rgba(0,0,0,0.82);
    display: none; flex-direction: column; align-items: center; justify-content: center; gap: 12px;
  }
  .loading.show { display: flex; }
  .bar { width: min(320px, 70%); height: 6px; background: var(--chrome-3); border-radius: 3px; overflow: hidden; }
  .bar span { display: block; height: 100%; width: 0; background: var(--amber); transition: width 0.15s; }
  .loading small { color: var(--ink-dim); }

  /* Tags panel */
  .tags-panel {
    width: 360px;
    background: var(--chrome);
    border-left: 1px solid var(--line);
    display: none;
    flex-direction: column;
    flex-shrink: 0;
  }
  .tags-panel.open { display: flex; }
  .tags-search { margin: 8px; padding: 7px 10px; background: var(--chrome-2); border: 1px solid var(--line); border-radius: 5px; color: var(--ink); font-size: 12px; }
  .tags-body { flex: 1; overflow: auto; }
  .tags-body table { width: 100%; border-collapse: collapse; font-size: 11.5px; }
  .tags-body td { padding: 4px 8px; border-bottom: 1px solid #222a35; vertical-align: top; }
  .tags-body td.t { color: var(--ink-faint); font-family: var(--font-cond); white-space: nowrap; }
  .tags-body td.n { color: var(--ink-dim); }
  .tags-body td.v { color: var(--ink); word-break: break-word; }

  /* Footer */
  .footer {
    background: var(--chrome);
    border-top: 1px solid var(--line);
    padding: 7px 14px;
    display: flex;
    align-items: center;
    gap: 14px;
    font-size: 12.5px;
  }
  .slice-ctrl { display: flex; align-items: center; gap: 10px; flex: 1; max-width: 560px; }
  .slice-ctrl input[type="range"] { flex: 1; accent-color: var(--amber); cursor: pointer; }
  .slice-ctrl .num { min-width: 70px; color: var(--ink-dim); font-variant-numeric: tabular-nums; }
  .cine { display: flex; align-items: center; gap: 6px; color: var(--ink-dim); }
  .cine select { background: var(--chrome-2); color: var(--ink); border: 1px solid var(--line); border-radius: 4px; padding: 3px 4px; }
  .play { width: 30px; height: 28px; justify-content: center; padding: 0; }
  #status { margin-left: auto; color: var(--ink-dim); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 45%; }
  #status.err { color: var(--danger); }
  .hint { color: var(--ink-faint); font-size: 11.5px; }

  /* API link button looks like the other toolbar buttons */
  a.tbtn { text-decoration: none; }

  /* 3D */
  .vr3d { position: absolute; inset: 0; z-index: 9; background: #000; display: none; flex-direction: column; }
  .vr3d.show { display: flex; }
  .vr-ctl { display: flex; align-items: center; gap: 6px; color: var(--ink-dim); font-size: 12px; }
  .vr-ctl input[type="range"] { width: 90px; accent-color: var(--amber); }
  .vr-chk { display: flex; align-items: center; gap: 5px; color: var(--ink-dim); font-size: 12px; cursor: pointer; }
  .vr-chk input { accent-color: var(--amber); }
  .vr-stage { flex: 1; min-height: 0; position: relative; touch-action: none; cursor: grab; }
  .vr-stage:active { cursor: grabbing; }
  .vr-stage canvas { position: absolute; inset: 0; width: 100%; height: 100%; display: block; }
  .vr-hint {
    position: absolute; left: 50%; bottom: 10px; transform: translateX(-50%);
    color: var(--ink-faint); font-size: 12px; pointer-events: none; text-shadow: 0 1px 2px #000;
    white-space: nowrap;
  }
  @media (max-width: 700px) {
    .vr-ctl input[type="range"] { width: 70px; }
    .vr-hint { display: none; }
  }

  /* E-Film */
  .efilm { position: absolute; inset: 0; z-index: 12; background: #0b0f14; display: none; flex-direction: column; }
  .efilm.show { display: flex; }
  .ef-title { color: var(--amber); font-size: 13.5px; margin-right: 4px; }
  .ef-input { background: var(--chrome-2); color: var(--ink); border: 1px solid var(--line); border-radius: 5px; padding: 6px 8px; font-size: 12px; width: 170px; }
  .ef-add { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; padding: 6px 8px; background: #12171e; border-bottom: 1px solid var(--line); }
  .ef-tip { color: var(--ink-faint); font-size: 11.5px; }
  .ef-sel { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; padding: 6px 8px; background: var(--chrome); border-bottom: 1px solid var(--line); }
  .ef-sel .btn { padding: 5px 9px; font-size: 12px; }
  .ef-sel .btn:disabled { opacity: 0.4; cursor: default; }
  .ef-selcount { color: var(--amber); font-size: 12px; min-width: 90px; }
  .ef-del:not(:disabled) { color: var(--danger); border-color: rgba(255, 122, 107, 0.5); }
  .ef-sep { width: 1px; align-self: stretch; background: var(--line); margin: 0 4px; }
  .ef-pages { flex: 1; min-height: 0; overflow: auto; padding: 16px; display: flex; flex-direction: column; align-items: center; gap: 18px; user-select: none; -webkit-user-select: none; }
  .ef-pages.adjusting .ef-cell { cursor: crosshair; touch-action: none; }
  .ef-cell.sel { outline: 3px solid var(--amber); outline-offset: -3px; z-index: 1; }
  .ef-check {
    position: absolute; top: 4px; left: 4px; width: 20px; height: 20px; border-radius: 50%;
    background: var(--amber); color: #1a1406; font-size: 12px; font-weight: 700;
    display: none; align-items: center; justify-content: center; pointer-events: none;
  }
  .ef-cell.sel .ef-check { display: flex; }
  .ef-cell.fixed::after { content: "fixed"; position: absolute; right: 4px; bottom: 3px; font-size: 9px; color: var(--ink-faint); }
  .ef-page {
    width: min(100%, 760px); flex: none; display: flex; flex-direction: column;
    padding: 1.6%; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5); border-radius: 3px;
  }
  .ef-page.black { background: #000; color: #f4f6f8; }
  .ef-page.white { background: #fff; color: #111; }
  .ef-head { display: flex; justify-content: space-between; gap: 12px; padding-bottom: 6px; margin-bottom: 6px; border-bottom: 1px solid rgba(128, 128, 128, 0.5); font-size: 11px; }
  .ef-head b { display: block; font-size: 14px; }
  .ef-head span { display: block; opacity: 0.8; }
  .ef-head-r { text-align: right; }
  .ef-grid { flex: 1; min-height: 0; display: grid; gap: 3px; }
  .ef-cell { position: relative; background: #000; overflow: hidden; min-height: 0; cursor: grab; outline: 1px solid rgba(128, 128, 128, 0.35); }
  .ef-cell.empty { cursor: default; outline-style: dashed; background: transparent; }
  .ef-cell img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: contain; }
  .ef-label { position: absolute; left: 4px; bottom: 3px; font-size: 10px; color: var(--amber); text-shadow: 0 1px 2px #000; pointer-events: none; }
  .ef-tools { position: absolute; top: 3px; right: 3px; display: flex; gap: 2px; opacity: 0; transition: opacity 0.15s; }
  .ef-cell:hover .ef-tools, .ef-cell:focus-within .ef-tools { opacity: 1; }
  .ef-tools button { background: rgba(22, 28, 36, 0.9); color: #fff; border: 1px solid #3a4655; border-radius: 4px; font-size: 11px; padding: 2px 6px; cursor: pointer; }
  .ef-tools button.del { color: var(--danger); }
  @media (pointer: coarse) { .ef-tools { opacity: 1; } }
  @media (max-width: 700px) { .ef-input { width: 120px; } .ef-tip { display: none; } }

  /* MPR */
  .mpr { position: absolute; inset: 0; z-index: 8; background: #000; display: none; flex-direction: column; }
  .mpr.show { display: flex; }
  .mpr-bar {
    display: flex; align-items: center; gap: 8px; flex-wrap: wrap;
    padding: 6px 8px; background: var(--chrome); border-bottom: 1px solid var(--line);
  }
  .seg { display: flex; border: 1px solid var(--line); border-radius: 6px; overflow: hidden; }
  .mbtn { background: transparent; color: var(--ink-dim); border: 0; padding: 6px 10px; font: inherit; font-size: 12.5px; cursor: pointer; }
  .mbtn + .mbtn { border-left: 1px solid var(--line); }
  .mbtn.active { background: var(--amber-soft); color: var(--amber); }
  .mpr-info { color: var(--ink-faint); font-size: 12px; margin-left: auto; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; min-width: 0; }
  .mpr-grid {
    flex: 1; min-height: 0; display: grid; gap: 2px; background: var(--chrome-2);
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); grid-template-rows: minmax(0, 1fr) minmax(0, 1fr);
  }
  .mview { position: relative; background: #000; min-width: 0; min-height: 0; overflow: hidden; touch-action: none; cursor: crosshair; }
  .mpr.wl .mview { cursor: ns-resize; }
  .mview canvas { position: absolute; inset: 0; width: 100%; height: 100%; display: block; }
  .mview.focus { box-shadow: inset 0 0 0 2px var(--mcol); }
  .mtag { position: absolute; top: 8px; right: 10px; z-index: 6; font-size: 12px; font-weight: 600; color: var(--mcol); text-shadow: 0 1px 2px #000; pointer-events: none; }
  .olab { position: absolute; z-index: 6; color: #f4f6f8; font: 600 12px var(--font); text-shadow: 0 0 3px #000, 0 1px 2px #000; pointer-events: none; }
  .olab.l { left: 6px; top: 50%; transform: translateY(-50%); }
  .olab.r { right: 6px; top: 50%; transform: translateY(-50%); }
  .olab.t { top: 6px; left: 50%; transform: translateX(-50%); }
  .olab.b { bottom: 6px; left: 50%; transform: translateX(-50%); }
  .mnote { background: var(--chrome); color: var(--ink-dim); padding: 14px 16px; font-size: 12.5px; line-height: 1.6; overflow: auto; }
  .mnote h3 { margin: 0 0 6px; font-size: 13.5px; color: var(--ink); }
  .mnote ul { margin: 0; padding-left: 18px; }
  .mpr-grid.maximized .mview:not(.max), .mpr-grid.maximized .mnote { display: none; }
  .mpr-grid.maximized .mview.max { grid-row: 1 / -1; grid-column: 1 / -1; }
  @media (max-width: 700px) and (orientation: portrait) {
    .mpr-grid { grid-template-columns: minmax(0, 1fr); grid-template-rows: repeat(3, minmax(0, 1fr)); }
    .mnote { display: none; }
    .mpr-info { display: none; }
  }

  @media (max-width: 900px) {
    .menu-btn { display: inline-flex; }
    .series-panel {
      position: absolute; top: 0; bottom: 0; left: 0; z-index: 40;
      transform: translateX(-100%); transition: transform 0.2s;
      box-shadow: 8px 0 24px rgba(0,0,0,0.5);
    }
    .series-panel.open { transform: none; }
    .tags-panel { position: absolute; right: 0; top: 0; bottom: 0; z-index: 40; width: min(360px, 92vw); }
    .open-actions .label-long { display: none; }
    .pt-tab { max-width: 180px; padding: 5px 10px; }
    .patient-name { font-size: 17px; }
    .chips .opt { display: none; }
    .hint { display: none; }
    #status { max-width: 35%; }
  }
  @media (prefers-reduced-motion: reduce) {
    * { transition: none !important; }
  }
</style>
</head>
<body>

<!-- Patient bar -->
<header class="patient-bar">
  <button class="btn menu-btn" id="menuBtn" title="Show series">☰</button>
  <div class="patient">
    <div class="patient-name empty" id="ptName">No study open</div>
    <div class="chips" id="ptChips"></div>
  </div>
  <div class="open-actions">
    <label class="btn primary" for="folderPicker">📁 <span class="label-long">Open folder</span></label>
    <input type="file" id="folderPicker" webkitdirectory directory multiple>
    <label class="btn" for="filePicker">📄 <span class="label-long">Open files</span></label>
    <input type="file" id="filePicker" multiple>
  </div>
</header>

<!-- Patients (shown when several patients are open) -->
<div class="pt-tabs" id="ptTabs" hidden role="tablist" aria-label="Patients"></div>

<!-- Toolbar -->
<nav class="toolbar" id="toolbar">
  <div class="tgroup">
    <button class="tbtn active" data-tool="Wwwc" title="Window / Level (W)"><span class="ic">◐</span>W/L</button>
    <button class="tbtn" data-tool="Scroll" title="Drag up / down to scroll slices (D)"><span class="ic">⇕</span>Scroll</button>
    <button class="tbtn" data-tool="Zoom" title="Zoom (Z) — Ctrl + wheel also zooms"><span class="ic">⊕</span>Zoom</button>
    <button class="tbtn" data-tool="Pan" title="Pan (P)"><span class="ic">✥</span>Pan</button>
    <button class="tbtn" data-tool="Magnify" title="Magnifier (M)"><span class="ic">⊙</span>Loupe</button>
  </div>
  <div class="tgroup">
    <button class="tbtn" data-tool="Length" title="Measure length (L)"><span class="ic">⟷</span>Length</button>
    <button class="tbtn" data-tool="Angle" title="Measure angle (A)"><span class="ic">∠</span>Angle</button>
    <button class="tbtn" data-tool="EllipticalRoi" title="Elliptical ROI (E)"><span class="ic">◯</span>ROI</button>
    <button class="tbtn" data-tool="Probe" title="Pixel probe (B)"><span class="ic">⌖</span>Probe</button>
    <button class="tbtn" data-tool="Eraser" title="Erase one measurement"><span class="ic">⌫</span>Erase</button>
    <button class="tbtn" id="btnClear" title="Clear all measurements"><span class="ic">✕</span>Clear</button>
  </div>
  <div class="tgroup">
    <select class="preset" id="layoutSel" title="Layout (keys 1 to 6). Double-click a viewport to enlarge it.">
      <option value="1x1">▣ 1 × 1</option>
      <option value="1x2">◫ 1 × 2</option>
      <option value="2x1">⊟ 2 × 1</option>
      <option value="2x2">⊞ 2 × 2</option>
      <option value="2x3">▦ 2 × 3</option>
      <option value="3x3">▩ 3 × 3</option>
    </select>
    <button class="tbtn" id="btnMpr" title="MPR: axial, coronal and sagittal views (X)"><span class="ic">⧉</span>MPR</button>
    <button class="tbtn" id="btnVr" title="3D volume view of the series"><span class="ic">◭</span>3D</button>
  </div>
  <div class="tgroup">
    <button class="tbtn" id="btnFilmAdd" title="Add the image you are looking at to the E-Film (K)"><span class="ic">＋</span>Film</button>
    <button class="tbtn" id="btnFilm" title="E-Film: arrange images and save as PDF"><span class="ic">🎞</span>E-Film<span id="filmCount"></span></button>
  </div>
  <div class="tgroup">
    <select class="preset" id="presetSel" title="Window presets">
      <option value="">W/L preset</option>
      <option value="default">Image default</option>
      <option value="80,40">Brain (80 / 40)</option>
      <option value="200,75">Subdural (200 / 75)</option>
      <option value="1500,-600">Lung (1500 / -600)</option>
      <option value="350,50">Mediastinum (350 / 50)</option>
      <option value="400,50">Abdomen (400 / 50)</option>
      <option value="150,30">Liver (150 / 30)</option>
      <option value="1800,400">Bone (1800 / 400)</option>
      <option value="2800,600">Temporal bone (2800 / 600)</option>
    </select>
  </div>
  <div class="tgroup">
    <button class="tbtn" id="btnInvert" title="Invert (I)"><span class="ic">◑</span>Invert</button>
    <button class="tbtn" id="btnRotate" title="Rotate 90° (O)"><span class="ic">↻</span>Rotate</button>
    <button class="tbtn" id="btnFlipH" title="Flip horizontal (H)"><span class="ic">⇋</span>Flip H</button>
    <button class="tbtn" id="btnFlipV" title="Flip vertical (V)"><span class="ic">⇵</span>Flip V</button>
    <button class="tbtn" id="btnReset" title="Reset view (R)"><span class="ic">⟲</span>Reset</button>
  </div>
  <div class="tgroup">
    <button class="tbtn" id="btnOverlay" title="Show / hide text overlay (T)"><span class="ic">▤</span>Overlay</button>
    <button class="tbtn" id="btnPhi" title="Hide patient details for screen sharing"><span class="ic">◌</span>Hide PHI</button>
    <button class="tbtn" id="btnTags" title="DICOM tags (G)"><span class="ic">ⓘ</span>Tags</button>
    <button class="tbtn" id="btnSnap" title="Save image as PNG (S)"><span class="ic">⤓</span>PNG</button>
    <button class="tbtn" id="btnFull" title="Full screen (F)"><span class="ic">⛶</span>Full</button>
    <a class="tbtn" id="btnApi" href="\dicom\viewer\dicom_api.php" target="_blank" rel="noopener" title="SmartViewer API: open DICOM images from your own system"><span class="ic">⌁</span>API</a>
  </div>
</nav>

<div class="main">
  <!-- Series -->
  <aside class="series-panel" id="seriesPanel">
    <div class="panel-head"><span>Series</span><span id="seriesCount">0</span></div>
    <div class="series-list" id="seriesList"></div>
  </aside>

  <!-- Viewport -->
  <section class="viewer" id="viewer">
    <!-- Viewports (1 to 9) are built by the script; see "Multi layout" -->
    <div class="vp-grid" id="vpGrid"></div>

    <!-- MPR: three planes rebuilt from the series volume -->
    <div class="mpr" id="mpr">
      <div class="mpr-bar">
        <div class="seg" role="group" aria-label="MPR mouse mode">
          <button class="mbtn active" data-mode="cross" title="Tap or drag to move the crosshair (C)">✛ Crosshair</button>
          <button class="mbtn" data-mode="wl" title="Drag to change brightness / contrast (W)">◐ W/L</button>
        </div>
        <select class="preset" id="mprSlab" title="Slab thickness (MIP)">
          <option value="0">Thin slice</option>
          <option value="5">MIP 5 mm</option>
          <option value="10">MIP 10 mm</option>
          <option value="20">MIP 20 mm</option>
          <option value="40">MIP 40 mm</option>
        </select>
        <span class="mpr-info" id="mprInfo"></span>
        <button class="btn" id="mprExit" title="Back to the normal viewer (Esc)">✕ Exit MPR</button>
      </div>
      <div class="mpr-grid" id="mprGrid"></div>
    </div>

    <!-- 3D volume view -->
    <div class="vr3d" id="vr3d">
      <div class="mpr-bar">
        <select class="preset" id="vrPreset" title="What to show"></select>
        <label class="vr-ctl" title="Move the colour ranges (CT: Hounsfield units)">Threshold <input type="range" id="vrShift" min="-400" max="400" value="0"></label>
        <label class="vr-ctl" title="Make it more solid or more see-through">Opacity <input type="range" id="vrOpacity" min="20" max="300" value="100"></label>
        <label class="vr-ctl" title="Cut away the front part to look inside">Cut <input type="range" id="vrClip" min="0" max="90" value="0"></label>
        <label class="vr-chk"><input type="checkbox" id="vrShade" checked> Light</label>
        <div class="seg" id="vrViews" role="group" aria-label="View direction">
          <button class="mbtn" data-view="A" title="Front (anterior)">A</button>
          <button class="mbtn" data-view="P" title="Back (posterior)">P</button>
          <button class="mbtn" data-view="L" title="Left side">L</button>
          <button class="mbtn" data-view="R" title="Right side">R</button>
          <button class="mbtn" data-view="S" title="From the head (superior)">S</button>
          <button class="mbtn" data-view="I" title="From the feet (inferior)">I</button>
        </div>
        <span class="mpr-info" id="vrInfo"></span>
        <button class="btn" id="vrExit" title="Back to the normal viewer (Esc)">✕ Exit 3D</button>
      </div>
      <div class="vr-stage" id="vrStage">
        <canvas id="vrCanvas"></canvas>
        <div class="vr-hint">Drag to rotate · wheel / pinch to zoom · double-click to reset</div>
      </div>
    </div>

    <!-- E-Film: film sheets -> PDF -->
    <div class="efilm" id="efilm">
      <div class="mpr-bar">
        <b class="ef-title">🎞 E-Film</b>
        <select class="preset" id="efLayout" title="Images per page">
          <option value="1x1">1 × 1</option><option value="1x2">1 × 2</option><option value="2x2">2 × 2</option>
          <option value="2x3">2 × 3</option><option value="3x3" selected>3 × 3</option><option value="3x4">3 × 4</option>
          <option value="4x4">4 × 4</option><option value="4x5">4 × 5</option><option value="5x6">5 × 6</option>
        </select>
        <select class="preset" id="efPaper" title="Paper / film size">
          <option value="a4p">A4 portrait</option><option value="a4l">A4 landscape</option>
          <option value="a3p">A3 portrait</option><option value="a3l">A3 landscape</option>
          <option value="film">Film 14 × 17 in</option>
        </select>
        <select class="preset" id="efBg" title="Background">
          <option value="black">Black film</option><option value="white">White paper</option>
        </select>
        <label class="vr-chk"><input type="checkbox" id="efHeader" checked> Patient header</label>
        <label class="vr-chk"><input type="checkbox" id="efLabels" checked> Image labels</label>
        <input class="ef-input" id="efTitle" placeholder="Title / centre name" maxlength="80">
        <span class="mpr-info" id="efInfo"></span>
        <button class="btn" id="efClear" title="Remove all images">Clear</button>
        <button class="btn" id="efOpen" title="Open the PDF in a new tab to print">🖨 Open / Print</button>
        <button class="btn primary" id="efPdf" title="Download the film as PDF">⤓ Save PDF</button>
        <button class="btn" id="efExit" title="Back to the viewer (Esc)">✕ Close</button>
      </div>
      <div class="ef-add">
        <button class="btn" id="efAddCur">＋ Add current image</button>
        <button class="btn" id="efAddSeries">＋ Add whole series</button>
        <label class="vr-chk">every
          <select class="preset" id="efStep"><option>1</option><option>2</option><option>3</option><option>5</option><option>10</option></select>
          image</label>
        <span class="ef-tip">Click = select · <b>Ctrl</b>/<b>Cmd</b>+click = add / remove · <b>Shift</b>+click = range · <b>Delete</b> key = remove · drag to reorder (Select mode). W/L, Zoom and Pan change the selected images. In the viewer, <b>K</b> adds the image you see.</span>
      </div>
      <div class="ef-sel">
        <div class="seg" id="efModes" role="group" aria-label="Mouse / finger mode on the film">
          <button class="mbtn active" data-mode="select" title="Click to select. Ctrl / Cmd + click: add or remove. Shift + click: a range. Drag to reorder.">☐ Select</button>
          <button class="mbtn" data-mode="wl" title="Drag on a selected image: brightness / contrast">◐ W/L</button>
          <button class="mbtn" data-mode="zoom" title="Drag up / down or wheel on a selected image: zoom">⊕ Zoom</button>
          <button class="mbtn" data-mode="pan" title="Drag a selected image to move it">✥ Pan</button>
        </div>
        <span class="ef-selcount" id="efSelCount">Nothing selected</span>
        <button class="btn" id="efSelAll" title="Select all (Ctrl + A)">Select all</button>
        <button class="btn" id="efSelNone" title="Clear the selection (Esc)">Unselect</button>
        <button class="btn ef-del" id="efDelSel" title="Delete the selected images (Delete key)">🗑 Delete</button>
        <span class="ef-sep"></span>
        <select class="preset" id="efWlPreset" title="W/L preset for the selected images">
          <option value="">W/L preset</option>
          <option value="default">As added</option>
          <option value="80,40">Brain (80 / 40)</option>
          <option value="200,75">Subdural (200 / 75)</option>
          <option value="1500,-600">Lung (1500 / -600)</option>
          <option value="350,50">Mediastinum (350 / 50)</option>
          <option value="400,50">Abdomen (400 / 50)</option>
          <option value="150,30">Liver (150 / 30)</option>
          <option value="1800,400">Bone (1800 / 400)</option>
          <option value="2800,600">Temporal bone (2800 / 600)</option>
        </select>
        <button class="btn" id="efZoomOut" title="Zoom out the selected images">−</button>
        <button class="btn" id="efZoomIn" title="Zoom in the selected images">+</button>
        <button class="btn" id="efInvert" title="Invert the selected images">◑ Invert</button>
        <button class="btn" id="efRotate" title="Rotate the selected images 90°">↻ Rotate</button>
        <button class="btn" id="efResetImg" title="Back to how the selected images were added">⟲ Reset</button>
        <button class="btn" id="efCopyWl" title="Use the W/L of the first selected image on every image">W/L → all</button>
      </div>
      <div class="ef-pages" id="efPages"></div>
    </div>

    <div class="empty-state" id="emptyState">
      <h2>Open a study</h2>
      <p>Choose a DICOM folder, files or ZIP files, or drag them here. ZIPs inside folders and several patients at once work too. Series are grouped and sorted automatically.</p>
      <div class="row">
        <label class="btn primary" for="folderPicker">📁 Open folder</label>
        <label class="btn" for="filePicker">📄 Open files</label>
      </div>
    </div>

    <div class="loading" id="loading">
      <div id="loadingText">Reading DICOM headers…</div>
      <div class="bar"><span id="loadingBar"></span></div>
      <small id="loadingSub"></small>
    </div>
  </section>

  <!-- Tags -->
  <aside class="tags-panel" id="tagsPanel">
    <div class="panel-head"><span>DICOM tags</span><button class="btn" id="tagsClose" style="padding:2px 8px">✕</button></div>
    <input class="tags-search" id="tagsSearch" placeholder="Filter by tag, name or value">
    <div class="tags-body" id="tagsBody"></div>
  </aside>
</div>

<footer class="footer">
  <div class="cine">
    <button class="btn play" id="btnPlay" title="Play / pause (Space)">▶</button>
    <select id="fps" title="Frames per second">
      <option>5</option><option>10</option><option selected>15</option><option>20</option><option>30</option>
    </select>
    <span>fps</span>
  </div>
  <div class="slice-ctrl">
    <input type="range" id="sliceRange" min="0" max="0" value="0" disabled>
    <span class="num" id="sliceText">0 / 0</span>
  </div>
  <span class="hint">Wheel: slices · Shift+wheel: ×5 · Ctrl+wheel: zoom · ←/→ series</span>
  <span id="preload"></span>
  <div id="status">Ready</div>
</footer>

<script>window.__SV_HOSTS = <?= json_encode(SV_ALLOWED_HOSTS) ?>;</script>
<script src="core.php?e=<?= $svExp ?>&amp;s=<?= htmlspecialchars($svSig, ENT_QUOTES) ?>"></script>
</body>
</html>