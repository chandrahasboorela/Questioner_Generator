<html>
<?php
    session_start();
    if(!isset($_SESSION["key"]) && $_SESSION["key"]!="9FOj92VfeSbTQ54M"){
        header("Location:index.php");
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
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <style>
        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#0C9;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            box-shadow: 2px 2px 3px #999;
            padding: 10px;
            font-size:xx-large;
        }
    </style>
</head>

<body style='background-color: white;'>
  <div class="container">
  <a href="#head" class="float">
      <i class='fas fa-home'></i>
</a>
    <hr id='head'>
    <h1 class='text-center'>Admin Panel&nbsp;&nbsp;</h1>
    <hr>
    <div class="row " >
        <h1 class='col-6'>&nbsp;&nbsp;</h1>
        <h2 class='col-6 text-right'><?php echo $_SESSION['name'];?>&nbsp;&nbsp;<a href="logout.php" title="logout"><i class="fas fa-sign-out-alt btn btn-outline-dark pull-right "  style="font-size: inherit;"></i></a></h2>
        
    </div>
    <hr>
    <div>
        <a class="tab" href="#add-teacher">Add Teacher</a>
        <a class="tab" href="#add-subject">Add Subject</a>
        <a class="tab" href="#manage-subject">Manage Subjects</a>
        <a class="tab" href="#add-teacher-sub">Add Subject to Teacher</a>
        <a class="tab" href="#manage-teacher-sub">Manage Teachers and Subjects</a>
        <a class="tab" href="#viewlog">View Log</a>
    </div>
    
    <hr>
    <div class="jumbotron" id='add-teacher'>
      <h2>Add Teacher</h2>
      <hr>
      <div class="row">
          <label class="col-4" for="id">Id</label>
          <input class="col-8 form-control row " name="id" type="text" id="id" placeholder="id used for login " autofocus>
      </div>
      <div class="row">
          <label class="col-4" for="Name">Name</label>
          <input class="col-8 form-control row " name="Name" type="text" id="name" placeholder="Name " >
      </div>
      <div class="row">
          <label class="col-4" for="email">Email</label>
          <input class="col-8 form-control row " name="email" type="email" id="email" placeholder="email of user " >
      </div>
      <div class="row">
          <label class="col-4" for="password">password</label>
          <input class="col-8 form-control row " name="password" type="password" id="password" placeholder="password  for login " >
          <div class="col-4">&nbsp;</div>
          <i class="col-8">By default a 8 length random number is given as Password</i>
    </div>
    
    <div class="mb-3 flex text-right">
        <input class='btn btn-info pull-right pr-5 pl-5' type="button" value="Add Teacher" id='add-t-btn'>
      </div>
      <div class="alert alert-warning" role="alert">
          
        </div>
        </div>
    <hr>
    <div class="jumbotron" id='add-subject'>
        <h2>Add Subject</h2>
        <hr>
        <div class="row">
            <label class="col-4" for="subname">Subject Name</label>
            <input class="col-8 form-control row " name="id" type="text" id="subname" placeholder="Name of the Subject " >
        </div>
        <div class="row">
            <label class="col-4" for="subcode">Subject Code</label>
            <input class="col-8 form-control row " name="id" type="text" id="subcode" placeholder="Subject Code" >
        </div>
        
        <div class="mb-3 flex text-right">
          <input class='btn btn-primary pull-right pr-5 pl-5' type="button" value="Add Subject" id='add-s-btn'>
        </div>
        <div class="alert alert-warning" role="alert">
         
          </div>
      </div>
      <hr>
    <div class="jumbotron" id='manage-subject'>
        <h2>Manage Subjects &nbsp;<i class="fas fa-sync-alt btn btn-outline-success" id='reload-manage-subs'></i></h2>
        <hr>
        <div id='m-sub'>
            <div class="row bg-light p-1">
                <span class="col-md-1 col-lg-1 col-sm-2 border-right">Sno</span>
                <span class="col-md-6 col-lg-6 col-sm-10 border-right">Subject</span>
                <span class="col-md-3 col-lg-3 col-sm-10 border-right">Subject code</span>
                <span class="col-md-2 col-lg-2 col-sm-2"><input type="checkbox" class='form-control' name="" id=""></span>
            </div>
        </div>
        
        <div class="alert alert-warning mt-3" role="alert">
            
          </div>
      </div>
      <hr>
    <div class="jumbotron" id='add-teacher-sub'>
        <h2>Add Subject to Teacher&nbsp;<i class="fas fa-sync-alt btn btn-outline-success" id='reload-teacher-subs'></i></h2>
        <hr>
        <div class="row">
            <label class="col-4" for="Teacher" title="select Teacher">Teacher </label>
            <select class=" col-8 form-control teacherlist" name="teachers-list" title="select subject" id="teacher-list">

            </select>
        </div>
        <div class="row">
            <label class="col-4" for="subject">Subject </label>
            <select class=" col-8 form-control sublist" name="subjects-list" id="subject-list">

            </select>
        </div>
        
        <div class="mb-3 flex text-right">
          <input class='btn btn-warning pull-right pr-5 pl-5' type="button" value="Add Subject to Teacher" id='add-ts-btn'>
        </div>
        <div class="alert alert-warning" role="alert">
            
          </div>
      </div>
      <hr>
      <div class="jumbotron" id='manage-teacher-sub'>
          <h2>Manage Teachers and Subjects&nbsp;<i class="fas fa-sync-alt btn btn-outline-success" id='reload-manage-tsubs'></i></h2>
          <hr>
          <div id='m-ts'>
              <div class="row bg-light p-1">
                  <span class="col-md-1 col-lg-1 col-sm-2 border-right">Sno</span>
                  <span class="col-md-5 col-lg-5 col-sm-10 border-right">Teacher</span>
                  <span class="col-md-4 col-lg-4 col-sm-10 border-right">Subject</span>
                  <span class="col-md-2 col-lg-2 col-sm-2"><input type="checkbox" class='form-control' name="" id=""></span>
               </div>
          </div>
          <div class="alert alert-info mt-3" role="alert">
              
            </div>
        </div>
        <hr>
      <div class="jumbotron" id='viewlog'>
          <h2>View Log &nbsp;<i class="fas fa-sync-alt btn btn-outline-success" id='reload-viewlog'></i></h2>
          <hr>
          <!-- <div class="row bg-light p-1">
                <span class="col-md-1 col-lg-1 col-sm-2 border-right">Sno</span>
                <span class="col-md-4 col-lg-4 col-sm-10 border-right">Name</span>
                <span class="col-md-2 col-lg-2 col-sm-10 border-right">Id</span>
                <span class="col-md-2 col-lg-2 col-sm-10 border-right">Accessed Ip</span>
                <span class="col-md-3 col-lg-3 col-sm-10 border-right">Timestamp</span>
             </div> -->
          <div id='m-logs'>
              
          </div>
          <div class="alert alert-info mt-3" role="alert">
              
            </div>
        </div>
  </div>
  <script src="../jquery/admin.js"></script>
</body>

</html>