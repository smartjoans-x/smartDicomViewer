<?php
// SmartViewer setup check. Open https://smartjoans.space/dicom/svtest.php, then DELETE this file.
header('Content-Type: text/plain; charset=utf-8');
$d = __DIR__;
echo "PHP works: yes (version " . PHP_VERSION . ")\n";
echo "Host the browser used: " . ($_SERVER['HTTP_HOST'] ?? '?') . "\n\n";
foreach (['index.php', 'core.php', 'private/config.php', 'private/viewer-core.js', 'private/.htaccess', '.htaccess'] as $f) {
    $p = "$d/$f";
    printf("%-24s %s  %s\n", $f, is_file($p) ? 'found  ' : 'MISSING', is_file($p) ? substr(sprintf('%o', fileperms($p)), -4) : '');
}
printf("%-24s %s  %s\n", 'private/ (folder)', is_dir("$d/private") ? 'found  ' : 'MISSING', is_dir("$d/private") ? substr(sprintf('%o', fileperms("$d/private")), -4) : '');
echo "\nprivate/ writable for the key file: " . (is_writable("$d/private") ? 'yes' : 'no (fine, a fallback key is used)') . "\n";
if (is_file("$d/private/config.php")) {
    require "$d/private/config.php";
    $h = strtolower((string)preg_replace('/:\d+$/', '', (string)($_SERVER['HTTP_HOST'] ?? '')));
    echo "This host is allowed in config.php: " . (in_array($h, SV_ALLOWED_HOSTS, true) ? 'yes' : 'NO - add "' . $h . '" to SV_ALLOWED_HOSTS') . "\n";
}
