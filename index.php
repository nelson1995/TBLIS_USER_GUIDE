<?php require_once('config.php') ?>
<?php require_once(ROOT_PATH.'/includes/header_section.php'); ?>

<body class="docs-page">    
    <header class="header fixed-top">	    
        <div class="branding docs-branding">
            <div class="container-fluid position-relative py-2">
                <div class="docs-logo-wrapper">
					<button id="docs-sidebar-toggler" class="docs-sidebar-toggler docs-sidebar-visible mr-2 d-xl-none" type="button">
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                </button>
	                <div class="site-logo"><a class="navbar-brand" href="index.html"><img class="logo-icon mr-2" src=""><span class="logo-text">TBLIS<span class="text-alt">Docs</span></span></a></div>    
                </div><!--//docs-logo-wrapper-->
	            <div class="docs-top-utilities d-flex justify-content-end align-items-center">
	                <div class="top-search-box d-none d-lg-flex">
		                <form class="search-form">
				            <input type="text" placeholder="Search the docs..." name="search" class="form-control search-input">
				            <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
				        </form>
	                </div>
	            </div><!--//docs-top-utilities-->
            </div><!--//container-->
        </div><!--//branding-->
    </header><!--//header-->
    
    <div class="docs-wrapper">
	    <div id="docs-sidebar" class="docs-sidebar">
		    <div class="top-search-box d-lg-none p-3">
                <form class="search-form">
		            <input type="text" placeholder="Search the docs..." name="search" class="form-control search-input">
		            <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
		        </form>
            </div>
		    <nav id="docs-nav" class="docs-nav navbar">
                <ul class="section-items list-unstyled nav flex-column pb-3">
                    <?php
                        include("./services/GuideService.php");
                        include('./services/TopicService.php');
                        $topicService=new TopicService();
                                $list=$topicService->getList();
                                while($row=mysqli_fetch_array($list)): 
                    ?>
                    <?php  
                        echo "<li class='nav-item' ><a class='nav-link' href='topicForm.php?id=$row[id]'>Edit </a><a href='guideForm.php?id=$row[id]'>".$row['name']."</a></li>"; 
                    ?>
                    <?php endwhile; ?>
                </ul>

		    </nav><!--//docs-nav-->
	    </div><!--//docs-sidebar-->
        <div class="docs-content">
            
		    <div class="container">
                <article class="docs-article" id="section-1">
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
                </br>
                </br>
                <section class="docs-section" id="item-1-1">
                    <?php echo "<header>
                        <button type='submit' id='btn' data-toggle='modal' data-target='#modalTopic' class='btn btn-sm btn-primary float-left'>Add Topic</button>
                        <a type='submit' id='btn' data-toggle='modal' data-target='#modalContent' class='btn btn-sm btn-primary float-left'>Add Content</a>
                    <h3><a class='btn btn-sm btn-primary float-right' id='editBtn' href='guideForm.php?id=$row[id]'>Edit Content</a></h3><h2>"; ?>
                    </br>
                    </br>
                    <h2 class="section-heading"><?php echo $row['subject'];?></h2>
                    <?php echo "<p>".$row['body']."</p>";
                        echo '<footer><h4>'.$row['date_created'].'</h4></footer>'; 
                    ?>
                </section><!--//section-->
                <?php endwhile;?>
                <ul class = "pagination float-right">
                    <?php
                        echo '<li class="page-item"><a class="page-link" href ="index.php?page='.($page-1).'" class="button">Previous</a></li>';
                        for($p = 1;$p <= $no_of_pages;$p++)
                        {   
                            echo '<li class="page-item"><a class="page-link" href ="index.php?page='.$p.'">'.$p.'</a></li>';
                        }
                        echo '<li class="page-item"><a class="page-link" href ="index.php?page='.($page+1).'" class="button">Next</a></li>';
                    ?>
                </ul>
            </article>
        </div>
    </div>
    <?php require_once(ROOT_PATH.'/includes/modalTopic.php'); ?>
    <?php require_once(ROOT_PATH.'/includes/modalContent.php'); ?>
<?php require_once(ROOT_PATH.'/includes/footer_section.php'); ?>

