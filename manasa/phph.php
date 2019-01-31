<?php
$id = $_POST["userid"];
$pwd = $_POST['password'];

if($id != 'nishi')
    header("Location:htmldemo.html");
    echo $id . $pwd;
?>
