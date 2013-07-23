<?php 

require_once 'Oauth2.php';
require_once 'DB.php';

$oauth = new Oauth2();
session_start();
if(isset($_GET["code"]))
{
	$rc = $oauth->handleCode($_GET["code"]);
	// the googleid is another thing that we can't really use here
	$rc->id = $rc->email;
	$oDb = new DB();
	$aMember = $oDb->getMember($rc->email);
	$rc->admin = $aMember["admin"];
	$rc->boardmember = $aMember["boardmember"];
	$_SESSION["currentUser"] = $rc;
	header('Location: index.php');
}
else 
{
	$oauth->redirect();
}
?>