<?php
session_start();
include("dbconfig.php");
$passWOrd = isset($_POST['passWOrd'])?strval($_POST['passWOrd']):"";
$tablename = isset($_POST['tablename'])?strval($_POST['tablename']):"";
$rand = 1998; $flag = 0;
if($passWOrd=="aFGKKJVYU5613"){
    $returnData = array(0,0,0);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        if($_SESSION["tempkey"]!=""){
            $count=0;
            $check = "SELECT * FROM $tablename where Question = '".$_SESSION['tempkey']."' ;";
           // echo $check;
            $output = $conn->query($check);
            if(!$output)
                echo "Error : ".mysqli_error($conn);
            else{
                while($row = $output->fetch_assoc()){
                        $name = $row["Qid"];
                        $count++;
                    }
                }
            if($count==0){
                $flag = 1;
            }
            else{
                $returnData[0]=1;
                $returnData[1]=$_SESSION["tempkey"];
                $returnData[2]=$name;
            }
        }
        if($flag==1 || $_SESSION["tempkey"]==""){
        $rand = rand(1571,15871);
        $_SESSION["tempkey"] = $rand;
        $sql = "INSERT INTO ".$tablename." VALUES('','$rand','','','','','');";
        if ($conn->query($sql) === TRUE) {
            $sql2 = "SELECT Qid from ".$tablename." where Question = ".$rand.";";
            //echo $sql2; 
            $output=$conn->query($sql2);
            while($row = $output->fetch_assoc())
                $result = $row["Qid"];
            $returnData[0]=1;
            $returnData[1]=$rand;
            $returnData[2]=$result;          
            //echo $sql2;
        } else {
            $returnData = array(0,$conn->error);
        }
        }

        header('Content-type: application/json');
        echo json_encode($returnData);
    }
}
$conn->close();
?>
