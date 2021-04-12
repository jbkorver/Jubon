<? 
function correctLogin($name, $pw) {
	$id = -1;
	$query = "SELECT * FROM `roons_users` WHERE `username` LIKE '".$name."' AND `pwd` LIKE '".$pw."'; ";
echo $query;
	$result = mysql_query($query);

	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
		echo("test<br/>");
			$id = mysql_result($result, 0,"id");
		}
	}
	echo (" 2. return id=".$id."<br/>");
	return $id;
}


$showLogin = false;
$usernameParam = "jbkorver";
if (isset($_REQUEST['username'])) $username = $_REQUEST['username'];
$passwordParam="random";
if (isset($_REQUEST['password'])) $password = $_REQUEST['password'];

if (($usernameParam != '') && ($passwordParam != '')) {
	// check to see if the values are correct from the form
	echo ("call correctLogin with ".$usernameParam." and ".$passwordParam."<br/>");
	$validLogin = correctLogin($usernameParam, $passwordParam);
	
	if (!$validLogin) {
		echo("that username and password do not match, please try again.");
		$showLogin = true;
	}
} else { // nothing sent via that login form, so see if there are cookies for the login

	$login = "";
	$pwd = "";
	if (isset($_COOKIE['cookie'])) {
		foreach ($_COOKIE['cookie'] as $name => $value) {
			$name = htmlspecialchars($name);
			$value = htmlspecialchars($value);
			if ($name == "login")
				$login = $value;
			if ($name == "password")
				$pwd = $value;
		}
	}


	$validLogin = correctLogin($login, $pwd);
	if (!$validLogin) {
		echo("not a valid login - show the form for username and password");
		
		?> 
		
		<body class="default" >
		<form name="form" method="post" action="">
			<div>
				<label for="username">Username:</label>
				<input type="text" title="Enter your username" name="username"/>
			</div><br/>
			<div>
				<label for="password">Password:</label>
				<input type="text" type="password" title="Enter your password" name="password"/>
			</div><br/>
			<div><input type="submit" name="Submit"/></div>
		</form>
		</body>
		<?
			
		
		exit;
	}
}
//echo ("login=".$login." password=".$password."<br/>");

?>