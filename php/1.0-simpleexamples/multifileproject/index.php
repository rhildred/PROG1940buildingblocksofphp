<!Doctype html>
<html>
<head><title>Multifile Project</title></head>
<body>
<?php include("_header.php")?>
<p>this is a body paragraph</p>
<?php 
for($nRow = 0; $nRow < 10; $nRow++)
{
	include("_row.php");
}

echo file_get_contents("_article.html");
include("phpinclude/_article2.php");
include("phpinclude/_article2.php");
?>
<?php include("_footer.php")?>
</body>
</html>