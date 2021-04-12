<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<title>Jubon.biz</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/jubon.css" />
</head>
 <script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-919812-2");
pageTracker._trackPageview();
} catch(err) {}
</script>
 
<?php
	include('data/db_connect.php');

$em = ' ';
if (isset($_GET['em']))
	$em = $_GET['em'];
?> 
 
 
      
<body>
	<div id="container">
      	<?php include("header.php");?>
        
        <div id="columnMiddle">
<?php 
	if ($em == "mis") { ?>
    
		<p style="color:#FF0000">** You must enter the same email address in the fields, "Email" and "Verify Email Address".  ** </p>

<?php 
	}
?>
<?php 
	if ($em == "no") { ?>
    
		<p style="color:#FF0000">** The email address you entered is not valid.  ** </p>

<?php 
	}
?>
        </div><!-- end columnMiddle-->
     <div class="clearfloat"></div>   
    <div id="space30"></div>
        
	<div id="directoryHeader">Email Notifications</div>		

        <div class="clearfloat"></div>
        
        <div id="description">
           <div id="columnLeft">
	  <div id="contact">
	    <p><form id="form1" name="form1" method="post" action="Scripts/sendNotices.php">
	        <p><label>Email Address:
	        <input name="EMAIL" type="text" id="EMAIL" />
	        </label>
	        <p><label>Verify Email Address:
	        <input name="EMAIL2" type="text" id="EMAIL2" />
	        </label>
	        <p><label>Name (optional):
	        <input name="NAME" type="text" id="NAME" />
	        </label>
		    <p><label>Select all the items below for which you <br/>would like to receive an email notification:</label>
	        <p> <label>The Jubon Journal (monthly newsletter):
            <input type="checkbox" id="JOURNAL" name="JOURNAL"/>
            </label>
	        <p> <label>New Joupon (community coupon):
            <input type="checkbox" name="JOUPON"/>
            </label>
	        <p> <label>New Community:
            <input type="checkbox" id="NEWCOMMUNITY" name="NEWCOMMUNITY"/>
            </label>
	        <p> <label>New Business:
            <input type="checkbox" id="NEWBUSINESS" name="NEWBUSINESS" />
            </label>
            <p>
            <label>If you checked "New Business" above, choose the community below that you would like to follow"
            <select id="NEWCOMMUNITYTOFOLLOW" name="NEWCOMMUNITYTOFOLLOW">
            	<option >select a community</option>

<?php
$query = "SELECT `name`, `state` FROM `communities` ";
$result = mysql_query($query);

if ($result) {
  for ($b=0; $b< mysql_numrows($result); $b++) {
	$comm = mysql_result($result,$b,"name");
	$state = mysql_result($result,$b,"state");
	echo '<option value="'.$comm.", ".$state.'"';
	echo '>'.$comm.", ".$state. '</option>'."\n";
  }
}

?>





            	<option value="All Communities">All Jubon Communities</option>
            </select>
	        </label>
	        <p> <label>New Coupon:
            <input type="checkbox" id="NEWCOUPON" name="NEWCOUPON"/>
            </label>
            <p>
            <label>If you checked "New Coupons" above, choose the community below that you would like to follow"
            <select id="NEWCOUPONTOFOLLOW" name="NEWCOUPONTOFOLLOW">
            	<option >select a community</option>



<?php
$query = "SELECT `name`, `state` FROM `communities` ";
$result = mysql_query($query);

if ($result) {
  for ($b=0; $b< mysql_numrows($result); $b++) {
	$comm = mysql_result($result,$b,"name");
	$state = mysql_result($result,$b,"state");
	echo '<option value="'.$comm.", ".$state.'"';
	echo '>'.$comm.", ".$state. '</option>'."\n";
  }
}

?>



            	<option value="All Communities">All Jubon Communities</option>
            </select>
	        </label>
	        <p> <label>New Features:
            <input type="checkbox" id="NEWFEATURES" name="NEWFEATURES"/>
            </label>
	        <p> <label>Jubon Tips &amp; Tricks:
            <input type="checkbox" id="TIPS" name="TIPS" />
            </label>
	        <p>
	        <label>
	        <input src="img/submit.gif"  name="Submit" value="Submit" type="image" />
	        </label>
            </form>
	  	</p>
	  </div>
           </div>
           <div id="columnRight">
             <p>Email notifications are a great way to stay informed about Jubon.  You can choose to be notified about one or all of the items listed to the left. </p>
             <p>We do not sell or give away  your email information, we use it strictly for the purpose of keeping  you informed. Each email you receive will contain a link to remove your  email should you decide to unsubscribe.</p>
             <p>To subscribe, simpy fill in the information to the left and click subscribe. You will receive a confirmation link shortly via email.</p>
             <p>Thank you for your interest in Jubon.</p>
           </div>
      </div><!--description-->
    </div><!--container-->
    <?php include("footer.php");?>
</body>
</html>
