<?php
class db {
    
    private $link;
    private $db_host = "localhost";
    private $db_user = "c1stenden";
    private $db_pass = "hdzaIS#8P";
    public $db_table;
    
    public function __construct() {
        $this->link = new mysqli($this->db_host, $this->db_user, $this->db_pass);       
        if ($this->link->connect_errno) {
            die("Error connecting to the database: " . $this->link->connect_error);
        }
    }
    
    public function insert() {
        
    }
    
    public function update() {
        
    }
    
    public function select() {
        
    }
    
    public function delete() {
        
    }
    
}
