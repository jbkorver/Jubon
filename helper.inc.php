<?php 

function getFlavorsList() { 
	$flavors = array();
	$query = "SELECT * FROM `roons_flavors` ORDER BY `id` ASC";
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item = array();
			$item['name'] = mydecode(mysql_result($result, $b,"name"));
			$created = mysql_result($result, $b,"created");
			$item['created'] = printDay($created);
			$terminated = mysql_result($result, $b,"terminated");
			if ($terminated != 2000000000) $item['terminated'] = printDay($terminated);
			else $item['terminated'] = 2000000000;
			$item['id'] = mysql_result($result, $b,"id");
			$item['notes'] = mydecode(mysql_result($result, $b,"notes"));
			
			$flavors[$b] = $item;
		}
	}
	return $flavors;
}

function getFlavorInfo($id) { 
	$flavors = array();
	$query = "SELECT * FROM `roons_flavors` WHERE `id` = ".$id." ORDER BY `id` ASC";
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item['name'] = mydecode(mysql_result($result, $b,"name"));
			$created = mysql_result($result, $b,"created");
			$item['created'] = date('m/d/Y', $created);
			$terminated = mysql_result($result, $b,"terminated");
			if ($terminated != 2000000000) $item['terminated'] = date('m/d/Y', $terminated);
			else $item['terminated'] = 2000000000;
			$item['id'] = mysql_result($result, $b,"id");
			$item['notes'] = mydecode(mysql_result($result, $b,"notes"));
		}
	}
	return $item;
}

function getMarketsList() { 
	$markets = array();
	$query = "SELECT * FROM `roons_markets` ORDER BY `location` ASC";
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item = array();
			$item['location'] = mydecode(mysql_result($result, $b,"location"));
			$item['id'] = mysql_result($result, $b,"id");
			$item['day'] = mysql_result($result, $b,"day");
			$item['notes'] = mydecode(mysql_result($result, $b,"notes"));
			
			$markets[$b] = $item;
		}
	}
	return $markets;
}

function getMarketInstancesList($mid) {
	$marketInstances = array();
	$query = "SELECT `id` FROM `roons_market_instance` WHERE `mid` = ".$mid." ORDER BY `date` DESC";
//	echo ($query."<br/>");
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$marketInstances[$b] = mysql_result($result, $b,"id");
		}
	}
	return $marketInstances;
}

function getEmployeesList($showall = true) { 
	$employees = array();
	$query = "SELECT * FROM `roons_employees` ";
	if ($showall != true) {
		$query .= "WHERE `show` = 1 ";
	}
	$query .= "ORDER BY `firstName` ASC, `lastName` ASC";
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item = array();
			$item['id'] = mydecode(mysql_result($result, $b,"id"));
			$item['lname'] = mysql_result($result, $b,"lastName");
			$item['fname'] = mysql_result($result, $b,"firstName");
			$item['show'] = mysql_result($result, $b,"show");
			
			$employees[$b] = $item;
		}
	}
	return $employees;
}

function getTransactionsList() { 
	$flavors = array();
	$query = "SELECT * FROM `roons_transactions` ORDER BY `location` ASC";
//	echo $query;
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item = array();
			$item['location'] = mydecode(mysql_result($result, $b,"location"));
			$item['id'] = mysql_result($result, $b,"id");
			$item['day'] = mysql_result($result, $b,"day");
			$item['notes'] = mydecode(mysql_result($result, $b,"notes"));
			
			$markets[$b] = $item;
		}
	}
	return $markets;
}

function getTransactionLists($start, $end, $sortBy = 'date', $sortOrder = 'DESC', $mid = 0,$show = "all", $eid = 0, $limit = 1000) { 
	$list = array();
	$count = 0;
/*	$query = "SELECT DISTINCT `market`, `date` FROM `roons_transactions` ";
	if ($test == 0) {
		$query .= "WHERE `test` = 0 ";
	}
	$query .= "ORDER BY `date` DESC, `market` ASC"; */
	
	$query = "SELECT * FROM `roons_market_instance` WHERE `date` >= ".$start." AND `date` <= ".$end." ";
	if ($show == "adj") {
		$query .= "AND `adjCountSold` > 0 ";
	}
	if ($mid != 0)  {
		$query .= "AND `mid` = ".$mid." ";
	}
	if ($eid != 0)  {
		$query .= "AND `workers` LIKE '%".$eid."%' ";
	}
	if (($sortBy != 'adjustedTotal')&&($sortBy != 'profit')&&($sortBy != 'ratio')) {
		$query .= " ORDER BY ".$sortBy." ".$sortOrder.", `id` DESC" ;
	}
	$query .= " LIMIT ".$limit.";";
	
//	echo ("<span style='color:#ffff00;'>".$query." </span><br/>");
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item = array();
			$item['id'] = mysql_result($result, $b,"id");
			$item['mid'] = mysql_result($result, $b,"mid");
			$item['date'] = mysql_result($result, $b,"date");
			$item['cashReceived'] = mysql_result($result, $b,"cashReceived");
			$item['creditReceived'] = mysql_result($result, $b,"creditReceived");
			$item['payroll'] = mysql_result($result, $b,"payroll");
			$item['miscFees'] = mysql_result($result, $b,"miscFees");
			$item['fees'] = mysql_result($result, $b,"fees");
			$item['runningTotalQuantitySold'] = mysql_result($result, $b,"runningTotalQuantitySold");
			$item['runningTotalMoney'] = mysql_result($result, $b,"runningTotalMoney");
			$item['paidTransactionCount'] = mysql_result($result, $b,"paidTransactionCount");
			$item['unitPricePaid'] = mysql_result($result, $b,"unitPricePaid");
			$item['unitPriceAll'] = mysql_result($result, $b,"unitPriceAll");
			$item['sampleCount'] = mysql_result($result, $b,"sampleCount");
			$item['compCount'] = mysql_result($result, $b,"compCount");
			$item['unitPricePaid'] = mysql_result($result, $b,"unitPricePaid");
			$item['unitPriceAll'] = mysql_result($result, $b,"unitPriceAll");
			$item['adjCountSold'] = mysql_result($result, $b,"adjCountSold");
			$item['adjustedTotal'] = $item['cashReceived'] + $item['creditReceived'] + $item['miscFees'] + $item['payroll'] + $item['fees'];
			$item['profit'] = $item['cashReceived'] + $item['creditReceived'] - .75 * ( $item['adjCountSold'] + $item['sampleCount'] + $item['compCount']);
			$item['ratio'] = ($item['compCount']+$item['sampleCount'])/$item['adjCountSold'];

			$list[$count++] = $item;
		}
	}
	return $list;
}


