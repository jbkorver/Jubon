<?php
	include('common.php');

	function db () {
		static $conn;
	$db_host='db458771083.db.1and1.com';
	$db_database='db458771083';
	$db_username='dbo458771083';
	$db_password='Jbkorver2';
	
		if ($conn===NULL){ 
			$conn = mysqli_connect($db_host, $db_username, $db_password, $db_database);
		}
		
/*		if ($conn) {
		echo("connected<br>");
		} else {
			echo("not connected to ".$db_host." username: ".$db_username." p: ".$db_password." db: ".$db_database."<br>");
		}*/
		return $conn;
	}

?>
  	
