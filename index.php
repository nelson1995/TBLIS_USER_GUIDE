<?php include("../../includes/global_content.php");?>
<?php include("../../includes/session_start.php"); ?>

<?php 

    include("./services/GuideService.php");
    include('./services/TopicService.php');
    $guideService=new GuideService();
    $list=$guideService->getList();
    function tableOfContents(){
      $topicService=new TopicService();
      $list=$topicService->getList();
        while($row=mysqli_fetch_array($list)){
           echo "<li class='list-group-item list-group-item-light'><a href='topicForm.php?id=$row[id]'>Edit </a><a href='#'>".$row['name']."</a></li>";
        }
      }

      function displayContents(){
      $guideService=new GuideService();
      $list=$guideService->getList();
      while($row=mysqli_fetch_array($list)){
        echo "<header><h3><a href='guideForm.php?id=$row[id]'>Edit Content</a></h3><h2>" .$row['subject']."</h2><h4></h4></header>";
        echo "<p>".$row['body']."</p>";
        echo "<footer><h4>".$row['date_created']."</h4></footer>";
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
<div class="container-fluid" >
        <div id="banner" class='row'  >
          <?php include("../../includes/banner.php"); ?>
        </div>

        <div id="middle" class='row'>
          <?php  // start checking for illegal login
            if(isset($_SESSION['username']) and isset($_SESSION['password'])){
              $role=$_SESSION['role'];  ?>
           
        <div id="welcome">
          <?php include("../../includes/welcomediv.php"); ?>
        </div>


    <div id="container">
      <div id="content">

          <div class="title"><h3>Table of Contents</h3>

            <ul class="list-group">
                
                <?php tableOfContents();?>
              
            </ul>
          </div>
          </div>
            <section class="contents border border-primary">
              <div class="searchSection">
                <form class="navbar-form" role="search" method="GET">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="search">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button> 
                      </div>
                    </div>
                </form>
              </div>
                <div class="addSection">
                    <form action="topicForm.php">
                      <button type="submit" id="btn" class="btn btn-primary">Add new Topic</button>
                    </form>
                    <form action="guideForm.php">
                      <button type="submit" id="btn" class="btn btn-primary">Add new Content</button>
                    </form>
                </div>
              <?php  displayContents(); ?>
            </section> 
        </div>

<?php  // stop checking for illegal login
} else include("../../includes/illegalaccess.php");?>
        </div>
      </div>
     <div id="footer" class="row"><?php include("../../includes/footer.php"); ?></div>
    </div>
    </body>
</html>