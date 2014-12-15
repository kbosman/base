<?php

class db {

    private $link;
    private $db_host = "localhost";
    private $db_user = "c1stenden";
    private $db_pass = "hdzaIS#8P";
    private $db_name = "c1base";
    public $db_table;

    public function __construct() {
        $this->link = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if ($this->link->connect_errno) {
            die("Error connecting to the database: " . $this->link->connect_error);
        }
    }

    public function insert($array) {
        //note: $array should use the keys as the field names! example: array(id => 1, name => john)
        $sql = "INSERT INTO " . $this->db_table;
        $fields = "(";
        $values = " VALUES (";
        $last_field = key(array_slice($array, -1, 1, TRUE));
        $last_value = array_pop($array);
        foreach ($array as $key => $value) {
            $fields .= $key . ", ";
            $values .= '"' . $this->link->real_escape_string($value) . '", ';
        }
        $fields .= $last_field . ")";
        $values .= $last_value . ")";
        $sql .= $fields . $values;
        $query = $this->link->query($sql);
        if($query){
            return TRUE;
        } else {
            DIE("Error on insert: ('" . $this->link->errno . "' -> " . $this->link->error . ") SQL: " . $sql);
            return FALSE;
        }
    }

    public function update() {
        
    }

    public function select() {
        
    }

    public function delete() {
        
    }

}
