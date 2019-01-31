$(function() {
var numberOfFiles = 0;
var boolNewRecord = 1;

//pannel tabs insert, delete, edit 
function noTabs(){
    $(".nav-item").removeClass('active');
}
$(".nav-item").click(function(){
    noTabs();
    $( this ).toggleClass( "active" );
    var property = "4px solid "+$(this).css("background-color");
    //console.log(property);
    $("#Panel").css("border",property);
});    

//set default 
function setDefault(){
    $("input:file").val('').clone(true);
    $("#question").val(''),
    $("#comment").val(''),
    $("#end").html('');
    numberOfFiles=0;

}
function removeAlerts(){
    $("#imglist").css("display","none");
    $(".progress-bar").animate({ width: '0%' });
        $("#progressPercent").html("");
}

$("#question").click(function(){
    if(boolNewRecord==0){
        removeAlerts();
        boolNewRecord=1;
    }
});
// Create recored : 3 steps create new record with random number, update that record with the data , upload files -> sequence process  
function createRecord(){
    var tempkey = 0;
    $.ajax({
        url:"createRecord.php",
        method:"POST",
        data:{
            passWOrd:"aFGKKJVYU5613",
            tablename : "questions_CSE"
        },
        success:function(e){
            console.log(e);
            if(e[0]=='1'){
                $(".progress-bar").animate({ width: '5%'});
                $("#progressPercent").html("Initiated");
                tempkey = e[1];
            var questionObj ={
                question:$("#question").val(),
                subject:$("#subject option:selected").val(),
                unit:$("#unit option:selected").val(),
                marks:$("#marks option:selected").val(),
                comments:$("#comment").val(),
                noOfFiles:numberOfFiles,
                qid:e[2]
            }
            $.ajax({
                url:"updateDbms.php",
                method : "POST",
                data:{
                    passWOrd: "aFGKKJVYU5613",
                    tempkey:tempkey,
                    operation: "add",
                    questionObj:JSON.stringify(questionObj)
                },
                success:function(e){
                    console.log(e);
                    if(e.status==1){
                        $("#errorDropdown").slideUp();
                        $(".progress-bar").animate({ width: '60%' }, 'slow');
                        imageUpload(filess,e.qid);
                        $(".progress-bar").animate({ width: '100%' }, 'slow',function(){
                            $("#progressPercent").html("100% Uploaded!");
                        });
                        setDefault();
                        boolNewRecord = 0;
                    }
                    else{
                        $("#errorDropdown").html(e.msg);
                        $("#errorDropdown").slideDown();
                    }
                }
            });
            }
        }
    });
}

$("#submit").click(function(){
    createRecord();
});
function clearPanel(){
    $(".pan").css("display", "none");
}
function fetchData(number){
    
}
//
$(".top-tab").click(function (e) {
    e.preventDefault();
    var id = $(this).attr('id');
    id = "#panel-"+id;
    clearPanel();
    $(id).css("display", "block");
    fetchData(id);
});


//images upload 
    $("#but_upload").click(function(){
        alert(0);
        var fd = new FormData();
        var files = $('#file')[0].files[0];
        fd.append('file',files);
        console.log(fd);
        $.ajax({
            url: 'imageupload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response != 0){
                    // $("#img").attr("src",response); 
                    // $(".preview img").show(); // Display image element
                    alert("uploaded");
                }else{
                    alert('file not uploaded');
                }
            },
        });
    });

});
