<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
    <html xmlns="http://www.w3.org/1999/xhtml"> 
        <head> 
            <meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
            <title></title> 
		<script src="js/js.php" type="text/javascript"></script> 
		<link href="css/css.php" rel="stylesheet" type="text/css" /> 
        </head> 
        <body> 
            <form action="" method="post" id="formOneManga"> 
                <fieldset>
                    <legend>OneManga Web Downloader</legend>
                    <ol>                        
                        <li> 
                            <label for="manganame">Manga: <em>required</em></label> 
                            <input size="20" id="manganame" name="manganame" class="required" type="text" value="" />
                        </li>
                        <li>                        
                            <label for="chapters">Chapters: <em>required</em></label>
                            <input size="6" id="chapters" name="chapters" class="required" type="text" value="" />
                        </li>
                        <li>
                            <label for="chapters2">To Chapters: </label>
                            <input size="6" id="chapters2" name="chapters2" type="text" value="" />
                        </li>
                    </ol>
                </fieldset>
                <fieldset>
                    <legend>Archive Types</legend>
                    <ol>
                        <li>
                            <label for="rar">rar</label>
                            <input type="checkbox" id="rar" name="rar" value="1" />
                        </li>
                        <li>
                            <label for="zip">zip</label>
                            <input type="checkbox" id="zip" name="zip" value="1" />
                        </li>
                        <li>
                            <label for="sevenzip">7z</label>
                            <input type="checkbox" id="sevenzip" name="sevenzip" value="1" />
                        </li>
                        <li>
                            <label for="tar">tar</label>
                            <input type="checkbox" id="tar" name="tar" value="1" /> 
                        </li>
                        <li>
                            <label for="targz">tar.gz</label>
                            <input type="checkbox" id="targz" name="targz" value="1" /> 
                        </li>
                        <li>
                            <label for="tarbz2">tar.bz2</label>
                            <input type="checkbox" id="tarbz2" name="tarbz2" value="1" /> 
                        </li>
                    </ol>
                </fieldset>
                        <fieldset class="submit">
                            <input name="submit" type="submit" value="Submit" />
                            <input type="reset" name="Reset" id="button" value="Reset" />
                        </fieldset>
<script type="text/javascript">new Validation('formOneManga');</script>
            </form> 
            <p> 
            <a href="http://validator.w3.org/check?uri=referer"><img src="http://yuminanako.info/omweb/valid-xhtml10-blue" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a> 
            </p> 
        </body> 
    </html> 
