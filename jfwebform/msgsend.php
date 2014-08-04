<?php

//Your authentication key
$authKey = "49838ACx18W4vF71m538087d3";

//Multiple mobiles numbers seperated by comma

$mobileNumber = "7869501681,9826416953";
//$mobileNumber = "8234868872";

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "jFilms";

//Your message to send, Add URL endcoding here.
$message = urlencode("This is testing message One mebaer is trying to get membership.
		Find information about users which is given below User Name :".$address['name']."User Contact Numbers:".$_POST['billing_cust_tel']."User Email:".$user_data['bill_email']."Amount :".$data['amount']." Thanks and Regards,Joinfilms Team");

//Define route 
$route = "4";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);

//API URL
$url="http://www.xtechcellular.com/sendhttp.php";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));

//get response
$output = curl_exec($ch);

curl_close($ch);

echo $output;
?>
