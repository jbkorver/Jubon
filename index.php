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

<?php
$date = date('jhis');

?>    
      
<body>
	<div id="container">
    	<div id="header">
        	<ul>
           	  <li><a href="about.php">About</a></li>  
            	<!--li><a href="coupons.php">Coupons</a></li>  | -->
            	<!--li><a href="joupons/index.php">Joupons</a></li>  |
            	<li><a href="notices.php">Notifications</a></li>  | -->
            	<!--li><a href="Journal/index.php">Journal</a></li>  |
            	<li><a href="contact.php">Contact</a></li-->  <!--&nbsp;|&nbsp;
              <li><a href="help.php">Help</a></li-->
          </ul>
        </div><!--header-->
        <div class="clearfloat"></div>
        <div id="cityChooser">
       	  <h3>Choose your city:</h3>
            
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
        </div><!--cityChooser-->
        <div id="logoBig">
        </div><!--logoBig-->
        
        <div class="clearfloat"></div>
        <div class="title">
        	Creating an online presence to promote growth and exposure for small communities.
    </div><!--title-->
    </div><!--container-->
    <?php include("footer.php");?>
</body>
</html>
