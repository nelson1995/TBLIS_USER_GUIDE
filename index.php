
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
<html>
<head>

</head>
<body>
<h1> TOPIC FORM </h1>
<form  action="TopicController.php<?= isset($_GET['id']) ? "?id=".$_GET['id'] : " " ; ?>" method="POST">
<br/>
    <input type="text" value="<?= isset($_GET['name']) ? $_GET['name']: "" ;?>" name="name" placeholder="name">
    <br/>
    <input type="text" value="<?= isset($_GET['author']) ? $_GET['author']: "" ;?>" name="author" placeholder="author">
    <br/>
    <input type="submit" value="Submit" name="submit"> 
<table>
</table>
</form>
</html>

