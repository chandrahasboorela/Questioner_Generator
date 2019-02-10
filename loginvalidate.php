<?php
    session_start();
    include("dbconfig.php");
    
    $id = isset($_POST['username']) ?  $_POST['username']  : '';
    $pwd = isset($_POST['password']) ?  $_POST['password']  : '';
    //$_SESSION["failed"]=1;
    if($id!=""&&$pwd!=""){
        if($conn->connect_error){
            die("Connection Failed  ".$conn->connect_error);
        }
        else
        {    
            $stmt = $conn->prepare("SELECT sno,id,name from logindetails where pwd = ? and id = ?  and Status = 1;");
            $stmt->bind_param("ss", $pwd,$id);
            $stmt->execute();
        //        print_r($stmt);
            $stmt->store_result();
        //        echo $stmt->num_rows;
                if($stmt->num_rows == 1){
                    $stmt->bind_result($sno,$id,$name);
                    $stmt->fetch();
                    
                    $_SESSION["key"]="9FOj92VfeSbTQ54M";
                    $_SESSION["id"]=$id;
                    $_SESSION["tid"]=$sno;
                    $_SESSION["name"]=$name;
                    //echo $_SESSION["name"];
                    $_SESSION["failed"]=0;
                    $sdate = date('Y-m-d H:i:s');
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $stmt = $conn->prepare("INSERT INTO log VALUES('',?,?,?)");
                    $stmt->bind_param("dss",$sno,$ip,$sdate);
                    $stmt->execute();

                    header('Location:panel.html');
                }
                else{
                    $_SESSION["failed"]=1;
                    header('Location:index.php');
                }
            $stmt->close();
        }
    }   
        else{
            $_SESSION["failed"]=1;
            header("Location:   index.php");
        }
?>