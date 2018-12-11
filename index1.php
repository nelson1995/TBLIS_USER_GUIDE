<?php
    if(isset($_GET['response'])){
        
        echo($_GET['response']);

    }
    $result = "";
    include("./services/TopicService.php");
    $column_name="name";
    $topicService=new TopicService();
    $result=$topicService->getList();
    
    if(isset($_GET['id'])){
        //get guide by id 
            
        include("./services/GuideService.php");
        // get details from service by id 
        $guideService=new GuideService();
        $guide = $guideService->getById($_GET['id']);
        
        //  populate the text fields with records based on the id
        while($row = mysqli_fetch_array($guide)){
            // $_GET['name'] = $row['name'];
            $_GET['subject'] =$row['subject'];
            $_GET['body'] =$row['body'];
            $_GET['status'] =$row['status'];
            $_GET['author'] = $row['author'];
            
        }        
    }
        

    //var_dump($result);
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: '#body',
    width:1000,
    height:400,
    theme:'modern',
    plugins:'code image print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen  image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount  imagetools  contextmenu colorpicker textpattern help',
    toolbar:'undo redo | image code | formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
    image_advtab:true,

    // without images_upload_url set, Upload tab won't show up
    images_upload_url: 'image_upload.php',
    
    // override default upload handler to simulate successful upload
    images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', 'image_upload.php');
      
        xhr.onload = function() {
            var json;

            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
        
            json = JSON.parse(xhr.responseText);
        
            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
        
            success(json.location);
        };
      
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
      
        xhr.send(formData);
    },
});
  </script>
</head>
<body>
<h1> GUIDE FORM </h1>
<form  action="GuideController.php<?= isset($_GET['id']) ? "?id=".$_GET['id']:"" ; ?>" method="POST">
<br/>
    <select name="topics">
    <!-- <option>--Select topic--</option> -->
        <?php 
                while($row=mysqli_fetch_array($result)){
                    $topic_name=$row["$column_name"];
                    echo("<option>$topic_name</br></option>");
                }
        ?>
    </select>
    <br/>
    <input type="text" value="<?= isset($_GET['subject']) ? $_GET['subject']: "" ;?>" name="subject" placeholder="subject">
    <br/>
    <textarea id="body" name="body" placeholder="body">

        <?= isset($_GET['body']) ? $_GET['body']: " " ;?>

    </textarea>
    <input type="text" value="<?= isset($_GET['author']) ? $_GET['author']: "" ;?>" name="author" placeholder="author">
    <br/> 
     <input type="submit" value="Submit" name="submit"> 
<table>
</table>
</form>
</body>
</html>