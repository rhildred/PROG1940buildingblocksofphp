<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("common.php");

$mysqli = getDB();

$nItemId = 1;

if(array_key_exists("itemid", $_GET))
{
	$nItemId = $_GET["itemid"];
}


$stmtColors = $mysqli->prepare("SELECT color FROM item_colors WHERE itemid = ?");
$stmtColors->bind_param("d", $nItemId);

$stmtSizes = $mysqli->prepare("SELECT size FROM item_sizes WHERE itemid = ?");
$stmtSizes->bind_param("d", $nItemId);

$stmt = $mysqli->prepare("SELECT name, description, image, price FROM items WHERE id = ?");
$stmt->bind_param("d", $nItemId);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($name, $description, $image, $price);
$stmt->fetch();


?>
<!Doctype html> 
<html>
<head><title>Item Details for <?php echo $aItem["name"]?></title>
<link rel="stylesheet" href="style/mrts.css" />
</head>
<body>
<h1>Item Details for <?php echo $name ?> (<?php echo $price ?>)</h1>
<p><?php echo $description ?></p>
<img alt="<?php echo $name ?>" src="images/<?php echo $image ?>" />
<form action="shoppingcart.php" method="post">
<input type="hidden" name="itemid" value="<?php echo $nItemId ?>" />
<p><label for="qty">quantity</label><br /><input name="qty" value="1" /></p>
<input type="submit" value="Add To Cart" />
<?php 
	$stmtColors->execute();
	$stmtColors->store_result();
	$stmtColors->bind_result($color);
	if($stmtColors->num_rows == 1)
	{
		$stmtColors->fetch();
		echo "<p>This item comes in any color so long as it is ", $color, "</p>"; 
	}
	else
	{?>
		<fieldset>
		<legend>color</legend>
		<?php 
		
		while($stmtColors->fetch())
		{
			echo "<p><input type=\"radio\" name=\"color\" value=\"", $color, "\"/>";
			echo $color, "</p>";
		}
		
		?>
		</fieldset>
<?php }
	$stmtSizes->execute();
	$stmtSizes->store_result();
	$stmtSizes->bind_result($size);
	if($stmtSizes->num_rows == 1)
	{
		$stmtSizes->fetch();
		echo "<p>", $size, "</p>";
	}
	else
	{?>
		<fieldset>
		<legend>size</legend>
		<?php 
		
		while($stmtSizes->fetch())
		{
			echo "<p><input type=\"radio\" name=\"size\" value=\"", $size, "\"/>";
			echo $size, "</p>";
		}
		
		?>
		</fieldset>
	
	<?php }
?>
</form>
</body>
</html>