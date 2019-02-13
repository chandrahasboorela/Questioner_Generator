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
    
        $sql = 'SELECT al.sno,ald.id,ald.name,al.ip,al.timestamp FROM `adminlog` al, `adminlogindetails` ald WHERE ald.sno = al.tid ORDER BY al.sno DESC;';
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
                 $sql = 'SELECT al.sno,ald.id,ald.name,al.ip,al.timestamp FROM `log` al, `logindetails` ald WHERE ald.sno = al.tid ORDER BY al.sno DESC;';
                //echo $sql;
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {
                        $out1 = array();
                        while ($row = $result->fetch_assoc()) {
                            $out1[] = $row;
                        }
                        //print_r($out[0]);
                        //echo $out[0]['time'];
                            $flag++;
                    }
            }
            
            if($flag>0)
                $json = array("status" => $flag, "data" => $out,"data1" => $out1);
                
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