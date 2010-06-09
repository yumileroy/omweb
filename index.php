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
	echo "                    <legend>OneManga Web Downloader</legend>\n";
	echo "                    <ol>                        \n";
	echo "                        <li> \n";
	echo "                            <label for=\"manganame\">Manga: <em>required</em></label> \n";
	echo "                            <input size=\"20\" id=\"manganame\" name=\"manganame\" class=\"required\" type=\"text\" value=\"\" />\n";
	echo "                        </li>\n";
	echo "                        <li>                        \n";
	echo "                            <label for=\"chapters\">Chapters: <em>required</em></label>\n";
	echo "                            <input size=\"6\" id=\"chapters\" name=\"chapters\" class=\"required\" type=\"text\" value=\"\" />\n";
	echo "                        </li>\n";
	echo "                        <li>\n";
	echo "                            <label for=\"chapters2\">To Chapters: </label>\n";
	echo "                            <input size=\"6\" id=\"chapters2\" name=\"chapters2\" type=\"text\" value=\"\" />\n";
	echo "                        </li>\n";
	echo "                    </ol>\n";
	echo "                </fieldset>\n";
	echo "                <fieldset>\n";
	echo "                    <legend>Archive Types</legend>\n";
	echo "                    <ol>\n";
	echo "                        <li>\n";
	echo "                            <label for=\"rar\">rar</label>\n";
	echo "                            <input type=\"checkbox\" id=\"rar\" name=\"rar\" value=\"1\" />\n";
	echo "                        </li>\n";
	echo "                        <li>\n";
	echo "                            <label for=\"zip\">zip</label>\n";
	echo "                            <input type=\"checkbox\" id=\"zip\" name=\"zip\" value=\"1\" />\n";
	echo "                        </li>\n";
	echo "                        <li>\n";
	echo "                            <label for=\"sevenzip\">7z</label>\n";
	echo "                            <input type=\"checkbox\" id=\"sevenzip\" name=\"sevenzip\" value=\"1\" />\n";
	echo "                        </li>\n";
	echo "                        <li>\n";
	echo "                            <label for=\"tar\">tar</label>\n";
	echo "                            <input type=\"checkbox\" id=\"tar\" name=\"tar\" value=\"1\" /> \n";
	echo "                        </li>\n";
	echo "                        <li>\n";
	echo "                            <label for=\"targz\">tar.gz</label>\n";
	echo "                            <input type=\"checkbox\" id=\"targz\" name=\"targz\" value=\"1\" /> \n";
	echo "                        </li>\n";
	echo "                        <li>\n";
	echo "                            <label for=\"tarbz2\">tar.bz2</label>\n";
	echo "                            <input type=\"checkbox\" id=\"tarbz2\" name=\"tarbz2\" value=\"1\" /> \n";
	echo "                        </li>\n";
	echo "                    </ol>\n";
	echo "                </fieldset>\n";
	echo "                        <fieldset class=\"submit\">\n";
	echo "                            <input name=\"submit\" type=\"submit\" value=\"Submit\" />\n";
	echo "                            <input type=\"reset\" name=\"Reset\" id=\"button\" value=\"Reset\" />\n";
	echo "                        </fieldset>\n";
	echo "<script type=\"text/javascript\">new Validation('formOneManga');</script>\n";
	echo "            </form> \n";
	echo "            <p> \n";
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
	echo "<h1 class=\"header\">OneManga Downloader Output</h1>";

	$archive = "";
	$chapter = $_POST ['chapters'];
	$chapter2 = $_POST ['chapters2'];
	$manganame = $_POST ['manganame'];
	$tmanganame = trim ( $_POST ['manganame'] );
	$umanganame = str_replace ( " ", "_", $manganame );
	$errarray = array ();
	$archive .= "w";

	if ($_POST ['rar'] == "1") {
		$archive .= "r";
	}
	if ($_POST ['zip'] == "1") {
		$archive .= "z";
	}
	if ($_POST ['sevenzip'] == "1") {
		$archive .= "7";
	}
	if ($_POST ['tar'] == "1") {
		$archive .= "t";
	}
	if ($_POST ['targz'] == "1") {
		$archive .= "g";
	}
	if ($_POST ['tarbz2'] == "1") {
		$archive .= "b";
	}

	if (empty ( $tmanganame ) || empty ( $chapter ) || empty ( $archive )) {
		if (empty ( $tmanganame )) {
			array_push ( $errarray, "Manga Name" );
		}
		if (empty ( $chapter )) {
			array_push ( $errarray, "Chapters" );
		}
		if (empty ( $archive )) {
			array_push ( $errarray, "Archive Type" );
		}
		$final_string = "'" . implode ( "' , '", $errarray ) . "'";
		die ( print ( "Please make sure the following: " . $final_string . " is not empty." . "<br>" ) );
	}
	//if (empty($chapter) && empty($chapter2)){
	//die("Please enter the chapters that you want to download");
	//}
	//if (empty($chapter) && !empty($chapter2)){
	//exec('mkdir -p temp/' . $umanganame . '; ' . 'cd temp/' . $umanganame . '; ' . 'onemanga -' . $archive . " -c " . $chapter2 . ' "' . $umanganame . '"' . '; ' . 'cp ' . $umanganame . '* ../../downloads/' . '; ' . 'rm ' . $umanganame . '*', $results);
	//}
	if (! (empty ( $chapter )) && empty ( $chapter2 )) {
		exec ( 'mkdir -p temp/' . $umanganame . '; ' . 'cd temp/' . $umanganame . '; ' . 'onemanga -' . $archive . " -c " . $chapter . ' "' . $umanganame . '"' . '; ' . 'cp ' . $umanganame . '* ../../downloads/' . '; ' . 'rm ' . $umanganame . '*', $results );
	}
	if (! empty ( $chapter ) && ! empty ( $chapter2 )) {
		exec ( 'mkdir -p temp/' . $umanganame . '; ' . 'cd temp/' . $umanganame . '; ' . 'onemanga -' . $archive . " -c " . $chapter . "-" . $chapter2 . ' "' . $umanganame . '"' . '; ' . 'cp ' . $umanganame . '* ../../downloads/' . '; ' . 'rm ' . $umanganame . '*', $results );
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

	//define the path as relative
	$path = "./downloads";

	//using the opendir function
	$dir_handle = @opendir ( $path ) or die ( "Unable to open $path" );

	echo "<h1 class=\"header\">Directory Listing</h1>";

	while (false !== ($file = readdir($dir_handle))) {
		if ($file != "." && $file != "..") {
			$filearray = array();
			$filearray[] = $file;
			//echo "<a href='downloads/$file'>$file</a><br/>";
			sort($filearray);
			for($i = 0; $i < sizeof($filearray); $i++) {
				echo "<li>";
				echo "<a href='downloads/$filearray[$i]'>$filearray[$i]</a>\n";
				echo "</li>";
			}
		}
	}

	//running the while loop
	//while ( $file = readdir ( $dir_handle ) ) {
	//	echo "<a href='downloads/$file'>$file</a><br/>";
	//}

	//closing the directory
	closedir ( $dir_handle );

	echo "        </body> \n";
	echo "    </html> \n";

}
