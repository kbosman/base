<?php
require_once 'classes/db.class.php';
$db = new db();
$db->db_table = "DEBUG";
echo "Hello world!";
$test = array(
    "id" => "1",
    "msg" => "Test",
    "msg1" => "Test1"
);
echo "<pre>";
var_dump($db->insert($test));
echo "</pre>";