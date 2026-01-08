<?php

header("Content-Type: text/css");

header("Cache-Control: public, max-age=86400");

$date = gmdate("D, d M Y H:i:s", time() + 86400) . " GMT";
header("Expires: {$date}");

readfile("style.css");

?>