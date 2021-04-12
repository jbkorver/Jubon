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

$ac = ' ';
if (isset($_GET['ac']))
	$ac = $_GET['ac'];

$em = ' ';
if (isset($_GET['em']))
	$em = $_GET['em'];
$bb = '';
if (isset($_GET['bb']))
	$bb = $_GET['bb'];
$ph = '';
if (isset($_GET['ph']))
	$ph = $_GET['ph'];
$bus = '';
if (isset($_GET['bus']))
	$bus = $_GET['bus'];
$com = '';
if (isset($_GET['com']))
	$com = $_GET['com'];
$cat1 = '';
if (isset($_GET['cat1']))
	$cat1 = $_GET['cat1'];
$cat2 = '';
if (isset($_GET['cat2']))
	$cat2 = $_GET['cat2'];
$cat3 = '';
if (isset($_GET['cat3']))
	$cat3 = $_GET['cat3'];
$cat4 = '';
if (isset($_GET['cat4']))
	$cat4 = $_GET['cat4'];
$name = '';
if (isset($_GET['name']))
	$name = $_GET['name'];
$add1 = '';
if (isset($_GET['add1']))
	$add1 = $_GET['add1'];
$add2 = '';
if (isset($_GET['add2']))
	$add2 = $_GET['add2'];
$city = '';
if (isset($_GET['city']))
	$city = $_GET['city'];
$st = '';
if (isset($_GET['st']))
	$st = $_GET['st'];
$zip = '';
if (isset($_GET['zip']))
	$zip = $_GET['zip'];

?> 


<div id="container">
<?php include("header.php");?>
  <div id="space30"></div>
  <div id="directoryHeader">Agreement For Services with Jubon, LLC ("Jubon" or "we" or "us")</div>		
  <div class="clearfloat"></div>
        
  <div id="description">
    <div id="columnMiddle">
    
    
<?php 
	if ($ac == "no") { ?>
    
		<p style="color:#FF0000">** You must click "Accept" at the bottom of the form before you can submit this document. ** </p>

<?php 
	}
