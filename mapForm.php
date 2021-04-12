<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jubon.biz</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/mapForm.css" />

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
<body>
	<div id="container">
	<div class="clearfloat"></div>
	<div id="space40"></div>		

	<div id="directoryHeader">Map Form</div>		
		
    	    <form id="form1" name="form1" method="post" action="Scripts/mailto_notifications.pl">
	    <div class="row">
         	<label>Community:<input name="COMM" id="COMM"/></label>
         </div>
         <p>
        	<input type="radio" value="H_" name="L1" />horizontal
        	<input type="radio" value="V_" name="L1" />vertical
        	<input type="radio" value="A_" name="L1" />angle<br/>
         	<label>Name:<input name="NAME" id="NAME"/></label>
         	<label>X &#8594;:<input name="XMULT" id="XMULT"/></label>
         	<label>Y &#8595;:<input name="YMULT" id="YMULT"/></label>
         	<label>Blocks:<input name="BLOCKS" id="BLOCKS"/></label>
         	<label>Angle:<input name="ANGLE" id="ANGLE"/></label>
         	<label>ID:<input name="ID" id="ID"/></label>
        </p>
        <p>
         	<label>Name:<input name="NAME" id="NAME"/></label>
         	<label>X &#8594;:<input name="XMULT" id="XMULT"/></label>
         	<label>Y &#8595;:<input name="YMULT" id="YMULT"/></label>
         	<label>Blocks:<input name="BLOCKS" id="BLOCKS"/></label>
         	<label>ID:<input name="ID" id="ID"/></label>
         </p>
         </div>
   </form>
   <div id="space40"></div>
    <?php include("footer.php");?>
</div> <!-- end container -->
</html>
