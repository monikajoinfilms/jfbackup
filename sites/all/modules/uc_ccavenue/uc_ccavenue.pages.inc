<?php
/**

*************************************************************************************
 Please Do not edit or add any code in this file without permission of bluezeal.in.
@Developed by bluezeal.in

Drupal: 7.1.5						   CCAvenue Version: 1.312			

                              
Module Version. bz-2.1                 Module release: February 23/2013
**************************************************************************************

/**
 * @file
 * CCAvenue administration menu items.
 */


function uc_ccavenue_redirect($order_object = 0) {
  
  global $conf;
  $order_id = $order_object->order_id;
  watchdog('uc_ccavenue', 'Receiving CCAvenue at URL for order @order_id. <pre>@debug</pre>',
    array('@order_id' => $order_id, '@debug' => variable_get('uc_ccavenue_debug', FALSE) ? print_r($_POST, TRUE) : ''));
	
  $WorkingKey = variable_get('uc_ccavenue_working_key', '') ; 
  $Merchant_Id= $_REQUEST['Merchant_Id'];
  $Amount= $_REQUEST['Amount'];
  $Order_Id= $_REQUEST['Order_Id'];

  $Merchant_Param= $_REQUEST['Merchant_Param'];
  $Checksum= $_REQUEST['Checksum'];
  $AuthDesc=$_REQUEST['AuthDesc'];
    
  $ChecksumValidate = verifyChecksum($Merchant_Id, $Order_Id , $Amount,$AuthDesc,$Checksum,$WorkingKey);

  
  $order = uc_order_load($Order_Id);

  if ($order == FALSE) {
    watchdog('uc_ccavenue', 'Return attempted for non-existent order.', array(), WATCHDOG_ERROR);
    return;
  }

  
  if ($ChecksumValidate != "true") {
    watchdog('uc_ccavenue', 'Checksum validation error for @order_id', array('@order_id' => $order_id), WATCHDOG_ERROR);
    return;
  }
  
 
  if ($ChecksumValidate == "true") {
   
    $duplicate = db_query("SELECT COUNT(*) FROM {uc_payment_ccavenue}  WHERE Checksum = :checksum AND status <> 'Pending'", array(":checksum"=>$Checksum))->fetchField();
	if ($duplicate > 0) {
      watchdog('uc_ccavenue', 'Transaction has been processed before.', array(), WATCHDOG_NOTICE);
      return;
    }
  }
 
  $payment_status = "";
  $payment_message = "";
   if($ChecksumValidate=="true" && $AuthDesc=="Y")
  {
     $payment_message = "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
     $payment_status = "Completed";
    //Here you need to put in the routines for a successful 
    //transaction such as sending an email to customer,
    //setting database status, informing logistics etc etc   
   
  }
  else if($ChecksumValidate=="true" && $AuthDesc=="B")
  {
    $payment_message = "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
    $payment_status = "Pending";
    //Here you need to put in the routines/e-mail for a  "Batch Processing" order
    //This is only if payment for this transaction has been made by an American Express Card
    //since American Express authorisation status is available only after 5-6 hours by mail from ccavenue and at the "View Pending Orders"
    $payment_status = "Pending";
    
  }
  else if($ChecksumValidate=="true" && $AuthDesc=="N")
  {
    $payment_message = "The customer's attempted payment failed.";
      $payment_status = "Declined";
    //Here you need to put in the routines for a failed
    //transaction such as sending an email to customer
    //setting database status etc etc  
  }
  else
  {
    $payment_message = "Security Error. Illegal access detected";
      $payment_status = "Error";
    //Here you need to simply ignore this and dont need
    //to perform any operation in this condition
    
  }
  
   
  
   
	db_insert('uc_payment_ccavenue')
      ->fields(array(
        'order_id' => $Order_Id,
        'Checksum' => $Checksum,
        'amount' => $Amount,
        'status' => $payment_status,
		'authdesc' => $AuthDesc,
         'received' => REQUEST_TIME,
      ))
      ->execute();
  $context = array(
    'revision' => 'formatted-original',
    'location' => 'ccavenue',
  );
  $options = array(
    'sign' => FALSE,
  );
	
  if($payment_status =="Completed")
	{
	$comment = t('CCAvenue transaction status: @payment_status', array('@payment_status' => $payment_status));
	uc_payment_enter($Order_Id, 'ccavenue', $Amount, $order->uid, NULL, $comment);
    uc_cart_complete_sale($order);
    drupal_set_message(t($payment_message));
	//uc_order_comment_save($order_id, 0, t('Payment of @amount @currency submitted through PayPal.', array('@amount' => uc_currency_format($payment_amount, FALSE), '@currency' => $payment_currency)), 'order', 'payment_received');
	uc_order_comment_save($Order_Id, 0, t('Payment of @amount @currency submitted through CCAvenue.', array('@amount' => uc_currency_format($Amount, FALSE), '@currency' => 'INR')), 'order', 'payment_received');
   //uc_order_comment_save($order_id, 0, t('PayPal IPN reported a payment of @amount @currency.', array('@amount' => uc_currency_format($payment_amount, FALSE), '@currency' => $payment_currency)));
     uc_ccavenue_complete ($order_object);  
	}
	
  else if($payment_status =="Pending")
  {
  $comment = t('CCAvenue transaction status: @payment_status', array('@payment_status' => $payment_status));
	uc_payment_enter($Order_Id, 'ccavenue', $Amount, $order->uid, NULL, $comment);
    uc_cart_complete_sale($order);
    drupal_set_message(t($payment_message));
	//uc_order_comment_save($order_id, 0, t('Payment of @amount @currency submitted through PayPal.', array('@amount' => uc_currency_format($payment_amount, FALSE), '@currency' => $payment_currency)), 'order', 'payment_received');
	uc_order_comment_save($Order_Id, 0, t('Payment of @amount @currency submitted through CCAvenue.', array('@amount' => uc_currency_format($Amount, FALSE), '@currency' => 'INR')), 'order', 'payment_received');
   //uc_order_comment_save($order_id, 0, t('PayPal IPN reported a payment of @amount @currency.', array('@amount' => uc_currency_format($payment_amount, FALSE), '@currency' => $payment_currency)));
     uc_ccavenue_complete ($order_object);  
	 }
  else
  {
	drupal_set_message(t($payment_message));
	uc_order_comment_save($Order_Id, 0, t('Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail'), 'admin');
    uc_ccavenue_cancel();
  }
}


function uc_ccavenue_complete($order_object) 
{
	$order =$order_object;
	if (!isset($_SESSION['cart_order']) || intval($_SESSION['cart_order']) != $order->order_id)
	{
		drupal_set_message(t($payment_message));
		drupal_goto('cart');
	}
  
	$order_id=$order->order_id;
	if ($order->payment_method != 'ccavenue') 
	{
		drupal_goto('cart');
	}
	
	$_SESSION['uc_checkout'][$_SESSION['cart_order']]['do_complete'] = TRUE;
	drupal_goto('cart/checkout/complete');
}
	
	
function uc_ccavenue_cancel() {
  	unset($_SESSION['cart_order']);
	//drupal_set_message(t("The customer's attempted payment failed"));
	drupal_goto('cart');
  }

