<?php

include('./entities/Topic.php');
include('./services/TopicService.php');
?>
<?php

    $name=$_POST['name'];
    $status="active";
    $author=$_POST['author'];
    // $author=$_SESSION['username'];
    $date=date("Y-m-d");
    $topic=new Topic();
    $topic->setName($name);
    $topic->setStatus($status);
    $topic->setAuthor($author);
    $topic->setDateCreated($date);
    
    $service = new TopicService();
    
    /**if the address variable id is set then update the database then redirect to listtopics page otherwise add data to the database */
    if(isset($_GET['id'])){
        $topic->setId($_GET['id']);
        $_GET['response']= $service->update($topic);
        
    }else if(isset($_GET['delete'])){
        $topic->setId($_GET['delete']);   
        $_GET['response']= $service->archive($topic);

    }else {    
        $_GET['response'] = $service->create($topic);
        
    }
    header("Location: index.php",true,302);
    include("topicForm.php");
    exit(); 
?>