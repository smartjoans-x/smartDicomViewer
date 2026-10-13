<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<script>document.documentElement.className = 'js';</script>

<title>SmartViewer – Free Online DICOM Viewer &amp; API | SmartJOANS</title>
<meta name="description" content="Free online DICOM viewer: open CT, MRI and X-ray files from your computer or phone, or use the free API. MPR, 3D, multi layout. Nothing is uploaded.">
<meta name="keywords" content="free DICOM viewer, online DICOM viewer, open DICOM files online, view DICOM on phone, open CT CD online, DICOM viewer API, web DICOM viewer, browser DICOM viewer, CT viewer online, MRI viewer online, MPR viewer, 3D DICOM viewer, share DICOM images, DICOM viewer for mobile, embed DICOM viewer">
<meta name="robots" content="index, follow, max-image-preview:large">
<meta name="author" content="SmartJOANS">
<meta name="theme-color" content="#0d1117">
<link rel="canonical" href="https://smartjoans.space/dicom/dicom_api">

<meta property="og:type" content="website">
<meta property="og:site_name" content="SmartJOANS">
<meta property="og:title" content="SmartViewer – Free Online DICOM Viewer &amp; Free API">
<meta property="og:description" content="View and share CT, MRI and X-ray DICOM images in any browser. MPR, 3D, multi layout and a free API. Nothing is uploaded.">
<meta property="og:url" content="https://smartjoans.space/dicom/dicom_api">
<meta property="og:locale" content="en_IN">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="SmartViewer – Free Online DICOM Viewer &amp; Free API">
<meta name="twitter:description" content="View and share DICOM images in the browser. MPR, 3D, multi layout, mobile ready, free API.">

<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Crect width='32' height='32' rx='8' fill='%23161c24'/%3E%3Ccircle cx='16' cy='16' r='8' fill='none' stroke='%23f2b33d' stroke-width='3'/%3E%3Cpath d='M16 8a8 8 0 0 1 0 16z' fill='%23f2b33d'/%3E%3C/svg%3E">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500&family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "SoftwareApplication",
      "@id": "https://smartjoans.space/dicom/dicom_api#app",
      "name": "SmartViewer",
      "alternateName": "SmartViewer free online DICOM viewer",
      "url": "https://smartjoans.space/dicom/",
      "applicationCategory": "HealthApplication",
      "applicationSubCategory": "DICOM viewer",
      "operatingSystem": "Web browser (Windows, macOS, Linux, Android, iOS)",
      "browserRequirements": "A current version of Chrome, Edge, Firefox or Safari. 3D needs WebGL 2.",
      "description": "Free online DICOM viewer for sharing and second viewing of CT, MRI, X-ray and ultrasound images. Multi layout, MPR, MIP, 3D volume view, measurements and a free API. Images are processed in the browser and never uploaded.",
      "featureList": [
        "Open DICOM folders and files from your computer or phone without uploading",
        "Open a scan CD in the browser",
        "Automatic series grouping and slice sorting",
        "Scroll from one series to the next",
        "Window / level, zoom, pan, magnifier",
        "Length, angle, elliptical ROI and pixel probe",
        "Multi layout from 1x1 to 3x3",
        "MPR with crosshair and MIP slab",
        "3D volume rendering with presets",
        "Hide patient details for screen sharing",
        "Free link API and embed script"
      ],
      "isAccessibleForFree": true,
      "offers": { "@type": "Offer", "price": "0", "priceCurrency": "INR" },
      "publisher": { "@type": "Organization", "name": "SmartJOANS", "url": "https://smartjoans.space/" }
    },
    {
      "@type": "WebPage",
      "@id": "https://smartjoans.space/dicom/dicom_api#page",
      "url": "https://smartjoans.space/dicom/dicom_api",
      "name": "SmartViewer – Free Online DICOM Viewer & Free DICOM Viewer API",
      "about": { "@id": "https://smartjoans.space/dicom/dicom_api#app" },
      "inLanguage": "en"
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "SmartJOANS", "item": "https://smartjoans.space/" },
        { "@type": "ListItem", "position": 2, "name": "SmartViewer DICOM viewer", "item": "https://smartjoans.space/dicom/dicom_api" }
      ]
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        { "@type": "Question", "name": "Is SmartViewer free?",
          "acceptedAnswer": { "@type": "Answer", "text": "Yes. The viewer and the API are free for everyone. No account, key or permission is needed." } },
        { "@type": "Question", "name": "Are my DICOM images uploaded?",
          "acceptedAnswer": { "@type": "Answer", "text": "No. Images go from your computer or your own server straight into your browser. smartjoans.space does not receive, store or log them." } },
        { "@type": "Question", "name": "Can SmartViewer be used for diagnosis?",
          "acceptedAnswer": { "@type": "Answer", "text": "No. SmartViewer is a sharing and secondary viewing tool. Primary diagnosis and reporting must be done on a certified PACS workstation." } },
        { "@type": "Question", "name": "Can I open DICOM files from my own computer or phone?",
          "acceptedAnswer": { "@type": "Answer", "text": "Yes. Choose a folder or files, or drag and drop them. They open straight in your browser and are never uploaded. You do not need the API for this." } },
        { "@type": "Question", "name": "Does it work on mobile phones?",
          "acceptedAnswer": { "@type": "Answer", "text": "Yes. It works in current browsers on Android and iPhone, with touch scrolling, pinch zoom and a phone friendly layout." } },
        { "@type": "Question", "name": "How do I open my images from my own system?",
          "acceptedAnswer": { "@type": "Answer", "text": "Use the free API: a link with image addresses, a link to a JSON study list, or the smartviewer.js script that sends images from your page. Way 3 works with http and LAN servers." } }
      ]
    }
  ]
}
</script>

