<?php
include("dbconfig.php");
session_start();
$_SERVER["REQUEST_METHOD"] == "POST";

$tid= isset($_POST['tid'])?$_POST['tid']:'';
$subid= isset($_POST['subid'])?$_POST['subid']:'';



if(isset($_SESSION['key']) && $_SESSION['key'] =="9FOj92VfeSbTQ54M" ){
if($conn->connect_error){
    die("Connection Failed  ".$conn->connect_error);
    $json = array("status" => 0, "msg" => "Connection Error!!");
}
else
{   //trim($question);
    if($tid!= '' &&  $subid!= ''  ){
                $sql= "INSERT INTO `teacher_subject` VALUES('',?,?,1);";
                $stmt = $conn->prepare($sql);
                //print $sql;
                $stmt->bind_param("ss",$tid,$subid);  
                //print_r($conn->error_list);
                $result = $stmt->execute();
                if ($result) 
                {  
                    $json = array("status" => 1,"msg" => "added Record Successfully");
                }
                else
                    $json = array("status" => 0,"msg" => "Record already exists");
            $stmt->close();     
    }
    else{
        $json = array("status" => 0, "msg" => "input Error!!");
    }
}
}
else{
    $json = array("status" => 0, "msg" => "Login Error!!");
}
header('Content-type: application/json');
echo json_encode($json);
?>