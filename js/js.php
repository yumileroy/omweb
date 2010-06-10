<?php
header('Content-type: text/javascript');

/* Expire one year from today's date */
$now = time();
$then = gmstrftime("%a, %d %b %Y %H:%M:%S GMT", $now + 365 * 86440);
header("Expires: $then");

ob_start("ob_gzhandler");

/* your js files */
include('prototype.js');
include('validation.js');

ob_end_flush();
?>