function doEditTransaction($mid, $date, $params, $tid, $id, $category = 1) {
$totals = getTransactionInfo($tid); 
//echo ("<br/>doEditTransaction id=".$id." tid=".$tid."<br/>");
// category 1 is for the price points and refers to a farmer's market
	$paid = 0;
	$totalCount = 0;
	$overridePrice = false;
	foreach ($params as $key => $value) {
//			echo ("key=".$key."  value=".$value." <br/>");
		if (is_numeric($key) ) {
			$totalCount = $totalCount + $value;
//			echo ("flavors ".$key." = ".$value." total=".$totalCount." <br/>");
		} else { 
			if ($key == "price") {
			//echo ("<span style='color:#ffff00;'>".$key." = ".$value." </span><br/>");
				if ($value != '')
					if ($value > 0) {
						$overridePrice = true;
						$paid = $value;
						$totalPrice = $value;
					}
			}

		}
	}
	$paidQuantity = 0;
	$sampleQuantity = 0;
	$compQuantity = 0;
	
	$costArray = getPrice($totalCount, $category);
	if (!array_key_exists('sampled', $params))  $params['sampled'] = 0;
	if (!array_key_exists('free', $params))  $params['free'] = 0;
	if (!array_key_exists('notes', $params))  $params['notes'] = '';
//	echo ("<span style='color:#ff0000;'>before free=".$params['free'] ." sampled= ".$params['sampled']." </span><br/>");

	if (($overridePrice) && ($params['sampled'] == 0) && ($params['free'] == 0)){ // user entered in a price
		$unitPrice = -1;
	} else if ($params['sampled'] == 1) {
		$paid = 0;
		$totalPrice = $paid;
		$unitPrice = 0;
		$sampleQuantity = $totalCount;
	} else if ($params['free'] == 1) {
		$paid = 0;
		$totalPrice = $paid;
		$unitPrice = 0;
		$compQuantity = $totalCount;
	} else if (($costArray['totalPrice'] != NULL)&&($costArray['totalPrice'] != 0)) {
		$paid = $costArray['totalPrice'];
		$totalPrice = $paid;
		$unitPrice = 0;
	} else if (($costArray['unitPrice'] != NULL)&&($costArray['unitPrice'] != 0)) {
		$paid = $totalCount * $costArray['unitPrice'];
		$unitPrice = $costArray['unitPrice'];
		$totalPrice = 0;
	}
	
	
	$query = "REPLACE INTO `roons_transactions` (`id`, `market`,`date`,`samples`,`time`,`quantity`, ";
	$query .= " `complementary`, `unit_price`, `total_price`, `paid`, `credit`,`market_instance_ID`)";
	$query .= " VALUES (".$tid.",".$mid.",".$params['date'].",".$params['sampled'].",";
	$query .= $params['time'].",".$totalCount.", ".$params['free'].", ".$unitPrice.", ".$totalPrice.", ".$paid.", ".$params['credit'].", ".$id.");"; 
	//echo ("<span style='color:#ff0000;'>".$query."</span><br/>");
	$result = mysql_query($query);
	
	//echo ("<br/>");
	removeTidFromList("roons_transaction_flavors", $tid); // remove all the old values for the flavors for this transaction 

	foreach ($params as $key => $value) { // insert the new values for the flavors for this transaction
		if (is_numeric($key) ) {
			if ($value == '') $value = 0;
			$query = "INSERT INTO `roons_transaction_flavors` (`tid`,`fid`,`quantity`)";
			$query .= " VALUES (".$tid.",".$key.",".$value.");"; 
			//echo ("<span style='color:#ff0000;'>".$query."</span><br/>");
			$result = mysql_query($query);
		}
	}
	
// update market_instance with the edited information
// new	
$instanceTotals = getRunningTotals($id);	// original values
	// send the difference in count and paid to setRunningTotals
if ($totals['paid'] > 0) { // if originally it was a paid transaction
	if ($paid > 0) {  // if both before and after are paid transactions
//	echo("<br/>was a paid transaction and still a paid transaction totals[quantity]=".$totals['quantity']." totalCount=".$totalCount." totals[paid]=".$totals['paid']." paid=".$paid." sampleQuantity=".$sampleQuantity." compQuantity=".$compQuantity." <br/>");
		$newTotalQuantitySold = $instanceTotals['runningTotalQuantitySold'] -  ($totals['quantity'] - $totalCount);
		$newRunningTotalMoney = $instanceTotals['runningTotalMoney'] - ($totals['paid'] - $paid);
		$newPaidTransactionCount = $instanceTotals['paidTransactionCount'];
		$newSampleQuantity = $instanceTotals['sampleCount'];
		$newCompQuantity = $instanceTotals['compCount'];
	} else if ($params['sampled'] == 1) { // was paid, now samples
//	echo("<br/>was a paid transaction and now a sample totals[quantity]=".$totals['quantity']." totalCount=".$totalCount." totals[paid]=".$totals['paid']." paid=".$paid." sampleQuantity=".$sampleQuantity." compQuantity=".$compQuantity." <br/>");
		$newRunningTotalMoney = $instanceTotals['runningTotalMoney'] -$totals['paid'];
		$newSampleQuantity = $instanceTotals['sampleCount'] + $totalCount;
		$newTotalQuantitySold = $instanceTotals['runningTotalQuantitySold'] - $totals['quantity'];
		$newCompQuantity = $instanceTotals['compCount'];
		$newPaidTransactionCount = $instanceTotals['paidTransactionCount'] - 1;
//		echo ("newPaidTransactionCount = ".$newPaidTransactionCount." instanceTotals['paidTransactionCount'] = ".$instanceTotals['paidTransactionCount']." <br/>");
	} else if ($params['free'] == 1) { // was paid, now comped
//	echo("<br/>was a paid transaction and now a comp totals[quantity]=".$totals['quantity']." totalCount=".$totalCount." totals[paid]=".$totals['paid']." paid=".$paid." sampleQuantity=".$sampleQuantity." compQuantity=".$compQuantity." <br/>");
		$newRunningTotalMoney = $instanceTotals['runningTotalMoney'] -$totals['paid'];
		$newCompQuantity = $instanceTotals['compCount'] + $totalCount;
		$newTotalQuantitySold = $instanceTotals['runningTotalQuantitySold'] -  $totals['quantity'];
		$newSampleQuantity = $instanceTotals['sampleCount'];
		$newPaidTransactionCount = $instanceTotals['paidTransactionCount'] - 1;
	}
} else if ($totals['samples'] == 1) { // was originally a sample
	if ($paid > 0) {  // now it's a paid transaction
//	echo("<br/>was a sample and now a paid totals[quantity]=".$totals['quantity']." totalCount=".$totalCount." totals[paid]=".$totals['paid']." paid=".$paid." sampleQuantity=".$sampleQuantity." compQuantity=".$compQuantity." <br/>");
		$newTotalQuantitySold = $instanceTotals['runningTotalQuantitySold'] + $totalCount;
		$newRunningTotalMoney = $instanceTotals['runningTotalMoney'] + $paid;
		$newPaidTransactionCount = $instanceTotals['paidTransactionCount'] + 1;
		$newSampleQuantity = $instanceTotals['sampleCount'] - $totals['quantity'];
		$newCompQuantity = $instanceTotals['compCount'];
	} else if ($params['sampled'] == 1) { // was sample, now samples
//	echo("<br/>was a sample and now a sample totals['quantity']=".$totals['quantity']." totalCount=".$totalCount."  instanceTotals['sampleCount']=". $instanceTotals['sampleCount']." paid=".$paid." sampleQuantity=".$sampleQuantity." compQuantity=".$compQuantity." instanceTotals=".$instanceTotals." <br/>");
		$newSampleQuantity = $instanceTotals['sampleCount'] - ($totals['quantity'] - $totalCount);
		$newPaidTransactionCount = $instanceTotals['paidTransactionCount'];
		$newCompQuantity = $instanceTotals['compCount'];
		$newRunningTotalMoney = $instanceTotals['runningTotalMoney'];		
		$newTotalQuantitySold = $instanceTotals['runningTotalQuantitySold'];
	} else if ($params['free'] == 1) { // was sample, now comped
//	echo("<br/>was a sample and now a comp totals[quantity]=".$totals['quantity']." totalCount=".$totalCount." totals[paid]=".$totals['paid']." paid=".$paid." sampleQuantity=".$sampleQuantity." compQuantity=".$compQuantity." <br/>");
		$newSampleQuantity = $instanceTotals['sampleCount'] - $totals['quantity'];
		$newCompQuantity = $instanceTotals['compCount'] + $totalCount;			
		$newRunningTotalMoney = $instanceTotals['runningTotalMoney'];
		$newPaidTransactionCount = $instanceTotals['paidTransactionCount'];
		$newTotalQuantitySold = $instanceTotals['runningTotalQuantitySold'];
	}
} else if ($totals['complementary'] == 1) { // was a comped
	if ($paid > 0) {  // now it's a paid transaction
//	echo("<br/>was a comp and now a paid totals[quantity]=".$totals['quantity']." totalCount=".$totalCount." totals[paid]=".$totals['paid']." paid=".$paid." sampleQuantity=".$instanceTotals['sampleCount']." compQuantity=".$compQuantity." <br/>");
		$newTotalQuantitySold = $instanceTotals['runningTotalQuantitySold'] + $totalCount;
		$newRunningTotalMoney = $instanceTotals['runningTotalMoney'] + $paid;
		$newPaidTransactionCount = $instanceTotals['paidTransactionCount'] + 1;
		$newSampleQuantity = $instanceTotals['sampleCount'];
		$newCompQuantity = $instanceTotals['compCount'] - $totals['quantity'];
	} else if ($params['sampled'] == 1) { // was comp, now samples
//	echo("<br/>was a comp and now a sample totals[quantity]=".$totals['quantity']." totalCount=".$totalCount." totals[paid]=".$totals['paid']." paid=".$paid." sampleQuantity=".$sampleQuantity." compQuantity=".$compQuantity." <br/>");
		$newSampleQuantity = $instanceTotals['sampleCount'] + $totalCount;
		$newCompQuantity = $instanceTotals['compCount'] -  $totals['quantity'];			
		$newRunningTotalMoney = $instanceTotals['runningTotalMoney'];
		$newPaidTransactionCount = $instanceTotals['paidTransactionCount'];
		$newTotalQuantitySold = $instanceTotals['runningTotalQuantitySold'];
	} else if ($params['free'] == 1) { // was comp, now comped
//	echo("<br/>was a comp and now a comp totals[quantity]=".$totals['quantity']." totalCount=".$totalCount." totals[paid]=".$totals['paid']." paid=".$paid." sampleQuantity=".$sampleQuantity." compQuantity=".$compQuantity." <br/>");
		$newCompQuantity = $instanceTotals['compCount'] - ($totals['quantity'] - $totalCount);
		$newPaidTransactionCount = $instanceTotals['paidTransactionCount'];
		$newSampleQuantity = $instanceTotals['sampleCount'];
		$newRunningTotalMoney = $instanceTotals['runningTotalMoney'];		
		$newTotalQuantitySold = $instanceTotals['runningTotalQuantitySold'];
	}
}

	$query = "UPDATE `roons_market_instance` SET `runningTotalQuantitySold` = '".$newTotalQuantitySold."',";
	$query .= " `runningTotalMoney`  = ".$newRunningTotalMoney.", ";
	$query .= " `paidTransactionCount`  = ".$newPaidTransactionCount.", ";
	$query .= " `sampleCount`  = ".$newSampleQuantity.", ";
	$query .= " `unitPricePaid`  = ".($newRunningTotalMoney/$newTotalQuantitySold).", ";
	$query .= " `unitPriceAll`  = ".($newRunningTotalMoney/($newTotalQuantitySold+$newCompQuantity+$newSampleQuantity)).", ";
	$query .= " `compCount`  = ".$newCompQuantity." ";
	$query .= " WHERE `id` = ".$id.";"; 
	//echo ("<br/><span style='color:#ff0000;'>".$query."</span><br/>");
	$result = mysql_query($query);


}


