<html>
    <head>

    </head>

    <body>
     <?php  include("./services/GuideService.php");
     
     $guideService=new GuideService();


     $list=$guideService->getList();
    ?>
        <style>
            tr,th,td{
                border:1px solid black;
            }
        </style>
        <table frame="box">
             <tr><th>id</th><th>topic name</th><th>subject</th><th>status</th><th>author</th><th>date</th><th>Action</th></tr>
            
    <?php
    while($row = mysqli_fetch_array($list)){
        
        ?>
 <tr><td><?=$row['id'] ?></td><td><?=$row['topic_name'] ?></td><td><?=$row['subject']?></td><td><?=$row['status'] ?></td><td><?=$row['author'] ?></td><th><?=$row['date_created'] ?></td><td><a href="index1.php?id=<?=$row['id'] ?>">Edit</a>
      <a href="GuideController.php?delete=<?=$row['id'] ?>">  Delete</a></td></tr>
    <?php
    }
     
     ?>
     </table>
    </body>
</html>