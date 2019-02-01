<?php
include("dbconfig.php");
session_start();
$_SERVER["REQUEST_METHOD"] == "POST";

$question= isset($_POST['question'])?$_POST['question']:'';
$comment= isset($_POST['comment'])?$_POST['comment']:'';
$unit= isset($_POST['unit'])?$_POST['unit']:'';
$marks= isset($_POST['marks'])?$_POST['marks']:'';
$subject= isset($_POST['subject'])?$_POST['subject']:'';
$flag=0;

if(isset($_SESSION['key']) && $_SESSION['key'] =="9FOj92VfeSbTQ54M" ){
if($conn->connect_error){
    die("Connection Failed  ".$conn->connect_error);
    $json = array("status" => 0, "msg" => "Connection Error!!");
}
else
{   //trim($question);
    if($question!= '' &&  $unit!= '' && $marks!= '' && $subject!= '' ){
            $sql= "INSERT INTO ".$subject." VALUES('',?,?,?,?,?);";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssddd",$question,$comment,$unit,$marks,$_SESSION['tid']);  
            //print_r($conn->error_list);
            $result = $stmt->execute();
            if ($result) 
            {
                $sql1 = "SELECT (SELECT sno FROM ".$subject." WHERE question= ? ) AS sno , (SELECT l.subid FROM subjectlist l WHERE l.name = '".$subject."') AS subid";
                $stmt1 = $conn->prepare($sql1); 
                $stmt1->bind_param("s",$question);
                $result = $stmt1->execute();
                $stmt1->store_result();
                if($stmt1->num_rows >= 1){
                    $stmt1->bind_result($sno,$subid);
                    $stmt1->fetch();
                    $out = array('sno'=>$sno,'subid'=>$subid);
                    $flag++;
                }
             }
            if($flag>0){
                $json = array("status" => $flag,"data" => $out);
            }
            else
                $json = array("status" => $flag,"msg" => "Same Question already exists");
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