<?php
    include_once('./db/db.php');
    
    class GuideService extends Db {

        public function __construct() 
        {
            parent::__construct();            
        }

        function create($guide)
        {
            // $name=$guide->getName();           
            $subject = $guide->getSubject();
            $body = $guide->getBody();
            $status = $guide->getStatus();
            $author = $guide->getAuthor();
            $date_created = $guide->getDateCreated();
            $topic_name = $guide->getTopicId();
            $topic_id = $this->getTopicID($topic_name);

            if($this->checkForDuplicateName($name)>0)
            {
                return "Guide exists ! ";
            }
            $response = $this->query("INSERT INTO guide 
                                            (topic_id,subject,body,status,author,date_created) 
                                            VALUES('".$topic_id."','".$subject."'
                                                    ,'".$body."','".$status."'
                                                    ,'".$author."','".$date_created."') ");
                
            return "Guide entered successfully";
        }

        // get the id of the topic from the topic table
        function getTopicID($topic_name)
        {
            $topic_id = $this->query("SELECT id FROM topic WHERE name='".$topic_name."'");
            while($row = mysqli_fetch_array($topic_id))
            {
                $result = $row['id'];
            }
            return $result;
        }
        // check for duplicate guide name in guide table
        function checkForDuplicateName($name)
        { 
            $query = $this->query("SELECT * FROM guide WHERE name='".$name."'");
            $result = mysqli_num_rows($query);
            return $result;
        }

        function update($guide)
        {
            $id = $guide->getId();
            // $name=$guide->getName();           
            $subject = $guide->getSubject();
            $body = $guide->getBody();
            $status = $guide->getStatus();
            $author = $guide->getAuthor();
            $date_created = $guide->getDateCreated();
            $topic_name = $guide->getTopicId();
            $topic_id = $this->getTopicID($topic_name);
   
            if(mysqli_num_rows($this->getById($id))<=0)
            {
                return "record doesn't exist ! ";
            }        

            $response = $this->query("UPDATE guide SET topic_id='".$topic_id."' 
                                            ,subject = '" . $subject . "'
                                            ,body = '" . $body . "'
                                            ,status = '" . $status . "'
                                            , author ='". $author . "'
                                            , date_created ='". $date_created ."'
                                            WHERE guide.id = '". $id."'");
            return "Record updated !";
        }
        
        function archive($guide)
        {
            $id = $guide->getId();
            $response = $this->query("DELETE FROM guide WHERE  id ='". $id ."'");
            return "Record deleted !";            
        }

        function getList()
        {
            $topic_list = $this->query("SELECT g.id,t.name AS topic_name 
                                                ,g.subject,g.body
                                                ,g.status,g.author
                                                ,g.date_created FROM 
                                                guide AS g 
                                                INNER JOIN topic AS t 
                                                ON g.topic_id=t.id");
            return $topic_list;
        }

        function getContents($current_page_first_result,$results_per_page){
            $topic_list = $this->query("SELECT * 
                                                FROM guide LIMIT "
                                                .$current_page_first_result.
                                                ",".$results_per_page);
            return $topic_list;
        }
        
        function getById($id)
        {
            $list_by_id = $this->query("SELECT * FROM guide WHERE id=".$id);
            return $list_by_id;
        }
    }
?>