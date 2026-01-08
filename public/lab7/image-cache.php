<?php

$file = 'resources/images/IMG_20251218_002149.jpg';

if (file_exists($file)) {
    header("Content-Type: image/jpeg");

    header("Cache-Control: public, max-age=3600");

    $date = gmdate("D, d M Y H:i:s", time() + 3600) . " GMT";
    header("Expires: {$date}");

    readfile($file);
}

?>