$(function() {

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
});    
//clear panel contents 
function clearPanel(){
    $(".pan").css("display", "none");
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
}
//worksheet{}
$("#worksheet-cimg").click(function () {    
    $("#worksheet-submit").click();
});
// Create recored : 2 steps:  inserts question to db, retrives its sno uploads image with that name  
function createRecord(){
    var question = $("#question").val();
    var comment = $("#comment").val();
    var subject = $("#subject").val();
    var unit = $("#unit").val();
    var marks = $("#marks").val();
    $.ajax({
        type: "POST",
        url: "insertquestion.php",
        data: {
            question:question,
            comment:comment,
            subject:subject,
            unit:unit,
            marks:marks
        },
        success: function (e) {
            if(e.status == 1){
                //console.log(e);
                var sno = e.data.sno;
                var subid = e.data.subid;
                if($('#file').get(0).files.length != 0){
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
                            }else{
                                alert('file not uploaded');
                            }
                        },
                    });
                }
                else{
                    setDefault();
                }
            }
        }
    });
}

$("#submit").click(function(){
    createRecord();
});

});
