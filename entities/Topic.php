<?php
//  namespace entities;
    
    class Topic{
        private $id;
        private $name;
        private $status;
        private $author;
        private $date_created;

        public function __construct(){}

        public function setId($id){
            $this->id=$id;
        }

        public function setName($name){
            $this->name=$name;
        }

        public function setStatus($status){
            $this->status=$status;
        }

        public function setAuthor($author){
            $this->author=$author;
        }

        public function setDateCreated($date_created){
            $this->date_created=$date_created;
        }

        public function getId(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }

        public function getStatus(){
            return $this->status;
        }

        public function getAuthor(){
            return $this->author;
        }

        public function getDateCreated(){
            return $this->date_created;
        }
    }
?>