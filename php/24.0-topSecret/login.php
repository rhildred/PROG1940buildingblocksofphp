<?php 

session_start();

require_once("DB.php");

$mysqli = new DB();

$stmt = $mysqli->prepare("SELECT name FROM currentUsers WHERE id = ? AND digest = PASSWORD(?)");
$sDigest = $_POST["username"] . $_POST["password"];

$stmt->bind_param("ss", $_POST["username"], $sDigest);

$stmt->execute();
$stmt->bind_result($name);
if(!$stmt->fetch())
{
	
	print_r($stmt);
	return;
}
while($stmt->fetch()); // need to eat rest of results?????

$currentUser = new stdClass();
$currentUser->name = $name;
$aMember = $mysqli->getMember($_POST["username"] );
if($aMember == null)
{
	echo "Your email is not in our file. Please contact the office at nnnn to fix.";
	return;
}
$currentUser->admin = $aMember["admin"];
$currentUser->boardmember = $aMember["boardmember"];

$_SESSION["currentUser"] = $currentUser;
header('Location: index.php');

?>