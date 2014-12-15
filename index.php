<?php

error_reporting(E_ALL);

require_once 'classes/db.class.php';
$db = new db();
$db->db_table = "DEBUG";
$data = array(
    "msg1" => "this is weird",
);
$where = array(
    "id" => "2",
    "msg" => "2"
);
echo "<pre>";
var_dump($db->update($data, $where));
echo "</pre>";
