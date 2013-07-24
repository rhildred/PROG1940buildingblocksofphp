<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require_once("DB.php");

$mysqli = new DB();
$aMember = $mysqli->getMember($_POST["username"] );
if($aMember == null)
{
	echo "Your email is not in our file. Please contact the office at nnnn to fix.";
	return;
}
$currentUser = new stdClass();
$currentUser->name = $_POST["name"];
$currentUser->admin = $aMember["admin"];
$currentUser->boardmember = $aMember["boardmember"];

$stmt = $mysqli->prepare("INSERT INTO currentUsers(id, name, digest) VALUES(?, ?, PASSWORD(?))");
$sDigest = $_POST["username"] . $_POST["password"];

$stmt->bind_param("sss", $_POST["username"], $_POST["name"], $sDigest);

$stmt->execute();

if($stmt->affected_rows != 1)
{
	
	print_r($stmt);
	return;
}

header('Location: index.php');


$_SESSION["currentUser"] = $currentUser;
	
?>