function addMarketInstance($date, $mid) {
// test if this date/market combo exists
	$query = "SELECT * FROM `roons_market_instance` WHERE `date` = ".$date." AND `mid` = ".$mid.";";
	//echo ("<span style='color:#ff0000;'>".$query."</span><br/>");
	$result = mysql_query($query);

	if (($result)&&(mysql_numrows($result)>0)) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$insert_id = mysql_result($result, $b,"id");
		}	
	} else {
		$query = "INSERT INTO `roons_market_instance` (`mid`, `date`)";
		$query .= " VALUES (".$mid.",".$date.");"; 
	//	echo ("<br/><span style='color:#ff0000;'>".$query."</span><br/>");
		$result = mysql_query($query);
		$insert_id = mysql_insert_id();		
		
	} 
	return $insert_id;
}

function addNote($id, $note, $fees, $payroll, $workers, $misc, $cashReceived, $creditReceived ) {
	$query = "UPDATE `roons_market_instance` SET `note` = '".$note."',";
	$query .= " `fees`  = ".$fees.", ";
	$query .= " `payroll`  = ".$payroll.", ";
	$query .= " `miscFees`  = ".$misc.", ";
	$query .= " `cashReceived`  = ".$cashReceived.", ";
	$query .= " `creditReceived`  = ".$creditReceived.", ";
	$query .= " `workers`  = '".$workers."' ";
	$query .= " WHERE `id` = ".$id.";"; 
//	echo ("<br/><span style='color:#ff0000;'>".$query."</span><br/>");
	$result = mysql_query($query);
	
	
// also set unitPricePaid, unitPriceAll, adjCountSold?
}

function setAdjustedValues($id, $adjustedTotalQuanity, $unitPrice, $unitPriceWithCompsAndSamples) {
	$query = "UPDATE `roons_market_instance` SET ";
	$query .= " `adjCountSold`  = ".$adjustedTotalQuanity.", ";
	$query .= " `unitPricePaid`  = ".$unitPrice.", ";
	$query .= " `unitPriceAll`  = ".$unitPriceWithCompsAndSamples." ";
	$query .= " WHERE `id` = ".$id.";"; 
	//echo ("<br/><span style='color:#ff0000;'>".$query."</span><br/>");
	$result = mysql_query($query);
	
	
// also set unitPricePaid, unitPriceAll, adjCountSold?
}
function getAdditionalInfo($id) {
	$info = "";
	$query = "SELECT `note`,`payroll`,`fees`,`cashReceived`,`creditReceived`,`miscFees`,`workers` FROM `roons_market_instance` WHERE `id` = ".$id.";"; 
	$result = mysql_query($query);
	if (($result)&&(mysql_numrows($result)>0)) {
		$info['note'] = mysql_result($result, 0,"note");
		$info['fees'] = mysql_result($result, 0,"fees");
		$info['cashReceived'] = mysql_result($result, 0,"cashReceived");
		$info['creditReceived'] = mysql_result($result, 0,"creditReceived");
		$info['miscFees'] = mysql_result($result, 0,"miscFees");
		$info['workers'] = mysql_result($result, 0,"workers");
		$info['payroll'] = mysql_result($result, 0,"payroll");
		$info['runningTotalQuantitySold'] = mysql_result($result, 0,"runningTotalQuantitySold");
		$info['runningTotalMoney'] = mysql_result($result, 0,"runningTotalMoney ");
		$info['sampleCount'] = mysql_result($result, 0,"sampleCount");
		$info['compCount'] = mysql_result($result, 0,"compCount");
		$info['unitPricePaid'] = mysql_result($result, 0,"unitPricePaid");
		$info['unitPriceAll'] = mysql_result($result, 0,"unitPriceAll");
		$info['adjCountSold'] = mysql_result($result, 0,"adjCountSold");
		$info['adjTotalMoney'] = mysql_result($result, 0,"adjTotalMoney");
		$info['unitPriceAll '] = mysql_result($result, 0,"unitPriceAll");
		$info['paidTransactionCount '] = mysql_result($result, 0,"paidTransactionCount");
	}
	return $info;
}

