<?php
include("../dbconfig.php");
session_start();
$_SERVER["REQUEST_METHOD"] == "POST";

$subname= isset($_POST['subname'])?$_POST['subname']:'';
$subcode= isset($_POST['subcode'])?$_POST['subcode']:'';


if(isset($_SESSION['key']) && $_SESSION['key'] =="9FOj92VfeSbTQ54M" ){
if($conn->connect_error){
    die("Connection Failed  ".$conn->connect_error);
    $json = array("status" => 0, "msg" => "Connection Error!!");
}
else
{   //trim($question);
    if($subcode!= '' &&  $subname!= '' ){
                $sql= "INSERT INTO `subjectlist` VALUES('',?,?,1);";
                $stmt = $conn->prepare($sql);
                //print $sql;
                $stmt->bind_param("ss",$subcode,$subname);  
                //print_r($conn->error_list);
                $result = $stmt->execute();
                if ($result) 
                {  
                    $sql1 = "SELECT subid FROM `subjectlist` WHERE subcode = ? AND name=?;";
                    //echo $sql1;
                    $stmt1 = $conn->prepare($sql1);
                    $stmt1->bind_param("ss",$subcode,$subname);
                    $result = $stmt1->execute();
                    $stmt1->store_result();
                    if($stmt1->num_rows >= 1){
                        $stmt1->bind_result($subid);
                        $stmt1->fetch();

                        $result1 = $conn->query("CREATE TABLE `".$dbname."`.`".$subid."` ( `sno` INT NOT NULL AUTO_INCREMENT , `question` VARCHAR(700) NOT NULL , `comment` VARCHAR(500) NOT NULL , `unit` INT(2) NOT NULL , `marks` INT(2) NOT NULL , `tid` INT NOT NULL , PRIMARY KEY (`sno`) ,FOREIGN KEY (tid) REFERENCES logindetails(sno)) ");
                        
                        if($result1){
                            mkdir("../questionImages/".$subid);
                            $json = array("status" => 1,"msg" => "added Successfully:  ".$subname.",   Created Table Successfully : ".$subid);
                        }
                        else
                            $json = array("status" => 0,"msg" => "added Successfully, Error in  Table creation");
                    }else{
                            $json = array("status" => 0,"msg" => "Error!! Failed to Add Subject/ Subject Already exists");
                    }
                }
                else
                    $json = array("status" => 0,"msg" => "Error!! Failed to Add Subject/ Subject Already exists");
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