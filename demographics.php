<!--?php get_header(); ?-->
<div id="demo_map">
	Map of USA goes here!
</div>

<script type="text/javascript">
function handleSelect(abbreviation)
{
	window.location = "http://jubon.biz/demographics.php?ab="+abbreviation.value;
}
</script>

<?
/*  Database connection information */
	$db_host='db2451.perfora.net';
	$db_database='db330561769';
	$db_username='dbo330561769';
	$db_password='turtleturtle';

	include('common.php');

	$connection=mysql_connect($db_host, $db_username, $db_password);
	if (!$connection) {
  		die("Could not connect to the database: <br/>".mysql_error());
	}
	$db_select=mysql_select_db($db_database);
	if (!$db_select) {
  		die("Could not select to the database: <br/>".mysql_error());
	}

/* end Database connection information */

/* look for parameters in the url */
$abbreviation = "";
if (isset($_GET['ab'])) {
	$abbreviation = $_GET['ab'];
}

	$states = array();
	
	$query = "SELECT `state`, `abbreviation` FROM `states`; ";
	$result = mysql_query($query);
	
	if ($result) {
		for ($b=0; $b < mysql_numrows($result); $b++) {
			$item = array();
			$item["state"] = mysql_result($result, $b, "state");
			$item["abbreviation"] = mysql_result($result, $b, "abbreviation");
			$states[$b] = $item;
		}
	}
	
	
	
	?>
	<select name="states" onchange="javascript:handleSelect(this)">
		<option value="">Choose a state</option>
	<?  foreach ($states as $state) { ?>
		<option value="<?=$state['abbreviation']?>"><?=$state['state']?></option>
	<? } ?>
	</select>

<? if ($abbreviation != "") {
	
	$cities = array();
	
	$query =  "SELECT `city` FROM `cities` WHERE `abbreviation` = '".$abbreviation."'; ";
	$result = mysql_query($query);
	
	if ($result) {
		for ($b=0; $b < mysql_numrows($result); $b++) {
			$cities[$b] = mysql_result($result, $b, "city");
		}
	}
	
	foreach ($cities as $city) { 
    	echo "<div>$city</div><br/>";
	 }


}
?>

	
<!--?php get_footer(); ?-->