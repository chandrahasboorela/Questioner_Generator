<html>
<?php
    include("dbconfig.php");
    session_start();
    $_SERVER["REQUEST_METHOD"] == "POST";
    $username= isset($_POST['username'])?$_POST['username']:'';
    $email= isset($_POST['email'])?$_POST['email']:'';
    $otp= isset($_POST['otp'])?$_POST['otp']:'';
    if(isset($_SESSION['updatedkey']) && $_SESSION['updatedkey']==true){
        unset($_SESSION['updatedkey']);
        header("Location:index.php");
    }
    if($username!=""&&$email!=""){
        if($conn->connect_error){
            die("Connection Failed  ".$conn->connect_error);
        }
        else
        {   
            
            $stmt = $conn->prepare("SELECT sno,name from logindetails where email = ? and id = ?  and Status = 1;");
            $stmt->bind_param("ss", $email,$username);
            $stmt->execute();
        //        print_r($stmt);
            $stmt->store_result();
        //        echo $stmt->num_rows;
                if($stmt->num_rows == 1){
                    $stmt->bind_result($sno,$name);
                    $stmt->fetch();
                    // /echo $sno;
                    $stmt0 = $conn->prepare("SELECT otp FROM `resetpwd` WHERE tid = ?");
                    $stmt0->bind_param("d",$sno);
                    $stmt0->execute();
                    $stmt0->store_result();
        //        echo $stmt0->num_rows;
                    if($stmt0->num_rows != 1){
                        $_SESSION['errormsg']='Invalid OTP or ID! Resend OTP';
                        header("Location:forgotpwd.php");
                        //echo "failed no resetpwd record";
                    }else{
                        $stmt0->bind_result($dotp);
                        $stmt0->fetch();
                        //echo "otp ".$otp.'  dotp'.$dotp; 
                        if($otp!=$dotp){
                            $_SESSION['errormsg']='Invalid OTP';
                            header("Location:forgotpwd.php");
                                //echo "failed dotp doesent matnc";
                        }else{
                            $_SESSION['pwdkey']='S5S1FDDF91D3FD894D3F';
                        }

                    }
                }
                else{
                        $_SESSION['errormsg']='Invalid username';
                        header("Location:forgotpwd.php");
                    //echo "failed get username sno";
                }
            $stmt->close();
        }
    }   
        else{
            header("Location:error.html");
        }
       
?>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="theme-color" content="##2c445c">
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="shortcut icon" href="images/icon.png">
        <link rel="stylesheet" href="css/panel.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <!-- scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.js"></script>
    <title>Question Paper Generator</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
    <div class="container-fluid row login-box">
        <img src="images/avatar.png" class="avatar">
        <h1>Reset password</h1>
        <pre style='color:orange;font-size:16px;' >Username: <?php echo $name;?></pre >
        <form id='target' class="col-12" action="updatepwd.php" method="POST" >
            <p>New Password</p>
            <input type="password" name="newpwd" placeholder="Enter New password" minlength	= '8' require>
            <p> Re-Enter Password</P>
            <input type="password" name="renewpwd" placeholder="Re-enter New password" minlength	= '8' require>
            <input type="hidden" name="sno" value="<?php echo $sno;?>">
            <input type="submit" name="reset" value="reset" id='submit'>
        </form>
    </div>
    <script>
    $(document).ready(function () {
        $('#submit').click(function (e) { 
            
            if($("input[name='newpwd']").val()==$("input[name='renewpwd']").val()){
                // alert();
                // $('#target').submit();                
            }else{
                e.preventDefault();
                alert("Password Doesn't match");
            }
        });
    });
    </script>
</body>

</html>