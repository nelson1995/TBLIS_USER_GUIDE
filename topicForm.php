
<?php include("../../includes/global_content.php");?>
<?php include("../../includes/session_start.php"); ?>
<?php
    if(isset($_GET['response'])){
        
        echo($_GET['response']);

    }

    if(isset($_GET['id'])){
        //todo: get topic by id 
        include("./services/TopicService.php");
        $topicService=new TopicService();
            
        //todo , get details from service by id 
        $topic = $topicService->getById($_GET['id']);
        
        // todo: populate the text fields with records based on the id
        while($row = mysqli_fetch_array($topic)){
            $_GET['name'] = $row['name'];
            $_GET['author'] = $row['author'];
        }        
    }
?>

<!DOCTYPE html>
<html lang="en" oncontextmenu="return false">
<head>
    <?php include("../../includes/header_content.php"); ?>
    <?php include("../../includes/header_bootstrap_content.php"); ?>
    <link href="../../scripts/custom_dashboard.css" rel="stylesheet" />
    <link href="../../scripts/custom_style.css" rel="stylesheet" />
    <link href="../../bootstrap336/css/bootstrap.min.css" rel="stylesheet" />
    <script type="text/javascript" src="../../bootstrap336/js/bootstrap.min.js"></script>
    <link href="../../scripts/bootstrap_font_awesome.css" rel="stylesheet" />
    <link href="./css/style.css" rel="stylesheet" type="text/css"/>
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
        <h1><span class="label "> TOPIC FORM </span></h1>
     <div class="form-group">
    <div class="col-xs-5">

<form  action="TopicController.php<?php echo isset($_GET['id']) ? "?id=".$_GET['id'] : "" ; ?>" method="POST" id="topicForm">
<br/>
    <input type="text" value="<?php echo isset($_GET['name']) ? $_GET['name']: "" ;?>" name="name" placeholder="name" class="form-control input-sm">
    <br/>
    <input type="text" value="<?php echo isset($_GET['author']) ? $_GET['author']: "" ;?>" name="author" placeholder="author" class="form-control input-sm">
    <br/>
    <!-- <input type="submit" value="Submit" name="submit">  -->
<table>
</table>
</form>

    <button type="submit" class="btn btn-success" form="topicForm">Submit</button>
</div>
</div>

 </div>

<?php  // stop checking for illegal login
} else include("../../includes/illegalaccess.php");?>
 </div>
 <div id="footer" class="row">
     
    <?php include("../../includes/footer.php"); ?>
 </div>
</div>
</body>
<script type="text/javascript">
    
    $('.selectize').selectize({
                    create: true,
                    sortField: {
                        field: 'text',
                        direction: 'asc'
                    },
                    dropdownParent: 'body'
                });
</script>
</html>