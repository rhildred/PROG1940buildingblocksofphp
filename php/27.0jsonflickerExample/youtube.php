<?php 

$sUrl = "http://gdata.youtube.com/feeds/api/users/newapproachcanine/uploads?alt=json";

$sContents = file_get_contents($sUrl);

$oJson = json_decode($sContents);

foreach ($oJson->feed->entry as $oVideo)
{
	print_r($oVideo);
	echo "<br /><br />";
}

?>