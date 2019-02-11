<?php
include("dbconfig.php");
session_start();
$_SERVER["REQUEST_METHOD"] == "POST";

$id= isset($_POST['id'])?$_POST['id']:'';
$name= isset($_POST['name'])?$_POST['name']:'';
$email= isset($_POST['email'])?$_POST['email']:'';
$password= isset($_POST['password'])?$_POST['password']:'';


if(isset($_SESSION['key']) && $_SESSION['key'] =="9FOj92VfeSbTQ54M" ){
if($conn->connect_error){
    die("Connection Failed  ".$conn->connect_error);
    $json = array("status" => 0, "msg" => "Connection Error!!");
}
else
{   //trim($question);
    if($id!= '' &&  $name!= '' && $email!= '' && $password!= '' ){
                $sql= "INSERT INTO `logindetails` VALUES('',?,?,?,?,1);";
                $stmt = $conn->prepare($sql);
                //print $sql;
                $stmt->bind_param("ssss",$id,$password,$name,$email);  
                //print_r($conn->error_list);
                $result = $stmt->execute();
                if ($result) 
                {  
                    $json = array("status" => 1,"msg" => "added Successfully: ".$name);
                }
                else
                    $json = array("status" => 0,"msg" => "Same Record already exists");
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