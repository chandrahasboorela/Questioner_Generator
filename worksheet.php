<!DOCTYPE html>
<html lang="en">
<?php
    include("dbconfig.php");
    session_start();
    $_SERVER["REQUEST_METHOD"] == "POST";
    if(!(isset($_SESSION['key']) && $_SESSION['key'] =="9FOj92VfeSbTQ54M")){
            header("Location:error.html");
    }else{
        if(!isset($_POST['subid']))
            header("Location:error.html");
    }
    $subid= isset($_POST['subid'])?$_POST['subid']:'';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#049dbf">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="images/icon.png">
    <style>
    @page { margin: 0.7cm }
    @page :first {
         margin-top: 0.3cm    /* Top margin on first page 10cm */
      }
    @media print
    {    
        .tooltiptext{
            display:none;
        }
        .no-print, .no-print *
        {
            display: none !important;
        }
        h1{
            background-color:white;
            padding:0px;    
        }
    }
   
            tr:hover{
        background-color:black;
        color:white;
    }
    tr{
        width:100%;
    }
    h1{
            background-color:wheat;
            padding:15px;
        }
    .print-btn{
        font-size: 26px;
        border-radius: 15px;
        padding: 15px;
        margin-left:50%;
        width: 200px;
        color:white;
        background-color:black;
        border:3px solid white;
        cursor:pointer;
    }
    table{
        width:100%;
    }
    .sno{
        padding-top: 5px;
        min-width:50px;
    }
    p{
        margin: 5px;
    } 
    .tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  top: 150%;
  left: 50%;
  margin-left: -60px;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  bottom: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: transparent transparent black transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
    <title>Worksheet</title>
</head>
<body>
    <h1><b><?php echo $subid; ?></b> - Worksheet<button class="no-print print-btn" onclick="window.print();">Print</button></h1>
    <hr>
    
    <div>
        <table border="0">
            <?php
                if($conn->connect_error){
                    die("Connection Failed  ".$conn->connect_error);
                    $json = array("status" => 0, "msg" => "Connection Error!!");
                }
                else
                {   
                    
                      //end function
                    $sql = "SELECT * FROM ".$subid." ORDER BY marks,unit ;";       
                        //echo $sql;
                            $result = $conn->query($sql);
                            if ($result ==true && $result->num_rows > 0) 
                            {
                                $i=1;
                                while ($row = $result->fetch_assoc()) {
                                        $sno = $row['sno'];
                                        $question = $row['question'];
                                        $comment = $row['comment'];
                                        $unit = $row['unit'];
                                        $marks = $row['marks'];
                                        echo <<<EOL
                                                <tr >
                                                    <td valign="top" class="sno" title='$sno'>$i</td>
                                                    <td title='$comment' class="tooltip">
                                                            <span class="tooltiptext">$comment</span>
                                                            <p>$question</p>
                                                    </td>
                                                    <td valign="top" class="sno" title='$unit'>$marks M</td>
                                                </tr>
EOL;
                                    $i++;
                                    }
                                // print_r($out);
                                 //echo $out[0]['time'];
                            }
                            $conn->close();     
                }
            ?>


            <!-- <tr>
                <td valign="top" class="sno" >1.</td>
                <td>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic eligendi nostrum dolorem nihil deleniti facere? Id nisi, architecto velit facere praesentiumt amet, consectetur adipisicing elit. Hic eligendi nostrum dolorem nihil deleniti facere? Id nisi, architecto velit facere praesentiumt amet, consectetur adipisicing elit. Hic eligendi nostrum dolorem nihil deleniti facere? Id nisidolor sit amet, consectetur adipisicing elit. Hic eligendi nostrum dolorem nihil deleniti facere? Id nisi, architecto velit facere praesentiumt amet, consectetur adipisicing elit. Hic eligendi nostrum dolorem nihil deleniti facere? Id nisi, architecto velit facere praesentiumt amet, consectetur adipisicing elit. Hic eligendi nostrum dolorem nihil deleniti facere? Id nisi, architecto velit facere praesentium quaerat. Animi </p>
                </td>
                <td valign="top" class="sno">5m</td>
            </tr> -->
        </table>
       <center>-------------xxx-------------</center>
    </div>
</body>
</html>