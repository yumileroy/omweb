<?php
if (! isset ( $_POST ['submit'] )) {
	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"\n";
	echo "    \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\"> \n";
	echo "    <html xmlns=\"http://www.w3.org/1999/xhtml\"> \n";
	echo "        <head> \n";
	echo "            <meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" /> \n";
	echo "            <title></title> \n";
	echo "		<script src=\"js/js.php\" type=\"text/javascript\"></script> \n";
	echo "		<link href=\"css/css.php\" rel=\"stylesheet\" type=\"text/css\" /> \n";
	echo "        </head> \n";
	echo "        <body> \n";
	echo "            <form action=\"{$_SERVER['php_SELF']}\" method=\"post\" id=\"formOneManga\"> \n";
	echo "                <fieldset>\n";
	echo "                    <legend>OneManga Web Downloader - Search</legend>\n";
	echo "                    <ol>                        \n";
	echo "                        <li> \n";
	echo "                            <label for=\"manganame\">Manga Keyword: <em>required</em></label> \n";
	echo "                            <input size=\"20\" id=\"manganame\" name=\"manganame\" class=\"required\" type=\"text\" value=\"\" />\n";
    echo "                        </li>\n";
	echo "                    </ol>\n";
	echo "                </fieldset>\n";
	echo "                        <fieldset class=\"submit\">\n";
	echo "                            <input name=\"submit\" type=\"submit\" value=\"Submit\" />\n";
	echo "                            <input type=\"reset\" name=\"Reset\" id=\"button\" value=\"Reset\" />\n";
	echo "                        </fieldset>\n";
	echo "<script type=\"text/javascript\">new Validation('formOneManga');</script>\n";
    echo "            </form> \n";
	echo "            <p><br /> \n";
	echo "            <a href=\"http://validator.w3.org/check?uri=referer\"><img src=\"http://yuminanako.info/omweb/valid-xhtml10-blue\" alt=\"Valid XHTML 1.0 Strict\" height=\"31\" width=\"88\" /></a> \n";
	echo "            </p> \n";
	echo "        </body> \n";
	echo "    </html> \n";
}

if (isset ( $_POST ['submit'] )) //if submit has been pressed
{
	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"\n";
	echo "    \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\"> \n";
	echo "    <html xmlns=\"http://www.w3.org/1999/xhtml\"> \n";
	echo "        <head> \n";
	echo "            <meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" /> \n";
	echo "            <title></title> \n";
	echo "		<link href=\"css/css.php\" rel=\"stylesheet\" type=\"text/css\" /> \n";
	echo "        </head> \n";
	echo "        <body> \n";
	echo "<h1 class=\"header\">OneManga Search Output</h1>";

	$manganame = $_POST ['manganame'];
	$tmanganame = trim ( $_POST ['manganame'] );
	$umanganame = str_replace ( " ", "_", $manganame );
	$errarray = array ();

	if (empty ( $tmanganame )) {
		if (empty ( $tmanganame )) {
			array_push ( $errarray, "Manga Name" );
		}
		$final_string = "'" . implode ( "' , '", $errarray ) . "'";
		die ( print ( "Please make sure the following: " . $final_string . " is not empty." . "<br>" ) );
	}
	if (! (empty ( $tmanganame ))) {
		exec ( 'onemanga -s ' . $umanganame , $results );
	}

	//output thrown in $results
	$count = count ( $results );
	//counts number of rows $in results array
	for($i = 0; $i < $count; $i ++) {
		echo '<pre>';
		print_r ( $results [$i] );
		echo '</pre>';
		//print "$results[$i]<br>";
	}

	echo "        </body> \n";
	echo "    </html> \n";

}
