<?php
if ($handle = opendir('sites/default/files')) {
 //   echo "Directory handle: $handle\n";
   // echo "Entries:\n";
$cout =0 ;
    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {

		$cout =$cout + 1 ; }

    /* This is the WRONG way to loop over the directory. */
    while ($entry = readdir($handle)) {
        echo "$entry\n";
    }

    closedir($handle);
}
$coutne = $cout +1; 
   if(isset($_FILES["file"])){
       move_uploaded_file($_FILES["file"]["tmp_name"],
      "editor/" . "joinfilms-editor".$coutne.".jpg");
   // echo "Stored in: " . "editor/" . "joinfilms-editor".$coutne.".jpg";
      header("filemove.php");
   }

?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Image upload</title>
</head>

<body>

<form action="filemove1.php" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html> 