function getTransactionInfo($tid) {
	$query = "SELECT * FROM `roons_transactions` WHERE `id` = ".$tid.";";
	//echo $query;
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item = array();
			$item['id'] = $tid;
			$item['time'] = mydecode(mysql_result($result, $b,"time"));
			$item['samples'] = mysql_result($result, $b,"samples");
			$item['paid'] = mysql_result($result, $b,"paid");
			$item['unit_price'] = mysql_result($result, $b,"unit_price");
			$item['total_price'] = mysql_result($result, $b,"total_price");
			$item['credit'] = mysql_result($result, $b,"credit");
			$item['quantity'] = mysql_result($result, $b,"quantity");
			$item['complementary'] = mysql_result($result, $b,"complementary");
		}
	}
	return $item;
}

function getTransactionFlavorInfo($tid) {
	$transactions = array();
	$query = "SELECT * FROM `roons_transactions` WHERE `id` = ".$tid.";";
//	echo $query;
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item = array();
			$item['id'] = $tid;
			$item['time'] = mydecode(mysql_result($result, $b,"time"));
			$item['samples'] = mysql_result($result, $b,"samples");
			$item['paid'] = mysql_result($result, $b,"paid");
			$item['unit_price'] = mysql_result($result, $b,"unit_price");
			$item['total_price'] = mysql_result($result, $b,"total_price");
			$item['credit'] = mysql_result($result, $b,"credit");
			$item['quantity'] = mysql_result($result, $b,"quantity");
			$item['complementary'] = mysql_result($result, $b,"complementary");
			$transactions[$b] = $item;
		}
	}
	
	// now get the flavor information 
	for ($i=0; $i<count($transactions); $i++) {
		$transaction = $transactions[$i];
		
		$flavors = array();
		$query = "SELECT * FROM `roons_transaction_flavors` WHERE `tid` = ".$transaction['id']." ORDER BY `fid` ASC;";
//echo ($query."<br/>");
		$result = mysql_query($query);
		if ($result) {
			for ($b=0; $b<mysql_numrows($result); $b++) {
				$fid = mydecode(mysql_result($result, $b,"fid"));
				$transactions[$i][$fid] = mysql_result($result, $b,"quantity");
				$quantity = mysql_result($result, $b,"quantity");
			}
		}
		
	}	
	
	foreach ($transactions as $key => $value) {
		
		foreach ($value as $key2 => $value2) {
			if ($key2 == "time") {
				$time = date("g:i a", $value2);
//				echo ("time = ".$time." <br/>");
			} else if ($key2 == "quantity") {
				$totalCount = $totalCount + $value2;
//				echo ($key2." = ".$value2." total=".$totalCount." <br/>");
			} 
		}
		
	}
	
	return $transactions;
}

function getTransactionsByMarketInstanceID($market_instance_ID) {
	$transactions = array();
	$query = "SELECT `id` FROM `roons_transactions` ";
	$query .= " WHERE `market_instance_ID` = ".$market_instance_ID." ORDER BY `date` DESC";
//	echo ("<span style='color:#ffffff;'>".$query."</span><br/>");
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item = array();
			$item['id'] = mysql_result($result, $b,"id");
			
			$transactions[$b] = $item;
		}
	}
	
	// now get the flavor information 
	for ($i=0; $i<count($transactions); $i++) {
		$transaction = $transactions[$i];
		
		$query = "SELECT `fid`, `quantity` FROM `roons_transaction_flavors` WHERE `tid` = ".$transaction['id']." ORDER BY `fid` ASC;";
//echo ($query."<br/>");
		$result = mysql_query($query);
		if ($result) {
			for ($b=0; $b<mysql_numrows($result); $b++) {
				$fid = mydecode(mysql_result($result, $b,"fid"));
				$transactions[$i][$fid] = mysql_result($result, $b,"quantity");
			}
		}
		
	}	
	
	return $transactions;
}
function getTransactions($date, $mid) {
	$transactions = array();
	$query = "SELECT * FROM `roons_transactions` ";
	$query .= " WHERE `date` = ".$date." AND `market` = ".$mid." ORDER BY `date` DESC, `time` DESC";
//	echo ("<span style='color:#ffffff;'>".$query."</span><br/>");
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item = array();
			$item['id'] = mydecode(mysql_result($result, $b,"id"));
			$item['time'] = mydecode(mysql_result($result, $b,"time"));
			$item['quantity'] = mysql_result($result, $b,"quantity");
			$item['paid'] = mysql_result($result, $b,"paid");
			$item['credit'] = mysql_result($result, $b,"credit");
			$item['comp'] = mysql_result($result, $b,"complementary");
			$item['samples'] = mysql_result($result, $b,"samples");
			
			$transactions[$b] = $item;
		}
	}
	
	// now get the flavor information 
	for ($i=0; $i<count($transactions); $i++) {
		$transaction = $transactions[$i];
		
		$query = "SELECT `fid`, `quantity` FROM `roons_transaction_flavors` WHERE `tid` = ".$transaction['id']." ORDER BY `fid` ASC;";
//echo ($query."<br/>");
		$result = mysql_query($query);
		if ($result) {
			for ($b=0; $b<mysql_numrows($result); $b++) {
				$fid = mydecode(mysql_result($result, $b,"fid"));
				$transactions[$i][$fid] = mysql_result($result, $b,"quantity");
			}
		}
		
	}	
	
	return $transactions;
}
function getTransactions2($tid) {
	$transactions = array();
	$query = "SELECT * FROM `roons_transactions` ";
	$query .= " WHERE `market_instance_ID` = ".$tid." ORDER BY `date` DESC, `time` DESC";
//	echo ("<span style='color:#ffffff;'>".$query."</span><br/>");
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item = array();
			$item['id'] = mydecode(mysql_result($result, $b,"id"));
			$item['time'] = mydecode(mysql_result($result, $b,"time"));
			$item['quantity'] = mysql_result($result, $b,"quantity");
			$item['paid'] = mysql_result($result, $b,"paid");
			$item['credit'] = mysql_result($result, $b,"credit");
			$item['comp'] = mysql_result($result, $b,"complementary");
			$item['samples'] = mysql_result($result, $b,"samples");
			
			$transactions[$b] = $item;
		}
	}
	
	// now get the flavor information 
	for ($i=0; $i<count($transactions); $i++) {
		$transaction = $transactions[$i];
		
		$query = "SELECT `fid`, `quantity` FROM `roons_transaction_flavors` WHERE `tid` = ".$transaction['id']." ORDER BY `fid` ASC;";
//echo ($query."<br/>");
		$result = mysql_query($query);
		if ($result) {
			for ($b=0; $b<mysql_numrows($result); $b++) {
				$fid = mydecode(mysql_result($result, $b,"fid"));
				$transactions[$i][$fid] = mysql_result($result, $b,"quantity");
			}
		}
		
	}	
	
	return $transactions;
}

