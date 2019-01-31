<?php     
//echo 'done';  
include("resizeimg.php");
$output = 0; 
$uploadedfiles = "";
$error = "";
$qid = isset($_POST['qid'])?strval($_POST['qid']):"";
$max_file_size = 1024*200; // 200kb
$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
// thumbnail sizes
$sizes = array(100 => 100, 150 => 150, 250 => 250);
if(isset($_FILES['image']['name'][0]))  
{  $expensions= array("jpeg","jpg","png");
     //echo 'OK';  
     foreach($_FILES['image']['name'] as $keys => $values)  
     {        
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'][$keys])));
        if(in_array($file_ext,$expensions)=== false){
         $error.= "extension not allowed, please choose a JPEG or PNG file.";
           break;
        }
        $filename = 'questionImages/' . $qid."_".$keys.".".$file_ext;
        //echo $filename;
          if(file_exists($filename))
             unlink($filename);
            // $resizeddile = resize(500,750,$keys);
          if(move_uploaded_file($_FILES['image']['tmp_name'][$keys], $filename))  
          //if(move_uploaded_file($resizeddile, $filename))  
          {  
               $uploadedfiles=$uploadedfiles."<img src='".$filename."' style='margin:5px;' height='200px'>"; 
               $output++;
          }  
     }  
}
if($output>0) {
echo "<div> Files Uploaded : ".$output."      <a href='#'   id='viewImages'> View Images</a><span class='btn pull-right' style='cursor:pointer;' data-dismiss='alert'>&times;</span>";
echo <<<EOL
<!-- The Modal -->
<div class="modal fade" id="myModalImage" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: black;color: white;">
        <h4 class="modal-title">Uploaded Images</h4>
        <button type="button" class="close" style='color:white;' data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
        $uploadedfiles
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="imageModalClose">Close</button>
        </div>
        
    </div>
    </div>
</div>
</div>
EOL;
}
else
echo "Error!".$error;

?>  