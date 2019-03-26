<?php include("../../includes/global_content.php");?>
<?php include("../../includes/session_start.php"); ?>
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
        $guideService = new GuideService();
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
        
?>
<html lang="en" oncontextmenu="return false">
<head>
    <?php include("../../includes/header_content.php"); ?>
    <?php include("../../includes/header_bootstrap_content.php"); ?>
    <link href="../../scripts/custom_dashboard.css" rel="stylesheet" />
    <link href="../../scripts/custom_style.css" rel="stylesheet" />
    <link href="../../bootstrap336/css/bootstrap.min.css" rel="stylesheet" />
    <script type="text/javascript" src="../../bootstrap336/js/bootstrap.min.js"></script>
    <link href="../../scripts/bootstrap_font_awesome.css" rel="stylesheet" />
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: '#body',
    width:690,
    height:400,
    theme:'modern',
    plugins:'paste  code image print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen  image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount  imagetools  contextmenu colorpicker textpattern help ',
    toolbar:'paste | undo redo | image code | formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
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
<div id="wrapper" class="container-fluid">
    <div id="banner" class='row'>
        <?php include("../../includes/banner.php"); ?>
    </div>
 <div id="middle" class="row">
      <?php  // start checking for illegal login
      if(isset($_SESSION['username']) and isset($_SESSION['password'])){
      $role=$_SESSION['role'];  ?>
       
 <div id="welcome">
     <?php include("../../includes/welcomediv.php");?>
 </div>
 <div id="content" class="row" style="background: #fff;"> 

<h1><span class="label "> GUIDE FORM </span></h1>
<div class="form-group form-group-md">
    <div class="col-sm-9">
    <form  action="GuideController.php<?php echo isset($_GET['id']) ? "?id=".$_GET['id']:"" ; ?>" method="POST" id="guideForm">
    <br/>

    <label for="topics">Topics</label>
    <select name="topics" class="form-control">
    <!-- <option>--Select topic--</option> -->
        <?php 
                while($row=mysqli_fetch_array($result)){
                    $topic_name=$row["$column_name"];
                    echo("<option>$topic_name</br></option>");
                }
        ?>
    </select>
    </br>    
    <label for="subject">Subject</label>
    <input type="text" value="<?php echo isset($_GET['subject']) ? $_GET['subject']: "" ;?>" name="subject" placeholder="subject" class="form-control input-md">    
    

    <label for="author">Author</label>
        <input type="text" value="<?php echo isset($_GET['author']) ? $_GET['author']: "" ;?>" name="author" placeholder="author" class="form-control input-md"><br/> 

    <label for="body">Body</label>
    <textarea id="body" name="body" placeholder="body" class="form-control" >

        <?php echo isset($_GET['body']) ? $_GET['body']: " " ; ?>

    </textarea>
    
     <!-- <input type="submit" value="Submit" name="submit">  -->
    </form>
    <button type="submit" class="btn btn-success" form="guideForm">Submit</button>

    </div>
    </div>
    </div>

    <?php  // stop checking for illegal login
}   else include("../../includes/illegalaccess.php");?>
    </div>
</br>
 <div id="footer" class="row">
     
    <?php include("../../includes/footer.php"); ?>
 </div>
</div>
</body>
</html>