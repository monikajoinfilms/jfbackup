<?php

//Your authentication key
$authKey = "49838ACx18W4vF71m538087d3";

//Multiple mobiles numbers seperated by comma
$mobileNumber = $data['billing_cust_tel'];

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "jFilms";

//Your message to send, Add URL endcoding here.
$message = urlencode($emailBody);

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
