<?php
    session_start();
    include("dbconfig.php");
    $id = isset($_POST['id']) ?  $_POST['id']  : '';
    $email = isset($_POST['email']) ?  $_POST['email']  : '';
    //$_SESSION["failed"]=1;
    if($id!=""&&$email!=""){
        if($conn->connect_error){
            die("Connection Failed  ".$conn->connect_error);
        }
        else
        {   
            $stmt = $conn->prepare("SELECT sno,name from logindetails where email = ? and id = ?  and Status = 1;");
            $stmt->bind_param("ss", $email,$id);
            $stmt->execute();
        //        print_r($stmt);
            $stmt->store_result();
        //        echo $stmt->num_rows;
                if($stmt->num_rows == 1){
                    $stmt->bind_result($sno,$name);
                    $stmt->fetch();

                    $stmt0 = $conn->prepare("DELETE FROM `resetpwd` WHERE tid = ?");
                    $stmt0->bind_param("d",$sno);
                    $stmt0->execute();
                    
                    $sdate = date('Y-m-d H:i:s');
                    //echo $sdate;
                    $otp='';
                    for($i=0;$i<6;$i++){
                        $otp =$otp.(String)rand(0,9);
                    }
                    $stmt1 = $conn->prepare("INSERT INTO `resetpwd` VALUES('',?,?,?)");
                    $stmt1->bind_param("dss",$sno,$otp,$sdate);
                    $stmt1->execute();

                    $to = $email;
                    $subject = "Reset Password - Question Paper Generator";

                    $message = <<<EOL
                    <html>
                    <head>
                        <meta charset="utf-8" />
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <style>
                        
                        </style>
                    </head>
                    <body>
                        <div style="text-align: center;">
                            <h1 style="    background-color: blueviolet;
                            padding: 45px;
                            font-weight: bolder;
                            -webkit-text-stroke: 1px white;
                            color:white;
                            font-family: sans-serif;">Question Paper Generator</h1>
                            <h2 style="    background-color: gray;
                            padding: 30px;
                            color: white;" >Hi $name, to reset password use OTP : </h2>
                            <h1 style="    border: 3px dashed black;
                            padding: 45px 0px 45px 0px;
                            font-size: 60px;
                            font-family: monospace;
                            margin: 50px;">$otp</h1>
                        </div>
                    </body>
                    </html>
EOL;


                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    // More headers
                    $headers .= 'From: Q-paper Generator <no-reply@xtremeinvo.com>' . "\r\n";
                    //$headers .= 'Cc: myboss@example.com' . "\r\n";
                    $headers .= 'Reply-To:Reply crt.imagine@gmail.com' . "\r\n";

                    mail($to,$subject,$message,$headers);

                    $json = array("status" => 1, "msg" => 'OTP sent');
                }
                else{
                    $json = array("status" => 0, "msg" => 'Invalid user');
                }
            $stmt->close();
        }
    }   
        else{
            $json = array("status" => 0, "msg" => 'Input Error');
        }
        header('Content-type: application/json');
echo json_encode($json);
?>