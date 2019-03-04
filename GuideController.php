<?php

    include('./entities/Guide.php');
    include('./services/GuideService.php');

?>
<?php
        // $name=$_POST['name'];
        $status="active";
        $body=$_POST['body'];
        $subject=$_POST['subject'];
        // $author=$_POST['author'];
        $author=$_SESSION['username'];
        $date=date("Y-m-d");
        $topic_name=$_POST['topics'];
        
        $guide=new Guide();
        // $guide->setName($name);
        $guide->setBody($body);
        $guide->setSubject($subject);
        $guide->setStatus($status);
        $guide->setAuthor($author);
        $guide->setDateCreated($date);
        $guide->setTopicId($topic_name);



        $service = new GuideService();

    
        if(isset($_GET['id'])){

            $guide->setId($_GET['id']);
            $_GET['response']=$service->update($guide);

        }else if(isset($_GET['delete'])){
            $guide->setId($_GET['delete']);   
            $_GET['response']= $service->archive($guide);
    
        }else{

            $_GET['response'] = $service->create($guide);
        }    

        header("Location: index.php",true,301);
        // include("index1.php");
        exit();
    // exit(header("Location: listGuide.php"));
    // include("index1.php");
?>