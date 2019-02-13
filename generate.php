<?php
    include("dbconfig.php");
    session_start();
    $_SERVER["REQUEST_METHOD"] == "POST";
    $subid= isset($_POST['subid'])?$_POST['subid']:'';
    if(!(isset($_SESSION['key']) && $_SESSION['key'] =="9FOj92VfeSbTQ54M")){
            header("Location:error.html");
    }else{
        if(!isset($_POST['subid']))
            header("Location:error.html");
    }
   
?>
<html>
                                    <head>
                                    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="theme-color" content="#2c445c">
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="shortcut icon" href="../images/icon.png">
                                    <style>
                                    @page { margin: 0.5cm }
                                    @page :first {
                                         margin-top: 0.3cm    /* Top margin on first page 10cm */
                                      }
                                    @media print{    
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
                                        #partA>div>P,.pbq {
                                            margin-left: 15px;
                                            margin-top:0px!important;
                                            margin-bottom: 0px!important;
                                            font-size: 16px;
                                        }
                                        .tooltip {
                                            position: relative;
                                            
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
                                          .print-btn{
                                            font-size: 26px;
                                            border-radius: 15px;
                                            padding: 15px;
                                            //margin-left:50%;
                                            width: 200px;
                                            color:white;
                                            background-color:black;
                                            border:3px solid white;
                                            cursor:pointer;
                                            width:100%;
                                        }
                                    </style>
                                    </head>
<?php

                if($conn->connect_error){
                    die("Connection Failed  ".$conn->connect_error);
                    $json = array("status" => 0, "msg" => "Connection Error!!");
                }
                else
                {   
                    //get subject details 
                    $sql = "SELECT * FROM subjectlist WHERE subid = '".$subid."' AND status = 1; ";       
                                //echo $sql;
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) 
                                    {
                                        $row = $result->fetch_assoc();
                                            $subname = $row['name'];
                                            $subcode = $row['subcode'];                                        
                                    }
                                    else{
                                        header("Location:error.html");
                                    }
                                    $subname = strtoupper($subname);
                                    echo <<<EOL
                                    
                                    <body>
                                    <div class="no-print" style="background-color:wheat;padding:15px;"><h1 ><button class='print-btn' onclick="print_close();">Print</button></h1>
                                    <hr></div>
                                    
                                        <pre><b>codes:$subcode </b></pre>
                                        <h3 align="center" contenteditable="true"> JAWAHARLAL NEHRU TECHNOLOGICAL UNIVERSITY,HYDERABAD <br>
                                            SRIIT-B.Tech 3rd Year 2 Semester Regular &supplementary Examinations , Mar/Apr-2019 <br>
                                            $subname<br>
                                            (Computer science and engineering)<br> </h3>
                                            <table width="100%">
                                                <tr>
                                                    <td> <h4 align="left" contenteditable="true"> Time: </h4></td>
                                                    <td><h4 align="right" contenteditable="true"> Max Marks : 75</h4></td>
                                                </tr>
                                            </table>                                        
                                        <h3 align="center"> PART A : 25 ( Marks) <br>
                                            Answer the following</h3>
EOL;
                                        echo '<div id="partA">
                                        <div align="left">';
                                        echo '<table border="0" width="100%" style="padding-left:30px;">';
                    $out = array();
                      //end function
                    $sql = "SELECT unit,marks,COUNT(*) as total from `".$subid."` GROUP by unit,marks";       
                        //echo $sql;
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) 
                            {
                                $begin = 0;
                                $end = 0;
                                $marks10list = array();   
                                $marks2 = array();   
                                $marks3 = array();   
                                $marks10 = array();   
                                while ($row = $result->fetch_assoc()) {
                                    if($row['total']<1 || $result->num_rows != 15){
                                       return 0;
                                    }
                                        $end = $end+$row['total'];
                                        //echo "<br>".$begin.' - '; //testing
                                        //echo intval($end)-1;      //testing
                                        
                                        $mark = $row['marks'];
                                        switch($mark){
                                            case 2:
                                                //echo '<br>'.$mark.' total '.$row['total'];    //testing
                                                $temp = rand($begin,intval($end)-1);
                                                $a = array($row['unit']=>$temp , );
                                                array_push($marks2,$a);
                                                break;
                                            case 3:
                                                //echo '<br>'.$mark.' total '.$row['total']; //testing
                                                $temp = rand($begin,intval($end)-1);
                                                $a = array($row['unit']=>$temp , );
                                                array_push($marks3,$a);
                                                break;
                                            case 10:
                                                //echo '<br>'.$mark.' total '.$row['total']; //testing
                                                for($i =0;$i<2;$i++){
                                                    $temp = rand($begin,intval($end)-1);
                                                    if(!in_array($temp,$marks10list)){
                                                        array_push($marks10list,$temp);                                                    
                                                        $a = array($row['unit']=>$temp);
                                                        array_push($marks10,$a);
                                                    }else
                                                        $i--;
                                                }
                                                break;
                                        }
                                        $begin = $end;
                                    }
                                 //print_r($marks2);echo "<br>";print_r($marks3);echo "<br>";print_r($marks10);
                                 $sql = "SELECT * FROM `".$subid."` ORDER BY unit,marks ;";       
                                //echo $sql;
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) 
                                    {
                                        while ($row = $result->fetch_assoc()) {
                                                $out[] = $row;
                                        }
                                        $sqno = 'a';
                                        $qno = 1;
                                        echo '<tr><td align="right">1.</td><td></td><td></td></tr>';
                                        if(count($out)<0){
                                            return;
                                        }
                                            
                    
for($i = 0;$i< 5 ;$i++){
    $number = $marks2[$i][$i+1];
    $sno = $out[$number]['sno'];
    $question = $out[$number]['question'];
    $comment = $out[$number]['comment'];
    $unit = $out[$number]['unit'];
    $marks = $out[$number]['marks'];
    $filename = "questionImages/".$subid."/".$sno.".jpg";
   
                                            echo <<<EOL
                                            <tr >   
                                                    <td valign="top"  class="sno" title='$sno'></td>
                                                    <td title='$comment' class="tooltip">
                                                            <span class="tooltiptext">$comment</span>
                                                            <p>$sqno)&nbsp;&nbsp;&nbsp;&nbsp;$question</p>
                                                           
EOL;
                                             
if(file_exists($filename)){
    echo <<<EOL
       <img src='$filename' alt="image missing" style="max-width:4in; max-height:2.5in; margin-bottom:15px;">              
EOL;
}              
                                                   echo <<<EOL
                                                    </td>
                                                    <td valign="top" align='left' class="sno" title='$unit'>[$marks] </td>
                                                </tr>
EOL;

                

$sqno++;
                                        }
                                        for($i = 0;$i< 5 ;$i++){
                                            $number = $marks3[$i][$i+1];
                                            $sno = $out[$number]['sno'];
                                            $question = $out[$number]['question'];
                                            $comment = $out[$number]['comment'];
                                            $unit = $out[$number]['unit'];
                                            $marks = $out[$number]['marks'];
                                            $filename = "questionImages/".$subid."/".$sno.".jpg";
                                            $sqno++;
                                                                                    echo <<<EOL
                                                                                    <tr >   
                                                                                            <td valign="top"  class="sno" title='$sno'></td>
                                                                                            <td title='$comment' class="tooltip">
                                                                                                    <span class="tooltiptext">$comment</span>
                                                                                                    <p>$sqno)&nbsp;&nbsp;&nbsp;&nbsp;$question</p>
