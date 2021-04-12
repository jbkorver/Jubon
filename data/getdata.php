<?php
	include('db_connect.php');
header('Content-Type: text/xml; charset=ISO-8859-1');
$contents = "<?xml version='1.0' encoding=\"UTF-8\" ?>\n";
$contents .="<Coupons>\n";


 	$query = "SELECT b.name, c.offer, c.expiration, c.start, c.terms, c.url FROM `businesses` b ";
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
			$coupon['start'] = mysql_result($result, $b, "start");
			$coupon['terms'] = mysql_result($result, $b, "terms");
			$coupon['url'] = mysql_result($result, $b, "url");
			
			$couponList[$b] = $coupon;
		}
		
	}


	// Fetch values
	foreach ($couponList as $item) {
		$contents .= "   <coupon name = '".$item['name']."' exp = '".$item['expiration']."' start='".$item['start']."' url='".$item['url']."'/>\n ";
   

	}
	$contents .="</Coupons>";

	// Output the document
	echo $contents;
	
	mysql_close($connection);
	return;
?>

