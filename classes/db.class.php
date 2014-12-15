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
//        $sql = "INSERT INTO " . $this->db_table;
//        $fields = "(";
//        $values = " VALUES (";
//        $last_field = $this->link->real_escape_string(key(array_slice($array, -1, 1, TRUE)));
//        $last_value = '"' . $this->link->real_escape_string(array_pop($array)) . '"';
//        foreach ($array as $key => $value) {
//            $fields .= $this->link->real_escape_string($key) . ", ";
//            $values .= '"' . $this->link->real_escape_string($value) . '", ';
//        }
//        $fields .= $last_field . ")";
//        $values .= $last_value . ")";
//        $sql .= $fields . $values;
//        $query = $this->link->query($sql);
//        if ($query) {
//            return TRUE;
//        } else {
//            DIE("Error on insert: ('" . $this->link->errno . "' -> " . $this->link->error . ") SQL: " . $sql);
//            return FALSE;
//        }
        $insert = array();
        foreach($array as $t) $types .= "s";
        $insert[] = &$types;
        foreach($array as $key => $value){
            $insert[] = &$value;
        }
        return $insert;
    }

    public function update($data, $where) {
        //$data and $where should be a associates array with the field name as the key
        $sql = "UPDATE " . $this->db_table . " SET (";

        // getting last field and value because they shouldn't have a , at the end
        $last = '"' . $this->link->real_escape_string(key(array_slice($data, -1, 1, TRUE))) . '" = "' . $this->link->real_escape_string(array_pop($data)) . '"';
        
        // data processing
        foreach ($data as $key => $value) {
            $sql .= '"' . $this->link->real_escape_string($key) . '" = "' . $this->link->real_escape_string($value) . '", ';
        }
        
        // adding the last fields and where clause to the sql
        $sql .= $last . ") WHERE ";
        
        // getting last field and value because they shouldn't have a , at the end
        $last = '"' . $this->link->real_escape_string(key(array_slice($where, -1, 1, TRUE))) . '" = "' . $this->link->real_escape_string(array_pop($where)) . '"';
        
        // data processing
        foreach ($where as $key => $value) {
            $sql .= '"' . $this->link->real_escape_string($key) . '" = "' . $this->link->real_escape_string($value) . '", ';
        }
        
        // and the last assembly
        $sql .= $last . ";";
        
        // execute the query
        
    }

    public function select() {
        
    }

    public function delete() {
        
    }

}
