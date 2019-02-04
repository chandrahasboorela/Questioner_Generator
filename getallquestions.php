<?php
include("dbconfig.php");
session_start();
$_SERVER["REQUEST_METHOD"] == "POST";
$subid= isset($_POST['subid'])?$_POST['subid']:'';
$flag=0;
if(isset($_SESSION['key']) && $_SESSION['key'] =="9FOj92VfeSbTQ54M" ){
if($conn->connect_error){
    die("Connection Failed  ".$conn->connect_error);
    $json = array("status" => 0, "msg" => "Connection Error!!");
}
else
{   
    
      //end function
    $sql = "SELECT * FROM `".$subid."` ORDER BY marks,unit ;";       
        //echo $sql;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                $out = array();
                while ($row = $result->fetch_assoc()) {
                        $out[] = $row;
                 }
                // print_r($out);
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