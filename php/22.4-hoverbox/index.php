<?php 

$sUrl = "http://api.flickr.com/services/feeds/photos_public.gne?id=51035594111@N01&format=json";

$theData = file_get_contents($sUrl);

// unfortunately flickr returns invalid JSON data

// take off prefix and closing bracket
$jsonData = substr($theData, 15, strlen($theData) - 16);

// get rid of mid string line endings
$jsonData = str_replace("\r\n", " ", $jsonData);

// unescape apostraphe
$jsonData = str_replace("\\'", "'", $jsonData);

$oFeed = json_decode($jsonData);

?>
<!Doctype html>
<html>
<head>
<style>
.hoverbox {
    cursor: default;
    height: 140px;
    list-style: none outside none;
    margin-left: 22px;
}
.hoverbox a {
    cursor: default;
}
.hoverbox a .preview {
    display: none;
}
.hoverbox a:hover .preview {
    display: block;
    left: -45px;
    position: absolute;
    top: -33px;
    z-index: 1;
}
.hoverbox img {
    background: none repeat scroll 0 0 #737373;
    border-color: #F5DEB3;
    border-style: solid;
    border-width: 1px;
    color: inherit;
    /*height: 100px;*/
    padding: 2px;
    vertical-align: top;
    /*width: 100px;*/
}
.hoverbox a {
    background: none repeat scroll 0 0 #737373;
    border-color: #F5DEB3;
    border-style: solid;
    border-width: 1px;
    color: inherit;
    display: inline;
    float: left;
    margin: 3px;
    padding: 5px;
    position: relative;
}
.hoverbox .preview {
    border-color: #222222;
    /*width: 200px;*/
}
</style>
</head>
<body>
	<div class="hoverbox">
    <?php foreach($oFeed->items as $n=>$oItem)
    {
    	$sImage = $oItem->media->m;
    	$sLink = str_replace("_m", "", $sImage );
    	?>
        <a href="<?php echo $sLink ?>"><img src="<?php echo $sImage ?>" /></a>
    	
    	<?php 
    }?>
	</div>
</body>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
jQuery(document).ready(function()
		{
			jQuery("a").each(function(index, a){
				jQuery(a).append("<img class=\"preview\" src=\"" + a.href + "\"/>");
			});
		}
		);
</script>
</html>