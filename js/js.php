<?php
header('Content-type: text/javascript');

/* Expire one year from today's date */
$now = time();
$then = gmstrftime("%a, %d %b %Y %H:%M:%S GMT", $now + 365 * 86440);
header("Expires: $then");

ob_start("compress");

function compress($buffer) {
    /* remove comments */
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    /* remove tabs, spaces, newlines, etc. */
    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
    return $buffer;
}

/* your js files */
include('scriptaculous/lib/prototype.js');
include('scriptaculous/src/effects.js');
include('fabtabulous.js');
include('validation.js');

ob_end_flush();
?>
