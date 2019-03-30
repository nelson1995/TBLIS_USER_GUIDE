<?php

    class Guide {
        private $id;
        private $topic_id;
        private $subject;
        private $body;
        private $status;
        private $author;
        private $date_created;

        public function __construct() {}

        public function setId($id)
        {
            $this->id=$id;
        }
        
        public function setTopicId($topic_id)
        {
            $this->topic_id = $topic_id;
        }

        public function setSubject($subject)
        {
            $this->subject = $subject;
        }

        public function setBody($body)
        {
            $this->body = $body;
        }

        public function setStatus($status)
        {
            $this->status = $status;
        }

        public function setAuthor($author)
        {
            $this->author = $author;
        }

        public function setDateCreated($date_created)
        {
            $this->date_created = $date_created;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getSubject()
        {
            return $this->subject;
        }

        public function getBody()
        {
            return $this->body;
        }
        
        public function getTopicId()
        {
            return $this->topic_id;
        }

        public function getStatus()
        {
            return $this->status;
        }

        public function getAuthor()
        {
            return $this->author;
        }

        public function getDateCreated()
        {
            return $this->date_created;
        }
    }
?>