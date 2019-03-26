<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <title>Item Name | Documentation by Author Name</title>

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/stroke.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" type="text/css" href="js/syntax-highlighter/styles/shCore.css" media="all">
    <link rel="stylesheet" type="text/css" href="js/syntax-highlighter/styles/shThemeRDark.css" media="all">

    <!-- CUSTOM -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?php 
    include("./services/GuideService.php");
    include('./services/TopicService.php');
    $title = "TBLIS USER-GUIDE";
    $subtitle = "version 1.0 ";
    $guideService=new GuideService();
    $list=$guideService->getList();
    function tableOfContents(){
        $topicService=new TopicService();
        $list=$topicService->getList();
        while($row=mysqli_fetch_array($list)){

            echo "<li><a href='topicForm.php?id=$row[id]'>Edit </a><a href='#'>".$row['name']."</a></li>";
        }
      }
?>
<body>

    <div id="wrapper">

        <div class="container">

            <section id="top" class="section docs-heading">

                <div class="row">
                    <div class="col-md-12">
                        <div class="big-title text-center">
                        <?php echo "<h1>".$title."</h1"; ?>
                            <p class="lead"><?php echo "<h2>".$subtitle."</h2"; ?></p>
                        </div>
                        <!-- end title -->
                    </div>
                    <!-- end 12 -->
                </div>
                <!-- end row -->

                <hr>

            </section>
            <!-- end section -->
            <div class="row">
                <div class="col-md-3">
                    <nav class="docs-sidebar" data-spy="affix" data-offset-top="300" data-offset-bottom="200" role="navigation">
                    <?php $topicService=new TopicService();
                          $list=$topicService->getList();
                          while($row=mysqli_fetch_array($list)): ?>
                        
                            <ul class="nav">
                                <?php  
                                    echo "<li><a href='topicForm.php?id=$row[id]'>Edit </a><a href='#'>".$row['name']."</a></li>"; 
                                ?>
                            </ul>
                        
                    <?php endwhile;?>
                    </nav >
                </div>

                <div class="col-md-9">

                <div class="addSection">
                    <form action="topicForm.php">
                      <button type="submit" id="btn" class="btn btn-primary">Add new Topic</button>
                    </form>
                    <form action="guideForm.php">
                      <button type="submit" id="btn" class="btn btn-primary">Add new Content</button>
                    </form>
                </div>

                <?php 
                    $guideService=new GuideService();
                    $list=$guideService->getList();
                    while($row = mysqli_fetch_array($list)):
                ?>
                    <section class="welcome">
                        <div class="row">
                            <div class="col-md-12 left-align">
                                <?php echo "<header><h3><a href='guideForm.php?id=$row[id]'>Edit Content</a></h3><h2>"; ?>
                                <h2 class="dark-text"><?php echo $row['subject'];?><hr></h2>
                                <div class="row">

                                    <div class="col-md-12 full">
                                        <!-- <div class="intro1">
                                            <ul>
                                                <li><strong>Item Name : </strong>Gather Responsive Event Template</li>
                                                <li><strong>Item Version : </strong> v 1.0</li>
                                                <li><strong>Author  : </strong> <a href="http://themeforest.net/user/surjithctly" target="_blank">Surjith S M</a></li>
                                                <li><strong>Support Forum : </strong> <a href="https://support.surjithctly.in/forums" target="_blank">https://support.surjithctly.in/forums</a></li>
                                                <li><strong>License : </strong> <a href="#" target="_blank">Un License</a></li>
                                            </ul>
                                        </div> -->
                                       <?php echo "<p>".$row['body']."</p>";
                                        echo "<footer><h4>".$row['date_created']."</h4></footer>"; ?>
                                        <hr>
                                   </div>

                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </section>
                    <?php endwhile; ?>
                    <!-- <section id="line11" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Copyright and license <a href="#top">#back to top</a><hr></h2>
                            </div>
                            end col
                        </div>
                        end row

                        <div class="row">
                            <div class="col-md-12">
                                
                                <p>Code released under the <a href="#" target="_blank">Un License</a> License.</p>                        
                                <p>For more information about copyright and license check <a href="https://choosealicense.com/" target="_blank">choosealicense.com</a>.</p>
                            
                            </div>
                        </div>
                        end row

                    </section> -->
                    <!-- end section -->
                </div>
                <!-- // end .col -->

            </div>
            <!-- // end .row -->

        </div>
        <!-- // end container -->

    </div>
    <!-- end wrapper -->

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/retina.js"></script>
    <script src="js/jquery.fitvids.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>

    <!-- CUSTOM PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/main.js"></script>

    <script src="js/syntax-highlighter/scripts/shCore.js"></script>
    <script src="js/syntax-highlighter/scripts/shBrushXml.js"></script>
    <script src="js/syntax-highlighter/scripts/shBrushCss.js"></script>
    <script src="js/syntax-highlighter/scripts/shBrushJScript.js"></script>

</body>

</html>