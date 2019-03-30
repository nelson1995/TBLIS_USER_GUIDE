<?php require_once('config.php'); ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php'); ?>
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
        while($row=mysqli_fetch_array($list)) 
        {
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
                        $results_per_page = 1;
                        $guideService = new GuideService();
                        $list = $guideService->getList();
                        $no_of_results = mysqli_num_rows($list);

                        // determine total no of pages
                        $no_of_pages = ceil($no_of_results/$results_per_page);
                        
                        if (!isset($_GET['page']))
                        {
                            $page = 1;
                        } 
                        else
                        {
                            $page = $_GET['page'];
                        }

                        $current_page_first_result = ($page - 1) * $results_per_page;
                        $results = $guideService->getContents($current_page_first_result,$results_per_page);
                        while ($row = mysqli_fetch_array($results)):
                    ?>
                <section class="welcome">
                        <div class="row">
                            <div class="col-md-12 left-align">
                                <?php echo "<header><h3><a href='guideForm.php?id=$row[id]'>Edit Content</a></h3><h2>"; ?>
                                <h2 class="dark-text"><?php echo $row['subject'];?><hr></h2>
                                <div class="row">

                                    <div class="col-md-12 full">
                                       <?php echo "<p>".$row['body']."</p>";
                                        echo "<footer><h4>".$row['date_created']."</h4></footer>"; ?>
                                        <hr>
                                   </div>

                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </section>                
                    <?php endwhile;?>
                    <?php
                        for($page = 1;$page <= $no_of_pages;$page++)
                        {
                            echo '<a href ="index.php?page='.$page.'">'.$page.'</a>';
                        }
                    ?>
                    <!-- end section -->
                </div>
                <!-- // end .col -->
            </div>
            <!-- // end .row -->
        </div>
        <!-- // end container -->

    </div>
    <!-- end wrapper -->
<?php require_once( ROOT_PATH . '/includes/footer_section.php') ?>
