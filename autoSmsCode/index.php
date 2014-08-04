<?php
$conn = mysql_connect('localhost', 'joinfilm_main', 'w30}D.s}WyAy');
if(!$conn)
{
	die('Connection fail!'.mysql_error());
	}
	mysql_select_db('joinfilm_dru-final');
	
function add_user_confirm($data)
{
	date_default_timezone_set("Asia/Kolkata");
	$query = "insert into audition_sms_report(uid, contact_no, category, message)
	values(".$data['uid'].",".$data['mobileNo'].",'".$data['category']."','".$data['message']."')";
	$exeQuery = mysql_query($query);
	}	


function send_sms($nodeId)
{
	$count=0;
	$no = 0;
	$data = array();
	$query_audition = "SELECT * FROM node WHERE nid =".$nodeId."";
	$audition = mysql_query($query_audition) or die(mysql_error());
	$row_audition = mysql_fetch_assoc($audition);
	$totalRows_audition = mysql_num_rows($audition);

	//////////////audition from age limit from age 
	$query_from_age = "SELECT * FROM field_data_field_from_age WHERE entity_id =".$row_audition['nid']." and bundle 
	='audition'";
	$from_age = mysql_query($query_from_age) or die(mysql_error());
	$row_from_age = mysql_fetch_assoc($from_age);
	$totalRows_from_age = mysql_num_rows($from_age);
	
	/////////////audition age limit to age 
	$query_to_age = "SELECT * FROM field_data_field_to_age WHERE entity_id =".$row_audition['nid']." and bundle 
	='audition'";
	$to_age = mysql_query($query_to_age) or die(mysql_error());
	$row_to_age = mysql_fetch_assoc($to_age);
	$totalRows_to_age = mysql_num_rows($to_age);
	
	//////////////audition contact no 
	$query_contact_phone = "SELECT * FROM field_data_field_contact_phone WHERE entity_id =".$row_audition['nid']." and 
	bundle ='audition'";
	$contact_phone = mysql_query($query_contact_phone) or die(mysql_error());
	$row_contact_phone = mysql_fetch_assoc($contact_phone);
	$totalRows_contact_phone = mysql_num_rows($contact_phone);

	//////////////////////// audtion email 
	$query_field_data_field_email = "SELECT * FROM field_data_field_email WHERE bundle = 'audition' and  entity_id = ".
	$row_audition['nid'];
	$field_data_field_email = mysql_query($query_field_data_field_email) or die(mysql_error());
	$row_field_data_field_email = mysql_fetch_assoc($field_data_field_email);
	mysql_num_rows($field_data_field_email);

	/////////////////////////////////////Audition categories
	$query_audition_category = "SELECT * FROM field_data_field_audition_category_term WHERE entity_id =".$row_audition[
	'nid']." and bundle = 'audition'";
	$audition_category = mysql_query($query_audition_category) or die(mysql_error());
	$row_audition_category = mysql_fetch_assoc($audition_category);
	$totalRows_audition_category = mysql_num_rows($audition_category);
	/////////////////////////////// audition Gender
	$query_gender_profile = "SELECT * FROM field_data_field_gender_profile WHERE entity_id  =".$row_audition['nid']." and
	bundle = 'audition'";
	$gender_profile = mysql_query($query_gender_profile) or die(mysql_error());
	$row_gender_profile = mysql_fetch_assoc($gender_profile);
	$totalRows_gender_profile = mysql_num_rows($gender_profile);
		
	////////////////////////Audtion categories 
	$query_field_data_field_medium_audition = "SELECT * FROM field_data_field_medium_audition WHERE entity_id =".
	$row_audition['nid'];
	$field_data_field_medium_audition = mysql_query($query_field_data_field_medium_audition) or die(mysql_error());
	$row_field_data_field_medium_audition = mysql_fetch_assoc($field_data_field_medium_audition);
	$totalRows_field_data_field_medium_audition = mysql_num_rows($field_data_field_medium_audition);
	if( $totalRows_field_data_field_medium_audition  != 0)
	{
		$query_taxonomy = "SELECT * FROM taxonomy_term_data WHERE tid =".$row_field_data_field_medium_audition[
		'field_medium_audition_tid'];
		$taxonomy = mysql_query($query_taxonomy) or die(mysql_error());
		$totalRows_taxonomy = mysql_num_rows($taxonomy);
		$row_taxonomy = mysql_fetch_assoc($taxonomy);
		
		}
		
	////////////////////////// Audition date
	$query_auditiondate = "SELECT * FROM field_data_field_audition_date WHERE entity_id =".$row_audition['nid'];
	$auditiondate = mysql_query($query_auditiondate) or die(mysql_error());
	$row_auditiondate = mysql_fetch_assoc($auditiondate);
	$totalRows_auditiondate = mysql_num_rows($auditiondate);
	////////////////////// Audtion Vanue 
	
	$query_audition_vanue = "SELECT * FROM field_data_field_audition_venue WHERE entity_id =".$row_audition['nid'];
	$audition_vanue = mysql_query($query_audition_vanue) or die(mysql_error());
	$row_audition_vanue = mysql_fetch_assoc($audition_vanue);
	$totalRows_audition_vanue = mysql_num_rows($audition_vanue);
	
	///////////////////////////// users cate 
	if($row_audition_category['field_audition_category_term_tid'] != "") 
	{
		$query_usercate = "SELECT * FROM taxonomy_term_data WHERE tid ='".$row_audition_category[
		'field_audition_category_term_tid']."' and vid = 7"; 
		$usercate = mysql_query($query_usercate) or die(mysql_error());
		$row_usercate = mysql_fetch_assoc($usercate);
		$totalRows_usercate = mysql_num_rows($usercate); 
		
		$query_userole = "SELECT * FROM users_roles WHERE  rid=20";
		$userole = mysql_query($query_userole) or die(mysql_error());
		$totalRows_userole = mysql_num_rows($userole);
		if($totalRows_userole  != 0)
		{
			while ($row_userole = mysql_fetch_assoc($userole))
			{
				//////////////////// users role for sms 
				$query_my_profession = "SELECT * FROM field_data_field_my_profession WHERE field_my_profession_tid=
				".$row_audition_category['field_audition_category_term_tid']." and entity_id=".$row_userole['uid'];
		
				$my_profession = mysql_query($query_my_profession) or die(mysql_error());
				$row_my_profession = mysql_fetch_assoc($my_profession);
				$totalRows_my_profession = mysql_num_rows($my_profession);
				if($totalRows_my_profession != 0 )
				{
					$data['uid'][] = $row_userole['uid'];
					if($row_from_age['field_from_age_value'] == "" && $row_to_age['field_to_age_value'] == "")
					{
						$user_age_sql="SELECT * FROM field_data_field_age WHERE  `entity_id` ='".$row_userole['uid']."'";
						} 
					else 
					{
						$user_age_sql="SELECT * FROM field_data_field_age WHERE field_age_value >='".$row_from_age[
						'field_from_age_value']."' and field_age_value <='".$row_to_age['field_to_age_value']."' and 
						`entity_id` ='".$row_userole['uid']."'";			
						}
						
					$user_age_result=mysql_query($user_age_sql);
					$uswe_age_num=mysql_num_rows($user_age_result);
					$uswe_age_row=mysql_fetch_array($user_age_result);
					
					///if age true open
					if($totalRows_gender_profile == 1) 
					{
						$user_gender="SELECT * FROM field_data_field_2gender WHERE field_2gender_value='".
						$row_gender_profile['field_gender_profile_value']."'  and `entity_id` ='".$row_userole['uid']."'";
						}
					elseif($totalRows_gender_profile != 0)
					{
						$user_gender="SELECT * FROM field_data_field_2gender ";
						}
					else
					{
						$user_gender="SELECT * FROM field_data_field_2gender ";
						}
					
					$user_gender_result=mysql_query($user_gender);
					$user_gender_row=mysql_fetch_array($user_gender_result);
					$user_gender_num=mysql_num_rows($user_gender_result); 
					
					if($user_gender_num != 0)
					{
						$query_profile = "SELECT * FROM field_data_field_landline_phone WHERE `entity_id` =".$row_userole
						['uid'];
						$profile = mysql_query($query_profile) or die(mysql_error());
						$row_profile = mysql_fetch_array($profile);
						$totalRows_profile = mysql_num_rows($profile);
											
						$usernamesql = "SELECT * FROM field_data_field_first_name WHERE `entity_id` =".$row_userole['uid'];
						$profile1 = mysql_query($usernamesql) or die(mysql_error());
						$row_profile1 = mysql_fetch_assoc($profile1);
							
					    if($row_profile['field_landline_phone_value'] != "")
						{
							$numbares = str_ireplace("&",",",$row_profile['field_landline_phone_value']);
							$numbares = explode(',',$numbares);
							$data['contact_no'][] = $numbares[0];
							}
						} 
					else 
					{
						$err= "There is no recored found";
						}
					///if age true close
				}
			}
		}
			
	}
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
		$data['category'] = $row_usercate['name'];
		$category =" for ".$row_usercate['name'];
		}
	else
	{
		$category ="";
		}
		
	///////create personalized message	
	$msg = $row_audition['title']." ".$category." ".$gender." ".$row_taxonomy['name']." , ".
			date("d-m-y",strtotime($row_auditiondate['field_audition_date_value']))." - ".
			date("d-m-y",strtotime($row_auditiondate['field_audition_date_value2'])).$email." ". $vanue ." ".
			$contact;
	$data['message'] = $msg; 
			$count++;

	$data['contact_no'][] = 9826416953;
	$inc = sizeof($data['contact_no']) - 1;
	for($inc; $inc>=0;--$inc)
	{
		//Your authentication key
		$authKey = "49838ACx18W4vF71m538087d3";
		
		//Multiple mobiles numbers seperated by comma
		//$mobileNumber = $arr1[$inc];
		$mobileNumber = $data['contact_no'][$inc];
		
		//Sender ID,While using route4 sender id should be 6 characters long.
		$senderId = "jFilms";
		
		//Your message to send, Add URL endcoding here.
		$message = $msg;
		
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
		//call function to insert user regards sms report
		$sendData['uid'] = $data['uid'][$inc];
		$sendData['mobileNo'] = $data['contact_no'][$inc];
		$sendData['category'] = $data['category'];
		$sendData['message'] = $data['message']; 
		add_user_confirm($sendData);
		}
	}

$query = "select nid from store_new_audition where type='audition'";
$exeQuery = mysql_query($query);
if(mysql_num_rows($exeQuery))
{
	while($row = mysql_fetch_array($exeQuery))
	{
		send_sms($row['nid']);
		}
	}

$query = "truncate table store_new_audition";
mysql_query($query);
mysql_close($conn);
?>