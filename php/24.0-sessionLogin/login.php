<?php 

session_start();

require_once("common.php");

$mysqli = getDB();

$stmt = $mysqli->prepare("SELECT name FROM currentUsers WHERE id = ? AND digest = PASSWORD(?)");
$sDigest = $_POST["username"] . $_POST["password"];

$stmt->bind_param("ss", $_POST["username"], $sDigest);

$stmt->execute();

$userset = $stmt->get_result();
if($userset->num_rows != 1)
{
	
	print_r($stmt);
	return;
}

$aUser = $userset->fetch_assoc();

header('Location: index.php');

$currentUser = new stdClass();
$currentUser->name = $aUser["name"];

$_SESSION["currentUser"] = $currentUser;
	
?>