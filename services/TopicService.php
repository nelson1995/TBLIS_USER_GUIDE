<?php
include_once('./db/db.php');

class TopicService extends Db {

    public function __construct()
    {
        parent::__construct();            
    }

    public function create($topic)
    {
        $name = $topic->getName();
        $status = $topic->getStatus();
        $author = $topic->getAuthor();
        $date = $topic->getDateCreated();
        // todo: check to see that there is no topic with same name in db 
        if ($this->checkForDuplicateName($name) > 0)
        {
            return "Record already exists !";
        }
        $response = $this->query("INSERT INTO topic (name,status,author,date_created) 
                                    VALUES ('" . $name . "', 
                                        '" . $status . "' ,
                                        '" . $author . "',
                                        '" . $date ."')");

        return "Record successfully entered. ";
    }

    public function checkForDuplicateName($name)
    {    
        $query = $this->query("SELECT * FROM topic WHERE name='".$name."'");
        $result = mysqli_num_rows($query);
        return $result;
    }

    public function update($topic)
    {
        $id = $topic->getId();
        $name = $topic->getName();
        $status = $topic->getStatus();
        $author = $topic->getAuthor();
        $date_created = $topic->getDateCreated();

        if (mysqli_num_rows($this->getById($id)) <= 0)
        {
            return "Record doesn't exist !";
        }
        $response = $this->query("UPDATE topic SET  name='". $name ."' 
                            ,status = '" . $status . "'
                            , author ='". $author . "'
                            , date_created ='". $date_created ."'
                                WHERE id = '". $id."'");
        return "Record updated !";
    }

    public function archive($topic)
    {
        $id = $topic->getId();
        $response = $this->query("DELETE FROM topic WHERE  id ='". $id ."'");
        return "Record deleted !";            
    }

    public function getList()
    {
            $list = $this->query("SELECT * FROM topic");
            return $list;
    }

    public function getById($id)
    {    
        $list_by_id = $this->query("SELECT * FROM topic WHERE id = ".$id);
        return $list_by_id;    
    }
    
    public function getTopicLists()
    {   
        $topics = $this->query("SELECT id,name FROM topic");
        return $topics;                  
    }
}
?>