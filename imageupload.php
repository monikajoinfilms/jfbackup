<?php
if ($handle = opendir('editor')) {
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
      header("location:filemove.php");
   }

?> <form action="http://www.joinfilms.com/imageupload.php" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>