function getDateFromMarketInstance($id) {
	$date = 0;
	$query = "SELECT `date` FROM `roons_market_instance` WHERE `id` = ".$id." LIMIT 1;";
//echo ($query."<br/>");
		$result = mysql_query($query);
		if ($result) {
			for ($b=0; $b<mysql_numrows($result); $b++) {
				$date = mysql_result($result, $b,"date");
			}
		}
		return $date;
	}	

function getMidFromMarketInstance($id) {
	$mid = 0;
	$query = "SELECT `mid` FROM `roons_market_instance` WHERE `id` = ".$id." LIMIT 1;";
//echo ($query."<br/>");
		$result = mysql_query($query);
		if ($result) {
			for ($b=0; $b<mysql_numrows($result); $b++) {
				$mid = mysql_result($result, $b,"mid");
			}
		}
		return $mid;
	}	


function getAvailableFlavors($date) {
	$flavors = array();
	$query = "SELECT `name`, `id` FROM `roons_flavors` WHERE (`created` <= ".$date.") AND (".$date." <= `terminated`)ORDER BY `id` ASC;";
	//echo ($query."<br/>");
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item = array();
			$item['name'] = mydecode(mysql_result($result, $b,"name"));
			$item['id'] = mysql_result($result, $b,"id");
			
			$flavors[$b] = $item;
		}
	}
	return $flavors;
}

function getMarketInfo($id) { 
	$flavors = array();
	$query = "SELECT * FROM `roons_markets` WHERE `id` = ".$id.";";
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item['location'] = mydecode(mysql_result($result, $b,"location"));
			$item['id'] = mysql_result($result, $b,"id");
			$item['day'] = mysql_result($result, $b,"day");
			$item['notes'] = mydecode(mysql_result($result, $b,"notes"));
		}
	}
	return $item;
}

function getEmployeeInfo($id) { 
	$flavors = array();
	$query = "SELECT * FROM `roons_employees` WHERE `id` = ".$id.";";
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item['id'] = mysql_result($result, $b,"id");
			$item['fname'] = mysql_result($result, $b,"firstName");
			$item['lname'] = mydecode(mysql_result($result, $b,"lastName"));
			$item['show'] = mydecode(mysql_result($result, $b,"show"));
		}
	}
	return $item;
}



function getStoresList() { 
	$flavors = array();
	$query = "SELECT * FROM `roons_stores` ORDER BY `name` ASC";
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item = array();
			$item['name'] = mydecode(mysql_result($result, $b,"name"));
			$item['contact'] = mydecode(mysql_result($result, $b,"contact"));
			$item['location'] = mydecode(mysql_result($result, $b,"location"));
			$start = mysql_result($result, $b,"startDate");
			$item['startDate'] = printDay($start);
			$end = mysql_result($result, $b,"endDate");
			$item['endDate'] = printDay($end);
			$item['id'] = mysql_result($result, $b,"id");
			$item['notes'] = mydecode(mysql_result($result, $b,"notes"));
			
			$stores[$b] = $item;
		}
	}
	return $stores;
}

function getStoreInfo($id) { 
	$flavors = array();
	$query = "SELECT * FROM `roons_stores` WHERE `id` = ".$id." ORDER BY `name` ASC";
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item['name'] = mydecode(mysql_result($result, $b,"name"));
			$item['location'] = mydecode(mysql_result($result, $b,"location"));
			$item['contact'] = mydecode(mysql_result($result, $b,"contact"));
			$start = mysql_result($result, $b,"startDate");
			$item['startDate'] = date('m/d/Y', $start);
			$end = mysql_result($result, $b,"endDate");
			if ($end != 0) $item['endDate'] = date('m/d/Y', $end);
			$item['id'] = mysql_result($result, $b,"id");
			$item['notes'] = mydecode(mysql_result($result, $b,"notes"));
		}
	}
	return $item;
}

function getPricesList() { 
	$flavors = array();
	$query = "SELECT * FROM `roons_prices` ORDER BY `category` ASC, `minQuantity` ASC";
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item = array();
			$item['category'] = mydecode(mysql_result($result, $b,"category"));
			$start = mysql_result($result, $b,"startDate");
			$item['startDate'] = printDay($start);
			$end = mysql_result($result, $b,"endDate");
			if ($end > 0) $item['endDate'] = printDay($end);
			else $item['endDate'] = '';
			$item['minQuantity'] = mysql_result($result, $b,"minQuantity");
			$item['maxQuantity'] = mysql_result($result, $b,"maxQuantity");
			$item['id'] = mysql_result($result, $b,"id");
			$item['unitPrice'] = mysql_result($result, $b,"unitPrice");
			$item['totalPrice'] = mysql_result($result, $b,"totalPrice");
			
			$flavors[$b] = $item;
		}
	}
	return $flavors;
}

function getPriceInfo($id) { 
	$flavors = array();
	$query = "SELECT * FROM `roons_prices` WHERE `id` = ".$id.";";
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item['category'] = mydecode(mysql_result($result, $b,"category"));
			$start = mysql_result($result, $b,"startDate");
			$item['startDate'] = date('m/d/Y', $start);
			$end = mysql_result($result, $b,"endDate");
			if ($end > 0) $item['endDate'] = date('m/d/Y', $end);
			else $item['endDate'] = '';
			$item['minQuantity'] = mysql_result($result, $b,"minQuantity");
			$item['maxQuantity'] = mysql_result($result, $b,"maxQuantity");
			$item['id'] = mysql_result($result, $b,"id");
			$item['unitPrice'] = mysql_result($result, $b,"unitPrice");
			$item['totalPrice'] = mysql_result($result, $b,"totalPrice");
		}
	}
	return $item;
}

function getPrice($quantity, $category) { 
	$cost = array();
	$query = "SELECT `unitPrice`, `totalPrice` FROM `roons_prices` ";
	$query .= " WHERE `minQuantity` <= ".$quantity." AND ".$quantity." <= `maxQuantity` ";
	$query .= " AND `category` = ".$category.";";
//	echo $query;
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$cost['unitPrice'] = mysql_result($result, $b,"unitPrice");
			$cost['totalPrice'] = mysql_result($result, $b,"totalPrice");
		}
	}
	return $cost;
}

