<?php include("../../includes/global_content.php");?>
<!DOCTYPE html>
<html lang="en" oncontextmenu="return false">
    <head>
        <?php include("../../includes/header_content.php"); ?>
        <?php include("../../includes/header_bootstrap_content.php"); ?>
        <link href="../../scripts/custom_dashboard.css" rel="stylesheet" />
        <link href="../../scripts/custom_style.css" rel="stylesheet" /> 
        <link href="../../bootstrap336/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../../scripts/bootstrap_font_awesome.css" rel="stylesheet" />
        <script type="text/javascript" src="../../bootstrap336/js/bootstrap.min.js"></script>
    </head>
<body>

 <div id="wrapper" class="container-fluid">
    <div id="banner" class='row'>
        <?php include("../../includes/banner.php"); ?>
    </div>
 <div id="middle" class="row">
 <div id="welcome">
     <?php include("../../includes/welcomediv.php");?>
 </div>
 <div id="content" class="row" style="background: #fff;">
    <?php  include_once("./services/TopicService.php");
     
     $topicService=new TopicService();


     $list=$topicService->getList();?>
    <style>
        tr,th,td{
            border:1px solid black;
        }
    </style>
        <table >
             <tr><th>edit</th><th>id</th><th>name</th><th>status</th><th>author</th><th>date</th><th>delete</th></tr>
            
    <?php
    while($row = mysqli_fetch_array($list)){
        
        ?>
 <tr><td><a href="index.php?id=<?php echo $row['id'] ?>">Edit</a></td><td><?php echo $row['id'] ?></td><td><?php echo $row['name'] ?></td><td><?php echo $row['status'] ?></td><td><?php echo $row['author'] ?></td><td><?php echo $row['date_created'] ?></td><td><a href="TopicController.php?delete=<?php echo $row['id'] ?>">Delete</a></td></tr>
            
        <?php
    }
     
     ?>
     </table>
    </div>
    </div>
    <div id="footer" class="row"><?php include("../../includes/footer.php"); ?></div>
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



