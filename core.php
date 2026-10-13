<?php
/**
 * SmartViewer - sends the viewer program (private/viewer-core.js)
 *
 * Only to pages of this site, only as a <script>, only with a valid
 * short-lived signed link made by index.php. Opening this address directly,
 * from another website or after the link expires gives nothing.
 */

declare(strict_types=1);

require __DIR__ . '/private/config.php';

header('Content-Type: application/javascript; charset=utf-8');
header('Cache-Control: no-store, max-age=0');
header('X-Content-Type-Options: nosniff');

function sv_deny(string $why): void
{
    http_response_code(403);
    echo '/* SmartViewer: ' . $why . '. Open https://smartjoans.space/dicom/ */';
    exit;
}

// 1. Signed link from index.php, still valid
$exp = (int)($_GET['e'] ?? 0);
$sig = (string)($_GET['s'] ?? '');

if ($exp < time() || $exp > time() + SV_TOKEN_TTL + 60 || !hash_equals(sv_sign($exp), $sig)) {
    sv_deny('link expired, reload the page');
}

// 2. Asked by a page of this site (browsers send these headers on their own)
$site = strtolower((string)($_SERVER['HTTP_SEC_FETCH_SITE'] ?? ''));
if ($site !== '' && $site !== 'same-origin') {
    sv_deny('not allowed from another site');
}

// 3. Loaded as a script, not opened in a tab or downloaded
$dest = strtolower((string)($_SERVER['HTTP_SEC_FETCH_DEST'] ?? ''));
if ($dest !== '' && $dest !== 'script') {
    sv_deny('not allowed');
}

// 4. Referrer, when the browser sends one, must be this site
$ref = (string)($_SERVER['HTTP_REFERER'] ?? '');
if ($ref !== '') {
    $refHost = strtolower((string)parse_url($ref, PHP_URL_HOST));
    if (!in_array($refHost, SV_ALLOWED_HOSTS, true)) {
        sv_deny('not allowed');
    }
}

$file = __DIR__ . '/private/viewer-core.js';

if (!is_file($file)) {
    http_response_code(500);
    echo '/* SmartViewer: viewer-core.js is missing */';
    exit;
}

readfile($file);
