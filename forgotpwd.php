<html>
<?php
    session_start();
    $_SERVER["REQUEST_METHOD"] == "POST";
            if(isset($_SESSION['errormsg'])){
                $msg = $_SESSION['errormsg'];
                echo <<<EOL
                <script>
                    alert("$msg");
                </script>
EOL;

            }
    
?>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="theme-color" content="#2c445c">
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
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.js"></script>
    <title>forgot pwd</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <style>
        #info{
            color:yellow;
            display:none;
            font-weight:bold;
            font-style:italic;
        }
    </style>
</head>

<body>
    <div class="container-fluid row login-box" style="height:450px;">
        <img src="images/avatar.png" class="avatar">
        <h1><b>Forgot Password</b></h1>
        <form class="col-12" action="resetpwd.php" method="POST">
            <p>Username</p>
            <input type="text" name="username" id='username' required="required" placeholder=" Enter user name">
            <p>Regesterd email</P>
            <input type="email" name="email" id='email' required="required" placeholder=" Enter email">
            <span id="info">Sending email...</span>
            <button class="w-full btn btn-warning mb-1 fa-pull-right" id='otp-btn' type="button">Send OTP</button><br>

            <br>
            <input type="number" name="otp" placeholder="Enter recived pin">
            <input style='margin-bottom: 0px;' type="submit" name="submit" value="Submit">
            <a  href="index.php">back to login</a>   
        </form>
    </div>
    <script>
        
        $('#otp-btn').click(function (e) { 
            e.preventDefault();
            var id=$("#username").val();
            var email=$("#email").val();
            if(id!='' && email!=''){
            $("#info").html("Sending email...");
            $("#info").css("display", "inline");
            $.ajax({
                type: "POST",
                url: "otprequest.php",
                data: {
                    id:id,
                    email:email
                },
                success: function (e) {
                    $("#info").html(e.msg);
                    //alert(e.msg);
                },
                error:()=>{
                    alert("ajax error");
                }
            });
        }else{
            $("#info").css("display", "inline");
            $("#info").html("Empty Input");
        }
        });
    </script>
</body>

</html>