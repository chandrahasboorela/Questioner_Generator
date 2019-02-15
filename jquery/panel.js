$(function() {
//fetch subjects list //#endregion
function setSubjectsList(){
    $.ajax({
        type: "POST",
        url: "getsubjectslist.php",
        data:{
            mode:1,
            tid:$("input[name='tid']").val(),

        },
        success: function (e) {
            //console.log(e);
            if(e.status==1){
                var html = '<option value="0" selected disabled hidden>Choose Subject</option>';
                e.data.forEach(element => {
                html+="<option value='"+element.subid+"' >"+element.name+"</option>";
                });
                $(".subls").html(html);
                //alertMsg('Fetched Subjects list.');
            }else{
                alertMsg('Error! Fetching data.');
            }
            
        },
        error:()=>{
            alertMsg('AJAX Error! Fetching data.');
        }
    });
}
setSubjectsList();
//pannel tabs insert, delete, edit 
function noTabs(){
    $(".nav-item").removeClass('active');
}
$(".nav-item").click(function(){
    noTabs();
    $( this ).toggleClass( "active" );
    var property = "5px solid "+$(this).css("background-color");
    //console.log(property);
    $("#Panel").css("border",property);
    setSubjectsList();
});    
//clear panel contents 
function clearPanel(){
    $(".pan").css("display", "none");
    setDefault();
}

//tabls click action 
$(".top-tab").click(function (e) {
    e.preventDefault();
    var id = $(this).attr('id');
    id = "#panel-"+id;
    clearPanel();
    $(id).css("display", "block");
});

//set default 
function setDefault(){
    $("input:file").val('');
    $("#question").val('');
    $("#comment").val('');
    $(".qno").html('');
    $("#submit").css({'display':'block'});
    $("#edit-submit").css({'display':'none'});
}

//worksheet{}
$("#worksheet-cimg").click(function () {    
    $("#worksheet-submit").click();
});
//generate{}
$("#generate-cimg").click(function () {    
    $("#generate-submit").click();
});
//Alert and dim alert box
function alertMsg(e,m=1){
    $(".alert-infoo").css("opacity", '1'); 
    if(m==1)
        $(".alert-infoo").html(e);
    else
        $(".alert-infoo").append(e);
    setTimeout(() => {
        $(".alert-infoo").css("opacity", '0.6'); 
    }, 1000);
}

// Create recored : 2 steps:  inserts question to db, retrives its sno uploads image with that name  
function createRecord(qno=0){
    var question = $("#question").val();
    var comment = $("#comment").val();
    var subid = $("#subject").val();
    var unit = $("#unit").val();
    var marks = $("#marks").val();
    
    $.ajax({
        type: "POST",
        url: "insertquestion.php",
        data: {
            question:question,
            comment:comment,
            subid:subid,
            unit:unit,
            marks:marks,
            sno:qno
        },
        success: function (e) {
            if(e.status == 1){
                alertMsg("Question Added sucessfully!!");
                //console.log(e);
                var sno = e.data.sno;
                var subid = e.data.subid;
                let fileexists = $('#file').get(0).files.length;
                console.log($('#file')[0].files[0]);
                if(fileexists!= 0){
                    var fd = new FormData();
                    var files = $('#file')[0].files[0];
                    fd.append('file',files);
                    fd.append('name',sno);
                    fd.append('subid',subid);
                    $.ajax({
                        url: 'imageupload.php',
                        type: 'post',
                        data: fd,
                        contentType:false,
                        processData:false,
                        success: function(response){
                            if(response != 0){
                                setDefault();
                                alertMsg("File Upload Successfull",0);
                            }else{
                                alertMsg("File Upload Error: Failed Upload",0);
                            }
                        },
                        error:function(e){
                            alertMsg("File Uploaded Error:Ajax");
                        }
                    });
                }
                else{
                    setDefault();
                }
            }
            else{
                alertMsg(e.msg);
            }
        },
        error:function(){
            alertMsg("Question Uploaded Error:Ajax");
        }
    });
    alertMsg();
}

//get all questions
function getQuestions(id,subid,m){
    id= '#'+id;
    $.ajax({
        type: "POST",
        url: "getallquestions.php",
        data: {
            subid:subid,
        },
        success:function(e){
            //console.log(e.data[0][0].image);
            var html='';
            var i = 0;
            e.data.forEach(element => {
                 html+='<div class="row question border-bottom">            <div class="col-lg-2 col-md-2 col-sm-2 d-flex border-right" title="Unit-'+e.data[i].unit+'; '+e.data[i].marks+' marks;">                <div class="align-self-center border-right pr-3 pl-3" >'+e.data[i].sno+'</div><div class="align-self-center border-right pr-3 pl-3">'+e.data[i].unit+'</div><div class="align-self-center pr-3 pl-3">'+e.data[i].marks+'</div>            </div>            <div class="col-lg-8 col-md-8 col-sm-12 border-right" title="'+e.data[i].comment+'">                <p>       '+e.data[i].question+'        </p>            </div>            <div class="col-lg-2 col-md-2 col-sm-2 d-flex">                <i class="w-full align-self-center btn ';
                 if(m==-1){
                     html+=' btn-outline-danger del-btn fas fa-trash  " id="d'+e.data[i].sno+'"';
                 }else{
                    html+=' btn-outline-warning edit-btn fas fa-pen-alt  " id="e'+e.data[i].sno+'"';
                 }
                 html+='  title="'+subid+'"                   style="font-size: x-large; padding: 5%;"></i>            </div>';
                 if(e.data[i][0].image!=0){
                    html+='<img class="border" src="'+e.data[i][0].image+'?' + (new Date()).getTime()+'" style="max-width:5in;max-height:3.5in;text-align:center;margin-left:20%;">';
                    }
                html+='</div>';
                 i++;
            });
            $(id).html(html);
            //delete question
$(".del-btn").click(function (e) { 
    e.preventDefault();
    var subid = $(this).attr('title');
    var qno = $(this).attr('id');
    qno = qno.substr(1);
    if (confirm("Delete Question ?")) {
        $.ajax({
            type: "POST",
            url: "deletequestion.php",
            data: {
                subid:subid,
                qno:qno
            },
            success: function (e) {
                alertMsg(e.msg);
                $("#delete-view").click();
            },
            error:function(e){
                alertMsg("File Uploaded Error:Ajax");
            }
        });
      }
});
//edit question
$('.edit-btn').click(function (e) { 
    e.preventDefault();
    $("#panel-edit").css({'display':'none'});
    $("#panel-insert").css({'display':'block'});
    $("#submit").css({'display':'none'});
    $("#edit-submit").css({'display':'block'});
    var subid = $(this).attr('title');
    var qno = $(this).attr('id');
    qno = qno.substr(1);
    $.ajax({
        type: "POST",
        url: "getquestion.php",
        data: {
            subid:subid,
            qno:qno
        },
        success: function (e) {
            //console.log(e);
            $("#question").val(e.data[0].question);
            $("#marks").val(e.data[0].marks);
            $("#comment").val(e.data[0].comment);
            $("#subject").val(subid);
            $("#unit").val(e.data[0].unit);
            $(".qno").html(e.data[0].sno);
        },
        error:function(e){
            alertMsg("File Uploaded Error:Ajax");
        }
    });
});

        },
        error:function () {
            alertMsg("Ajax Error!!");
          }
        });
}

//unlink photo
$(".rm-img").click(function (e) { 
    e.preventDefault();
    var subid = $("#subject").val();
    var sno = $(".qno").html();
    $.ajax({
        type: "POST",
        url: "deleteimage.php",
        data: {
            subid:subid,
            sno:sno,
        },
        success: function (e) {
            if(e.status==1)
                alertMsg(e.msg);  
            else
            alertMsg(e.msg);  
        },
        error:function () {
            alertMsg("Error:Ajax");
          }
    });
});
//search delete 
$("#delete-searchbar").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#delete-que .question").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  //search edit 
$("#edit-searchbar").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#edit-que .question").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
//submit edited content
$("#edit-submit").click(function (ee) { 
    ee.preventDefault();
    var sno = $(".qno").html(); 
    createRecord(sno);
    setTimeout(() => {        
        $("#edit-view").click();
        $("#edit").click();
    },1000);
});
//delete
$("#delete-view").click(function (e) { 
    e.preventDefault();
    var ssid = $("#delete-selects ").val();
    //console.log(ssid);
    getQuestions('delete-que',ssid,-1);
});
//edit 
$("#edit-view").click(function (e) { 
    e.preventDefault();
    var sid = $("#edit-select").val();
    getQuestions('edit-que',sid,1);
});
$("#submit").click(function(){
    createRecord();
});
//x toggle for search box
function tog(v){return v?'addClass':'removeClass';} 
  $(document).on('input', '.clearable', function(){
    $(this)[tog(this.value)]('x');
  }).on('mousemove', '.x', function( e ){
    $(this)[tog(this.offsetWidth-18 < e.clientX-this.getBoundingClientRect().left)]('onX');   
  }).on('touchstart click', '.onX', function( ev ){
    ev.preventDefault();
    $(this).removeClass('x onX').val('').change();
  });
});
