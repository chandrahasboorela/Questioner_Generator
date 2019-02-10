<?php
include("dbconfig.php");
session_start();
$_SERVER["REQUEST_METHOD"] == "POST";

$newpwd= isset($_POST['newpwd'])?$_POST['newpwd']:'';
$renewpwd= isset($_POST['renewpwd'])?$_POST['renewpwd']:'';
$sno= isset($_POST['sno'])?$_POST['sno']:'';
$flag=0;

if(isset($_SESSION['pwdkey']) && $_SESSION['pwdkey'] =="S5S1FDDF91D3FD894D3F" ){
if($conn->connect_error){
    die("Connection Failed  ".$conn->connect_error);
    $json = array("status" => 0, "msg" => "Connection Error!!");
}
else
{   //trim($question);
    if($sno!= '' &&  $newpwd!= '' && $renewpwd!= ''){
                $sql= "UPDATE  logindetails SET pwd =? WHERE sno=?";
                //echo $sql;
                //$sql= "UPDATE  logindetails SET pwd ="3363" WHERE sno='1';";
                $stmt = $conn->prepare($sql);
                //print $sql;
                $stmt->bind_param("sd",$newpwd,$sno);  
                //print_r($conn->error_list);
                $result = $stmt->execute();
                if ($result) 
                {
                    $stmt0 = $conn->prepare("DELETE FROM `resetpwd` WHERE tid = ?");
                    $stmt0->bind_param("d",$sno);
                    $stmt0->execute();
                   $_SESSION['errormsg']="Updated Password";
                   header("Location:index.php");
                }
            $conn->close();     
    }
    else{
        header("Location:resetpwd.php");
   }
}
}
else{
    header("Location:error.html");
}
?>