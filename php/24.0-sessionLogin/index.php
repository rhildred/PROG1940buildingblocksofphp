<?php 

session_start();
if(array_key_exists("currentUser", $_SESSION))
{
	$userName = $_SESSION["currentUser"]->name;
}
else 
{
	header('Location: login.html');	
	return;
}

?>
<!Doctype html>
<html>
<head>
<title>Welcome to our page</title>
</head>
<body>
	<h1>Welcome to our page <?php echo $userName?></h1>
	<a href="logout.php">Logout</a> 
</body>
</html>