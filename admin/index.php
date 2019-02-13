<html>
<?php
    session_start();
    if(isset($_SESSION["key"]) && $_SESSION["key"]=="9FOj92VfeSbTQ54M"){
        header("Location:panel.php");
    }
    if(isset($_SESSION['errormsg'])){
        $msg = $_SESSION['errormsg'];
        echo <<<EOL
        <script>
            alert("$msg");
        </script>
EOL;

    }
    unset($_SESSION['errormsg']);
?>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="theme-color" content="#2c445c">
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="shortcut icon" href="../images/icon.png">
        <link rel="stylesheet" href="../css/panel.css">
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
    <link rel="stylesheet" type="text/css" href="../css/index.css">
</head>

<body>
    <div class="container-fluid row login-box" style="border:3px solid yellow; ">
        <img src="../images/avatar.png" class="avatar">
        <h1>Admin Login</h1>
        <form class="col-12" action="adminloginvalidate.php"  method="POST" >
            <p>user name</p>
            <input type="text" name="username" placeholder=" Enter user name">
            <p>password</P>
            <input type="password" name="password" placeholder=" Enter password" minlength	= '8'>
            <input type="submit" name="submit" <?php if(isset($_SESSION['failed'])) if($_SESSION['failed']==1) echo 'style="margin-bottom: 10px;"';?> value="login">
            <?php 
            if(isset($_SESSION['failed']))
                if($_SESSION['failed']==1)
                    echo '<div class="text-center mb-1 ">                <p style="color:red; font-size:14px; font-family:monospace;margin:-5px;">Incorrect username or password! Tryagain</p>            </div>'
            ?>    
            <div class="text-center">
                <a href="forgotpwd.php">forgot password</a><br>
                <a href="../index.php">Teacher Login</a>
            </div>
        </form>
    </div>
</body>

</html>