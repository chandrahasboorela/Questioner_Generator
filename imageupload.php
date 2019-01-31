<?php

/* Getting file name */
$filename = $_FILES['file']['name'];

/* Location */
$location = "questionImages/".$filename;
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   $uploadOk = 0;
}

if($uploadOk == 0){
   echo "valid format";
}else{
   /* Upload file */

   echo "file type ".$location;
   if(file_exists($filename))
    unlink($filename);
    echo "fiel".$_FILES['file']['tmp_name'];
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
      echo $location;
   }else{
      echo 0;
   }
}