function doEnterTransaction($mid, $date, $params, $id, $category = 1) {
//echo ("doEnterTransaction id=".$id." mid=".$mid."<br/>");

// category 1 is for the price points and refers to a farmer's market
	$totalCount = 0;
	$overridePrice = false;
	$paid = 0;

	foreach ($params as $key => $value) {
		if (is_numeric($key) ) {
			$totalCount = $totalCount + $value;
//			echo ("flavors ".$key." = ".$value." total=".$totalCount." <br/>");
		} else {
			if ($key == "price") {
				if ($value != '')
					if ($value > 0) {
						$overridePrice = true;
						$paid = $value;
						$totalPrice = $value;
					}
			}
		}
	}
	$totalCount = $totalCount; 
	$sampleQuanity = 0;
	$compQuantity = 0;
	$paidQuantity = 0;

	if (!array_key_exists('free', $params))  $params['free'] = 0;
	if (!array_key_exists('sampled', $params))  $params['sampled'] = 0;
	if (!array_key_exists('notes', $params))  $params['notes'] = '';
	$costArray = getPrice($totalCount, $category);

//	echo("<br/><span style='color:#ff0000;'>override=".$overridePrice."</span>");
	if ($overridePrice) { // user entered in a price
		$unitPrice = -1;
	} else if ($params['sampled'] == 1) {
		$paid = 0;
		$totalPrice = $paid;
		$unitPrice = 0;
		$sampleQuanity = $totalCount;
	} else if ($params['free'] == 1) {
		$paid = 0;
		$totalPrice = $paid;
		$unitPrice = 0;
		$compQuantity = $totalCount;
	} else if (($costArray['totalPrice'] != NULL)&&($costArray['totalPrice'] != 0)) {
		$paid = $costArray['totalPrice'];
		$totalPrice = $paid;
		$unitPrice = 0;
	} else if (($costArray['unitPrice'] != NULL)&&($costArray['unitPrice'] != 0)) {
		$paid = $totalCount * $costArray['unitPrice'];
		$unitPrice = $costArray['unitPrice'];
		$totalPrice = 0;
	}
	
	if ($paid != 0) {
		$paidQuantity =  $totalCount;	
	}
	//echo "transaction cost = ".$paid."<br/>";
	
	$query = "INSERT INTO `roons_transactions` (`market`,`date`,`samples`,`time`,`quantity`, ";
	$query .= " `complementary`, `unit_price`, `total_price`, `paid`, `credit`,`market_instance_ID`)";
	$query .= " VALUES (".$mid.",".$date.",".$params['sampled'].",";
	$query .= $params['time'].",".$totalCount.", ".$params['free'].", ".$unitPrice.", ".$totalPrice.", ".$paid.",".$params['credit'].", ".$id.");"; 
//	echo ($query."<br/>");
	$result = mysql_query($query);
	$insert_id = mysql_insert_id();
	
	//echo ("<br/>");
	foreach ($params as $key => $value) {
		if (is_numeric($key) ) {
			if ($value == '') $value = 0;
			$query = "INSERT INTO `roons_transaction_flavors` (`tid`,`fid`,`quantity`)";
			$query .= " VALUES (".$insert_id.",".$key.",".$value.");"; 
			//echo ($query."<br/>");
			$result = mysql_query($query);
		}
	}
// need to modify totalCount, totalPrice, paidTransactionCount, sampleCount, compCount
// unitPrice, unitPriceAll	


setRunningTotals($id, $totalCount, $paid, "add", $sampleQuanity, $compQuantity );

}

function setRunningTotals($id, $totalCount, $paid, $type, $newSampleCount, $newCompCount) {
//echo ("<br/> setRunningTotals if=".$id." type=".$type." totalCount=". $totalCount." newSampleCount=". $newSampleCount." newCompCount=".$newCompCount." paid=".$paid." <br/>");
// now get the total amount from roons_market_instance
	$query = "SELECT `runningTotalQuantitySold`, `runningTotalMoney`, `paidTransactionCount`, `sampleCount`, `compCount`  FROM `roons_market_instance` WHERE `id` = ".$id;
	//echo $query;
//	echo ("<br/>");
	$result = mysql_query($query);
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$runningTotalQuantitySold = mysql_result($result, $b,"runningTotalQuantitySold");
			$runningTotalMoney = mysql_result($result, $b,"runningTotalMoney");
			$paidTransactionCount = mysql_result($result, $b,"paidTransactionCount");
			$sampleCount = mysql_result($result, $b,"sampleCount");
			$compCount = mysql_result($result, $b,"compCount");
		}
	}
	
$runningTotalMoney = $runningTotalMoney + $paid;
if ($type == "add") {
	if ($paid > 0) {
		$paidTransactionCount = $paidTransactionCount + 1;
		$runningTotalQuantitySold = $runningTotalQuantitySold + $totalCount;
	} else {
		$sampleCount = $sampleCount + $newSampleCount;
		$compCount = $compCount + $newCompCount;	
	}
} else if ($type == "rm") {
	if ($paid < 0) {
		$paidTransactionCount = $paidTransactionCount - 1;
		$runningTotalQuantitySold = $runningTotalQuantitySold + $totalCount;
	} else {
		$sampleCount = $sampleCount - $newSampleCount;
		$compCount = $compCount - $newCompCount;
	}
} else if ($type == "edit") {
	$runningTotalQuantitySold = $runningTotalQuantitySold + $totalCount;
	$sampleCount = $sampleCount + $newSampleCount;
	$compCount = $compCount + $newCompCount;	
} else if ($type == "editNowPaid") {
	$runningTotalQuantitySold = $runningTotalQuantitySold + $totalCount;
	$sampleCount = $sampleCount + $newSampleCount;
	$compCount = $compCount + $newCompCount;	
	$paidTransactionCount++;
} else if ($type == "editNotPaid") {
	$runningTotalQuantitySold = $runningTotalQuantitySold + $totalCount;
	$sampleCount = $sampleCount + $newSampleCount;
	$compCount = $compCount + $newCompCount;	
	$paidTransactionCount--;
}

$unitPrice1 = number_format((float)$unitPrice1, 5, '.', '');
$unitPrice2 = number_format((float)$unitPrice2, 5, '.', '');

	$query = "UPDATE `roons_market_instance` SET `runningTotalQuantitySold` = '".$runningTotalQuantitySold."',";
	$query .= " `runningTotalMoney`  = ".$runningTotalMoney.", ";
	$query .= " `paidTransactionCount`  = ".$paidTransactionCount.", ";
	$query .= " `sampleCount`  = ".$sampleCount.", ";
	$query .= " `unitPricePaid`  = ".$unitPrice1.", ";
	$query .= " `unitPriceAll`  = ".$unitPrice2.", ";
	$query .= " `compCount`  = ".$compCount." ";
	$query .= " WHERE `id` = ".$id.";"; 
	//echo ("<br/><span style='color:#ff0000;'>".$query."</span><br/>");
	$result = mysql_query($query);

}
function getRunningTotals($id) { 
	$totals = array();
	$query = "SELECT `runningTotalQuantitySold`, `runningTotalMoney`, `paidTransactionCount`, `sampleCount`, `compCount`, `unitPricePaid`, `unitPriceAll` FROM `roons_market_instance` ";
	$query .= " WHERE `id` = ".$id."; ";
	$result = mysql_query($query);
	$b = 0;
	if (($result) && (mysql_numrows($result) > 0)) {
		$totals['runningTotalQuantitySold'] = mysql_result($result, $b,"runningTotalQuantitySold");
		$totals['runningTotalMoney'] = mysql_result($result, $b,"runningTotalMoney");
		$totals['paidTransactionCount'] = mysql_result($result, $b,"paidTransactionCount");
		$totals['sampleCount'] = mysql_result($result, $b,"sampleCount");
		$totals['compCount'] = mysql_result($result, $b,"compCount");
		$totals['unitPricePaid'] = mysql_result($result, $b,"unitPricePaid");
		$totals['unitPriceAll'] = mysql_result($result, $b,"unitPriceAll");
	}
	return $totals;
}

