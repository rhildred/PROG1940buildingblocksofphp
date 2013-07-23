<?php 

session_start();

if(isset($_GET["lang"]))
{
	$_SESSION["lang"] = $_GET["lang"];
}
elseif(!isset($_SESSION["lang"]))
{
	$aHeaders = getallheaders();
	$sLanguages = $aHeaders["Accept-Language"];
	if(strpos($sLanguages, "fr") == false)
	{
		//default to english
		$_SESSION["lang"] = "en";
	}
	else 
	{
		//french is in the accepted languages
		$_SESSION["lang"] = "fr";
	}
}
	$lang = $_SESSION["lang"];

switch ($lang)
{
	case "fr":
		include("strings_fr.php");
		break;

	default: //default to english
		include("strings_en.php");
		break;
}

header("Content-Type: text/html;charset= " .CHARACTERSET);
header("Content-Language: " .$lang);



?>

<!Doctype html>
<html>
<head>
<title><?php echo HELLO ?></title>
</head>
<body>
	<h1><?php echo HELLO ?></h1>
<form action="" method="get">
<select name="lang">
<option value="en">English</option>
<option value="fr">Francais</option>
</select>
<button><img alt="go" src="images/arrow.jpg" style="height: 1.5em;" /></button>
</form>	
	<p><?php echo EXPLANATION ?></p>
</body>
</html>