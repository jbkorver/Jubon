<?php
include('helper.inc.php');

$op = "";
if (isset($_REQUEST['op'])) $op = $_REQUEST['op'];

$mold = "";
if (isset($_REQUEST['mold'])) $mold = $_REQUEST['mold'];

$weight = "";
if (isset($_REQUEST['weight'])) $weight = $_REQUEST['weight'];

$color = "";
if (isset($_REQUEST['color'])) $color = $_REQUEST['color'];

$hotstamp = "";
if (isset($_REQUEST['hotstamp'])) $hotstamp = $_REQUEST['hotstamp'];

$manufacturer = "";
if (isset($_REQUEST['manufacturer'])) $manufacturer = $_REQUEST['manufacturer'];

$plastic = "";
if (isset($_REQUEST['plastic'])) $plastic = $_REQUEST['plastic'];

$keywords = "";
if (isset($_REQUEST['keywords'])) $keywords = $_REQUEST['keywords'];

$minPrice = "";
if (isset($_REQUEST['minPrice'])) $minPrice = $_REQUEST['minPrice'];

$expPrice = "";
if (isset($_REQUEST['expPrice'])) $expPrice = $_REQUEST['expPrice'];

$new = "";
if (isset($_REQUEST['new'])) $new = $_REQUEST['new'];

$used = "";
if (isset($_REQUEST['used'])) $expPrice = $_REQUEST['used'];

$condition = "";
if (isset($_REQUEST['condition'])) $condition = $_REQUEST['condition'];

echo("testop=".$op." mold=".$mold." weight=".$weight." color=".$color." hotstamp=".$hotstamp." manufacturer=".$manufacturer." plastic=".$plastic." keywords=".$keywords);
echo(" minimum=".$minPrice." expected=".$expPrice." condition=".$condition." new=".$new." used=".$used);
echo("<br/>");

if ($op == "new") {
	doAddDisc($mold, $weight, $color, $hotstamp, $manufacturer, $plastic, $keywords, $minPrice, $expPrice);

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add a Disc</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />
</head>

<body><div id="container">
<form action="?">
	<input type="hidden" name="op" value="new"/>	<fieldset>
		<legend>Add a Disc</legend>
		<div><label for="mold">Mold</label> <input id="mold" name="mold" value="<?=$mold?>"></div>
		<div><label for="weight">Weight (in grams)</label> <input id="weight" name="weight" value="<?=$weight?>"></div>
		<div><label for="color">Color</label> <input id="color" name="color" value="<?=$color?>"></div>
		<div><label for="hotstamp">Hotstamp</label> <input id="hotstamp" name="hotstamp" value="<?=$hotstamp?>"></div>
		<div><label for="manufacturer">Manufacturer</label> <input id="manufacturer" name="manufacturer" value="<?=$manufacturer?>"></div>
		<div><label for="plastic">Plastic</label> <input id="plastic" name="plastic" value="<?=$plastic?>"></div>
		<div><label for="keywords">Keywords</label> <input id="keywords" name="keywords" value="<?=$keywords?>"></div>
		<div><label for="minPrice">Minimum Price</label> <input id="minPrice" name="minPrice" value="<?=$minPrice?>"></div>
		<div><label for="expPrice">Expected Price</label> <input id="expPrice" name="expPrice" value="<?=$expPrice?>"></div>
		
		<div><label for="condition">Codition</label>	
		<fieldset class="radio">
			<ul>
				<li><input type="radio" id="new" name="condition"> <label for="new">New</label></li>
				<li><input type="radio" id="used" name="condition"> <label for="used">Used</label></li>
			</ul>
		</fieldset>
		</div>

        <div><label>&nbsp;</label><input type="submit" value="Add Disc" id="addDiscButton"/></div>
		
	</fieldset>
</form>


    <form action="upload.php" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend>Add an Image</legend>
	
		<input type="file" name="filename" size="50" onchange="doEnableUpload();"/><br/><br/>
        <input type="hidden" value="<?=$userid?>" id="userid" name="userid" />
        <input type="hidden" value="<?=$discid?>" id="discid" name="discid" />
        <input type="submit" value="Upload" id="uploadButton" disabled/>
</fieldset>
    </form>


</html>
