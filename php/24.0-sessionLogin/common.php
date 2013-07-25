<?php 

function getDB()
{
	if(isset($_ENV['OPENSHIFT_MYSQL_DB_HOST']))
	{
		$mysqli = new mysqli($_ENV['OPENSHIFT_MYSQL_DB_HOST'], 
		$_ENV['OPENSHIFT_MYSQL_DB_USERNAME'], $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'], 
		$_ENV['OPENSHIFT_GEAR_NAME']);
	}
	else 
	{
		$mysqli = new mysqli('localhost', 'root', '', 'morebuildingblocksofphp');
	}
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	return $mysqli;
}

?>