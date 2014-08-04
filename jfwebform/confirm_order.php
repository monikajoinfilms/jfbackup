<?php
	
	//Load connection Class
	function __autoload($class_name)
	{
		require $class_name.'.php';
		}
	//call connect_db function to make db connection.
	$connectObj = new Connection();
	$connectObj->connect_db();
	
	//Find user detail from db
	$query = "select * from users where uid=".$_POST['uid']."";
	$fireQuery = mysql_query($query);
	if(mysql_num_rows($fireQuery))
	{
		$fetchResult = mysql_fetch_array($fireQuery);
		$user_data = array(
						'uid' =>  $fetchResult['uid'], 
						'bill_email' => $_POST['billing_cust_email'] !='' ? $_POST['billing_cust_email'] : $fetchResult['mail'],
						'pass' => $fetchResult['pass'],
						);
		
		
		
		//find last name
		$query_2 = "select field_first_name_value from field_data_field_first_name where bundle='user'
					and entity_id=".$user_data['uid']."";
		//echo "<br />";
		$query_2 = mysql_query($query_2);
		$res = mysql_fetch_array($query_2);
		//$firstName = $res['field_first_name_value'];
		//echo "<br />";
		
		//find last name
		$query_2 = mysql_query("select field_last_name_value from field_data_field_last_name where bundle='user'
					and entity_id=".$user_data['uid']."");
		$res = mysql_fetch_array($query_2);
		//$lastName = $res['field_last_name_value'];
		//$lastName = $res['field_last_name_value'];				
		//echo "<br />";
		
		
		//check form value
		if(isset($_POST['confirmOrder']))
		{
			$address = array(
					'bill_name' => $_POST['bill_name'],
					'bill_address' => $_POST['billing_cust_address'],
					'bill_country' => $_POST['billing_cust_country'],
					'bill_state' =>   $_POST['billing_cust_state'],
					'bill_city' =>    $_POST['billing_city'],
					'bill_zip' =>     $_POST['billing_zip'],							
					);		
			}

		
		$data['Merchant_Id'] = 'M_av.29043_29043';
		
		//find tax
		function getTax($pack)
		{
			$tax = ($pack*12.36)/100;
			$totalAmount = round($tax, 2) + $pack;
			return $totalAmount;
			}
		switch($_POST['amount'])
		{
			case 300:	$data['amount'] = 300;
						$tax = getTax($data['amount']);
						$data['amount'] = $tax;
						$data['expireDate'] = date('Y-m-d', strtotime('+1 month'));
						$data['category'] = "SMS 1 Month";
						$data['service'] = "SMS";
						break;
			case 1200:	$data['amount'] = 1200;
						$tax = getTax($data['amount']);
						$data['amount'] = $tax;
						$data['expireDate'] = date('Y-m-d', strtotime('+6 month'));
						$data['category'] = "SMS 6 Month";
						$data['service'] = "SMS";						
						break;
			case 1980:  $data['amount'] = 1980;
					    $tax = getTax($data['amount']);
					    $data['amount'] = $tax;
					    $data['expireDate'] = date('Y-m-d', strtotime('+1 year'));
						$data['category'] = "SMS 1 year";
						$data['service'] = "SMS";
						break;
			case 4000:  $data['amount'] = 4000;
					    $tax = getTax($data['amount']);
					    $data['amount'] = $tax;
					    $data['expireDate'] = date('Y-m-d', strtotime('+1 year'));
						$data['category'] = $_POST['type'];
						$data['service'] = "Platinum";
						break;
			case 5000:  $data['amount'] = 5000;
					    $tax = getTax($data['amount']);
					    $data['amount'] = $tax;
					    $data['expireDate'] = date('Y-m-d', strtotime('+2 year'));
						$data['category'] = $_POST['type'];
						$data['service'] = "Platinum";
						break;
			case 2500:  $data['amount'] = 2500;
					    $tax = getTax($data['amount']);
					    $data['amount'] = $tax;
					    $data['expireDate'] = date('Y-m-d', strtotime('+1 year'));
						$data['category'] = $_POST['type'];
						$data['service'] = "Gold";
						break;
			case 3500:  $data['amount'] = 3500;
					    $tax = getTax($data['amount']);
					    $data['amount'] = $tax;
					    $data['expireDate'] = date('Y-m-d', strtotime('+2 year'));
						$data['category'] = $_POST['type'];
						$data['service'] = "Gold";
						break;
			case 1: $data['amount'] = 1;
					$data['expireDate'] = date('Y-m-d', strtotime('+2 year'));
					$data['category'] = $_POST['type'];
					$data['service'] = "Gold";
			
			}

		//print 
	 $query = "insert into membership (amount, bill_name, bill_address, bill_country, bill_state, bill_city, 
					bill_zip, bill_mobile, bill_email, delivery_note, uid, activeDate, endDate) values(
					".$data['amount'].",'
					".$address['bill_name']."','
					".$address['bill_address']."','
					".$address['bill_country']."','
					".$address['bill_state']."','
					".$address['bill_city']."',
					".$address['bill_zip'].",'
					".$_POST['billing_cust_tel']."','
					".$user_data['bill_email']."',
					'joinfilms membership',
					".$user_data['uid'].",'
					".date('Y-m-d')."','
					".$data['expireDate']."')";
					
		mysql_query($query);
		
		//echo "<br />";
		$query = "select max(order_id) as order_id from membership";
		$res = mysql_query($query);
		$res = mysql_fetch_array($res);
		$data['order_id'] = $res['order_id'];
		
		$query = "insert into service_payment(uid, order_id, service, category) 
				  values(
				  ".$user_data['uid'].",
				  ".$data['order_id'].",'
				  ".$data['service']."','
				  ".$data['category']."')";
		mysql_query($query);
	
		
		
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			// More headers
			$headers .= 'From: <info@joinfilms.com>' . "\r\n";
			//$headers .= 'Cc: joinfilms@gmail.com,joinfilmscustomercare@gmail.com, monika.joinfilms@gmail.com,joinfilms.wd03@gmail.com' . "\r\n";
			$headers .= 'Cc: monika.joinfilms@gmail.com , joinfilms@gmail.com' . "\r\n";
			//$to = "yardley.joinfilms@gmail.com";
			 $to = "joinfilms.wd03@gmail.com";
			$subject = "Payment attempt ";
			$message = "Dear </br>
		
		This is testing message One member is trying to get membership.
		Find information about users which is given below 
		User Name :".$address['name']."<br />
        User Contact Numbers:".$_POST['billing_cust_tel']."<br />
 		User Email:".$user_data['bill_email']."<br />
		Amount :".$data['amount']."<br />
		
		Thanks and Regards,
		Joinfilms Team";
		// msg value define on email.php file
			mail($to,$subject,$message,$headers);
		//include("msgsend.php");                                                                               //Edit by preety singh date 26 jun 2014 //
		//checkout page code
		include('adler32.php');
		include('Aes.php');
		
		error_reporting(0);
		$merchant_id=$data['Merchant_Id'];  // Merchant id(also User_Id) 
		$amount=$data['amount'];            // your script should substitute the amount here in the quotes provided here
		$order_id=$data['order_id'];        //your script should substitute the order 
		$url='http://www.joinfilms.com/jfwebform/redirecturl.php';         //your redirect URL
		$billing_cust_name= $address['bill_name'];
		$billing_cust_address=$address['bill_address'];
		$billing_cust_country=$address['bill_country'];
		$billing_cust_state=$address['bill_state'];
		$billing_city=$address['bill_city'];
		$billing_zip=$address['bill_zip'];
		$billing_cust_tel=$_POST['billing_cust_tel'];
		$billing_cust_email=$user_data['bill_email'];
		$delivery_cust_name=$address['bill_name'];
		$delivery_cust_address=$address['bill_address'];
		$delivery_cust_country=$address['bill_country'];
		$delivery_cust_state=$address['bill_state'];
		$delivery_city=$address['bill_city'];
		$delivery_zip=$address['bill_zip'];
		$delivery_cust_tel=$_POST['billing_cust_tel'];
		$delivery_cust_notes='joinfilms membership';

		$working_key='avmfwscu865nulupnjbnjxi3z4t8ylc1';	//Put in the 32 bit alphanumeric key in the quotes provided here.
		$checksum=getchecksum($merchant_id,$amount,$order_id,$url,$working_key); // Method to generate checksum

		$merchant_data= 'Merchant_Id='.$merchant_id.'&Amount='.$amount.'&Order_Id='.$order_id.'&Redirect_Url='.$url.
						'&billing_cust_name='.$billing_cust_name.'&billing_cust_address='.$billing_cust_address.
						'&billing_cust_country='.$billing_cust_country.'&billing_cust_state='.$billing_cust_state.
						'&billing_cust_city='.$billing_city.'&billing_zip_code='.$billing_zip.'&billing_cust_tel='.
						$billing_cust_tel.'&billing_cust_email='.$billing_cust_email.'&delivery_cust_name='.
						$delivery_cust_name.'&delivery_cust_address='.$delivery_cust_address.'&delivery_cust_country='.
						$delivery_cust_country.'&delivery_cust_state='.$delivery_cust_state.'&delivery_cust_city='.
						$delivery_city.'&delivery_zip_code='.$delivery_zip.'&delivery_cust_tel='.$delivery_cust_tel.
						'&billing_cust_notes='.$delivery_cust_notes.'&Checksum='.$checksum ;

		$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
		?>
		<form method="post" name="redirect" action="http://www.ccavenue.com/shopzone/cc_details.jsp"> 
		<?php
		echo "<input type=hidden name=encRequest value=".$encrypted_data.">";
		echo "<input type=hidden name=Merchant_Id value=".$merchant_id.">";
		?>
		</form>
		
		<script language='javascript'> document.redirect.submit(); </script>
		<?php
		}  
	else
	{ 
		header('location: http://www.joinfilms.com?error');
		}
		
?>

			
