<?php

class db {

    private $link;
    private $db_host = "localhost";
    private $db_user = "c1stenden";
    private $db_pass = "hdzaIS#8P";
    private $db_name = "c1base";
    public $db_table;

    public function __construct() {
        try {
            $this->link = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . ';charset=utf8', $this->db_user, $this->db_pass);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function insert($array) {
        //note: $array should use the keys as the field names! example: array(id => 1, name => john)
        try {
            $sql = "INSERT INTO " . $this->db_table . " (";
            $fields = array();
            $params = array();
            foreach ($array as $field => $value) {
                $params[] = '?';
                $fields[] = $field;
            }
            $stmt = $this->link->prepare($sql . join(', ', $fields) . ") VALUES (" . join(', ', $params) . ")");
            $i = 0;
            foreach ($array as $value) {
                $stmt->bindValue( ++$i, $value);
            }
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Error on insert: " . $e->getMessage() . "<br/>";
        }
    }

    public function update($data, $where) {
        try {
            $sql = "UPDATE " . $this->db_table . " SET ";

            // preparing sql for updatet data
            $fields = array();
            $params = array();
            foreach ($data as $field => $value) {
                $params[] = '?';
                $fields[] = $field . "=?";
            }
            $sql .= join(', ', $fields) . " WHERE ";

            // preparing sql for the where clause
            $fields = array(); // this will reset the content of the variable
            $params = array();
            foreach ($where as $field => $value) {
                $params[] = '?';
                $fields[] = $field . "=?";
            }
            $sql .= join(', ', $fields);

            // prepare the pdo statement
            $stmt = $this->link->prepare($sql);
            $i = 0;
            foreach ($data as $value) {
                $stmt->bindValue( ++$i, $value);
            }
            foreach ($where as $value) {
                $stmt->bindValue( ++$i, $value);
            }
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Error on update: " . $e->getMessage() . "<br/>";
        }
    }

    public function select() {
        
    }

    public function delete() {
        
    }

}
