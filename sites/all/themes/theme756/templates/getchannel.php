<?php
$db1 = mysql_connect('localhost', 'root' ,'');
$ddd=mysql_select_db("joinfilms",$db1);

	if(!$ddd) {
	
		echo 'Could not connect to the database.';
	           } else {
	
		if(isset($_POST['queryString'])) {
			 $queryString = mysql_real_escape_string($_POST['queryString']);
			
			if(strlen($queryString) >0) {
                $query1= "select * from taxonomy_term_data where vid=40 and name like '$queryString%'";
				$query = mysql_query($query1);
				
				//echo '<ul>';
				//echo '<li>No Result Found</li>';							
				while ($result = mysql_fetch_array($query)) {
				    
                    $sqlterm="select * from taxonomy_index where tid=".$result['tid'];
                    $term_res=mysql_query($sqlterm);
                    while($term_row=mysql_fetch_array($term_res)){
                    $term_row['nid'];
                    $uid= $_GET['uid'];
                    
                    $sqluser="select * from field_data_field_user_id where entity_id='".$term_row['nid']."'";
                    $user_res=mysql_query($sqluser);
                     while($user_row=mysql_fetch_array($user_res)){
                    $datauid= $user_row['field_user_id_value'];
                 }}}
                   if($datauid==$uid)
                   {
                        echo "This is alredy added ";
                        
                   }
                   else{
                            //echo	 '<li >'.$result['name'].'</li>';
                   }
				//echo '</ul>';
					
				
			} else {
				// do nothing
			}
		} else {
			echo 'There should be no direct access to this script!';
		}
	}

?>