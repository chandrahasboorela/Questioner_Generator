<?php
include("dbconfig.php");
session_start();
$_SERVER["REQUEST_METHOD"] == "POST";

$question= isset($_POST['question'])?$_POST['question']:'';
$comment= isset($_POST['comment'])?$_POST['comment']:'';
$unit= isset($_POST['unit'])?$_POST['unit']:'';
$marks= isset($_POST['marks'])?$_POST['marks']:'';
$subid= isset($_POST['subid'])?$_POST['subid']:'';
$subjectid = $subid;
$sno= isset($_POST['sno'])?$_POST['sno']:'';
$flag=0;

if(isset($_SESSION['key']) && $_SESSION['key'] =="9FOj92VfeSbTQ54M" ){
if($conn->connect_error){
    die("Connection Failed  ".$conn->connect_error);
    $json = array("status" => 0, "msg" => "Connection Error!!");
}
else
{   //trim($question);
    if($question!= '' &&  $unit!= '' && $marks!= '' && $subid!= '' &&$_SESSION['tid']!=''){
        if($sno==0){
                $sql= "INSERT INTO `".$subid."` VALUES('',?,?,?,?,?);";
                //$sql= "INSERT INTO ".$subid." VALUES('','234567890','234',3,2,1);";
                $stmt = $conn->prepare($sql);
                //print $sql;
                $stmt->bind_param("ssddd",$question,$comment,$unit,$marks,$_SESSION['tid']);  
                //print_r($conn->error_list);
                $result = $stmt->execute();
                if ($result) 
                {
                    $sql1 = "SELECT (SELECT sno FROM `".$subid."` WHERE question= ? ) AS sno , (SELECT l.subid FROM subjectlist l WHERE l.name = '".$subid."') AS subid";
                    //echo $sql1;
                    $stmt1 = $conn->prepare($sql1);
                    $stmt1->bind_param("s",$question);
                    $result = $stmt1->execute();
                    $stmt1->store_result();
                    if($stmt1->num_rows >= 1){
                        $stmt1->bind_result($sno,$subid);
                        $stmt1->fetch();
                        $out = array('sno'=>$sno,'subid'=>$subjectid);
                        $flag++;
                    }
                }
            }else{
                $sql= "UPDATE `".$subid."` SET question = ?,comment=?,unit=?,marks=?,tid=? WHERE sno = ?;";
                $stmt = $conn->prepare($sql);
                //print $sql;
                $stmt->bind_param("ssdddd",$question,$comment,$unit,$marks,$_SESSION['tid'],$sno);  
                //print_r($conn->error_list);
                $result = $stmt->execute();
                if ($result){
                    $out = array('sno'=>$sno,'subid'=>$subjectid);
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