<?php
header('Content-type: text/css');

/* Expire one year from today's date */
$now = time();
$then = gmstrftime("%a, %d %b %Y %H:%M:%S GMT", $now + 365 * 86440);
header("Expires: $then");

ob_start("ob_gzhandler");

/* your css files */
include('alignment.css');
include('style.css');

ob_end_flush();
?>
