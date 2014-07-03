<?php

/**
* Downloads File from Api URL and stores ore renders as JSON
*/
class WebFileHandler
{
  public static function download($filename,$apiUrl,$renderOnly=false) {
  	$contents = '';
  	header('Content-type: application/json');
  	if($renderOnly) {
  		$contents = file_get_contents($filename);
  	} else {
  		$contents = file_get_contents($apiUrl);
  		file_put_contents($filename, $contents);
  	}
  	echo $contents;
  }
}
