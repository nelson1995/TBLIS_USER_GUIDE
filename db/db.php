<?php
class Db extends mysqli {
    //single instance of self shared among all instances
    private static $instance = null;
    
    //db connection config vars
    private $user = "root";
    private $pass = "";
    private $dbName = "tblis_user_guide";
    private $dbHost = "localhost";
     
 
    // private constructor
    public function __construct() {
        parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
        if (mysqli_connect_error()) {
            exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
        parent::set_charset('utf-8');
    }
    
    // public function get_wisher_id_by_name($name) {

    //     $name = $this->real_escape_string($name);

    //     $wisher = $this->query("SELECT id FROM wishers WHERE name = '"

    //             . $name . "'");
    //     if ($wisher->num_rows > 0){
    //         $row = $wisher->fetch_row();
    //         return $row[0];
    //     } else
    //         return null;
    // }
    
    // public function get_wishes_by_wisher_id($wisherID) {
    //     return $this->query("SELECT id, description, due_date FROM wishes WHERE wisher_id=" . $wisherID);
    // }
    
    // public function create_wisher ($name, $password){
    //     $name = $this->real_escape_string($name);
    //     $password = $this->real_escape_string($password);
    //     $this->query("INSERT INTO wishers (name, password) VALUES ('" . $name . "', '" . $password . "')");
    // }
    
    
    // public function verify_wisher_credentials ($name, $password){
    //     $name = $this->real_escape_string($name);

    //     $password = $this->real_escape_string($password);
    //     $result = $this->query("SELECT 1 FROM wishers
    //                    WHERE name = '" . $name . "' AND password = '" . $password . "'");
    //     return $result->data_seek(0);
    // }
    
    
    // function insert_wish($wisherID, $description, $duedate){
    // $description = $this->real_escape_string($description);
    // if ($this->format_date_for_sql($duedate)==null){
    //     $this->query("INSERT INTO wishes (wisher_id, description)" .
    //          " VALUES (" . $wisherID . ", '" . $description . "')");
    // } else
    // $this->query("INSERT INTO wishes (wisher_id, description, due_date)" . 
    //                    " VALUES (" . $wisherID . ", '" . $description . "', " 
    //                    . $this->format_date_for_sql($duedate) . ")");
    // }
    
    
    // function format_date_for_sql($date){
    //     if ($date == "")
    //         return null;
    //     else {
    //         $dateParts = date_parse($date);
    //         return $dateParts["year"]*10000 + $dateParts["month"]*100 + $dateParts["day"];
    //     }

    // }
    
    // //function to verify the presence of a wish id in the database
    // public function update_wish($wishID, $description, $duedate){
    //     $description = $this->real_escape_string($description);
    //     if ($duedate==''){
    //         $this->query("UPDATE wishes SET description = '" . $description . "',
    //              due_date = NULL WHERE id = " . $wishID);
    //     } else
    //         $this->query("UPDATE wishes SET description = '" . $description .
    //             "', due_date = " . $this->format_date_for_sql($duedate)
    //             . " WHERE id = " . $wishID);
    // } 
    
    // //getting a wish by it's id
    // public function get_wish_by_wish_id ($wishID) {
    //     return $this->query("SELECT id, description, due_date FROM wishes WHERE id = " . $wishID);
    // }
}
?>