<?php
   session_start();
   if(isset($_SESSION['key']) && $_SESSION['key'] =="9FOj92VfeSbTQ54M" ){
      $subid= isset($_POST['subid'])?$_POST['subid']:'';
      $name= isset($_POST['name'])?$_POST['name']:'';
      
      /* Getting file name */
      $filename = $_FILES['file']['name'];
      //$filename = $name;

     
      $uploadOk = 1;
      $imageFileType = pathinfo($filename,PATHINFO_EXTENSION);
       /* Location */
       $location = "questionImages/".$subid."/".$name;
       $location.='.jpg';

      /* Valid Extensions */
      $valid_extensions = array("jpg","jpeg","png");
      /* Check file extension */
      if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
         $uploadOk = 0;
      }

      if($uploadOk == 0){
         echo 0;
      }else{
         /* Upload file */
         if(file_exists($filename))
            unlink($filename);
         //echo "file".$_FILES['file']['tmp_name'];
         if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
            echo 1;
         }else{
            echo 0;
         }
      }
   }
?>