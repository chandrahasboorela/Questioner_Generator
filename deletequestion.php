<?php
include("dbconfig.php");
session_start();
$_SERVER["REQUEST_METHOD"] == "POST";

$subid= isset($_POST['subid'])?$_POST['subid']:'';
$qno= isset($_POST['qno'])?$_POST['qno']:'';

if(isset($_SESSION['key']) && $_SESSION['key'] =="9FOj92VfeSbTQ54M" ){
if($conn->connect_error){
    die("Connection Failed  ".$conn->connect_error);
    $json = array("status" => 0, "msg" => "Connection Error!!");
}
else
{   //trim($question);
    if($qno!= '' &&  $subid!= ''){
            $sql= "DELETE FROM `".$subid."` WHERE sno = ?;";
            $stmt = $conn->prepare($sql);
            //print $sql;
            $stmt->bind_param("d",$qno);  
            //print_r($conn->error_list);
            $result = $stmt->execute();
            if ($result) 
            {
                $filename = "questionImages/".$subid."/".$qno.".jpg";
                if(file_exists($filename))
                    unlink($filename);
                $json = array("status" => 1,"msg" =>"Deleted Successfully" );
            }
            else
                $json = array("status" => 0,"msg" => "Could not delete!!");
            $conn->close();     
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