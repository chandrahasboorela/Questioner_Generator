<?php
   // include("dbconfig.php");
    $id = isset($_POST['username']) ?  $_POST['username']  : '';
    $pwd = isset($_POST['password']) ?  $_POST['password']  : '';

    
    $servername = "localhost";
    $username = "root";
    $password = "321654";
    $dbname = "questionpaper";
    $conn = new mysqli($servername, $username, $password,$dbname);
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
                    $_SESSION["sno"]=$sno;
                    $_SESSION["name"]=$name;
                    //echo $_SESSION["name"];
                    $_SESSION["lock"]=0;
                    header('Location:/panel.html');
                }
                else{
                    header('Location:index.html');
                }
                $_SESSION["lock"]=1;
            $stmt->close();
        }
    }   
        else
            header("Location:index.html");
?>