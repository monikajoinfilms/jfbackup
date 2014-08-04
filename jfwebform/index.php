
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Membership | Joinfilms</title>
<!--<style>
table{ background:#6f8bd1; opacity:0.6; border-collapse: collapse}
tr{text-align:center; height:30px;}
input[type='submit']{ background-color:#bd1e2c; color:#fff;}
</style>
-->
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/structure.css">

	<link rel="icon" type="image/png" href="http://localhost/locationBank/JF ICON.png" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
    <script type="text/javascript" src="../locationBank/autoLoad.js"> </script>
    <script src="../locationBank/lib/jquery.js"></script>
	<script src="../locationBank/dist/jquery.validate.js"></script>
	<script>
		$().ready(function() {
		// validate the comment form when it is submitted
		$("#lForm").validate();
		});
    </script>
</head>

<body>
<?php	
    //Load connection Class
	function __autoload($class_name)
	{
		require $class_name.'.php';
		}
	//call connect_db function to make db connection.
	$connectObj = new Connection();
	$connectObj->connect_db();

	//find user address
		$qry_3 = mysql_query("select field_address_testing_glid from field_data_field_address_testing where entity_id=1");
		if(mysql_num_rows($qry_3))
		{
			$res = mysql_fetch_array($qry_3);
			$glid = $res['field_address_testing_glid'];			
			//find address of user
			$query_4 = mysql_query("select * from getlocations_fields where glid=".$glid." ");
			$res = mysql_fetch_array($query_4);
			$address = array(
			                'bill_name' =>    $res['bill_name'],
							'bill_address' => $res['street']." ".$res['additional'],
							'bill_country' => $res['country'],
							'bill_state' =>   $res['province'],
							'bill_city' =>    $res['city'],
							'bill_zip' =>     $res['postal_code'],							
							);
			}
		else
		{
			$address = array(
			                 'bill_name' => 'bill_name',
							'bill_address' => '',
							'bill_country' => '',
							'bill_state' =>   '',
							'bill_city' =>    '',
							'bill_zip' =>     '',							
							);
			
			}
			
						
?>
    
    <form method="post" action="confirm_order.php" id="lForm" class="box login">
      <img src="http://www.joinfilms.com/jfwebform/logo-payment.png" style="position:relative; right:25%; padding-top:5px; " />
      <div style="padding:30px 5px 5px 5px; text-align:justify;">
      	Please fill Information about you regarding payment. Autofill information comes from your account. Please complete your 	
        account detail and profile data for better service.
      </div>
	<fieldset class="boxBody">
    <label>Name</label>
      <input type="text" tabindex="1" name="bill_name" value=" " required>
	  <label>Address</label>
	  <input type="text" tabindex="2" name="billing_cust_address" value=" " required >
      <label>City</label>
      <input type="text" tabindex="3" name="billing_city" value=" " required>
	  <label>State</label>
      <input type="text" tabindex="4" name="billing_cust_state" value=" " required>
	  <label>Zip</label>
      <input type="text" name="billing_zip" value=" " required>
	  <label>Country</label>
      <input type="text" name="billing_cust_country" value="India" required>
	  <label>Mobile</label>
      <input type="text" name="billing_cust_tel" value=" " required>
	  <label>Email</label>
      <input type="email" name="billing_cust_email" value=" " required>
      
	</fieldset>
	<footer>
    <input type="hidden" name="uid" value="<?php print 1; ?>" />
    <input name="fullName" type="hidden" value=" " />
    <input type="hidden" name="amount" value="<?php print 1; ?>" />
    <input type="hidden" name="paymentType" value="<?php print isset($_GET['type']) ? $_GET['type'] : ''; ?>" />
    <input type="submit" value="submit" class="btnLogin" name="confirmOrder" >
	</footer>
	</form>
<footer id="main">
  <a href="http://www.joinfilms.com/aboutus">About Us</a> | 
  <a href="http://www.joinfilms.com/contact">Contact Us</a> | 
  <a href="http://www.joinfilms.com/careers">Career</a> | 
  <a href="http://www.joinfilms.com/disclaimer">Disclaimer</a> | 
  <a href="http://www.joinfilms.com/terms-and-condition">Terms &amp; Conditions</a>
</footer>


</body>
</html>
