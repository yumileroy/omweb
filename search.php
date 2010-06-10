<?php
if (! isset ( $_POST ['submit'] )) {
    echo file_get_contents("inc/search.inc");
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
