<?php require_once('Connections/conn.php'); ?>
<?php
$username = "joinfilms";
$pwd= "surendra";
$senderid = "joinav";

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

}
mysql_select_db($database_conn, $conn);
$userole='';
$no="";
$row_audition['nid'] = $_GET['nid'];

$query_audition = "SELECT * FROM node WHERE nid =".$row_audition['nid']." ORDER BY nid DESC";
$audition = mysql_query($query_audition, $conn) or die(mysql_error());
$row_audition = mysql_fetch_assoc($audition);
$totalRows_audition = mysql_num_rows($audition);

/////////////// looping start 

$count = 0;
//////////////audition from age limit from age 
	$query_from_age = "SELECT * FROM field_data_field_from_age WHERE entity_id =".$row_audition['nid']." and bundle ='audition'";
	$from_age = mysql_query($query_from_age, $conn) or die(mysql_error());
	$row_from_age = mysql_fetch_assoc($from_age);
	$totalRows_from_age = mysql_num_rows($from_age);


	//////////////audition age limit to age 
	 $query_to_age = "SELECT * FROM field_data_field_to_age WHERE entity_id =".$row_audition['nid']." and bundle ='audition'";
	$to_age = mysql_query($query_to_age, $conn) or die(mysql_error());
	$row_to_age = mysql_fetch_assoc($to_age);
	$totalRows_to_age = mysql_num_rows($to_age);

	//////////////audition contact no 
	$query_contact_phone = "SELECT * FROM field_data_field_contact_phone WHERE entity_id =".$row_audition['nid']." and bundle ='audition'";
	$contact_phone = mysql_query($query_contact_phone, $conn) or die(mysql_error());
	$row_contact_phone = mysql_fetch_assoc($contact_phone);
	$totalRows_contact_phone = mysql_num_rows($contact_phone);
    //////////////////////// audtion email 
	$query_field_data_field_email = "SELECT * FROM field_data_field_email WHERE bundle = 'audition' and  entity_id = ".$row_audition['nid'];
	$field_data_field_email = mysql_query($query_field_data_field_email, $conn) or die(mysql_error());
	$row_field_data_field_email = mysql_fetch_assoc($field_data_field_email);
	$totalRows_field_data_field_email = mysql_num_rows($field_data_field_email);
	/////////////////////////////////////Audition categories
	$query_audition_category = "SELECT * FROM field_data_field_audition_category_term WHERE entity_id =".$row_audition['nid']." and bundle = 'audition'";
	$audition_category = mysql_query($query_audition_category, $conn) or die(mysql_error());
	$row_audition_category = mysql_fetch_assoc($audition_category);
	$totalRows_audition_category = mysql_num_rows($audition_category);
    /////////////////////////////// audition Gender
	$query_gender_profile = "SELECT * FROM field_data_field_gender_profile WHERE entity_id  =".$row_audition['nid']." and bundle = 'audition'";
	$gender_profile = mysql_query($query_gender_profile, $conn) or die(mysql_error());
	$row_gender_profile = mysql_fetch_assoc($gender_profile);
	 $totalRows_gender_profile = mysql_num_rows($gender_profile);
	
	////////////////////////Audtion categories 
	$query_field_data_field_medium_audition = "SELECT * FROM field_data_field_medium_audition WHERE entity_id =".$row_audition['nid'];
	$field_data_field_medium_audition = mysql_query($query_field_data_field_medium_audition, $conn) or die(mysql_error());
	$row_field_data_field_medium_audition = mysql_fetch_assoc($field_data_field_medium_audition);
	$totalRows_field_data_field_medium_audition = mysql_num_rows($field_data_field_medium_audition);
	if( $totalRows_field_data_field_medium_audition  != 0)
	{
		$query_taxonomy = "SELECT * FROM taxonomy_term_data WHERE tid =".$row_field_data_field_medium_audition['field_medium_audition_tid'];
		$taxonomy = mysql_query($query_taxonomy, $conn) or die(mysql_error());
		$row_taxonomy = mysql_fetch_assoc($taxonomy);
		$totalRows_taxonomy = mysql_num_rows($taxonomy);
	}
	////////////////////////// Audition date
	$query_auditiondate = "SELECT * FROM field_data_field_audition_date WHERE entity_id =".$row_audition['nid'];
	$auditiondate = mysql_query($query_auditiondate, $conn) or die(mysql_error());
	$row_auditiondate = mysql_fetch_assoc($auditiondate);
	$totalRows_auditiondate = mysql_num_rows($auditiondate);
	////////////////////// Audtion Vanue 
	
	$query_audition_vanue = "SELECT * FROM field_data_field_audition_venue WHERE entity_id =".$row_audition['nid'];
	$audition_vanue = mysql_query($query_audition_vanue, $conn) or die(mysql_error());
	$row_audition_vanue = mysql_fetch_assoc($audition_vanue);
	$totalRows_audition_vanue = mysql_num_rows($audition_vanue);
	
	///////////////////////////// users cate 
	if($row_audition_category['field_audition_category_term_tid'] != "") {
		
	$query_usercate = "SELECT * FROM taxonomy_term_data WHERE tid ='".$row_audition_category['field_audition_category_term_tid']."' and vid = 7"; //echo $query_usercate;
	$usercate = mysql_query($query_usercate, $conn) or die(mysql_error());
	$row_usercate = mysql_fetch_assoc($usercate);
	$totalRows_usercate = mysql_num_rows($usercate); 
	
	
				
			
			$query_userole = "SELECT * FROM users_roles WHERE  rid=20";
			
				$userole = mysql_query($query_userole, $conn) or die(mysql_error());
				$row_userole = mysql_fetch_assoc($userole);
				$totalRows_userole = mysql_num_rows($userole);
			if($totalRows_userole  != 0)
			{
				
				do{
				//////////////////// users role for sms 
                
				$query_my_profession = "SELECT * FROM field_data_field_my_profession WHERE field_my_profession_tid =".$row_audition_category['field_audition_category_term_tid']." and entity_id=".$row_userole['uid'];
	
			$my_profession = mysql_query($query_my_profession, $conn) or die(mysql_error());
			$row_my_profession = mysql_fetch_assoc($my_profession);
			$totalRows_my_profession = mysql_num_rows($my_profession);
			
                if($totalRows_my_profession != 0 )
				{
         			
					if($row_from_age['field_from_age_value'] == "" && $row_to_age['field_to_age_value'] == "")
					{
						$user_age_sql="SELECT * FROM field_data_field_age WHERE  `entity_id` ='".$row_userole['uid']."'";
					} 
					else 
					{
						$user_age_sql="SELECT * FROM field_data_field_age WHERE field_age_value >='".$row_from_age['field_from_age_value']."' and field_age_value <='".$row_to_age['field_to_age_value']."' and `entity_id` ='".$row_userole['uid']."'";			
					}
					

					$user_age_result=mysql_query($user_age_sql);
					$uswe_age_num=mysql_num_rows($user_age_result);
					$uswe_age_row=mysql_fetch_array($user_age_result);
                    
                    ///if age true open
               		
              	 
              	  if($totalRows_gender_profile == 1) 
					{
				  $user_gender="SELECT * FROM field_data_field_2gender WHERE field_2gender_value='".$row_gender_profile['field_gender_profile_value']."'  and `entity_id` ='".$row_userole['uid']."'";
					}elseif($totalRows_gender_profile != 0){
						
						$user_gender="SELECT * FROM field_data_field_2gender ";
						
						}else{
						
						$user_gender="SELECT * FROM field_data_field_2gender ";
						}
				
				$user_gender_result=mysql_query($user_gender);
				$user_gender_row=mysql_fetch_array($user_gender_result);
				$user_gender_num=mysql_num_rows($user_gender_result); 
				
                    if($user_gender_num != 0)
                    {
              		  $query_profile = "SELECT * FROM field_data_field_landline_phone WHERE `entity_id` =".$row_userole['uid'];
						$profile = mysql_query($query_profile, $conn) or die(mysql_error());
						$row_profile = mysql_fetch_assoc($profile);
						$totalRows_profile = mysql_num_rows($profile);
                
						$usernamesql = "SELECT * FROM field_data_field_first_name WHERE `entity_id` =".$row_userole['uid'];
						$profile1 = mysql_query($usernamesql, $conn) or die(mysql_error());
						$row_profile1 = mysql_fetch_assoc($profile1);
						
                if($row_profile['field_landline_phone_value'] != "")
						{ 
							$numbares = str_ireplace("&",",",$row_profile['field_landline_phone_value']);
							//$no.$count .= $numbares.",";
                            $no.$count .= $numbares."  Name  ". $row_profile1['field_first_name_value']. "</br>" ;//
						}
				
					} else /////Gender
                    {
                        $err= "There is no recored found";
                        
                    }
				///if age true close
				}
				} while ($row_userole = mysql_fetch_assoc($userole));
			}
		
	}
