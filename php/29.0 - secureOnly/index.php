<?php 

//print_r($_SERVER);

if(isset($_SERVER["HTTPS"]) &&  $_SERVER["HTTPS"] == "on")
{
	echo "secure server";
}
    else
    {
    	$sNew = "https://localhost" .$_SERVER[REQUEST_URI];
    	header("Location: " . $sNew);
    	echo "insecure server";
    }
?>