function removeFromTransactions($tid, $id) { 
// get the quantity, comp, sample, paid from transactions to update market_instance: runningTotalQuantity Sold, runningTotalMoney, paidTransactionCount, sampleCount, compCount, 
	$totals = getTransactionInfo($tid);
	
	$totals['paid'] = 0-$totals['paid'];
	$totals['quantity'] = 0-$totals['quantity'];
	if ($totals['samples'] == 1) 
		$totals['samples'] = 0-$totals['quantity'];
	if ($totals['complementary'] == 1) 
		$totals['complementary'] = 0-$totals['quantity'];
	
//	echo("<br/>call setRunningTotals with".$totals['quantity']." ". $totals['paid']." ".$adjustCount." rm ".$totals['samples']." ".$totals['complementary']."<br/>");
// update totals in market_instance
	setRunningTotals($id, $totals['quantity'], $totals['paid'], "rm", $totals['samples'], $totals['complementary']);
	
	$query = "Delete FROM `roons_transactions` WHERE `id` = ".$tid.";";
	$result = mysql_query($query);
}
function removeTidFromList($db, $id) { 
	$flavors = array();
	$query = "Delete FROM `".$db."` WHERE `tid` = ".$id.";";
//	echo ($query."<br/>");
	$result = mysql_query($query);
}

function getTransactionList($market, $day) {	
	$couponList = array();
	$query = "SELECT t.`name`, m.`name`, c.`coupon_id`, c.`expiration`, c.`start`, ";
	$query .= "c.`terms`, c.`offer`, c.`url`, c.`bus_id`, c.`com_id` FROM `coupons` c ";
	$query .= "LEFT JOIN `businesses` b ON c.`coupon_id` = b.`bus_id` ";
	$query .= "LEFT JOIN `communities` m ON m.`com_id` = c.`com_id` ";
	$query .= "ORDER BY c.`expiration` DESC ";
	$result = mysql_query($query);

	$couponList = array();
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$item = array();
			$item['id'] = mysql_result($result, $b, "coupon_id");
			$item['bus_id'] = mysql_result($result, $b, "bus_id");
			$item['com_id'] = mysql_result($result, $b, "com_id");
			$item['community'] = mysql_result($result, $b, "m.name");
			$item['business'] = mysql_result($result, $b,"b.name");
			$item['expiration'] = mysql_result($result, $b, "expiration");
			$item['start'] = mysql_result($result, $b, "start");
			$item['terms'] = mysql_result($result, $b, "terms");
			$item['offer'] = mysql_result($result, $b, "offer");
			$item['url'] = mysql_result($result, $b, "url");
			
			$couponList[$b] = $item;
		}
	}
	return $couponList;
}

function getOneCoupon($id) {	
	$coupon = array();
	$query = "SELECT b.`name`, m.`name`, c.`expiration`, c.`start`, c.`bus_id`, c.`com_id`, ";
	$query .= "c.`terms`, c.`offer`, c.`url` FROM `coupons` c ";
	$query .= "LEFT JOIN `businesses` b ON c.`coupon_id` = b.`bus_id` ";
	$query .= "LEFT JOIN `communities` m ON m.`com_id` = c.`com_id` ";
	$query .= "WHERE c.`coupon_id` = '".$id."'; ";
	$result = mysql_query($query);
//echo $query;
	if ($result) {
		for ($b=0; $b<mysql_numrows($result); $b++) {
			$coupon['id'] = $id;
			$coupon['bus_id'] = mysql_result($result, $b, "bus_id");
			$coupon['com_id'] = mysql_result($result, $b, "com_id");
			$coupon['community'] = mysql_result($result, $b, "m.name");
			$coupon['business'] = mysql_result($result, $b,"b.name");
			$coupon['expiration'] = mysql_result($result, $b, "expiration");
			$coupon['start'] = mysql_result($result, $b, "start");
			$coupon['terms'] = mysql_result($result, $b, "terms");
			$coupon['offer'] = mysql_result($result, $b, "offer");
			$coupon['url'] = mysql_result($result, $b, "url");
		}
	}
	return $coupon;
}

function doEditFlavor($id, $name, $available, $terminated, $note) {
	if ($id > 0) {
		$query = "REPLACE INTO `roons_flavors`(`id`, `name`,`created`,`terminated`,`notes`) ";
		$query .= "VALUES('".$id."', '".myencode($name)."', '".$available."', '".$terminated."', '".myencode($note)."'); ";
	} else {
		$query = "REPLACE INTO `roons_flavors`(`name`,`created`,`terminated`,`notes`) ";
		$query .= "VALUES('".myencode($name)."', '".$available."', '".$terminated."', '".myencode($note)."'); ";
	}
//	echo $query;
	$result = mysql_query($query);
}

function doEditPrices($id, $min, $max, $start, $end, $category, $unitPrice, $totalPrice) {
	if ($id > 0) {
		$query = "REPLACE INTO `roons_prices`(`id`,`minQuantity`,`maxQuantity`,`startDate`,`endDate`,";
		$query .= " `category`,`unitPrice`,`totalPrice`) ";
		$query .= "VALUES('".$id."', '".$min."', '".$max."', '".$start."', '".$end."', '".myencode($category)."',";
		$query .= " '".$unitPrice."', '".$totalPrice."'); ";
	} else {
		$query = "REPLACE INTO `roons_prices`(`minQuantity`,`maxQuantity`,`startDate`,`endDate`,";
		$query .= " `category`,`unitPrice`,`totalPrice`) ";
		$query .= "VALUES('".$min."', '".$max."', '".$start."', '".$end."', '".myencode($category)."',";
		$query .= " '".$unitPrice."', '".$totalPrice."'); ";
	}
	//echo $query;
	$result = mysql_query($query);
}

function getMarketName($mid) {
	$location = "";
	$query = "SELECT `location` FROM `roons_markets` WHERE `id` = ".$mid.";";
	//echo $query;
	$result = mysql_query($query);

	if ($result) {
		$location = mydecode(mysql_result($result, 0,"location"));
	}
	return $location;
}


function getMarketColor($mid) {
	$location = "";
	$query = "SELECT `color` FROM `roons_markets` WHERE `id` = ".$mid.";";
	$result = mysql_query($query);

	if ($result) {
		$color = mydecode(mysql_result($result, 0,"color"));
	}
	return $color;
}


function doEditMarket($id, $location, $day, $note) {
	if ($id > 0) {
		$query = "REPLACE INTO `roons_markets`(`id`, `location`,`day`,`notes`) ";
		$query .= "VALUES('".$id."', '".myencode($location)."', '".myencode($day)."', '".myencode($note)."'); ";
	} else { // add a new market
	// see if the market already exists
		$query = "SELECT * FROM `roons_markets` WHERE `day` = '".$day."' AND `location` = '".$location."'; ";
		$result = mysql_query($query);
		if (($result) && (mysql_numrows($result) > 0)) {
			//echo("<span style='font-size:14px; font-weight:bold;'>*** The market you entered already exists, there is no need to create it again.</span>");
			return false;
		} else {
			$query = "INSERT INTO `roons_markets`(`day`,`location`,`notes`) ";
			$query .= "VALUES('".myencode($day)."', '".myencode($location)."', '".myencode($note)."'); ";
		}
	}
//	echo $query;
	$result = mysql_query($query);
}