?>
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

    
    
	  <p>We are pleased that you (or your "Business") has decided to be a part of the section of Jubon's website which relates to <?=$city?>, <?=$state?> (as amended and updated from time to time, the "City Section").  This will set out the agreement between you and Jubon.  </p>
      <p>Jubon's website is located at www.jubon.biz (as amended and updated from time to time, the "Website").  The City Section is based upon the streets, landmarks and other geographical layout of <?=$city ?>, <?=$state?> (the "City") and the locations of businesses within the City and possibly the general surrounding area. </p>
      <p>Jubon may update and modify any or all of the Website and/or the City Section as Jubon may from time to time determine to be necessary or appropriate.  The functions that will be available within the City Section for businesses that have an agreement with Jubon will, however, always include (i) a pop-up window (billboard) that will appear when a user of the City Section clicks on the location of that business as depicted in the City Section or when the car or other type of vehicle or Jubon mark which is included within the City Section is parked in front of the location of the business as depicted in the City Section, and (ii) a means for users of the City Section to search for businesses included in the City Section based on various categories or types of businesses.  The information that will appear in your billboard, the categories that you will be listed under in the City Section and the address at which your business will be depicted in the street layout within the City Section are each set out in Section A of this form.  Your billboard will be available in the City Section within 7 days of the date you provide us with the information you want displayed on your billboard.</p>
      <p>The City Section may also include the functions Jubon determines to be necessary in order for users of the City Section to be able to locate, obtain or otherwise take advantage of any incentive to utilize the businesses listed in the City Section as Jubon may from time to time determine to include within the City Section</p>
      <p>Section C sets out our current fees and any required reimbursements of our costs and expenses for the various services which are available through Jubon (collectively, the "Services").  Once you submit this form, you will recieve a confirmation email that will give you a link to Section C. It is not necessary for you to continue on to Section C. If you do not, then we will proceed with the minimal fee of $10/month for a billboard only. If you want additional services, you can return to Section C or you can contact your Administrator. Some of the Services may be provided by third parties which are selected by us (collectively, the "Other Service Providers"). We may change any of the fees or required reimbursements set out in Section C or add additional fees or required reimbursements by giving you at least 45 days advance notice.  The notice may be in the form of a new Section C that you will be notified of by email or by your Administrator.</p>
      <p>All of the fees and other amounts payable by you will be billed monthly, on or around the first business day of each month, and must be paid by you within 15 days of the date of the billing notice or invoice.  We may use a third party for billing any or all of those fees and amounts, and in that case you are authorized to make your payments to that third party.  You may prepay any or all your fees and other amounts if you elect to do so, but in that case there will not be any refund of those fees or amounts if this agreement is terminated by you or us.  All monthly fees shall be prorated on a day-to-day basis for any period of time which is less than a full calendar month.</p>
      <p>The term of this agreement will commence on the date you accept this agreement and will continue until it is terminated in accordance with one of the following two sentences.  This agreement may be terminated by you or by us, for any reason or no reason, effective as of a date which is not less than 30 days after giving written notice thereof to the other, but any termination of this agreement pursuant to this sentence must in all events be effective on the last day of a calendar month.  This agreement may also be terminated by you or by us, as the case may be, in the event of a breach of this agreement by the other and the breach is not cured within five days following the giving of written notice of the breach by the nonbreaching party.  All fees or other amounts payable by you will be payable through the effective date of the termination of this agreement, but will be prorated on a day-to-day basis for any monthly or other periodic fee or amount.  The termination of this agreement will not affect any liability of either you or us which accrues prior to termination, including any liability for any breach of this agreement.</p>
      <p>If your administrator deems it so, you must maintain a membership in the Chamber of Commerce for the City throughout the entire term of this agreement.</p>
      <p>Your agreement with us also includes the terms set out in Section C that will be made available to you after you submit this form.</p>
      <p>Any notice required or desired to be given under this agreement may be given by (i) hand delivery to the address for notices; (ii) overnight courier service to the address for notices; (iii) sending the notice by U.S. mail to the address for notices; or (iv) by fax or email.  A notice shall be addressed and given to the addresses, fax numbers or email addresses set forth below the signatures to this agreement or to such other address, fax number or email address as you or Jubon may by notice designate to the other.</p>
      <p>Any notice required or desired to be given under this agreement may be given by (i) hand delivery to the address for notices; (ii) overnight courier service to the address for notices; (iii) sending the notice by U.S. mail to the address for notices; or (iv) by fax or email.  A notice shall be addressed and given to the addresses, fax numbers or email addresses set forth below the signatures to this agreement or to such other address, fax number or email address as you or Jubon may by notice designate to the other.</p>
      <p>If this agreement correctly sets out the agreement between you and us, please fill out the following information and check the ACCEPTANCE 	box below. </p>
      <p>Thank you, and we look forward to working with you.</p>
      <p>JUBON, LLC</p>
      
      
      
      <p>SECTION A</p>	  	
      <p><em><strong>These terms are part of each agreement of Jubon to provide any Services.</strong></em></p>

      <p><ol><li>You acknowledge that: (i) the Website will not be exclusive to you or the City, and the Website may include sections related to other businesses, cities, chambers of commerce or similar organizations; (ii) a business will only be included in the City Section if the business has an agreement with Jubon; (iii) the fees and other amounts payable by you may not be the same as those payable by other businesses, and the Incentive Program may not be the same as the incentive program which is in place with respect to other businesses or cities; (iv) the use of the City Section and the Website will be subject to the terms of use and other guidelines and requirements as are established by Jubon from time to time; (v) Jubon may reference and list you as a client of Jubon in any advertising or promotional meetings or materials of Jubon.  You also acknowledge that the City Section and the Website will provide links to other websites, including of various businesses.  Jubon is not responsible or liable to you or anyone else for the content or materials contained in any linked website or in any link contained in a linked website or for any acts or omissions of any businesses listed in the Website or any owners or operators of any linked websites.  Jubon is not responsible for the availability of your or any other linked website and Jubon does not sponsor, endorse or recommend any linked websites or any products or services that may be offered at or through any linked websites.  Jubon is also not responsible or liable to you or anyone else for any acts or omissions of any users of the City Section or the Website.</li>
      <li>Neither you nor Jubon make any express warranties to the other, and both you and Jubon hereby exclude and disclaim in entirety all implied warranties (including any implied warranties of merchantability, fitness for a particular purpose, title or non-infringement), with respect to the City Section, the Website, the Services and all other matters whatsoever.</li>
      <li>Any payment by you which is not made when due shall bear interest commencing from the date which is 15 days after the date the payment was due until the payment is made at the rate of 1.5% per month, or, if less, the maximum rate allowed by law.</li>
      <li>You or Jubon, as the case may be, shall be entitled to recover all attorneys' fees and costs and all court costs incurred by them in connection with the enforcement of this agreement against the other or otherwise in connection with any breach of any term of this agreement by the other.</li>
      <li>Jubon will not be liable or responsible for any delay or failure to perform under this agreement if the delay or failure occurred because of any circumstance or occurrence beyond the control of Jubon, including acts of God, computer failures, labor issues or delays or failures by any other person.</li>
      <li>You shall defend, indemnify and hold Jubon and the Other Service Providers harmless from and against any losses, damages, costs, expenses or other amounts (including attorneys' fees and court costs) which are incurred by Jubon or any Other Service Provider and which in any way arise from or are related to or connected with your breach of this agreement or any information you provide to Jubon or any Other Service Provider which is included or used in the City Section or the Website.</li>
      <li>This agreement is governed by and shall be construed in accordance with the laws of the State of Iowa.</li>
      <li>Except only as otherwise provided in this agreement with respect to Jubon, this agreement can only be amended or waived in a writing executed by you and Jubon.</li>
      <li>This agreement constitutes the entire agreement between you and Jubon, and all Services are provided by Jubon solely upon the terms and conditions set forth in this agreement.  Jubon objects to any terms or conditions set forth in any documents or other correspondence you may provide to Jubon, and no additional or different terms shall be a part of this agreement or shall have any force or effect whatsoever.  This agreement shall not be construed more strongly against you or Jubon, regardless of who was more responsible for its preparation.</li>
      <li>Nothing in this agreement and no action taken or failed to be taken by Jubon or you pursuant to this agreement will constitute Jubon and you a partnership, an association, a joint venture or other entity.</li>
      <li>This agreement shall be binding upon and shall inure to the benefit of you and Jubon and your and Jubon's respective successors and assigns.</li>
      <li><em><strong>You and Jubon waive any right to a jury trial with respect to and in any action, proceeding, claim, counterclaim, demand or other matter whatsoever arising out of or in any way related to or connected with this agreement.  Any action or proceeding arising out of or in any way related to or connected with this agreement may be brought in any court sitting anywhere in Sioux County, Iowa.</strong></em></li>
      </ol>
      
      

      
      
      
      
      <div id="contactMiddle">
    <form id="form1" name="form1" method="post" action="Scripts/sendContract.php">
      <p>SECTION B</p>
      <p>BILLBOARD INFORMATION, LIST OF CATEGORIES AND ADDRESS</p>
	    <p><label><strong>Billboard Information:</strong><br/> 
	    (Optional.  Can be provided to your administrator later.)</label>
	      <br/>
          <textarea name="BILLBOARD" rows="6" cols="37" id="BILLBOARD"><?php echo $bb ?></textarea></p>
	        <p> <label>Select up to 4 categories you would like your business to be listed under: <br/>
			<select name="category_1">   
            	<option>Choose a Category</option>         
<?php
			
			$query = "SELECT `name` FROM `categories` ORDER BY `name` ASC";
			$result = mysql_query($query);
			
			if ($result) {
			  for ($b=0; $b< mysql_numrows($result); $b++) {
				$cat = mysql_result($result,$b,"name");
				echo '<option value="'.$cat.'"';
				if ($cat1 == $cat) echo 'selected="selected"';
				echo '>'.$cat. '</option>'."\n";
			  }
			}
?>
            
            </select>  </label></p>          
			<p><select name="category_2">            
            	<option>Choose a Category</option>         
<?php		if ($result) {
			  for ($b=0; $b< mysql_numrows($result); $b++) {
				$cat = mysql_result($result,$b,"name");
				echo '<option value="'.$cat.'"';
				if ($cat2 == $cat) echo 'selected="selected"';
				echo ' >'.$cat. '</option>'."\n";
			  }
			}
?>
		   </select>  </p>          
 
 			<p><select name="category_3">            
            	<option>Choose a Category</option>         
<?php		if ($result) {
			  for ($b=0; $b< mysql_numrows($result); $b++) {
				$cat = mysql_result($result,$b,"name");
				echo '<option value="'.$cat.'"';
				if ($cat3 == $cat) echo 'selected="selected"';
				echo '>'.$cat. '</option>'."\n";
			  }
			}
?>
		   </select>  </p>          
			<p><select name="category_4">            
            	<option>Choose a Category</option>         
<?php		if ($result) {
			  for ($b=0; $b< mysql_numrows($result); $b++) {
				$cat = mysql_result($result,$b,"name");
				echo '<option value="'.$cat.'"';
				if ($cat4 == $cat) echo 'selected="selected"';
				echo '>'.$cat. '</option>'."\n";
			  }
			}
?>
		   </select>  </p>          
           
            
<?php mysql_close($connection); ?>          
          
	      <p><label>Business Name:<input name="BUSNAME" type="text" id="BUSNAME" value="<?php echo $bus ?>"/></label></p>
	      <p><label>Name:<input name="NAME" type="text" id="NAME" value="<?php echo $name ?>"/></label></p>
		  <p><label>Address:<input name="ADDRESS1" type="text" id="ADDRESS1" value="<?php echo $add1 ?>"/></label></p>
		  <p><label>Address:<input name="ADDRESS2" type="text" id="ADDRESS2" value="<?php echo $add2 ?>"/></label></p>
		  <p><label>City:<input name="CITY" type="text" id="CITY" value="<?php echo $city ?>"/></label></p>
		  <p><label>State:<input name="STATE" type="text" id="STATE" <?php echo $st ?>/></label></p>
		  <p><label>Zip:<input name="ZIP" type="text" id="ZIP"  value="<?php echo $zip ?>"/></label></p>
		  <p><label>Phone:<input name="PHONE" type="text" id="PHONE" value="<?php echo $ph ?>"/></label></p>
		  <p><label>Email:<input name="EMAIL" type="text" id="EMAIL" /></label></p>
          <p><label>Verify Email Address:<input name="EMAIL2" type="text" id="EMAIL2" /></label></p>
          <p> <label><strong>Check to accept this agreement with Jubon.</strong>
            <input type="checkbox" id="ACCEPT" name="ACCEPT" /></label>
            </p>


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
