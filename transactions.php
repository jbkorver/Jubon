<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Transactions</title>
</head>

<?php
$date = date('jhis');

include('data/db_connect.php');
 	$query = "SELECT b.name, c.offer, c.expiration, c.url FROM `businesses` b ";
 	$query .= " INNER JOIN `coupons` c ON b.bus_id = c.bus_id WHERE c.com_id = 1; ";
	$result = mysql_query($query);

	if (!$result) {
		die("Could not query the database: <br/>".mysql_error());
	}
	$couponList = array();
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$coupon = array();
			$coupon['name'] = mysql_result($result, $b, "name");
			$coupon['offer'] = mysql_result($result, $b, "offer");
			$coupon['expiration'] = mysql_result($result, $b, "expiration");
			$coupon['expireUnix'] = strtotime($coupon['expiration']);
			$coupon['url'] = mysql_result($result, $b, "url");
			
			$couponList[$b] = $coupon;
		}
		
	}


?>    
      
<body>
	<div id="container">
      <form name="form" id="form">
        <select name="jumpMenu" id="jumpMenu">
          <option value="IA/Alton/index.php?d=<?=$date?>">Alton, IA</option>
          <option value="IA/Nashua/index.php?d=<?=$date?>">Nashua, IA</option>
          <option value="IA/OrangeCity/index.php?d=<?=$date?>" selected="selected">Orange City, IA</option>
          <option value="IA/Osage/index.php?d=<?=$date?>">Osage, IA</option>
          <option value="IA/Remsen/index.php?d=<?=$date?>">Remsen, IA</option>
          <option value="IA/SiouxRapids/index.php?d=<?=$date?>">Sioux Rapids, IA</option>
        </select>
        <input type="button" name="go_button" id= "go_button" value="Go" onclick="MM_jumpMenuGo('jumpMenu','parent',0)" />
      </form>
    </div><!--container-->
</body>
</html>
