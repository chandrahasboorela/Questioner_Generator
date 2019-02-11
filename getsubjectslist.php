<?php
include("dbconfig.php");
session_start();
$_SERVER["REQUEST_METHOD"] == "POST";
$tid= isset($_POST['tid'])?$_POST['tid']:'';
//mode 0 = all subjects list(active and inactive); 1  teacher active sub list, -1 teacher all sub list
$mode= isset($_POST['mode'])?$_POST['mode']:'0';
$flag=0;
if(isset($_SESSION['key']) && $_SESSION['key'] =="9FOj92VfeSbTQ54M" ){
if($conn->connect_error){
    die("Connection Failed  ".$conn->connect_error);
    $json = array("status" => 0, "msg" => "Connection Error!!");
}
else
{   
    
    //end function
    switch($mode){
        case 0:    $sql = "SELECT * FROM `subjectlist` ORDER BY name ;";
        break;
        case -1:    $sql = "SELECT * FROM `subjectlist` WHERE subid IN (SELECT s.subid FROM teacher_subject s WHERE s.tid=".$tid.")";
        break;
        case 1:    $sql = "SELECT * FROM `subjectlist` WHERE subid IN (SELECT s.subid FROM teacher_subject s WHERE s.tid=".$tid." AND status = 1);";
        break;
        default:    $sql = "SELECT * FROM `subjectlist` ORDER BY name ;";
        break;     
    }
        //echo $sql;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                $out = array();
                while ($row = $result->fetch_assoc()) {
                    $out[] = $row;
                 }
                 //print_r($out[0]);
                 //echo $out[0]['time'];
                    $flag++;
            }
            
            if($flag>0)
                $json = array("status" => $flag, "data" => $out);
                
            else
                $json = array("status" => $flag,"msg"=>"no records");
            $conn->close();     
}
}
else{
    $json = array("status" => 0, "msg" => "Login Error!!");
}
header('Content-type: application/json');
echo json_encode($json);
?>