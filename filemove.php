<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Image show </title>
</head>

<body><?php 
  //  // integer starts at 0 before counting
//    $i = 0; 
//    $dir = "sites/default/files";
//    if ($handle = opendir($dir)) {
//        while (($file = readdir($handle)) !== false){
//            if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
//                $i++;
//        }
//    }
//    // prints out how many were in the directory
//    echo "There were $i files";


if ($handle = opendir('editor')) {
   // echo "Directory handle: $handle\n";
    //echo "Entries:\n";
$cout =0 ;
    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
	
    //    echo $cout ."=>  $entry\n "."<br />";
		?>
<div style="float:left;width:120px;margin:20px">		
		<img src="<?php echo "http://www.joinfilms.com/editor/".$entry; ?>" height="100" width="100"  /><br />
   <!--   Copy Url =>  <?php echo "http://www.joinfilms.com/editor/".$entry; ?><br />--></div>


		<?php 
		$cout =$cout + 1 ; }

    /* This is the WRONG way to loop over the directory. */
    while ($entry = readdir($handle)) {
       // echo "$entry\n";
    }

    closedir($handle);
}


?>
</body>
</html>
