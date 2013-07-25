<?php 

session_start();

require_once("common.php");

$mysqli = getDB();

$stmt = $mysqli->prepare("SELECT name FROM currentUsers WHERE id = ? AND digest = PASSWORD(?)");
$sDigest = $_POST["username"] . $_POST["password"];

$stmt->bind_param("ss", $_POST["username"], $sDigest);

$stmt->execute();

$stmt->store_result();
if($stmt->num_rows != 1)
{
	
	print_r($stmt);
	return;
}

$stmt->bind_result($name);
$stmt->fetch();

header('Location: index.php');

$currentUser = new stdClass();
$currentUser->name = $name;

$_SESSION["currentUser"] = $currentUser;
	
?>