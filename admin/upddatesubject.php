<?php
include("../dbconfig.php");
session_start();
$_SERVER["REQUEST_METHOD"] == "POST";

$subid= isset($_POST['subid'])?$_POST['subid']:'';
$status= isset($_POST['status'])?$_POST['status']:'';
$flag=0;

if(isset($_SESSION['key']) && $_SESSION['key'] =="9FOj92VfeSbTQ54M" ){
if($conn->connect_error){
    die("Connection Failed  ".$conn->connect_error);
    $json = array("status" => 0, "msg" => "Connection Error!!");
}
else
{   //trim($question);
    if($subid!= '' &&  $status!= '' ){
                $sql= "UPDATE  subjectlist SET status =? WHERE subid =?";
                //echo $sql;
                $stmt = $conn->prepare($sql);
                //print $sql;
                $stmt->bind_param("ds",$status,$subid);  
                //print_r($conn->error_list);
                $result = $stmt->execute();
                if ($result) 
                {
                    $json = array("status" => 1, "msg" => "Updated :  Changed Status!!");
                }   
            else{
                $json = array("status" => 0,"msg"=>"no records");
                $conn->close();  
                }
   }else{
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