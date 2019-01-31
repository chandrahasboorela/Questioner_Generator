<?php

$to = "chandu32123@gmail.com";
$subject = "this is a test php mail ";
$message = "<h1>asd</h1><p>asdasdasdasd</a>";

$headers = "From: The Sender Name <sender@gmail.com\r\n>";
$headers.= "Reply To : reply@xtremeinvo.com\r\n";
$headers.='Content-type: text/html\r\n';
//send mail
mail($to,$subject,$message,$headers);
?>