<?php
	include('common.inc.php');

	$connection=mysqli_connect($db_host, $db_username, $db_password, $db_database);
	if (!$connection) {
  		die("Could not connect to the database: <br/>".mysql_error());
	}
?>
  	
