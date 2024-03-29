<?php 
session_start();
if(!isset($_SESSION["key"]) && $_SESSION["key"]!="9FOj92VfeSbTQ54M"){
    header("Location:index.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#2c445c">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="images/icon.png">
    <link rel="stylesheet" href="css/panel.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
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
    <link rel="stylesheet" href="css/styles.css">
    <title>QuestionPaperGenerator</title>
</head>
<style>
    .w-full{width: 100%;}
</style>

<body>
    <div class="container-fluid">
        <div class="row pl-4 pr-4" style="    background-color: #2c445c;">
            <div class="col-8 mt-2   ">
                <img class="mb-1" style="max-height: 40px;" src="images/sriit.png" alt="SRIIT">
            </div>
            <div class="col-2 p-1 mt-1 text-right light" style="color:white;">
                <p class="user">Hi!
                    <?php echo $_SESSION['name'];?>
                </p>
            </div>
            <div class="col-2 p-1 mt-1">
                <i onclick="window.location = 'logout.php';" title="Logout" class="btn btn-lg btn-outline-light fas fa-sign-out-alt"></i>
            </div>
        </div>
        <div class="container mt-5">


            <div class="row" style="border:0px solid gray;">
                <ul class="nav nav-tabs tabss">
                    <li class="nav-item top-tab active" id="insert" style="background-color:#67FE62;">
                        Insert
                    </li>
                    <li class="nav-item top-tab " id="delete" style="background-color:#FE6262;">
                        Delete
                    </li>
                    <li class="nav-item top-tab" id="edit" style="background-color:#62EEFE;">
                        Edit
                    </li>
                    <li class="nav-item top-tab" id="worksheet" style="background-color:#fef262;">
                        Worksheet
                    </li>
                    <li class="nav-item top-tab" id="generate" style="background-color:#6c62fe;">
                        Generate paper
                    </li>
                </ul>
                <div class="col-12" style="background-color:#EEEAEA; padding:0px;">
                    <div id="Panel" style="margin:0px;border:4px solid #67FE62;">
                        <!-- insert  -->
                        <div class="container-fluid pan done" style="padding:10px 7%;min-height: 475px;" id="panel-insert">
                            <div class="row" style="height:18px;"></div>
                            <div class="row">
                                <div class="col-lg-3 col-md-5 col-sm-6 text-center" style="background-color:black; color:white;">
                                    <h4><span class="qno">&nbsp;&nbsp;</span>Question</h4>
                                </div>
                            </div>
                            <div class="row">
                                <textarea class="col-12" class="row" id="question" rows="6" maxlength="700"></textarea>
                            </div>
                            <div class="row" style="height:10px;"></div>
                            <div class="row">
                                <div class="col-3 text-left" style="padding-left:0px;">
                                    <h5>Comment</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <textarea class="container" id="comment" rows="1" style="min-height: 45px;"
                                        maxlength="200"></textarea>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 row">
                                    <input class="btn btn-primary col-10" style="font-size:initial; cursor:pointer; " id="file"
                                        type="file" name='file'>
                                    <i class="btn btn-outline-danger fas fa-trash rm-img" title='Delete linked image?' style="font-size:24px;padding-top: 12px;"></i>
                                </div>
                            </div>
                            <div class="row" style="height:20px;"></div>
                            <div class="alert alert-info show" role="alert" style="display:none;" id="imglist">

                            </div>
                            <div class="row" style="height:15px;"></div>
                            <div class="row">
                                <div class="col-3 dropDown" data-toggle="tooltip" data-placement="top" title="Subject"><select
                                        class="form-control subls" id="subject">
                                        
                                    </select></div>
                                <div class="col-3 dropDown"><select class="form-control" data-toggle="tooltip"
                                        data-placement="top" title="Unit" id="unit">
                                        <option value="1">1 - Unit</option>
                                        <option value="2">2 - Unit</option>
                                        <option value="3">3 - Unit</option>
                                        <option value="4">4 - Unit</option>
                                        <option value="5">5 - Unit</option>
                                    </select></div>
                                <div class="col-3 dropDown"><select class="form-control" data-toggle="tooltip"
                                        data-placement="top" title="Marks" id="marks">
                                        <option value="2">2 Marks</option>
                                        <option value="3">3 Marks</option>
                                        <option value="10">10 Marks</option>
                                    </select></div>
                                <div class="col-3">
                                    <button class="btn btn-success text-center col-12" style="cursor:pointer;" id="submit"><b>Add</b></button>
                                    <button class="btn btn-warning text-center col-12" style="cursor:pointer; display: none;" id="edit-submit"><b>Update</b></button>
                                </div>
                            </div>
                            <div style="height:20px;"></div>
                            <div class="row">
                                <div class="col-10" style="padding: 5px;">
                                    <div class="progress">
                                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                                            style="width:0%;"></div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="Text-center">
                                        <p><b id="progressPercent"> </b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- delete panel -->
                        <div class="container-fluid pan d-" style="padding:10px 7%;min-height: 475px;" id="panel-delete">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <select   class="form-control subls" id="delete-selects">
                                        
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <button class="btn btn-danger w-full" id='delete-view'>view</button>
                                </div>
                                <div class="col col-md-12 col-sm-12 mt-2">
                                    <div class="input-group">
                                        <input type="search" class="col-12 form-control clearable" id='delete-searchbar' placeholder="Search for a Question">
                                    </div>
                                </div>
                                <hr class="col-12">
                                <!-- heading  -->
                                <div class="col-12 mt-2">
                                    <div class="row question">
                                        <div class="col-lg-2 col-md-2 col-sm-2 d-flex border-right text-center">
                                            <p class="align-self-center">
                                               <b> Sno Unit Mark</b>
                                            </p>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 border-right text-center">
                                            <p><b>Question</b>
                                            </p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2  text-center">
                                            <p class="align-self-center ">
                                                <b>Action [Delete]</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- list begins  -->
                                <div class="col-12 mt-2" id='delete-que'>
                                    <!-- <div class="row question">
                                        <div class="col-lg-3 col-md-2 col-sm-2 d-flex border-right">
                                            <div class="align-self-center">
                                                1
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-8 col-sm-12 border-right">
                                            <p>a sentence worded or expressed so as to elicit information.
                                                "we hope this leaflet has been helpful in answering your questions"
                                                synonyms: inquiry, query; More
                                                2.

                                            </p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 d-flex">
                                            <i class="btn btn-outline-danger fas fa-trash w-full align-self-center "
                                                style="font-size: x-large; padding: 5%;"></i>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- edit -->
                        <div class="container-fluid pan d-no" style="padding:10px 7%;min-height: 475px;" id="panel-edit">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <select  id="edit-select" class="form-control subls">
                                        
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <button class="btn btn-info w-full" id='edit-view'>view</button>
                                </div>
                                <div class="col col-md-12 col-sm-12 mt-2">
                                    <div class="input-group">
                                        <input type="search" class="col-12 form-control clearable" id='edit-searchbar' placeholder="Search for a Question">
                                    </div>
                                </div>
                                <hr class="col-12">
                                <!-- heading  -->
                                <div class="col-12 mt-2">
                                    <div class="row question">
                                        <div class="col-lg-2 col-md-2 col-sm-2 d-flex border-right text-center">
                                            <p class="align-self-center">
                                                <b>Sno Unit Mark</b>
                                            </p>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 border-right text-center">
                                            <p><b>Question</b>
                                            </p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2  text-center">
                                            <p class="align-self-center ">
                                                <b>Action [Edit]</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- list begins  -->
                                <div class="col-12 mt-2" id="edit-que">
                                    <!-- <div class="row question">
                                        <div class="col-lg-3 col-md-2 col-sm-2 d-flex border-right">
                                            <div class="align-self-center">
                                                1
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-8 col-sm-12 border-right">
                                            <p>a sentence worded or expressed so as to elicit information.
                                                "we hope this leaflet has been helpful in answering your questions"
                                                synonyms: inquiry, query; More
                                                2.

                                            </p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 d-flex">
                                            <i class="btn btn-outline-warning fas fa-pen-alt w-full align-self-center "
                                                style="font-size: x-large; padding: 5%;"></i>
                                        </div>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                        <!-- Worksheet -->
                        <div class="container-fluid pan " style="padding:10px 7%;" id="panel-worksheet">
                            <form action="worksheet.php" id="worksheet-form" method="POST" target="_blank" >
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <select name="subid" class="form-control subls">
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <input type="text" class="form-control text-center" disabled value="click on the image"
                                        id="">
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <img class="c-img" type=" submit" id="worksheet-cimg" title="Click to Generate worksheet" src="images/oldprint.jpg" alt="">
                            </div>
                            <input class="d-none" type="submit" id="worksheet-submit" >
                        </form>
                        </div>
                        <!-- Generate -->
                        <div class="container-fluid pan " style="padding:10px 7%;" id="panel-generate">
                        <form action="generate.php" id="generate-form" method="POST" target="_blank" >
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <select name="subid" class="form-control subls">
                                       
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <input type="text" class="form-control text-center" disabled value="click on the image"
                                        id="">
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <img class="c-img" id='generate-cimg' title="Click to Generate paper" src="images/oldprint1.jpg" alt="">
                            </div>
                            <input class="d-none" type="submit" id="generate-submit" >
                        </form>
                        </div>
                        <div style="height:20px;"></div>
                    </div>
                    <div class="row" style="background-color:#343434;padding:6px 25px;margin:auto;">
                        <div class="alert alert-warning w-full" role="alert">
                           <b>Info : </b><span class="alert-infoo"></span>                          </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="end"></div>
        <input type="hidden" name="tid" value='<?php echo $_SESSION['tid'];?>'>
    </div>
    <script src="jquery/panel.js"></script>
</body>

</html>