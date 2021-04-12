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
	<div id="container">
      	<?php include("header.php");?>
	<div id="directoryHeader">Unsubscribe to Email Notifications</div>		

        <div class="clearfloat"></div>
        
        <div id="description">
           <div id="columnLeft">
	  <div id="contact">
	    <p><form id="form1" name="form1" method="post" action="Scripts/mailto_unsubscribe.pl">
	        <p><label>Email Address:
	        <input name="EMAIL" type="text" id="EMAIL" />
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
             <p>To unsubscribe to our email notification lists, enter your email address to the left. </p>
             <p>Note: you must enter the same email address that you used to subscribe to this service initially.</p>
           </div>
      </div><!--description-->
    </div><!--container-->
    <?php include("footer.php");?>
</body>
</html>
