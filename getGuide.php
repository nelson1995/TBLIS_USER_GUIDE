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
    while ($row = mysqli_fetch_array($results));
    
?>