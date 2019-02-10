<?php
session_start();
$_SERVER["REQUEST_METHOD"] == "POST";

$subid= isset($_POST['subid'])?$_POST['subid']:'';
$sno= isset($_POST['sno'])?$_POST['sno']:'';

if(isset($_SESSION['key']) && $_SESSION['key'] =="9FOj92VfeSbTQ54M" ){
$file = "questionImages/"."$subid"."/"."$sno".".jpg";
    if(file_exists($file)){
        if (!unlink($file)){
                $json = array("status" => 0, "msg" => "Error deleting!!");
        }else{
            $json = array("status" =>1, "msg" => "Image Deleted Sucessfully!!");
        }
    }else{
             $json = array("status" => 0, "msg" => "File doesnot exist!!");
    }
}else{
    $json = array("status" => 0, "msg" => "Login Error!!");
}
header('Content-type: application/json');
echo json_encode($json);
?>
