$(function(){

$("#password").val(Math.floor((Math.random() * 100000000) + 1));
//Alert and dim alert box
function alertMsg(e,id,m=1){
    id = '#'+id+' .alert';
    $(id).css("opacity", '1'); 
    if(m==1)
        $(id).html(e);
    else
        $(id).append("&nbsp;&nbsp;"+e);
    setTimeout(() => {
        $(id).css("opacity", '0.6'); 
    }, 1000);
}

function setSubList(){
    $.ajax({
        type: "POST",
        url: "../admin/getsubjectslist.php",
        success: function (e) {
            //console.log(e);
            if(e.status==1){
                var html = '<option value="" selected disabled hidden>Choose Subject</option>';
                e.data.forEach(element => {
                html+="<option value='"+element.subid+"' >"+element.name+"</option>";
                });
                $("#subject-list").html(html);
                alertMsg('Fetched Subjects list.','add-teacher-sub',0);
            }else{
                alertMsg('Error! Fetching Subjects List.','add-teacher-sub',0);
            }
            
        },
        error:()=>{
            alertMsg('AJAX Error! Fetching Subjects List.','add-teacher-sub',0);
        }
    });
}
function setTeacherList(){
    $.ajax({
        type: "POST",
        url: "../admin/getteacherslist.php",
        success: function (e) {
            //console.log(e);
            if(e.status==1){
                var html = '<option value="" selected disabled hidden>Choose Teacher</option>';
                e.data.forEach(element => {
                html+="<option value='"+element.sno+"' >"+element.name+"</option>";
                });
                $("#teacher-list").html(html);
                alertMsg('  Fetched Teachers list.','add-teacher-sub');
            }else{
                alertMsg('Error! Fetching Teacher List.','add-teacher-sub');
            }
        },
        error:()=>{

        }
    });
}
//logs 
function setlogs(){
    $.ajax({
        type: "POST",
        url: "../admin/getlogs.php",
        success: function (e) {
            //console.log(e);
            if(e.status==1){
                var head='<div class="row bg-dark p-1 color-light text-light">                <span class="col-md-1 col-lg-1 col-sm-2 border-right">Sno</span>                <span class="col-md-4 col-lg-4 col-sm-10 border-right">Name</span>                <span class="col-md-2 col-lg-2 col-sm-10 border-right">Id</span>                <span class="col-md-2 col-lg-2 col-sm-10 border-right">Accessed Ip</span>                <span class="col-md-3 col-lg-3 col-sm-10 border-right">Timestamp</span>             </div><h4> </h4>';
                var html = "<h4> </h4><h3>admin' log</h3>";
                html+=head;
                e.data.forEach(element => {
                html+='<div class="row bg-light p-1">                <span class="col-md-1 col-lg-1 col-sm-2 border-right">'+element.sno+'</span>            <span class="col-md-4 col-lg-4 col-sm-10 border-right">'+element.name+'</span>                <span class="col-md-2 col-lg-2 col-sm-10 border-right">'+element.id+'</span>                <span class="col-md-2 col-lg-2 col-sm-10 border-right">'+element.ip+'</span>                <span class="col-md-3 col-lg-3 col-sm-10 border-right">'+element.timestamp+'</span>             </div>';
                });
                html+="<hr><h3>Teachers' log</h3>";
                html+=head;
                e.data1.forEach(element => {
                    html+='<div class="row bg-light p-1">                <span class="col-md-1 col-lg-1 col-sm-2 border-right">'+element.sno+'</span>            <span class="col-md-4 col-lg-4 col-sm-10 border-right">'+element.name+'</span>                <span class="col-md-2 col-lg-2 col-sm-10 border-right">'+element.id+'</span>                <span class="col-md-2 col-lg-2 col-sm-10 border-right">'+element.ip+'</span>                <span class="col-md-3 col-lg-3 col-sm-10 border-right">'+element.timestamp+'</span>             </div>';
                    });
                $("#m-logs").html(html);
                alertMsg('Fetched logs.','viewlog');
            }else{
                alertMsg('Error! Fetching logs.','viewlog');
            }
            
        },
        error:()=>{
            alertMsg('AJAX Error! Fetching logs.','viewlog');
        }
    });
}
function manageSublist(){
    $.ajax({
        type: "POST"    ,
        url: "../admin/getsubjectslist.php",
        success: function (e) {
            //console.log(e);
            if(e.status==1){
                var html = '';
                e.data.forEach(element => {
                html+='<div class="row bg-light p-1">                <span class="col-md-1 col-lg-1 col-sm-2 border-right">'+element.subid+'</span>                <span class="col-md-6 col-lg-6 col-sm-10 border-right">'+element.name+'</span>                <span class="col-md-3 col-lg-3 col-sm-10 border-right">'+element.subcode+'</span>                <span class="col-md-2 col-lg-2 col-sm-2">';
                if(element.status==1){
                    html+='<input type="checkbox" class="form-control m-sub-ck"  id="'+element.subid+'" checked="true"></span>            </div>';
                }else{
                    html+='<input type="checkbox" class="form-control m-sub-ck"  id="'+element.subid+'" ></span>            </div>';
                }
                });
                $("#m-sub").html(html);
                alertMsg('Fetched Subjects list.','manage-subject');
            }else{
                alertMsg('Error! Fetching Subjetcs List.','manage-subject');
            }

            $(".m-sub-ck").click(function (ee) { 
                //ee.preventDefault();
                var id = $(this).attr("id");
                var status = 0;
                if($(this).is(':checked')){
                    //alert("checked");
                    status=1;
                }
                $.ajax({
                    type: "POST",
                    url: "../admin/upddatesubject.php",
                    data: {
                        subid:id,
                        status:status,
                    },
                    success: function (ee) {
                        alertMsg(ee.msg,"manage-subject");
                    },
                    error:()=>{
                        alertMsg('AJAX Error!',"manage-subject");

                    }
                });
            });
        },
        error:()=>{
            alertMsg('Error! Updating data.','manage-subject');
        }
    });
}
function manageTeacherSublist(){
    $.ajax({
        type: "POST"    ,
        url: "../admin/getteachersubs.php",
        success: function (e) {
            //console.log(e);
            if(e.status==1){
                var html = '';
                e.data.forEach(element => {
                html+='<div class="row bg-light p-1">                <span class="col-md-1 col-lg-1 col-sm-2 border-right">'+element.sno+'</span>                <span class="col-md-5 col-lg-5 col-sm-10 border-right">'+element.tname+'</span>                <span class="col-md-4 col-lg-4 col-sm-10 border-right">'+element.subname+'</span>                <span class="col-md-2 col-lg-2 col-sm-2">';
                if(element.status==1){
                    html+='<input type="checkbox" class="form-control m-ts-ck"  id="'+element.sno+'" checked="true"></span>            </div>';
                }else{
                    html+='<input type="checkbox" class="form-control m-ts-ck"  id="'+element.sno+'" ></span>            </div>';
                }
                });
                $("#m-ts").html(html);
                alertMsg('Fetched Teachers Subjects list.','manage-teacher-sub');
            }else{
                alertMsg('Error! Fetching Teachers Subjects list.','manage-teacher-sub');
            }

            $(".m-ts-ck").click(function (eee) { 
                //eee.preventDefault();
                var id = $(this).attr("id");
                var status = 0;
                if($(this).is(':checked')){
                    //alert("checked");
                    status=1;
                }
                $.ajax({
                    type: "POST",
                    url: "../admin/upddateteachersub.php",
                    data: {
                        sno:id,
                        status:status,
                    },
                    success: function (ee) {
                        alertMsg(ee.msg,"manage-teacher-sub");
                    },
                    error:()=>{
                        alertMsg('AJAX Error!',"manage-teacher-sub");

                    }
                });
            });
        },
        error:()=>{
            alertMsg('Ajax Error!!.','manage-teacher-sub');
        }
    });
}
manageTeacherSublist();
setTeacherList();
setSubList();
manageSublist();
setlogs();
$("#reload-teacher-subs").click(function () { 
    setTeacherList();
    setSubList();    
});
$("#reload-manage-subs").click(function () { 
    manageSublist();   
});
$("#reload-viewlog").click(function () { 
    setlogs();   
});
$("#reload-manage-tsubs").click(function () { 
    manageTeacherSublist();
});
$("#add-t-btn").click(function () { 
    $.ajax({
        type: "POST",
        url: "../admin/addteacher.php",
        data: {
            id:$("#id").val(),
            name:$("#name").val(),
            email:$("#email").val(),
            password:$("#password").val()
        },
        success: function (e) {
            alertMsg(e.msg,'add-teacher');
            $("#id").val('');
            $("#name").val('');
            $("#email").val('');
            $("#password").val('');
            $("#password").val(Math.floor((Math.random() * 100000000) + 1));
},
        error:()=>{
            alertMsg('ajax error','add-teacher');
        }
    });
});

$("#add-s-btn").click(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "../admin/addsubject.php",
        data: {
            subname:$("#subname").val(),
            subcode:$("#subcode").val(),
        },
        success: function (e) {
            alertMsg(e.msg,'add-subject');
            $("#subname").val('');
            $("#subcode").val('');
            },
        error:()=>{
            alertMsg('ajax error','add-subject');
        }
    });
});

$("#add-ts-btn").click(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "../admin/addteachersubject.php",
        data: {
            tid:$("#teacher-list").val(),
            subid:$("#subject-list").val(),
        },
        success: function (e) {
            alertMsg(e.msg,'add-teacher-sub');
            $("#teacher-list").val('');
            $("#subject-list").val('');
            },
        error:()=>{
            alertMsg('ajax error','add-teacher-sub');
        }
    });
});

});