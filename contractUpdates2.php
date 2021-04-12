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

$comm = 10;
if (isset($_GET['comm']))
	$comm = $_GET['comm'];
$em = '';
if (isset($_GET['em']))
	$em = $_GET['em'];
$bus = '';
if (isset($_GET['bus']))
	$bus = $_GET['bus'];
?> 
 


<div id="container">
<?php include("header.php");?>
        <div id="columnMiddle">
<?php 
	if ($em == "mis") { ?>
		<p style="color:#FF0000">** You must enter the same email address in the fields, "Email" and "Verify Email Address".  ** </p>
<?php 
	}
	if ($em == "no") { ?>
		<p style="color:#FF0000">** The email address you entered is not valid.  ** </p>
<?php 
	}
	if ($bus == "no") { ?>
		<p style="color:#FF0000">** You must select your business from the list before you can submit this form.  ** </p>
<?php 
	}
?>
        </div><!-- end columnMiddle-->
     <div class="clearfloat"></div>   

  <div id="space30"></div>
  <div id="directoryHeader">Agreement For Services with Jubon, LLC</div>		
  <div class="clearfloat"></div>
        
  <div id="description">
    <div id="columnMiddle">

      <p>SECTION C</p>
      <p>LIST OF FEES AND REQUIRED REIMBURSEMENTS OF JUBON COSTS AND EXPENSES</p>
      <P>Check each service you would like to receive from Jubon.  Either your administrator or a Jubon representative will contact you regarding your submission.</P>

      <div id="contactMiddle">
    <form id="form1" name="form1" method="post" action="Scripts/sendContractUpdates.php">
    	<input type="hidden" name="COMMUNITY" value="<?=$comm?>">
	    <p><label>Name:<input name="NAME" type="text"/></label></p>
		<p><label>Phone:<input name="PHONE" type="text"/></label></p>
		<p><label>Email:<input name="EMAIL" type="text"/></label></p>
	        <p><label>Verify Email Address:
	        <input name="EMAIL2" type="text" />
	        </label></p>
      
      

	        <p> <label>Select your business from the list:
				<select name="BUSINESS">    
                <option value="select">select</option>
       
<?php
			
$query = "SELECT `name` FROM `businesses` WHERE `com_id` = ".$comm. " ORDER BY `name` ASC";
$result = mysql_query($query);

if ($result) {
  for ($b=0; $b< mysql_numrows($result); $b++) {
	$business = mysql_result($result,$b,"name");
	echo '<option value="'.$business.'"';
	echo '>'.$business. '</option>'."\n";
  }
}
mysql_close($connection)
?>
            
            </select>  </label></p>          
      &nbsp;<br/>
      
      
          <p> <label><strong>1. Basic Services:</strong> to be included in the City Section, consisting of a billboard which will include a link to your website, inclusion in the quick find section, and inclusion in the city directory.  (Cost $10.00 per month):
            <input type="checkbox" name="BASIC" /></label></p>
          <p> <label><strong>2. Use a Different Icon:</strong> You can request the use of something other than the standard icon provided by Jubon such as your own logo.<br/>
          Additional $2 per month for icon upto 12x12 pixels.
            <input type="checkbox" name="diffIconSm" /><br/>
          Additional $4 per month for icons upto 20x20 pixels.
            <input type="checkbox" name="diffIconLg" /><br/></label>
         <i><strong>Note:</strong> if you do not supply the icon, and Jubon needs to create it, there will be a $50.00 per hour design fee with a minimum charge of $12.50.</i></p>
          <p> <label><strong>3. Website:</strong> Design and creation of a website and or blog.  $200 design fee for creating the first page and $100 for each additional page after that.<br/>
			Yes I'm interested in a website: <input type="checkbox" name="WEBSITE" /></label></p>
          <p> <label><strong>4. Website Hosting:</strong> If you want a website created, you need to have that site hosted.  Jubon can host your site for you for $10 per month.
			<input type="checkbox" name="HOSTING" /></label></p>
          <p> <label><strong>5. Domain Name:</strong> If your website is hosted by Jubon and if you want a specialized domain (URL, or the address by which your website is accessed), there is an additional $2 per month.
			<input type="checkbox" name="DOMAIN" /></label></p>
          <p> <label><strong>6. Billboard Modifications:</strong> Changes to your billboard or to any other information which are agreed to by Jubon will result in a $50 per hour charge with a minimum $12.50 charge.</label></p>
	        <p>
	        <label>
	        <input src="img/submit.gif"  name="Submit" value="Submit" type="image" />
	        </label>          
</form>
    </div> <!-- end columnMiddle -->
           
      </div><!--description-->
      <div class="clearfloat"></div>
<div id="space30"></div> 
<div class="clearfloat"></div>
    <?php include("footer.php");?>
</body>
</html>
