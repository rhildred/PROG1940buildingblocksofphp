<?php 

$sUrl = "http://www.wowjobs.ca/wowrss.aspx?q=%s&l=%s&s=&sr=25&t=30&f=r&e=&si=A&Dup=H";

$sQuery = isset($_GET["q"])? $_GET["q"]: "php";

$sPostal = isset($_GET["postal"])? $_GET["postal"]: "N2T1G8";

$sCompleteUrl = sprintf($sUrl, $sQuery, $sPostal);

$theData = simplexml_load_file($sCompleteUrl, "SimpleXMLElement", LIBXML_NOCDATA);

?>
<!Doctype html>
<html>
<head>
<title>Wow Jobs for <?php echo $sQuery ?> near <?php  echo $sPostal?></title>
</head>
<body>
<form action="" method="get" style="float:right;">
<label for="q">Query:</label><input type="text" name="q" value="<?php echo $sQuery ?>" />
<label for="postcode">Postal Code:</label><input type="text" name="postcode" value="<?php echo $sPostal ?>" />
<input type="submit" value="Search" />
</form>
	<h1>Wow Jobs for <?php echo $sQuery ?> near <?php  echo $sPostal?></h1>
		<?php 
	foreach ($theData->channel->item as $item)
{
	
?>	
<h2>
<a href="<?php echo $item->link ?>">
<?php echo $item->title ?>
</a>
</h2>	
<p><?php echo $item->description ?></p>
<?php 
}
?>
</body>
</html>
	