EOL;
if(file_exists($filename)){
    echo <<<EOL
       <img src='$filename' alt="image missing" style="max-width:4in; max-height:2.5in; margin-bottom:15px;">              
EOL;
}              
                                                   echo <<<EOL
                                                                                            </td>
                                                                                            <td valign="top" align='left' class="sno" title='$unit'>[$marks] </td>
                                                                                        </tr>
EOL;
                                                                                }
                                        //print_r($out[0]);    
                                        echo '<tr><td></td><td><h3 align="center"> PART - B:50 ( Marks)</h3></td><td></td></tr>';
                                        $j=1;
                                        for($i = 0;$i< 10 ;$i++){
                                                $number = $marks10[$i][strval($j)];
                                                $sno = $out[$number]['sno'];
                                                $question = $out[$number]['question'];
                                                $comment = $out[$number]['comment'];
                                                $unit = $out[$number]['unit'];
                                                $marks = $out[$number]['marks'];
                                                $filename = "questionImages/".$subid."/".$sno.".jpg";
                                                $qno++;
                                                                                        echo <<<EOL
                                                                                        <tr >   
                                                                                                <td valign="top" align='right'  class="sno" title='$sno'>$qno</td>
                                                                                                <td title='$comment' class="tooltip">
                                                                                                        <span class="tooltiptext">$comment</span>
                                                                                                        <p style="margin-left:15px;">$question</p>
EOL;
                                             
                                                                                                        if(file_exists($filename)){
                                                                                                            echo <<<EOL
                                                                                                               <img src='$filename' alt="image missing" style="max-width:4in; max-height:2.5in; margin-bottom:15px;">              
EOL;
                                                                                                        }              
                                                                                                    echo <<<EOL
                                                                                                        </td>
                                                                                                <td valign="top" align='left' class="sno" title='$unit'>[$marks] </td>
                                                                                            </tr>
EOL;
                                            if($i%2!=0){
                                                $j++;
                                                echo '<tr><td></td><td><h6></h6></td><td></td></tr>';
                                            }else{
                                                echo '<tr><td></td><td><h3 align="center"> (OR) <br></h3></td><td></td></tr>';
                                            }
                                            }
echo <<<EOL
</table>
            <script>
            function print_close(){
                window.print();
                if (confirm("Close Window?")) {
                    close();
                  }
            }
            </script>
</body>
</html>
EOL;
                                            
                                    }
                                    else{
                                        header("Location:error.html");
                                    }
                            }
                            else{
                                header("Location:error.html");
                            }
                            $conn->close();     
                }
            ?>
            