<style>
  :root {
    --bg: #0d1117;
    --bg-2: #0a0e13;
    --panel: #161c24;
    --panel-2: #1d2530;
    --line: #2e3947;
    --ink: #e6ebf1;
    --dim: #a4b0bf;
    --faint: #6f7c8b;
    --amber: #f2b33d;
    --amber-soft: rgba(242, 179, 61, 0.12);
    --green: #5fd39a;
    --blue: #6ab7ff;
    --red: #ff8a7a;
    --font: "IBM Plex Sans", "Segoe UI", system-ui, -apple-system, sans-serif;
    --mono: "IBM Plex Mono", Consolas, "Courier New", monospace;
  }
  * { box-sizing: border-box; }
  html { scroll-behavior: smooth; scroll-padding-top: 76px; -webkit-text-size-adjust: 100%; }
  body {
    margin: 0;
    background: var(--bg);
    color: var(--ink);
    font-family: var(--font);
    font-size: 16px;
    line-height: 1.65;
    padding-bottom: env(safe-area-inset-bottom, 0px);
    overflow-x: hidden;
  }
  a { color: var(--amber); }
  :focus-visible { outline: 2px solid var(--amber); outline-offset: 2px; }
  img, svg { max-width: 100%; }

  .wrap { width: min(1080px, calc(100% - 32px)); margin: 0 auto; }
  .narrow { width: min(860px, calc(100% - 32px)); margin: 0 auto; }

  /* ---------- top bar ---------- */
  .topbar {
    position: sticky; top: 0; z-index: 50;
    background: rgba(13, 17, 23, 0.82);
    backdrop-filter: saturate(140%) blur(10px);
    -webkit-backdrop-filter: saturate(140%) blur(10px);
    border-bottom: 1px solid rgba(46, 57, 71, 0.7);
    padding-top: env(safe-area-inset-top, 0px);
  }
  .topbar .wrap { display: flex; align-items: center; gap: 18px; height: 60px; }
  .logo { display: flex; align-items: center; gap: 9px; color: var(--ink); text-decoration: none; font-weight: 700; font-size: 17px; }
  .logo-mark { width: 28px; height: 28px; }
  .topnav { display: flex; gap: 4px; margin-left: auto; }
  .topnav a { color: var(--dim); text-decoration: none; font-size: 14px; padding: 6px 10px; border-radius: 6px; }
  .topnav a:hover { color: var(--ink); background: var(--panel); }

  .btn {
    display: inline-flex; align-items: center; justify-content: center; gap: 8px;
    background: var(--amber); color: #1a1406; border: 0; border-radius: 9px;
    padding: 11px 18px; font: inherit; font-weight: 600; font-size: 15px; cursor: pointer; text-decoration: none;
    transition: transform 0.15s ease, box-shadow 0.15s ease, background 0.15s ease;
  }
  .btn:hover { transform: translateY(-2px); box-shadow: 0 8px 22px rgba(242, 179, 61, 0.25); }
  .btn.ghost { background: var(--panel-2); color: var(--ink); border: 1px solid var(--line); }
  .btn.ghost:hover { box-shadow: 0 8px 22px rgba(0, 0, 0, 0.35); }
  .btn.small { padding: 7px 13px; font-size: 13.5px; }

  /* ---------- hero ---------- */
  .hero { position: relative; padding: 64px 0 56px; overflow: hidden; }
  .hero::before {
    content: ""; position: absolute; inset: -30% -10% auto -10%; height: 140%;
    background:
      radial-gradient(40% 50% at 20% 30%, rgba(242, 179, 61, 0.14), transparent 70%),
      radial-gradient(35% 45% at 85% 20%, rgba(106, 183, 255, 0.10), transparent 70%),
      radial-gradient(30% 40% at 70% 80%, rgba(95, 211, 154, 0.07), transparent 70%);
    animation: glow 16s ease-in-out infinite alternate;
    pointer-events: none;
  }
  @keyframes glow {
    from { transform: translate3d(0, 0, 0) scale(1); }
    to { transform: translate3d(2%, 3%, 0) scale(1.06); }
  }
  .hero .wrap { position: relative; display: grid; grid-template-columns: 1.05fr 1fr; gap: 44px; align-items: center; }
  .eyebrow { color: var(--amber); font-weight: 600; font-size: 14px; margin: 0 0 10px; letter-spacing: 0.02em; }
  h1 { font-size: clamp(32px, 5vw, 50px); line-height: 1.08; margin: 0 0 16px; letter-spacing: -0.02em; }
  h1 .hl { color: var(--amber); }
  .lead { color: var(--dim); font-size: 18.5px; margin: 0 0 24px; max-width: 56ch; }
  .cta { display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 22px; }
  .badges { display: flex; flex-wrap: wrap; gap: 8px; margin: 0; padding: 0; list-style: none; }
  .badges li {
    border: 1px solid var(--line); background: rgba(22, 28, 36, 0.7);
    border-radius: 20px; padding: 4px 12px; font-size: 13.5px; color: var(--dim);
  }
  .badges li b { color: var(--ink); font-weight: 600; }
  .secondary-note { margin-top: 18px; font-size: 13.5px; color: var(--faint); }
  .secondary-note strong { color: var(--dim); }

  .hero-anim > * { opacity: 0; animation: fadeUp 0.7s cubic-bezier(.2, .7, .2, 1) forwards; }
  .hero-anim > *:nth-child(1) { animation-delay: 0.05s; }
  .hero-anim > *:nth-child(2) { animation-delay: 0.15s; }
  .hero-anim > *:nth-child(3) { animation-delay: 0.25s; }
  .hero-anim > *:nth-child(4) { animation-delay: 0.35s; }
  .hero-anim > *:nth-child(5) { animation-delay: 0.45s; }
  .hero-anim > *:nth-child(6) { animation-delay: 0.55s; }
  @keyframes fadeUp { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: none; } }

  /* animated viewer mock */
  .mock {
    position: relative; border: 1px solid var(--line); border-radius: 14px; overflow: hidden;
    background: var(--panel); box-shadow: 0 30px 80px rgba(0, 0, 0, 0.55);
    opacity: 0; animation: mockIn 0.9s 0.25s cubic-bezier(.2, .7, .2, 1) forwards;
  }
  @keyframes mockIn { from { opacity: 0; transform: translateY(26px) scale(0.97); } to { opacity: 1; transform: none; } }
  .mock-bar { display: flex; align-items: center; gap: 6px; padding: 9px 12px; border-bottom: 1px solid var(--line); }
  .mock-bar i { width: 10px; height: 10px; border-radius: 50%; background: #2e3947; display: block; }
  .mock-bar span { margin-left: 8px; font-size: 12px; color: var(--faint); }
  .mock svg { display: block; width: 100%; height: auto; }
  .slice { transform-origin: 100px 100px; animation: slice 4s ease-in-out infinite; }
  @keyframes slice { 0%, 100% { transform: scale(0.82); } 50% { transform: scale(1); } }
  .slice-inner { transform-origin: 100px 100px; animation: sliceIn 4s ease-in-out infinite; }
  @keyframes sliceIn { 0%, 100% { transform: scale(0.7); opacity: 0.6; } 50% { transform: scale(1); opacity: 1; } }
  .xh-v { animation: xhv 5s ease-in-out infinite; }
  .xh-h { animation: xhh 6s ease-in-out infinite; }
  @keyframes xhv { 0%, 100% { transform: translateX(-18px); } 50% { transform: translateX(18px); } }
  @keyframes xhh { 0%, 100% { transform: translateY(-14px); } 50% { transform: translateY(14px); } }
  .spin { transform-origin: 300px 300px; animation: spin 9s linear infinite; }
  @keyframes spin { to { transform: rotate(360deg); } }
  .scanline { animation: scan 3.2s linear infinite; }
  @keyframes scan { from { transform: translateY(0); } to { transform: translateY(180px); } }

  /* ---------- sections ---------- */
  section { padding: 62px 0 10px; }
  .section-head { max-width: 720px; margin-bottom: 26px; }
  .section-head .eyebrow { margin-bottom: 6px; }
  h2 { font-size: clamp(26px, 3.4vw, 34px); margin: 0 0 10px; line-height: 1.2; letter-spacing: -0.01em; }
  h3 { font-size: 18px; margin: 26px 0 8px; }
  p { margin: 0 0 14px; }
  .muted { color: var(--dim); }
  ul, ol { margin: 0 0 14px; padding-left: 22px; }
  li { margin: 4px 0; }

  /* scroll reveal */
  .js .reveal { opacity: 0; transform: translateY(22px); transition: opacity 0.7s ease, transform 0.7s cubic-bezier(.2, .7, .2, 1); }
  .js .reveal.in { opacity: 1; transform: none; }

  .stats { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 12px; margin-top: 8px; }
  .stat { background: var(--panel); border: 1px solid var(--line); border-radius: 12px; padding: 16px 18px; }
  .stat b { display: block; font-size: 24px; color: var(--amber); line-height: 1.2; }
  .stat span { color: var(--dim); font-size: 14px; }

  .grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px; }
  .card {
    background: var(--panel); border: 1px solid var(--line); border-radius: 12px; padding: 20px;
    transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
  }
  .card:hover { transform: translateY(-4px); border-color: #3c4a5c; box-shadow: 0 14px 34px rgba(0, 0, 0, 0.35); }
  .card .ic {
    width: 38px; height: 38px; border-radius: 9px; display: grid; place-items: center;
    background: var(--amber-soft); color: var(--amber); font-size: 19px; margin-bottom: 12px;
  }
  .card h3 { margin: 0 0 6px; font-size: 16.5px; }
  .card p { margin: 0; color: var(--dim); font-size: 14.5px; }

  .uses { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; }
  .use { display: flex; gap: 14px; background: var(--panel); border: 1px solid var(--line); border-radius: 12px; padding: 18px; }
  .use .num { flex: none; width: 30px; height: 30px; border-radius: 50%; background: var(--amber); color: #1a1406; font-weight: 700; display: grid; place-items: center; font-size: 14px; }
  .use h3 { margin: 0 0 4px; font-size: 16px; }
  .use p { margin: 0; color: var(--dim); font-size: 14.5px; }

  .flow { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 12px; counter-reset: step; }
  .flow div { background: var(--panel); border: 1px solid var(--line); border-radius: 12px; padding: 16px 18px; font-size: 14.5px; color: var(--dim); position: relative; }
  .flow div::before {
    counter-increment: step; content: counter(step);
    display: inline-grid; place-items: center; width: 26px; height: 26px; border-radius: 50%;
    background: var(--amber); color: #1a1406; font-weight: 700; font-size: 13px; margin-bottom: 8px;
  }
  .flow b { color: var(--ink); display: block; }

  .note {
    border-left: 3px solid var(--amber); background: var(--amber-soft);
    padding: 12px 16px; border-radius: 0 8px 8px 0; margin: 14px 0 18px; font-size: 15px;
  }
  .note.red { border-color: var(--red); background: rgba(255, 138, 122, 0.08); }
  .note.green { border-color: var(--green); background: rgba(95, 211, 154, 0.08); }
  .note strong { color: var(--ink); }

  .banner {
    display: flex; gap: 16px; align-items: center; flex-wrap: wrap;
    background: linear-gradient(120deg, rgba(242, 179, 61, 0.16), rgba(106, 183, 255, 0.08));
    border: 1px solid rgba(242, 179, 61, 0.35); border-radius: 14px; padding: 22px 24px;
  }
  .banner h2 { font-size: 24px; margin: 0 0 4px; }
  .banner p { margin: 0; color: var(--dim); }
  .banner .btn { margin-left: auto; }

  code { font-family: var(--mono); font-size: 0.9em; background: var(--panel-2); border: 1px solid var(--line); border-radius: 5px; padding: 1px 6px; overflow-wrap: anywhere; }
  kbd { font-family: var(--mono); font-size: 12.5px; background: var(--panel-2); border: 1px solid var(--line); border-bottom-width: 2px; border-radius: 5px; padding: 1px 7px; color: var(--ink); }

  .code { position: relative; background: var(--bg-2); border: 1px solid var(--line); border-radius: 10px; margin: 10px 0 18px; }
  .code .label { display: flex; justify-content: space-between; align-items: center; padding: 6px 8px 6px 14px; border-bottom: 1px solid var(--line); font-size: 12.5px; color: var(--faint); }
  .code pre { margin: 0; padding: 14px; overflow-x: auto; font-family: var(--mono); font-size: 13.5px; line-height: 1.55; color: #d7dee7; }
  .copy { background: var(--panel-2); color: var(--dim); border: 1px solid var(--line); border-radius: 6px; padding: 3px 10px; font: inherit; font-size: 12px; cursor: pointer; }
  .copy:hover { color: var(--ink); }
  .c { color: #6f7c8b; }
  .s { color: #9fd6a8; }
  .k { color: #f2b33d; }

  .table-wrap { overflow-x: auto; margin: 10px 0 18px; border: 1px solid var(--line); border-radius: 10px; }
  table { width: 100%; border-collapse: collapse; font-size: 14.5px; min-width: 520px; }
  th, td { text-align: left; padding: 10px 14px; border-bottom: 1px solid var(--line); vertical-align: top; }
  th { background: var(--panel); color: var(--dim); font-weight: 600; font-size: 13px; }
  tr:last-child td { border-bottom: 0; }
  td code { white-space: nowrap; }

  .keys { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 8px 18px; font-size: 14.5px; color: var(--dim); }
  .keys div { display: flex; gap: 10px; align-items: baseline; }
  .keys kbd { flex: none; min-width: 34px; text-align: center; }

  /* link builder */
  .builder { background: var(--panel); border: 1px solid var(--line); border-radius: 12px; padding: 18px; margin-top: 12px; }
  .builder label { display: block; font-size: 14px; font-weight: 600; margin: 0 0 6px; }
  .builder textarea, .builder input[type="text"] {
    width: 100%; background: var(--bg-2); color: var(--ink);
    border: 1px solid var(--line); border-radius: 8px; padding: 10px 12px; font-family: var(--mono); font-size: 13.5px;
  }
  .builder textarea { min-height: 110px; resize: vertical; }
  .row { display: flex; gap: 16px; flex-wrap: wrap; margin: 12px 0; }
  .row label { display: flex; align-items: center; gap: 6px; font-weight: 500; margin: 0; }
  .out { margin-top: 14px; }
  .out code { display: block; padding: 10px 12px; white-space: normal; word-break: break-all; }
  .btns { display: flex; gap: 8px; margin-top: 10px; flex-wrap: wrap; }
  .warn-text { color: var(--red); font-size: 14px; margin-top: 8px; }

  /* open from this device */
  .local { display: grid; grid-template-columns: 1.15fr 1fr; gap: 18px; align-items: stretch; }
  .drop {
    position: relative; text-align: center; padding: 34px 22px;
    border-radius: 14px; background: var(--panel); cursor: pointer;
    border: 2px dashed #3c4a5c; transition: border-color 0.2s, background 0.2s, transform 0.2s;
    display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 4px;
  }
  .drop:hover, .drop:focus-visible { border-color: var(--amber); }
  .drop.over { border-color: var(--amber); background: rgba(242, 179, 61, 0.08); transform: scale(1.01); }
  .drop h3 { margin: 8px 0 0; font-size: 18px; }
  .drop p { margin: 0 0 10px; }
  .drop-icon { width: 64px; height: 64px; color: var(--amber); animation: bob 2.6s ease-in-out infinite; }
  .drop-icon svg { width: 100%; height: 100%; }
  .drop-icon .arrow { animation: lift 2.6s ease-in-out infinite; }
  @keyframes bob { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-5px); } }
  @keyframes lift { 0%, 100% { transform: translateY(2px); } 50% { transform: translateY(-2px); } }
  .drop-status { min-height: 1.4em; margin: 12px 0 0 !important; font-size: 14px; color: var(--dim); }
  .drop-status.err { color: var(--red); }
  .local-steps { display: flex; flex-direction: column; gap: 10px; }
  .lstep { display: flex; gap: 14px; background: var(--panel); border: 1px solid var(--line); border-radius: 12px; padding: 14px 16px; }
  .lstep .num { flex: none; width: 28px; height: 28px; border-radius: 50%; background: var(--amber); color: #1a1406; font-weight: 700; display: grid; place-items: center; font-size: 13.5px; }
  .lstep h3 { margin: 0 0 2px; font-size: 15.5px; }
  .lstep p { margin: 0; color: var(--dim); font-size: 14px; }
  @media (max-width: 900px) { .local { grid-template-columns: 1fr; } }

  /* FAQ */
  details.faq { background: var(--panel); border: 1px solid var(--line); border-radius: 10px; margin-bottom: 10px; }
  details.faq summary { cursor: pointer; padding: 14px 18px; font-weight: 600; list-style: none; display: flex; justify-content: space-between; gap: 12px; }
  details.faq summary::-webkit-details-marker { display: none; }
  details.faq summary::after { content: "+"; color: var(--amber); font-size: 20px; line-height: 1; transition: transform 0.2s; }
  details.faq[open] summary::after { transform: rotate(45deg); }
  details.faq p { padding: 0 18px 14px; margin: 0; color: var(--dim); }

  footer { border-top: 1px solid var(--line); margin-top: 60px; padding: 26px 0 44px; color: var(--faint); font-size: 14px; }
  footer .wrap { display: flex; flex-wrap: wrap; gap: 10px 22px; justify-content: space-between; }
  footer a { color: var(--dim); }

  @media (max-width: 900px) {
    .hero .wrap { grid-template-columns: 1fr; }
    .mock { max-width: 560px; }
    .grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .keys { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .topnav a.hide-sm { display: none; }
  }
  @media (max-width: 640px) {
    body { font-size: 15.5px; }
    .hero { padding-top: 40px; }
    .topnav { display: none; }
    .topbar .btn { margin-left: auto; }
    .grid, .uses, .flow { grid-template-columns: 1fr; }
    .keys { grid-template-columns: 1fr; }
    .code pre { font-size: 12.5px; }
    .banner .btn { margin-left: 0; }
  }
  @media (prefers-reduced-motion: reduce) {
    *, *::before, *::after { animation: none !important; transition: none !important; }
    .hero-anim > *, .mock { opacity: 1 !important; }
    .js .reveal { opacity: 1; transform: none; }
    html { scroll-behavior: auto; }
  }
</style>
</head>
<body>

<header class="topbar">
  <div class="wrap">
    <a class="logo" href="https://smartjoans.space/dicom/dicom_api" aria-label="SmartViewer home">
      <svg class="logo-mark" viewBox="0 0 32 32" aria-hidden="true"><rect width="32" height="32" rx="8" fill="#161c24"/><circle cx="16" cy="16" r="8" fill="none" stroke="#f2b33d" stroke-width="3"/><path d="M16 8a8 8 0 0 1 0 16z" fill="#f2b33d"/></svg>
      SmartViewer
    </a>
    <nav class="topnav" aria-label="Main">
      <a href="#local">Open files</a>
      <a href="#features">Features</a>
      <a href="#uses" class="hide-sm">Who it is for</a>
      <a href="#api">Free API</a>
      <a href="#faq" class="hide-sm">FAQ</a>
    </nav>
    <a class="btn small" href="https://smartjoans.space/dicom/">Open viewer</a>
  </div>
</header>

<main>

  <!-- ================= HERO ================= -->
  <section class="hero" aria-labelledby="hero-title">
    <div class="wrap">
      <div class="hero-anim">
        <p class="eyebrow">Free online DICOM viewer · Free API</p>
        <h1 id="hero-title">View and share <span class="hl">DICOM images</span> in any browser</h1>
        <p class="lead">Open CT, MRI, X-ray and ultrasound images <strong>straight from your computer, phone or scan CD</strong>,
          or from your hospital system with the free API. MPR, 3D, multi layout and measurements included.
          A <strong>sharing and secondary viewing tool</strong>: free for everyone, and your images are never uploaded.</p>
        <div class="cta">
          <a class="btn" href="#local">📂 Open files from this device</a>
          <a class="btn ghost" href="https://smartjoans.space/dicom/">▶ Open SmartViewer</a>
          <a class="btn ghost" href="#api">Free API</a>
        </div>
        <ul class="badges" aria-label="Highlights">
          <li><b>Local files</b> · computer, phone, CD</li>
          <li><b>100% free</b> · no sign-up</li>
          <li><b>No upload</b> · runs in your browser</li>
          <li><b>Free API</b> · no key</li>
          <li><b>Phone ready</b></li>
        </ul>
        <p class="secondary-note"><strong>For sharing and secondary viewing only.</strong> Not for primary diagnosis or reporting.</p>
      </div>

      <div class="mock" aria-hidden="true">
        <div class="mock-bar"><i></i><i></i><i></i><span>SmartViewer · 2 × 2 · MPR · 3D</span></div>
        <svg viewBox="0 0 400 400" role="img">
          <defs>
            <radialGradient id="bone" cx="40%" cy="35%" r="70%">
              <stop offset="0" stop-color="#fff4dc"/><stop offset="0.55" stop-color="#d9b98a"/><stop offset="1" stop-color="#6b5236"/>
            </radialGradient>
            <linearGradient id="scan" x1="0" x2="0" y1="0" y2="1">
              <stop offset="0" stop-color="#f2b33d" stop-opacity="0"/><stop offset="1" stop-color="#f2b33d" stop-opacity="0.35"/>
            </linearGradient>
            <clipPath id="c1"><rect x="0" y="0" width="199" height="199"/></clipPath>
            <clipPath id="c4"><rect x="201" y="201" width="199" height="199"/></clipPath>
          </defs>
          <rect width="400" height="400" fill="#1d2530"/>
          <!-- pane 1: axial slice scrolling -->
          <rect x="0" y="0" width="199" height="199" fill="#000"/>
          <g clip-path="url(#c1)">
            <ellipse class="slice" cx="100" cy="100" rx="70" ry="82" fill="#e9eef3"/>
            <ellipse class="slice" cx="100" cy="100" rx="62" ry="74" fill="#5c6672"/>
            <ellipse class="slice-inner" cx="100" cy="100" rx="42" ry="52" fill="#8a949f"/>
            <ellipse class="slice-inner" cx="84" cy="96" rx="9" ry="16" fill="#2a3037"/>
            <ellipse class="slice-inner" cx="116" cy="96" rx="9" ry="16" fill="#2a3037"/>
            <rect class="scanline" x="0" y="-12" width="199" height="12" fill="url(#scan)"/>
          </g>
          <rect x="1" y="1" width="197" height="197" fill="none" stroke="#f2b33d" stroke-width="2"/>
          <text x="10" y="18" fill="#f2b33d" font-size="11" font-family="IBM Plex Sans, sans-serif" font-weight="600">Axial</text>
          <!-- pane 2: coronal with crosshair -->
          <rect x="201" y="0" width="199" height="199" fill="#000"/>
          <ellipse cx="300" cy="96" rx="58" ry="74" fill="#cfd6dd"/>
          <ellipse cx="300" cy="96" rx="50" ry="66" fill="#6b7480"/>
          <path d="M268 150 q32 30 64 0 v30 h-64z" fill="#9aa3ad"/>
          <g class="xh-v"><line x1="300" y1="6" x2="300" y2="193" stroke="#6ab7ff" stroke-width="1.5"/></g>
          <g class="xh-h"><line x1="207" y1="100" x2="394" y2="100" stroke="#f2b33d" stroke-width="1.5"/></g>
          <text x="211" y="18" fill="#5fd39a" font-size="11" font-family="IBM Plex Sans, sans-serif" font-weight="600">Coronal</text>
          <!-- pane 3: sagittal -->
          <rect x="0" y="201" width="199" height="199" fill="#000"/>
          <path d="M60 370 C40 320 40 250 90 225 C140 205 170 250 160 300 C155 330 140 345 120 360 L110 390 L70 390 Z" fill="#c9d0d7"/>
          <path d="M72 360 C58 318 60 262 96 240 C132 224 152 262 146 300 C142 326 130 338 114 350 L104 375 L80 375 Z" fill="#69727e"/>
          <g class="xh-h"><line x1="6" y1="300" x2="193" y2="300" stroke="#f2b33d" stroke-width="1.5"/></g>
          <text x="10" y="219" fill="#6ab7ff" font-size="11" font-family="IBM Plex Sans, sans-serif" font-weight="600">Sagittal</text>
          <!-- pane 4: 3D -->
          <rect x="201" y="201" width="199" height="199" fill="#000"/>
          <g clip-path="url(#c4)">
            <g class="spin">
              <ellipse cx="300" cy="300" rx="62" ry="70" fill="url(#bone)"/>
              <ellipse cx="282" cy="292" rx="12" ry="15" fill="#3b2b1c" opacity="0.85"/>
              <ellipse cx="318" cy="292" rx="12" ry="15" fill="#3b2b1c" opacity="0.85"/>
              <path d="M286 330 q14 10 28 0" stroke="#3b2b1c" stroke-width="5" fill="none" stroke-linecap="round"/>
            </g>
          </g>
          <text x="211" y="219" fill="#f2b33d" font-size="11" font-family="IBM Plex Sans, sans-serif" font-weight="600">3D · Bone</text>
        </svg>
      </div>
    </div>
  </section>

  <!-- ================= STATS ================= -->
  <section class="wrap" style="padding-top: 10px" aria-label="SmartViewer in numbers">
    <div class="stats">
      <div class="stat reveal"><b>₹0</b><span>Viewer and API, always free</span></div>
      <div class="stat reveal"><b>0 uploads</b><span>Images stay in your browser</span></div>
      <div class="stat reveal"><b>2 ways</b><span>Your own files, or the free API</span></div>
      <div class="stat reveal"><b>1–9</b><span>Viewports side by side</span></div>
    </div>
  </section>


  <!-- ================= OPEN FROM THIS DEVICE ================= -->
  <section id="local" aria-labelledby="local-title">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">No API needed</p>
        <h2 id="local-title">Open DICOM files from your computer or phone</h2>
        <p class="muted">You do not need a server or the API to use SmartViewer. Pick a folder, a few files or a scan CD
          right here. The files open in your browser and are <strong>never uploaded</strong>.</p>
      </div>

      <div class="local reveal">
        <div class="drop" id="lpDrop" tabindex="0" role="button" aria-label="Drop DICOM files or a folder here, or press Enter to choose files">
          <div class="drop-icon" aria-hidden="true">
            <svg viewBox="0 0 48 48"><path d="M6 14a4 4 0 0 1 4-4h9l4 4h15a4 4 0 0 1 4 4v18a4 4 0 0 1-4 4H10a4 4 0 0 1-4-4z" fill="none" stroke="currentColor" stroke-width="2.5"/><path class="arrow" d="M24 34V21m-6 6 6-6 6 6" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <h3>Drag and drop a DICOM folder or files here</h3>
          <p class="muted">or choose them:</p>
          <div class="cta" style="justify-content:center;margin:0">
            <label class="btn" for="lpFolder">📁 Choose folder</label>
            <label class="btn ghost" for="lpFiles">📄 Choose files</label>
          </div>
          <p class="drop-status" id="lpStatus" role="status" aria-live="polite"></p>
        </div>
        <input type="file" id="lpFolder" webkitdirectory directory multiple hidden>
        <input type="file" id="lpFiles" multiple hidden>

        <div class="local-steps">
          <div class="lstep"><span class="num">1</span><div><h3>Computer</h3><p>Choose the study folder, or drag it here. Sub folders are searched too.</p></div></div>
          <div class="lstep"><span class="num">2</span><div><h3>Scan CD / DVD / pen drive</h3><p>Insert the CD, press <b>Choose folder</b> and pick the CD drive. DICOMDIR and viewer programs on the CD are skipped.</p></div></div>
          <div class="lstep"><span class="num">3</span><div><h3>Phone or tablet</h3><p>Press <b>Choose files</b> and select the images (phones cannot pick a whole folder). Files shared on WhatsApp or e-mail can be opened the same way.</p></div></div>
          <p class="muted" style="margin:6px 0 0;font-size:14px">You can also open the full viewer at
            <a href="https://smartjoans.space/dicom/">smartjoans.space/dicom</a> and use its <b>Open folder</b> button.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= FEATURES ================= -->
  <section id="features" aria-labelledby="features-title">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Features</p>
        <h2 id="features-title">Everything you need to look at a study and share it</h2>
        <p class="muted">Open a folder, a few files or a link. SmartViewer reads the DICOM headers, groups the series,
          sorts the slices and shows patient details on top.</p>
      </div>
      <div class="grid">
        <article class="card reveal"><div class="ic">📁</div><h3>Open from your device</h3><p>Pick a DICOM folder, files or a scan CD from your computer or phone, or drag and drop. Or open a link. Nothing is uploaded.</p></article>
        <article class="card reveal"><div class="ic">⇕</div><h3>Smooth scrolling</h3><p>Mouse wheel, finger drag or arrow keys. At the end of a series, keep scrolling to go straight to the next series.</p></article>
        <article class="card reveal"><div class="ic">◐</div><h3>Window / level</h3><p>Drag to change brightness and contrast, or use presets: brain, lung, bone, abdomen, liver, subdural and more.</p></article>
        <article class="card reveal"><div class="ic">⟷</div><h3>Measure</h3><p>Length, angle, elliptical ROI and pixel probe, plus zoom, pan, magnifier, rotate, flip and invert.</p></article>
        <article class="card reveal"><div class="ic">⊞</div><h3>Multi layout</h3><p>Compare series in 1×1 up to 3×3. Drag a series onto any viewport. Double-click a viewport to enlarge it.</p></article>
        <article class="card reveal"><div class="ic">⧉</div><h3>MPR + MIP</h3><p>Axial, coronal and sagittal views with a shared crosshair, orientation letters and MIP slabs from 5 to 40 mm.</p></article>
        <article class="card reveal"><div class="ic">◭</div><h3>3D volume view</h3><p>Rotate and zoom a 3D view of CT or MR with bone, skin, soft tissue, vessel, lung and MIP presets, and a cut tool.</p></article>
        <article class="card reveal"><div class="ic">▶</div><h3>Cine and tags</h3><p>Play a series from 5 to 30 frames per second and read every DICOM tag with a search box.</p></article>
        <article class="card reveal"><div class="ic">◌</div><h3>Hide patient details</h3><p>One click hides name, ID and birth date before you share your screen. Save any view as a PNG picture.</p></article>
        <article class="card reveal"><div class="ic">📱</div><h3>Made for phones</h3><p>Touch scrolling, pinch zoom, a phone friendly layout and the Back button. Works on Android and iPhone.</p></article>
        <article class="card reveal"><div class="ic">🗜</div><h3>Many formats</h3><p>Uncompressed, JPEG baseline and lossless, JPEG-LS, JPEG 2000 and RLE. Single-frame and multi-frame images.</p></article>
        <article class="card reveal"><div class="ic">⌁</div><h3>Free API</h3><p>Open studies from your own system with a link, a JSON study list or one script. No key, no sign-up, no permission.</p></article>
      </div>
    </div>
  </section>

  <!-- ================= USE CASES ================= -->
  <section id="uses" aria-labelledby="uses-title">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Who it is for</p>
        <h2 id="uses-title">A sharing and secondary viewing tool</h2>
        <p class="muted">SmartViewer is made to show images to people who need to see them, quickly and from anywhere.</p>
      </div>
      <div class="uses">
        <div class="use reveal"><span class="num">1</span><div><h3>Referring doctors</h3><p>Look at the images next to the official report, on a laptop or a phone, without installing software.</p></div></div>
        <div class="use reveal"><span class="num">2</span><div><h3>Patients and families</h3><p>Open the CD or the folder from the scan centre and see your own scan in the browser.</p></div></div>
        <div class="use reveal"><span class="num">3</span><div><h3>Diagnostic centres and clinics</h3><p>Add a "View images" button to your website, RIS or patient portal with the free API.</p></div></div>
        <div class="use reveal"><span class="num">4</span><div><h3>Teaching and case discussion</h3><p>Show a case on a projector with patient details hidden, compare series side by side, and use MPR or 3D.</p></div></div>
      </div>
      <div class="note red reveal"><strong>Not for primary diagnosis.</strong> SmartViewer is not a certified medical device.
        Use it for sharing and secondary viewing. Primary reading and reporting must be done on a certified PACS workstation
        with a calibrated display.</div>
    </div>
  </section>

  <!-- ================= HOW / PRIVACY ================= -->
  <section id="how" aria-labelledby="how-title">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">How it works</p>
        <h2 id="how-title">Your images stay with you</h2>
      </div>
      <div class="flow">
        <div class="reveal"><b>You open a study</b>from your own computer, phone or scan CD, or from a link sent by your hospital system.</div>
        <div class="reveal"><b>Your browser reads it</b>straight from your device or from your own server. Nothing goes to smartjoans.space.</div>
        <div class="reveal"><b>SmartViewer shows it</b>grouped by series, sorted, with patient details, tools, MPR and 3D.</div>
      </div>
      <div class="note green reveal"><strong>Privacy by design.</strong> Images are kept only in the browser memory while the
        tab is open and are gone when you close it. smartjoans.space does not receive, store or log images.</div>
    </div>
  </section>

  <!-- ================= SHORTCUTS ================= -->
  <section id="keys" aria-labelledby="keys-title">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Keyboard</p>
        <h2 id="keys-title">Shortcuts</h2>
      </div>
      <div class="keys reveal">
        <div><kbd>W</kbd> Window / level</div>
        <div><kbd>D</kbd> Drag to scroll</div>
        <div><kbd>Z</kbd> Zoom</div>
        <div><kbd>P</kbd> Pan</div>
        <div><kbd>M</kbd> Magnifier</div>
        <div><kbd>L</kbd> Length</div>
        <div><kbd>A</kbd> Angle</div>
        <div><kbd>E</kbd> Elliptical ROI</div>
        <div><kbd>B</kbd> Pixel probe</div>
        <div><kbd>↑</kbd> <kbd>↓</kbd> Previous / next image</div>
        <div><kbd>←</kbd> <kbd>→</kbd> Previous / next series</div>
        <div><kbd>PgUp</kbd> <kbd>PgDn</kbd> 10 images</div>
        <div><kbd>Space</kbd> Play / pause</div>
        <div><kbd>1</kbd>–<kbd>6</kbd> Layouts</div>
        <div><kbd>X</kbd> MPR on / off</div>
        <div><kbd>R</kbd> Reset view</div>
        <div><kbd>I</kbd> Invert</div>
        <div><kbd>O</kbd> Rotate 90°</div>
        <div><kbd>H</kbd> <kbd>V</kbd> Flip</div>
        <div><kbd>T</kbd> Text overlay</div>
        <div><kbd>G</kbd> DICOM tags</div>
        <div><kbd>S</kbd> Save PNG</div>
        <div><kbd>F</kbd> Full screen</div>
        <div><kbd>Esc</kbd> Leave MPR / 3D</div>
      </div>
    </div>
  </section>

  <!-- ================= API ================= -->
  <section id="api" aria-labelledby="api-title">
    <div class="wrap">
      <div class="banner reveal">
        <div>
          <p class="eyebrow" style="margin:0 0 4px">Free API · no key · no sign-up</p>
          <h2 id="api-title">Open your DICOM images in SmartViewer from your own system</h2>
          <p>Optional, for hospitals, clinics, PACS, RIS and patient portals. Just viewing your own files? You do not need it, <a href="#local">open them here</a>.</p>
        </div>
        <a class="btn" href="#builder">Try the link builder</a>
      </div>
    </div>
  </section>

  <div class="narrow">

    <!-- ================= QUICK START ================= -->
    <section id="quick" aria-labelledby="quick-title">
      <h2 id="quick-title" class="reveal">Quick start</h2>
      <p class="reveal">Pick the way that fits your system. The viewer address is always
        <code>https://smartjoans.space/dicom/</code>.</p>

      <div class="table-wrap reveal">
        <table>
          <thead><tr><th>Way</th><th>How it looks</th><th>Use it when</th></tr></thead>
          <tbody>
            <tr>
              <td><strong>1. Image links</strong></td>
              <td><code>…/dicom/?url=IMAGE1&amp;url=IMAGE2</code></td>
              <td>A few images (X-ray, a short series). No programming needed.</td>
            </tr>
            <tr>
              <td><strong>2. Study list</strong> (manifest)</td>
              <td><code>…/dicom/?manifest=LIST_URL</code></td>
              <td>Any study size from a public https server. Good for links in e-mail, SMS or WhatsApp.</td>
            </tr>
            <tr>
              <td><strong>3. From your page</strong> (smartviewer.js)</td>
              <td><code>SmartViewer.open({ files })</code></td>
              <td>A button in your web app. Works with <strong>http, LAN and local servers</strong>, no CORS or https setup. Best for clinics and PACS.</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="note reveal"><strong>Two rules for Way 1 and Way 2.</strong> The image server must use <strong>https</strong>,
        and it must allow SmartViewer to read the files by sending this header (called CORS):
        <code>Access-Control-Allow-Origin: https://smartjoans.space</code>. The <a href="#server">server setup</a>
        section shows how for IIS, Apache, Nginx and PHP. <strong>Way 3 has no such rules.</strong></div>
    </section>

    <!-- ================= WAY 1 ================= -->
    <section id="direct" aria-labelledby="direct-title">
      <h2 id="direct-title" class="reveal">Way 1: image links</h2>
      <p class="reveal">Add one <code>url</code> for every image file. Each address must be URL-encoded
        (<code>encodeURIComponent</code> in JavaScript, <code>rawurlencode</code> in PHP).</p>

      <div class="code reveal"><div class="label"><span>Link</span><button class="copy" type="button">Copy</button></div><pre>https://smartjoans.space/dicom/?title=Chest%20X-ray&amp;url=https%3A%2F%2Fpacs.example.com%2Fimages%2Fchest-pa.dcm&amp;url=https%3A%2F%2Fpacs.example.com%2Fimages%2Fchest-lat.dcm</pre></div>

      <p class="muted reveal">Keep this way for about 20 images or fewer (the viewer accepts up to 500), because very long links
        can break in some phones and messaging apps. For more images use the study list.</p>
    </section>

    <!-- ================= WAY 2 ================= -->
    <section id="manifest" aria-labelledby="manifest-title">
      <h2 id="manifest-title" class="reveal">Way 2: study list (manifest)</h2>
      <p class="reveal">Your server gives one small JSON file that lists the images. The link only carries the address of that list.</p>

      <h3 class="reveal">1. The link</h3>
      <div class="code reveal"><div class="label"><span>Link</span><button class="copy" type="button">Copy</button></div><pre>https://smartjoans.space/dicom/?manifest=https%3A%2F%2Fpacs.example.com%2Fmanifest.php%3Fstudy%3D1234</pre></div>

      <h3 class="reveal">2. The list your server returns</h3>
      <div class="code reveal"><div class="label"><span>JSON · Content-Type: application/json</span><button class="copy" type="button">Copy</button></div><pre>{
  <span class="k">"title"</span>: <span class="s">"CT Brain - 12 Oct 2026"</span>,
  <span class="k">"files"</span>: [
    { <span class="k">"name"</span>: <span class="s">"IM0001.dcm"</span>, <span class="k">"url"</span>: <span class="s">"https://pacs.example.com/file.php?study=1234&amp;f=IM0001.dcm"</span>, <span class="k">"size"</span>: 525312 },
    { <span class="k">"name"</span>: <span class="s">"IM0002.dcm"</span>, <span class="k">"url"</span>: <span class="s">"file.php?study=1234&amp;f=IM0002.dcm"</span>, <span class="k">"size"</span>: 525312 }
  ]
}</pre></div>

      <div class="table-wrap reveal">
        <table>
          <thead><tr><th>Field</th><th>Needed</th><th>Meaning</th></tr></thead>
          <tbody>
            <tr><td><code>files</code></td><td>Yes</td><td>List of images. Order does not matter; SmartViewer sorts by series and instance number.</td></tr>
            <tr><td><code>files[].url</code></td><td>Yes</td><td>Address of one DICOM file. Full, or relative to the list address (like the second line above).</td></tr>
            <tr><td><code>files[].name</code></td><td>No</td><td>File name shown in the DICOM tags panel.</td></tr>
            <tr><td><code>files[].size</code></td><td>No</td><td>Size in bytes. Makes the progress bar exact.</td></tr>
            <tr><td><code>title</code></td><td>No</td><td>Text shown while downloading, e.g. the exam name.</td></tr>
            <tr><td><code>status</code> + <code>message</code></td><td>No</td><td>Send <code>{"status":"error","message":"Link expired"}</code> and SmartViewer shows your message.</td></tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- ================= WAY 3 ================= -->
    <section id="script" aria-labelledby="script-title">
      <h2 id="script-title" class="reveal">Way 3: from your page (smartviewer.js)</h2>
      <p class="reveal">Add one script to your web page and call <code>SmartViewer.open()</code> from a button. Your page reads the
        images from your own server and hands them to SmartViewer inside the browser. Because your page does the reading,
        your images can be on <code>http</code>, on a LAN address like <code>http://192.168.1.10</code>, or on the user's computer.</p>

      <h3 class="reveal">1. Add the script once</h3>
      <div class="code reveal"><div class="label"><span>HTML</span><button class="copy" type="button">Copy</button></div><pre>&lt;script src="https://smartjoans.space/dicom/smartviewer.js"&gt;&lt;/script&gt;</pre></div>

      <h3 class="reveal">2. Open images from your server</h3>
      <div class="code reveal"><div class="label"><span>HTML + JavaScript</span><button class="copy" type="button">Copy</button></div><pre>&lt;button id="view"&gt;View images&lt;/button&gt;

&lt;script&gt;
document.getElementById('view').addEventListener('click', () =&gt; {
  SmartViewer.open({
    title: 'CT Brain - Ravi Kumar',
    files: [
      '/studies/1234/IM0001.dcm',          <span class="c">// addresses your page can read</span>
      '/studies/1234/IM0002.dcm',
      '/studies/1234/IM0003.dcm'
    ]
  });
});
&lt;/script&gt;</pre></div>

      <h3 class="reveal">3. Or open files the user picks on the computer / phone</h3>
      <div class="code reveal"><div class="label"><span>HTML</span><button class="copy" type="button">Copy</button></div><pre>&lt;input type="file" multiple
       onchange="SmartViewer.open({ title: 'My study', files: [...this.files] })"&gt;</pre></div>

      <h3 class="reveal">Get the file list from your server</h3>
      <div class="code reveal"><div class="label"><span>JavaScript</span><button class="copy" type="button">Copy</button></div><pre>button.addEventListener('click', async () =&gt; {
  <span class="c">// your own script returns ["IM1.dcm","IM2.dcm",...]</span>
  const list = await fetch('/api/study-files.php?uid=' + encodeURIComponent(uid)).then(r =&gt; r.json());

  SmartViewer.open({
    title: patientName,
    files: list.map(name =&gt; '/api/study-file.php?uid=' + encodeURIComponent(uid) + '&amp;f=' + encodeURIComponent(name))
  });
});</pre></div>

      <h3 class="reveal">Options</h3>
      <div class="table-wrap reveal">
        <table>
          <thead><tr><th>Option</th><th>Default</th><th>Meaning</th></tr></thead>
          <tbody>
            <tr><td><code>files</code></td><td>(needed)</td><td>List of image addresses, <code>File</code> objects, <code>Blob</code>s, <code>ArrayBuffer</code>s, or <code>{ name, url }</code> / <code>{ name, data }</code>.</td></tr>
            <tr><td><code>title</code></td><td>none</td><td>Shown in the top bar and while loading.</td></tr>
            <tr><td><code>mode</code></td><td><code>'overlay'</code></td><td><code>'overlay'</code> opens full screen on your page (best on phones). <code>'tab'</code> opens a new tab.</td></tr>
            <tr><td><code>credentials</code></td><td><code>'same-origin'</code></td><td>Cookies for the image addresses. Use <code>'include'</code> if your images need your login cookie on another address.</td></tr>
            <tr><td><code>onProgress(done, total)</code></td><td>none</td><td>Called after each image is read.</td></tr>
            <tr><td><code>onDone(seriesCount)</code></td><td>none</td><td>Called when the viewer shows the images.</td></tr>
            <tr><td><code>onError(error)</code></td><td>console</td><td>Called if an image cannot be read or the viewer does not open.</td></tr>
            <tr><td><code>onClose()</code></td><td>none</td><td>Called when the viewer is closed.</td></tr>
          </tbody>
        </table>
      </div>
      <p class="muted reveal"><code>SmartViewer.open()</code> returns an object with <code>close()</code>. The phone Back button
        also closes the viewer. <code>ArrayBuffer</code>s you pass are handed over and become empty on your page.</p>

      <div class="note reveal"><strong>Call it from a click.</strong> Browsers block new tabs that are not opened by the user,
        so call <code>SmartViewer.open()</code> inside a click handler, especially with <code>mode: 'tab'</code>.</div>
    </section>

    <!-- ================= LINK PARAMETERS ================= -->
    <section id="params" aria-labelledby="params-title">
      <h2 id="params-title" class="reveal">All link options</h2>
      <div class="table-wrap reveal">
        <table>
          <thead><tr><th>Option</th><th>Example</th><th>What it does</th></tr></thead>
          <tbody>
            <tr><td><code>manifest</code></td><td><code>?manifest=https%3A%2F%2F…</code></td><td>Address of your study list.</td></tr>
            <tr><td><code>url</code></td><td><code>?url=…&amp;url=…</code></td><td>Address of one image. Repeat for more (up to 500).</td></tr>
            <tr><td><code>title</code></td><td><code>&amp;title=CT%20Brain</code></td><td>Text shown while downloading (up to 120 characters). Overrides the list title.</td></tr>
          </tbody>
        </table>
      </div>
      <p class="muted reveal">Use either <code>manifest</code> or <code>url</code>. If both are given, <code>manifest</code> is used.</p>
    </section>

    <!-- ================= SERVER SETUP ================= -->
    <section id="server" aria-labelledby="server-title">
      <h2 id="server-title" class="reveal">Server setup (Way 1 and Way 2)</h2>
      <p class="reveal">SmartViewer runs in the browser on <code>https://smartjoans.space</code>. To read files from your server,
        your server must say it allows that. Add the header on the folder or script that serves the list and the images.</p>

      <h3 class="reveal">IIS (web.config in the images folder)</h3>
      <div class="code reveal"><div class="label"><span>web.config</span><button class="copy" type="button">Copy</button></div><pre>&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;configuration&gt;
  &lt;system.webServer&gt;
    &lt;httpProtocol&gt;
      &lt;customHeaders&gt;
        &lt;add name="Access-Control-Allow-Origin" value="https://smartjoans.space" /&gt;
      &lt;/customHeaders&gt;
    &lt;/httpProtocol&gt;
    &lt;staticContent&gt;
      &lt;remove fileExtension=".dcm" /&gt;
      &lt;mimeMap fileExtension=".dcm" mimeType="application/dicom" /&gt;
    &lt;/staticContent&gt;
  &lt;/system.webServer&gt;
&lt;/configuration&gt;</pre></div>
      <p class="muted reveal">IIS does not serve files without an extension (many PACS name files like <code>1.2.840…</code>).
        For those, serve the files through a script as in the PHP example below.</p>

      <h3 class="reveal">Apache (.htaccess)</h3>
      <div class="code reveal"><div class="label"><span>.htaccess</span><button class="copy" type="button">Copy</button></div><pre>&lt;IfModule mod_headers.c&gt;
  Header set Access-Control-Allow-Origin "https://smartjoans.space"
&lt;/IfModule&gt;
AddType application/dicom .dcm</pre></div>

      <h3 class="reveal">Nginx</h3>
      <div class="code reveal"><div class="label"><span>nginx.conf</span><button class="copy" type="button">Copy</button></div><pre>location /studies/ {
    add_header Access-Control-Allow-Origin "https://smartjoans.space" always;
    types { application/dicom dcm; }
}</pre></div>

      <h3 class="reveal">PHP (inside your script)</h3>
      <div class="code reveal"><div class="label"><span>PHP</span><button class="copy" type="button">Copy</button></div><pre>header('Access-Control-Allow-Origin: https://smartjoans.space');</pre></div>

      <div class="note red reveal"><strong>For Way 1 and 2, http does not work.</strong> SmartViewer is on https, and browsers
        block an https page from reading http files. If your images are on http or inside your clinic network
        (for example <code>http://192.168.1.10</code>), use <a href="#script">Way 3</a> instead: it needs no setup.</div>
    </section>

    <!-- ================= EXAMPLES ================= -->
    <section id="examples" aria-labelledby="examples-title">
      <h2 id="examples-title" class="reveal">Code examples</h2>

      <h3 class="reveal">A button in your web page</h3>
      <div class="code reveal"><div class="label"><span>HTML</span><button class="copy" type="button">Copy</button></div><pre>&lt;a href="https://smartjoans.space/dicom/?manifest=https%3A%2F%2Fpacs.example.com%2Fmanifest.php%3Fstudy%3D1234"
   target="_blank" rel="noopener"&gt;View images&lt;/a&gt;</pre></div>

      <h3 class="reveal">JavaScript</h3>
      <div class="code reveal"><div class="label"><span>JavaScript</span><button class="copy" type="button">Copy</button></div><pre><span class="c">// Build the link from your list address and open it</span>
const listUrl = 'https://pacs.example.com/manifest.php?study=' + encodeURIComponent(studyId);
const viewer  = 'https://smartjoans.space/dicom/?manifest=' + encodeURIComponent(listUrl);

window.open(viewer, '_blank');          <span class="c">// new tab</span>
<span class="c">// or: window.location.href = viewer;  // same tab</span></pre></div>

      <h3 class="reveal">PHP redirect (open.php?study=1234)</h3>
      <p class="reveal">Your users open <code>open.php?study=1234</code>, and the page sends them to SmartViewer.</p>
      <div class="code reveal"><div class="label"><span>open.php</span><button class="copy" type="button">Copy</button></div><pre>&lt;?php
<span class="c">// 1. Check your own login / permission here.</span>

$study   = preg_replace('/[^A-Za-z0-9._-]/', '', $_GET['study'] ?? '');
$listUrl = 'https://pacs.example.com/manifest.php?study=' . rawurlencode($study);

<span class="c">// 2. Send the browser to SmartViewer</span>
header('Location: https://smartjoans.space/dicom/?manifest=' . rawurlencode($listUrl));
exit;</pre></div>

      <h3 class="reveal">PHP study list (manifest.php)</h3>
      <div class="code reveal"><div class="label"><span>manifest.php</span><button class="copy" type="button">Copy</button></div><pre>&lt;?php
header('Access-Control-Allow-Origin: https://smartjoans.space');
header('Content-Type: application/json');

$root  = 'D:/studies/';                                         <span class="c">// your images folder</span>
$study = preg_replace('/[^A-Za-z0-9._-]/', '', $_GET['study'] ?? '');
$dir   = $root . $study;

if ($study === '' || !is_dir($dir)) {
    echo json_encode(['status' =&gt; 'error', 'message' =&gt; 'Study not found']);
    exit;
}

$files = [];
foreach (scandir($dir) as $name) {
    $path = $dir . '/' . $name;
    if ($name[0] === '.' || !is_file($path)) continue;

    $files[] = [
        'name' =&gt; $name,
        'url'  =&gt; 'file.php?study=' . rawurlencode($study) . '&amp;f=' . rawurlencode($name),
        'size' =&gt; filesize($path),
    ];
}

echo json_encode(['title' =&gt; 'Study ' . $study, 'files' =&gt; $files]);</pre></div>

      <h3 class="reveal">PHP image file (file.php)</h3>
      <div class="code reveal"><div class="label"><span>file.php</span><button class="copy" type="button">Copy</button></div><pre>&lt;?php
header('Access-Control-Allow-Origin: https://smartjoans.space');

$root  = 'D:/studies/';
$study = preg_replace('/[^A-Za-z0-9._-]/', '', $_GET['study'] ?? '');
$name  = basename($_GET['f'] ?? '');                            <span class="c">// basename blocks ../ tricks</span>
$path  = $root . $study . '/' . $name;

if ($study === '' || $name === '' || !is_file($path)) {
    http_response_code(404);
    exit;
}

header('Content-Type: application/dicom');
header('Content-Length: ' . filesize($path));
readfile($path);</pre></div>

      <div class="note reveal"><strong>Protect your images.</strong> The example above lets anyone with the study number
        download it. In real use add a token that expires: put <code>&amp;exp=…&amp;sig=…</code> on the list link, made with
        <code>hash_hmac('sha256', $study . '|' . $exp, $secret)</code>, and check it in <code>manifest.php</code> and
        <code>file.php</code> before sending anything.</div>
    </section>

    <!-- ================= BUILDER ================= -->
    <section id="builder" aria-labelledby="builder-title">
      <h2 id="builder-title" class="reveal">Link builder</h2>
      <p class="reveal">Paste image addresses (one per line) or one study list address to make a ready link and test it.</p>

      <div class="builder reveal">
        <label for="bInput">Addresses</label>
        <textarea id="bInput" spellcheck="false" placeholder="https://pacs.example.com/images/IM0001.dcm&#10;https://pacs.example.com/images/IM0002.dcm"></textarea>

        <div class="row" role="radiogroup" aria-label="Link type">
          <label><input type="radio" name="bMode" value="url" checked> These are image files</label>
          <label><input type="radio" name="bMode" value="manifest"> This is a study list (first line)</label>
        </div>

        <label for="bTitle">Title (optional)</label>
        <input type="text" id="bTitle" placeholder="CT Brain" maxlength="120">

        <div class="out" id="bOut" hidden>
          <code id="bLink"></code>
          <div class="btns">
            <button class="btn ghost small" id="bCopy" type="button">Copy link</button>
            <a class="btn small" id="bOpen" target="_blank" rel="noopener" href="#">Open in SmartViewer</a>
          </div>
        </div>
        <div class="warn-text" id="bWarn"></div>
      </div>
    </section>

    <!-- ================= PROBLEMS ================= -->
    <section id="problems" aria-labelledby="problems-title">
      <h2 id="problems-title" class="reveal">Problems and fixes</h2>
      <p class="reveal">SmartViewer shows a message when something is wrong. Find it here:</p>
      <div class="table-wrap reveal">
        <table>
          <thead><tr><th>Message in SmartViewer</th><th>Reason</th><th>Fix</th></tr></thead>
          <tbody>
            <tr><td>Images cannot load on this address</td><td>The list or images are on <code>http</code>.</td><td>Serve them on <code>https</code>, or use Way 3.</td></tr>
            <tr><td>Download stopped … server must allow this viewer (CORS)</td><td>Your server does not send the CORS header, or the address is wrong.</td><td>Add <code>Access-Control-Allow-Origin: https://smartjoans.space</code>. Open one image address in the browser to check it downloads.</td></tr>
            <tr><td>The image server answered with a web page (often a login page)</td><td>Your server asked for a login instead of giving the list.</td><td>Let the list and file addresses work without a login, protected by a token that expires.</td></tr>
            <tr><td>Study could not be opened</td><td>The list address did not answer, sent an error, or the link expired.</td><td>Open the list address in the browser. It must show the JSON.</td></tr>
            <tr><td>Images could not be sent (Way 3)</td><td>Your page could not read one of the image addresses.</td><td>Open that address in the browser. The message shows which one failed.</td></tr>
            <tr><td>No images could be read</td><td>The files are not DICOM (for example JPEG or a ZIP).</td><td>Link to the original DICOM files.</td></tr>
          </tbody>
        </table>
      </div>
    </section>

  </div>

  <!-- ================= FAQ ================= -->
  <section id="faq" aria-labelledby="faq-title">
    <div class="narrow">
      <div class="section-head reveal">
        <p class="eyebrow">FAQ</p>
        <h2 id="faq-title">Common questions</h2>
      </div>
      <details class="faq reveal"><summary>Is SmartViewer really free?</summary>
        <p>Yes. The viewer and the API are free for everyone, for personal use, clinics and hospitals. No account, no key, no permission.</p></details>
      <details class="faq reveal"><summary>Are my DICOM images uploaded to your server?</summary>
        <p>No. Images go from your device or your own server straight into your browser. smartjoans.space does not receive, store or log them, and they are gone when you close the tab.</p></details>
      <details class="faq reveal"><summary>Can I use SmartViewer for diagnosis or reporting?</summary>
        <p>No. SmartViewer is a sharing and secondary viewing tool and is not a certified medical device. Use a certified PACS workstation with a calibrated display for primary reading and reports.</p></details>
      <details class="faq reveal"><summary>Does it work on a mobile phone?</summary>
        <p>Yes. It works in current browsers on Android and iPhone, with touch scrolling, pinch zoom and the Back button. Very large CT studies need more memory, so MPR and 3D may be reduced on phones.</p></details>
      <details class="faq reveal"><summary>Can I open DICOM files from my own computer or phone?</summary>
        <p>Yes, and you do not need the API for it. Use <a href="#local">Open files from this device</a> on this page, or the Open folder / Open files buttons in the viewer. The files open in your browser and are never uploaded.</p></details>
      <details class="faq reveal"><summary>How do I open images from a CD?</summary>
        <p>Insert the CD, press "Choose folder" on this page (or "Open folder" in the viewer) and pick the CD drive or the copied folder. SmartViewer finds the images in all sub folders and skips other files.</p></details>
      <details class="faq reveal"><summary>Can I add SmartViewer to my hospital website or PACS?</summary>
        <p>Yes, with the free API. Use a link with image addresses, a link to a JSON study list, or the smartviewer.js script. Way 3 works even when your images are on http or on a LAN address.</p></details>
      <details class="faq reveal"><summary>Which images and compressions are supported?</summary>
        <p>CT, MR, CR, DX, US, MG, XA and other DICOM images, single-frame and multi-frame, uncompressed, JPEG baseline and lossless, JPEG-LS, JPEG 2000 and RLE.</p></details>
      <details class="faq reveal"><summary>What do I need for MPR and 3D?</summary>
        <p>A grayscale CT or MR series with at least 10 slices of the same size and one image per position. 3D also needs WebGL 2, which all current browsers have.</p></details>
    </div>
  </section>

  <!-- ================= FINAL CTA ================= -->
  <section aria-label="Open SmartViewer">
    <div class="wrap">
      <div class="banner reveal">
        <div>
          <h2>Open a study now</h2>
          <p>From your computer, phone or CD. Free, private and nothing is uploaded.</p>
        </div>
        <a class="btn" href="#local">📂 Open files</a>
        <a class="btn ghost" href="https://smartjoans.space/dicom/" style="margin-left:0">▶ Open SmartViewer</a>
      </div>
    </div>
  </section>

</main>

<footer>
  <div class="wrap">
    <span>SmartViewer by <a href="https://smartjoans.space/">SmartJOANS</a> · free online DICOM viewer and free API</span>
    <span>
      <a href="https://smartjoans.space/dicom/">Open viewer</a> ·
      <a href="https://smartjoans.space/dicom/smartviewer.js">smartviewer.js</a> ·
      <a href="#api">API</a> ·
      <a href="#faq">FAQ</a>
    </span>
    <span>For sharing and secondary viewing only. Not for primary diagnosis.</span>
  </div>
</footer>

<script>
(() => {
  // Reveal sections as they scroll into view
  const items = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    const io = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        const siblings = [...el.parentElement.children].filter(c => c.classList.contains('reveal'));
        el.style.transitionDelay = Math.min(siblings.indexOf(el), 6) * 60 + 'ms';
        el.classList.add('in');
        io.unobserve(el);
      });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
    items.forEach(el => io.observe(el));
  } else {
    items.forEach(el => el.classList.add('in'));
  }

  // Open DICOM files from this device (uses the free smartviewer.js, nothing is uploaded)
  const drop = document.getElementById('lpDrop');
  const status = document.getElementById('lpStatus');
  const setLp = (t, err) => { status.textContent = t; status.classList.toggle('err', !!err); };
  const SKIP = /\.(txt|xml|html?|ini|inf|exe|dll|lnk|pdf|jpe?g|png|gif|bmp|json|db|js|css|zip|bat|ico|log|autorun)$/i;

  function openLocal(list) {
    const files = Array.from(list).filter(f => f.size > 132 && !f.name.startsWith('.') &&
      f.name.toUpperCase() !== 'DICOMDIR' && !SKIP.test(f.name));
    if (!files.length) { setLp('No DICOM files found there. Choose the folder that has the images.', true); return; }
    if (!window.SmartViewer) { setLp('The viewer could not load. Check the internet connection and try again.', true); return; }
    setLp(`Opening ${files.length} file${files.length > 1 ? 's' : ''} in SmartViewer…`);
    SmartViewer.open({
      title: 'Files from this device',
      files,
      onDone: n => setLp(`Opened ${n} series. Close the viewer to come back here.`),
      onError: e => setLp(e.message || 'The files could not be opened.', true),
      onClose: () => { if (!status.classList.contains('err')) setLp(''); }
    });
  }

  async function walkEntry(entry) {
    if (entry.isFile) return [await new Promise((res, rej) => entry.file(res, rej))];
    if (entry.isDirectory) {
      const reader = entry.createReader();
      const out = [];
      let batch;
      do {
        batch = await new Promise((res, rej) => reader.readEntries(res, rej));
        for (const en of batch) out.push(...await walkEntry(en));
      } while (batch.length);
      return out;
    }
    return [];
  }

  ['lpFolder', 'lpFiles'].forEach(id => {
    document.getElementById(id).addEventListener('change', e => {
      openLocal(e.target.files);
      e.target.value = '';
    });
  });
  drop.addEventListener('click', e => {
    if (e.target.closest('label, input, a, button')) return;   // the buttons open their own picker
    document.getElementById('lpFiles').click();
  });
  drop.addEventListener('keydown', e => { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); document.getElementById('lpFiles').click(); } });
  ['dragenter', 'dragover'].forEach(t => drop.addEventListener(t, e => { e.preventDefault(); drop.classList.add('over'); }));
  ['dragleave', 'drop'].forEach(t => drop.addEventListener(t, () => drop.classList.remove('over')));
  drop.addEventListener('drop', async e => {
    e.preventDefault();
    const entries = [...(e.dataTransfer.items || [])].map(i => i.webkitGetAsEntry && i.webkitGetAsEntry()).filter(Boolean);
    setLp('Reading the folder…');
    let files = [];
    try {
      if (entries.length) { for (const en of entries) files.push(...await walkEntry(en)); }
      else files = [...e.dataTransfer.files];
    } catch (err) { setLp('The folder could not be read. Try "Choose folder".', true); return; }
    openLocal(files);
  });

  // Copy buttons on code blocks
  document.querySelectorAll('.code .copy').forEach(btn => {
    btn.addEventListener('click', async () => {
      const text = btn.closest('.code').querySelector('pre').innerText;
      try {
        await navigator.clipboard.writeText(text);
        btn.textContent = 'Copied';
      } catch (e) {
        btn.textContent = 'Select and copy';
      }
      setTimeout(() => { btn.textContent = 'Copy'; }, 1400);
    });
  });

  // Link builder (the viewer always lives at /dicom/)
  const VIEWER = 'https://smartjoans.space/dicom/';
  const input = document.getElementById('bInput');
  const title = document.getElementById('bTitle');
  const out = document.getElementById('bOut');
  const linkEl = document.getElementById('bLink');
  const openEl = document.getElementById('bOpen');
  const warn = document.getElementById('bWarn');

  function build() {
    const mode = document.querySelector('input[name="bMode"]:checked').value;
    const lines = input.value.split(/\r?\n/).map(s => s.trim()).filter(Boolean);
    warn.textContent = '';

    if (!lines.length) { out.hidden = true; return; }

    if (lines.some(l => !/^https?:\/\//i.test(l))) {
      out.hidden = true;
      warn.textContent = 'Every line must start with https://';
      return;
    }

    const params = [];
    if (mode === 'manifest') {
      params.push('manifest=' + encodeURIComponent(lines[0]));
    } else {
      lines.slice(0, 500).forEach(l => params.push('url=' + encodeURIComponent(l)));
    }
    if (title.value.trim()) params.push('title=' + encodeURIComponent(title.value.trim()));

    const link = VIEWER + '?' + params.join('&');
    linkEl.textContent = link;
    openEl.href = link;
    out.hidden = false;

    const notes = [];
    if (lines.some(l => /^http:\/\//i.test(l))) notes.push('http addresses will be blocked. Use https, or Way 3.');
    if (mode === 'url' && lines.length > 20) notes.push('Many images: a study list (manifest) is safer than a long link.');
    if (mode === 'url' && lines.length > 500) notes.push('Only the first 500 addresses are used.');
    warn.textContent = notes.join(' ');
  }

  [input, title].forEach(el => el.addEventListener('input', build));
  document.querySelectorAll('input[name="bMode"]').forEach(r => r.addEventListener('change', build));

  document.getElementById('bCopy').addEventListener('click', async e => {
    try {
      await navigator.clipboard.writeText(linkEl.textContent);
      e.target.textContent = 'Copied';
    } catch (err) {
      e.target.textContent = 'Select the link and copy';
    }
    setTimeout(() => { e.target.textContent = 'Copy link'; }, 1400);
  });
})();
</script>
<script src="https://smartjoans.space/dicom/smartviewer.js"></script>
</body>
</html>