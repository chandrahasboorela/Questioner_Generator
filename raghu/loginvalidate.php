<?php
include("dbconfig.php")// database connectivity 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=isset($_POST['id'])?strval($_POST['id']);"";
$name=isset($_POST['name'])?strval($_POST['name']);"";
$pwd=isset($_POST['pwd'])?strval($_POST['pwd']);"";
$email=isset($_POST['email'])?strval($_POST['email']);"";

//SQL QUERY : INSERT INTO logindetails VALUES('','rag','raghu','pwd','a@gmaiol.com',1);

                $sql1 = "INSERT INTO logindetails VALUES('',?,?,?,?,1)";
                $stmt1 = $conn->prepare($sql1);
                $stmt1->bind_param("ssss",$id,$name,$pwd,$email);
                $result = $stmt1->execute();
if ($result === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>