<?php include("../../includes/global_content.php");?>
<?php include("../../includes/session_start.php"); ?>
<?php
    if(isset($_GET['response']))
    {  
        echo($_GET['response']);
    }
    $result = "";
    // include("./services/TopicService.php");
    $column_name="name";
    $topicService=new TopicService();
    $result=$topicService->getList();

    if(isset($_GET['id']))
    {
        //get guide by id        
        include("./services/GuideService.php");
        // get details from service by id 
        $guideService = new GuideService();
        $guide = $guideService->getById($_GET['id']);
        
        //  populate the text fields with records based on the id
        while($row = mysqli_fetch_array($guide))
        {
            // $_GET['name'] = $row['name'];
            $_GET['subject'] = $row['subject'];
            $_GET['body'] = $row['body'];
            $_GET['status'] = $row['status'];
            $_GET['author'] = $row['author'];       
        }        
    }        
?>
<!-- Modal Content Code -->
<div class="modal fade zoom" tabindex="-1" id="modalContent">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Create content</h5>
            </div>
            <div class="modal-body">
                 <form action="GuideController.php<?php echo isset($_GET['id']) ? "?id=".$_GET['id']:"" ; ?>" method="POST" action="{{route('store_role')}}" id="guideForm">
                    <div class="form-group">
                        <label class="form-label" for="topic">Select Topic</label>
                            <select name="topics[]" id="permissions" class="form-control" required>
                            <?php 
                                while($row=mysqli_fetch_array($result))
                                {
                                    $topic_name=$row["$column_name"];
                                    echo("<option>$topic_name</br></option>");
                                }
                            ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Subject</label>
                        <input type="text" value="<?php echo isset($_GET['subject']) ? $_GET['subject']: "" ;?>" name="subject" placeholder="subject" class="form-control input-md">    
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Author</label>
                        <input type="text" value="<?php echo isset($_GET['author']) ? $_GET['author']: "" ;?>" name="author" placeholder="author" class="form-control input-md"><br/> 
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea id="editor" name="body" placeholder="body" class="form-control" >
                            <?php echo isset($_GET['body']) ? $_GET['body']: " " ; ?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-success" form="guideForm">Success</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>