// echo 	$no.$count."<br /><br />";
            

		if($row_field_data_field_email['field_email_email'] != "")
		{
			$email =" email:".$row_field_data_field_email['field_email_email'];
		}
		else
		{
			$email = "";		
		}
		if($row_audition_vanue['field_audition_venue_value'] != "")
		{
			$vanue =" at ".$row_audition_vanue['field_audition_venue_value'];
		}
		else
		{
			$vanue ="";
		}
		if($row_contact_phone['field_contact_phone_value'] != "")
		{
			$contact =" ".$row_contact_phone['field_contact_phone_value'];
		}
		else
		{
			$contact =" ";
		}
		
		if($row_gender_profile['field_gender_profile_value'] != "")
		{
			if($totalRows_gender_profile==2)
			{
				$bout_gender="Male and Female";
				$gender =" for ".$bout_gender;
			}
			else 
				{
					$gender =" for ".$row_gender_profile['field_gender_profile_value'];
				}
		}
		else
		{
			$gender ="";
		}
		if($row_usercate['name'] != "")
		{
			$category =" for ".$row_usercate['name'];
		}
		else
		{
			$category ="";
		}
		
		
		$msg = $row_audition['title']." ".$category." ".$gender." ".$row_taxonomy['name']." , ".date("d-m-y",strtotime($row_auditiondate['field_audition_date_value']))." - ".date("d-m-y",strtotime($row_auditiondate['field_audition_date_value2'])).$email." ". $vanue ." ".$contact." Free trial to subscribe to contact +91-7869501684.<br /> <hr />"; $count++;
  		echo $msg;
		 	echo $no.$count."<br />";
		 $arr= $no.$count;
		$arr1=explode(",",$arr);
		 // $arr1 = array("8982544998","9826416953","8234868872"); //9826416953
		 foreach($arr1 as $val)
		 {
			
			  $val."<br/>";
              $value=$val."<br/>";
			  if($val !="")
			 {
				 
		 $url ="http://www.smsvalley.co.in/api1.php?username=".$username."&password=".$pwd."&senderid=".$senderid."&mnumber=".$val."&message=".$msg;
		}
		$ch = curl_init();

		// set URL and other appropriate options
		//curl_setopt($ch, CURLOPT_URL, $url);

		//curl_setopt($ch, CURLOPT_HEADER, 0);

		// grab URL and pass it to the browser
		//curl_exec($ch);

		// close cURL resource, and free up system resources
		//curl_close($ch);
		}
		 
		mysql_free_result($userole);
?>