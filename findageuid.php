<?php 
$hostname_conn = "localhost";
$database_conn = "joinfilm_dru-final";
$username_conn = "joinfilm_joinusr";//joinfilm_joinusr
$password_conn = "vt*r1U$23_m8";//vt*r1U$23_m8
$conn = mysql_connect($hostname_conn, $username_conn, $password_conn) or mysql_error();
$db=mysql_select_db($database_conn, $conn);
//$dd=strtotime("04/01/2014");//select * from profile where created >= '$dd' 
//$from_date = strtotime("04/01/2014");
//$to_date = strtotime("05/18/2014");
$profilesql="SELECT * FROM profile  ORDER by uid DESC";
$profileres=mysql_query($profilesql);
$no=0;
?>
<table border="2" align="center">
<tr>
<td><b>User Id</b></td>
<td><b>Name</b></td>
<td><b>Age</b></td>
<td><b>DOB</b></td>
<td><b>Email Address</b></td>
<td><b>Contact No</b></td>
</tr>
<?php
while($p_row= mysql_fetch_array($profileres))
{
		 $p_row['uid']."<br/>";
		$name=mysql_fetch_array(mysql_query("select * from field_data_field_first_name where entity_id=".$p_row['uid']));
		$age=mysql_fetch_array(mysql_query("select * from field_data_field_age where entity_id=".$p_row['uid']));
		$dob=mysql_fetch_array(mysql_query("select * from field_data_field_date_of_birth where field_date_of_birth_value='' and entity_id=".$p_row['uid']));
        $email_address=mysql_fetch_array(mysql_query("select * from users where uid=".$p_row['uid']));
        $mobile=mysql_fetch_array(mysql_query("select * from field_data_field_landline_phone where entity_id=".$p_row['uid']));
		?>
		<tr>
<td><?php echo $p_row['uid']; ?></td>
<td><?php echo $name['field_first_name_value']; ?></td>
<td><?php echo $age['field_age_value']; ?></td>
<td><?php echo $dob['field_date_of_birth_value']; ?></td>
<td><?php echo $email_address['mail']; ?></td>
<td><?php echo $mobile['field_landline_phone_value']; ?></td>
</tr>
		<?php 
		//echo $no++;
} 
 ?>