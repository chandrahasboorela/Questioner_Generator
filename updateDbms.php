<?php
include("dbconfig.php");
$passWOrd = isset($_POST['passWOrd'])?strval($_POST['passWOrd']):"";
$tablename = isset($_POST['tablename'])?strval($_POST['tablename']):"questions_cse";
$tempkey = isset($_POST['tempkey'])?strval($_POST['tempkey']):"";
$operation = isset($_POST['operation'])?strval($_POST['operation']):"";
$questionStr = isset($_POST['questionObj'])?strval($_POST['questionObj']):"";
$questionObj = json_decode($questionStr,false);
if($passWOrd=="aFGKKJVYU5613"){
    $returnData = array("status"=>0,"msg"=>" ","qid"=>$questionObj->qid);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        if($operation=="add")
            {$queryAdditional = " where Question = '".$tempkey."';";}
        else
            {$queryAdditional=" where Qid = '".$tempkey."';";}
            $questionObj->question = str_replace('"',' \"',$questionObj->question);
            $questionObj->comments = str_replace('"',' \"',$questionObj->comments);
         $sql = 'UPDATE '.$tablename.' SET Question = "'.$questionObj->question.'",Subject = "'.$questionObj->subject.'",Unit = "'.$questionObj->unit.'",Marks = "'.$questionObj->marks.'",Comments = "'.$questionObj->comments.'",NoofFiles = "'.$questionObj->noOfFiles.'" '.$queryAdditional;
        //echo $sql;
        if ($conn->query($sql) === TRUE) {
            $_SESSION["tempkey"]="";
            $returnData['status'] =  1;
            $returnData['msg'] =  " New record created successfully!";
        } else {
            $returnData['status'] =  0;
            $returnData['msg'] =  "Error : ". $conn->error;
        }
        header('Content-type: application/json');
        echo json_encode($returnData);
    }
}
$conn->close();
?>