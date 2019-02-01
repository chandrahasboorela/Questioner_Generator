<?php
    include("dbconfig.php");
    session_start();
    $_SERVER["REQUEST_METHOD"] == "POST";
    if(!(isset($_SESSION['key']) && $_SESSION['key'] =="9FOj92VfeSbTQ54M")){
            header("Location:error.html");
    }else{
        if(isset($_POST['subid']))
            header("Location:error.html");
    }
    $subid= isset($_POST['subid'])?$_POST['subid']:'testsubject';
?>
<?php
                if($conn->connect_error){
                    die("Connection Failed  ".$conn->connect_error);
                    $json = array("status" => 0, "msg" => "Connection Error!!");
                }
                else
                {   
                    $out = array();
                      //end function
                    $sql = "SELECT unit,marks,COUNT(*) as total from ".$subid." GROUP by unit,marks";       
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
                                        $out[] = $row;
                                        $end = $end+$row['total'];
                                        //array_push($randQno,$a);
                                        switch($row['marks']){
                                            case 2:
                                                $temp = rand($begin,$end-1);
                                                $a = array($row['unit']=>$temp , );
                                                array_push($marks2,$a);
                                                break;
                                            case 3:
                                                $temp = rand($begin,$end-1);
                                                $a = array($row['unit']=>$temp , );
                                                array_push($marks3,$a);
                                                break;
                                            case 10:
                                                for($i =0;$i<2;$i++){
                                                    $temp = rand($begin,$end-1);
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
                                 print_r($marks2);echo "<br>";print_r($marks3);echo "<br>";print_r($marks10);
                                 //echo $out[0]['time'];
                            }
                            $conn->close();     
                }
            ?>