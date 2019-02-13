<?php
include("../dbconfig.php");
session_start();
$_SERVER["REQUEST_METHOD"] == "POST";
$flag=0;
if(isset($_SESSION['key']) && $_SESSION['key'] =="9FOj92VfeSbTQ54M" ){
if($conn->connect_error){
    die("Connection Failed  ".$conn->connect_error);
    $json = array("status" => 0, "msg" => "Connection Error!!");
}
else
{   
    
         $sql = "SELECT ts.sno,s.subid,s.name as subname,ts.tid,l.name as tname,ts.status FROM `subjectlist`s , `logindetails` l, `teacher_subject` ts WHERE ts.subid=s.subid AND ts.tid = l.sno ORDER BY tname,subname;";
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