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
            foreach ($array as $value)
                $stmt->bindValue( ++$i, $value);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Error on insert: " . $e->getMessage() . "<br/>";
        }
    }

    public function update($data, $where) {
        //note: $data & $where should use the keys as the field names! example: array(id => 1, name => john)
        try {
            $sql = "UPDATE " . $this->db_table . " SET ";

            // preparing sql for updatet data
            $fields = array();
            foreach ($data as $field => $value)
                $fields[] = $field . "=?";
            $sql .= join(', ', $fields) . " WHERE ";

            // preparing sql for the where clause
            $fields = array(); // this will reset the content of the variable
            foreach ($where as $field => $value)
                $fields[] = $field . "=?";
            $sql .= join(' AND ', $fields);

            // prepare the pdo statement
            $stmt = $this->link->prepare($sql);
            $i = 0;
            foreach ($data as $value)
                $stmt->bindValue( ++$i, $value);
            foreach ($where as $value)
                $stmt->bindValue( ++$i, $value);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Error on update: " . $e->getMessage() . "<br/>";
        }
    }

    public function select($fields = NULL, $where = NULL, $sql = NULL) {
        //note: $fields is a normal array, $where should be a associative array whith the field names being the keys

        try {
            if ($sql !== NULL) {
                $stmt = $this->link->query($sql);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $sql = "SELECT ";
                // prepare the sql with ? for the fields
                $params = array();
                foreach ($fields as $field)
                    $params[] = $field;
                $sql .= join(", ", $params) . " FROM " . $this->db_table . " WHERE ";

                // prepare the sql with ? for the where clause
                $params = array();
                foreach ($where as $field => $value)
                    $params[] = $field . "=?";
                $sql .= join(" AND ", $params);

                // PDO PREPARE
                $stmt = $this->link->prepare($sql);
                $i = 0;
                foreach ($where as $value)
                    $stmt->bindValue( ++$i, $value);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            echo "Error on select: " . $e->getMessage() . "<br/>";
        }
    }

    public function delete($array) {
        //note: $where should be a associative array whith the field names being the keys
        try {
            // basic sql
            $sql = "DELETE FROM " . $this->table . " WHERE ";

            //generate rest of sql basing on the $array
            $params = array();
            foreach ($array as $key => $value) {
                $params[] = $key . "=?";
            }
            $sql .= join(" AND ", $params);

            //prepare the sql
            $stmt = $this->link->prepare($sql);

            //bind param
            $i = 0;
            foreach ($array as $value)
                $stmt->bindValue( ++$i, $value);
            
            //execute the query on the dbms
            $stmt->execute();
            
            //return the number of rows deleted
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Error on delete: " . $e->getMessage() . "<br/>";
        }
    }

}