function doEditEmployees($id, $fname, $lname, $show) {
	if ($id > 0) {
		$query = "REPLACE INTO `roons_employees`(`id`, `firstName`,`lastName`, `show`) ";
		$query .= "VALUES('".$id."', '".$fname."', '".$lname."', ".$show."); ";
	} else {
		$query = "REPLACE INTO `roons_employees`(`firstName`,`lastName`, `show`) ";
		$query .= "VALUES('".$fname."', '".$lname."', ".$show."); ";
	}
	echo $query;
	$result = mysql_query($query);
}

function doEditStores($id, $name, $location, $startDate, $endDate, $contact, $note) {
	if ($id > 0) {
		$query = "REPLACE INTO `roons_stores`(`id`, `name`,`location`,`startDate`, `endDate`, `contact`, `notes`) ";
		$query .= "VALUES('".$id."', '".myencode($name)."', '".myencode($location)."', '".$startDate."', '".$endDate."', '".myencode($contact)."', '".myencode($note)."'); ";
	} else {
		$query = "REPLACE INTO `roons_stores`(`name`,`location`,`startdate`, `endDate`, `contact`, `notes`) ";
		$query .= "VALUES('".myencode($name)."', '".myencode($location)."', '".$startDate."', '".$endDate."', '".myencode($contact)."', '".myencode($note)."'); ";
	}
//echo $query;
	$result = mysql_query($query);
}


function printCurrancy($amount,$showNegSign = false) {
	$negSign = "";
	if ($showNegSign && (intval($amount) != 0)) 
		$negSign = "-";

	$amount = $amount/100;
	return $negSign.money_format('%i',$amount);
}
function printNumber($amount,$showNegSign = false) {
	$negSign = "";
	if ($showNegSign && (intval($amount) != 0)) 
		$negSign = "-";

	$amount = $amount/100;
	return $negSign.$amount;
}
function printTime($amount) {
	$strAmount = strval($amount);
	$minutes = substr($strAmount, -2);
	$length = strlen($strAmount);
	$length = $length - 2;
	$hours = substr($strAmount, 0, $length);
	$minutes = ($minutes/100) * 60;
	if ($minutes < 10) $strMin = "0".$minutes;
	else $strMin = $minutes;
	
	return $hours.":".$strMin;
}

function intoDB($amount,$multiply = false) {
	if ($multiply) $amount = $amount*100;
	
	return number_format($amount,0,'','');
}


function GetVariable($label,$default = ""){
 	$query = "SELECT `value` FROM `admin_variables`  WHERE `label` LIKE '".$label."'; ";
 	$result = mysql_query($query);

	if (($result) && (mysql_numrows($result) > 0))
		return mysql_result($result,0,"value");
	
	return $default;
}

function getNumberOfEmployeesForEachMonthInQtr($qtr, $year) {
	$number = array();

	$firstMonth = 1 + (($qtr-1)*3);
	$secondMonth = 2 + (($qtr-1)*3);
	$thirdMonth = 3 + (($qtr-1)*3);
	
	$query = "SELECT DISTINCT `eid` FROM `admin_payroll`  WHERE `year` = ".$year." AND `month` = ".$thirdMonth.";";
	$result = mysql_query($query);
	
	if (($result) && (mysql_numrows($result) > 0))
		$number['thirdMonth'] = mysql_numrows($result);
	else 
		$number['thirdMonth'] = 0;

	$number['total'] = 	$number['firstMonth'] + $number['secondMonth'] + $number['thirdMonth'];
	return $number;
}

function getQuarterlyAmounts($employer, $qtr, $year, $eid = -1) {
	$amounts = array();
	$amounts['fed_withholding'] = 0;
	$amounts['st_withholding'] = 0;
	$amounts['ss'] = 0;
	$amounts['medicare'] = 0;
	$amounts['gross_pay'] = 0;
	$amounts['net_pay'] = 0;
	$amounts['hours'] = 0;
	$amounts['rinteld'] = 0;
	

	if ($employer == "jj") {
		$query = "SELECT * FROM `admin_payroll` ";
		$query .= "WHERE `year` = ".$year;
	
		if ($eid != -1) {
			$query .= " AND `eid` = ".$eid;
		}
	
		if ($qtr == 1) {
			$query .= " AND (`month` = 1 OR `month` = 2 OR `month` = 3);";
		} else if ($qtr == 2) {
			$query .= " AND (`month` = 4 OR `month` = 5 OR `month` = 6);";
		} else if ($qtr == 3) {
			$query .= " AND (`month` = 7 OR `month` = 8 OR `month` = 9);";
		} else if ($qtr == 4) {
			$query .= " AND (`month` = 10 OR `month` = 11 OR `month` = 12);";
		}	
	
		$result = mysql_query($query);
	
		if ($result) {
			for ($b=0; $b<mysql_numrows($result); $b++) {
				$amounts['fed_withholding'] += intval(mysql_result($result, $b, "fed_withholding"));
				$amounts['st_withholding'] += intval(mysql_result($result, $b, "st_withholding"));
				$amounts['ss'] += intval(mysql_result($result, $b, "ss"));
				$amounts['medicare'] += intval(mysql_result($result, $b, "medicare"));
				$amounts['gross_pay'] += intval(mysql_result($result, $b, "gross_pay"));
				$amounts['net_pay'] += intval(mysql_result($result, $b, "net_pay"));
				$amounts['hours'] += intval(mysql_result($result, $b, "hours"));
				$amounts['rinteld'] = $amounts['fed_withholding']+ $amounts['ss']+$amounts['medicare'];
			}
		}
	}

	return $amounts;
	
}
function printDay($nDay)
{	
	return date('M j, Y', $nDay);
}
function printFormDate($nDay)
{	
	return date('m-d-Y', $nDay);
}
function mydecode($str)
{
return $str;
	$str = str_replace ("&1;","'",$str);
	$str = str_replace ("&2;","`",$str);
	$str = str_replace ("&3;","\\",$str);
	$str = str_replace ("&4;","\"",$str);
	$str = str_replace ("&5;","*",$str);
	$str = str_replace ("&6;","?",$str);
	$str = str_replace ("&gt;",">",$str);
	$str = str_replace ("&lt;","<",$str);
	$str = str_replace ("{!}", "'",$str);
	
	return $str;
}
function myencode($str)
{
return $str;
	$str = str_replace ("'","&1;",$str);
	$str = str_replace ("`","&2;",$str);
	$str = str_replace ("\\","&3;",$str);
	$str = str_replace ("\"","&4;",$str);
	$str = str_replace ("*","&5;",$str);
	$str = str_replace ("?","&6;",$str);
	$str = str_replace (">","&gt;",$str);
	$str = str_replace ("<","&lt;",$str);
	$str = str_replace ("&","&amp;",$str);
	
	return $str;
}
function cmpAsc($a, $b) {
	return $a['adjustedTotal'] - $b['adjustedTotal'];
}
function cmpDesc($a, $b) {
	return $b['adjustedTotal'] - $a['adjustedTotal'];
}

function cmpProfitAsc($a, $b) {
	return $a['profit'] - $b['profit'];
}
function cmpProfitDesc($a, $b) {
	return $b['profit'] - $a['profit'];
}

function cmpRatioAsc($a, $b) {
	$value = 1000*$a['ratio'] - 1000*$b['ratio'];
	return $value;
}
function cmpRatioDesc($a, $b) {
	$value = 1000*$b['ratio'] - 1000*$a['ratio'];
	return $value;
}


?>
