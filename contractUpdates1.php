<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jubon.biz</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/jubon.css" />
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
function MM_jumpMenuGo(objId,targ,restore){ //v9.0
  var selObj = null;  with (document) { 
  if (getElementById) selObj = getElementById(objId);
  if (selObj) eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0; }
}
//-->
</script>
</head>
 <script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-919812-2");
pageTracker._trackPageview();
} catch(err) {}</script>
      
<body>

<?php
	include('data/db_connect.php');
	$connection=mysql_connect($db_host, $db_username, $db_password);
	if (!$connection) {
  		die("Could not connect to the database: <br/>".mysql_error());
	}
	$db_select=mysql_select_db($db_database);
	if (!$db_select) {
  		die("Could not select to the database: <br/>".mysql_error());
	}
  
?> 


<div id="container">
<?php include("header.php");?>
  <div id="space30"></div>
  <div id="directoryHeader">Agreement For Services with Jubon, LLC</div>		
  <div class="clearfloat"></div>
        
  <div id="description">
    <div id="columnMiddle">

	<div id="contactMiddle">
      <P>Choose the community that displays the billboard that you would like to modify.
<p>
   	      <select name="jumpMenu" id="jumpMenu">
		    <?php
			  $query = "SELECT `name`, `state`, `com_id` FROM `communities` ";
 	 		  $result = mysql_query($query);
	
			  $comm;
	
  			  if ($result) {
				  for ($b=0; $b< mysql_numrows($result); $b++) {
					$com_id = mysql_result($result,$b,"com_id");
					$comm = mysql_result($result,$b,"name");
					$state = mysql_result($result,$b,"state");
					$url = "contractUpdates2.php?comm=".$com_id;
					echo '<option value="'.$url.'"';
					echo '>'.$comm.", ".$state. '</option>'."\n";
				  }
			  }
			  mysql_close($connection)
?>

</select><P>


    
    
	        <label>
	        <input src="img/submit.gif"  name="Submit" value="Submit" type="image" onclick="MM_jumpMenuGo('jumpMenu','parent',0)" />
	        </label>          
    </div> <!-- end columnMiddle -->
           
      </div><!--description-->
      <div class="clearfloat"></div>
<div id="space30"></div> 
<div class="clearfloat"></div>
    <?php include("footer.php");?>
</body>
</html>
