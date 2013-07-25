<?php 

$sUrl = "http://gdata.youtube.com/feeds/api/users/newapproachcanine/uploads?alt=json";

$sContents = file_get_contents($sUrl);

$oJson = json_decode($sContents);

foreach ($oJson->feed->entry as $oVideo)
{
	echo "<h1><a href=\"", $oVideo->link[0]->href,  "\" >", $oVideo->title->{'$t'}, "</a></h1>";
    echo "<img src=\"",  $oVideo->{'media$group'}->{'media$thumbnail'}[1]->url , "\" alt=\"thumbnail from Youtube\" />";
    echo "<p>", $oVideo->content->{'$t'}, "</p>";
}

?>