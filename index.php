<?php

error_reporting(E_ALL);

require_once 'classes/db.class.php';
$db = new db();
$db->db_table = "DEBUG";
$fields = array('id', 'msg1');
$where = array(
    "id" => "2"
);
echo "<pre>";
var_dump($db->select($fields, $where));
echo "</pre>";
