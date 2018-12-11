<html>
    <head>

    </head>

    <body>
     <?php  include_once("./services/TopicService.php");
     
     $topicService=new TopicService();


     $list=$topicService->getList();
    ?>
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
 <tr><td><a href="index.php?id=<?=$row['id'] ?>">Edit</a></td><td><?=$row['id'] ?></td><td><?=$row['name'] ?></td><td><?=$row['status'] ?></td><td><?=$row['author'] ?></td><td><?=$row['date_created'] ?></td> <td><a href="TopicController.php?delete=<?=$row['id'] ?>">  Delete</a></td></tr>
            
        <?php
    }
     
     ?>
     </table>
    </body>
</html>