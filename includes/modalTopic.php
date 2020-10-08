<?php include("../../includes/global_content.php");?>
<?php include("../../includes/session_start.php"); ?>
<?php
    if(isset($_GET['response']))
    {    
        echo($_GET['response']);
    }

    if(isset($_GET['id']))
    {
        //todo: get topic by id 
        include("./services/TopicService.php");
        $topicService=new TopicService();
            
        //todo , get details from service by id 
        $topic = $topicService->getById($_GET['id']);
        
        // todo: populate the text fields with records based on the id
        while($row = mysqli_fetch_array($topic))
        {
            $_GET['name'] = $row['name'];
            $_GET['author'] = $row['author'];
        }        
    }
?>

<!-- Modal Content Code -->
<div class="modal fade zoom" tabindex="-1" id="modalTopic">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Create Topic</h5>
            </div>
            <div class="modal-body">
                 <form action="TopicController.php<?php echo isset($_GET['id']) ? "?id=".$_GET['id'] : "" ; ?>" method="POST">
                    <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Topic name</label>
                        <input type="text" value="<?php echo isset($_GET['name']) ? $_GET['name']: "" ;?>" name="name" placeholder="name" class="form-control" name="code" required="required" placeholder="Enter the code ..">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Author</label>
                        <input type="text"  value="<?php echo isset($_GET['author']) ? $_GET['author']: "" ;?>" name="author" placeholder="author" class="form-control" name="rank" required="required" placeholder="Enter rank ..">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary" form="modalTopic">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
