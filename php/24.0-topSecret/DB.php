<?php 

class DB extends mysqli
{
	function DB()
	{
		if(isset($_ENV['OPENSHIFT_MYSQL_DB_HOST']))
		{
			parent::__construct($_ENV['OPENSHIFT_MYSQL_DB_HOST']), 
			$_ENV['OPENSHIFT_MYSQL_DB_USERNAME'], $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'], 
			$_ENV['OPENSHIFT_APP_NAME ']);
		}
		else 
		{
			parent::__construct('localhost', 'root', '', 'sessionLogin');
		}
		if($this->connect_errno) 
		{
			echo "Failed to connect to MySql:(" . $this->connect_errno . ") " .$this->connect_error;
		}
	}
	
	function getMember($sEmail)
	{
		$stmt = $this->prepare("SELECT admin, boardmember FROM members WHERE id = ?");
		
		$stmt->bind_param("s", $sEmail);
		
		$stmt->execute();

		$stmt->bind_result($admin, $boardmember);
		if(!$stmt->fetch())
		{
		
			print_r($stmt);
			return null;
		}
		$rc = array();
		$rc["admin"] = $admin;
		$rc["boardmember"] = $boardmember;
		return $rc;
		
	}
}


?>