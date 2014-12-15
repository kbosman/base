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
        echo "sucess<br/>";
    }

    public function insert($array) {
        //note: $array should use the keys as the field names! example: array(id => 1, name => john)
        $sql = "INSERT INTO " . $this->db_table;
        $fields = "(";
        $values = " VALUES (";
        foreach ($array as $key => $value) {
            $fields .= $key . ", ";
            $values .= "'" . $this->link->real_escape_string($value) . "', ";
        }
        $fields .= ")";
        $values .= ")";
        $sql .= $fields . $values;
        return $sql;
    }

    public function update() {
        
    }

    public function select() {
        
    }

    public function delete() {
        
    }

}
