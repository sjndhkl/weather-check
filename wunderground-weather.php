<?php
include 'config.php';
include 'WebFileHandler.php';

$folder = "json";

$country = (isset($_GET['co']))?$_GET['co']:"AU";
$city = (isset($_GET['ci']))?$_GET['ci']:"Melbourne";
$city = ucwords($city);
$city = str_replace(array(" "),"_",$city);

$apiUrl = "http://api.wunderground.com/api/".API_KEY."/forecast10day/q/$country/$city.json";

$fileName = $country."_".$city.".json";

$days = 0;
$file_name = $folder."/".$fileName;
if(file_exists($file_name)){
	$lastModified = new DateTime(date("Y-m-d",filemtime($file_name)));
	$today = new DateTime(date("Y-m-d"));
	$interval = $lastModified->diff($today);
	$days = $interval->format('%a');
	if(intval($days)>1){
		WebFileHandler::download($file_name,$apiUrl);
	}else{
		WebFileHandler::download($file_name,$apiUrl,true);
	}
}else{
	WebFileHandler::download($file_name,$apiUrl);
}
