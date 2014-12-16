<?php
error_reporting(E_ALL);

require_once 'classes/db.class.php';
$db = new db();
$db->db_table = "DEBUG";
$where = array("id" => "2", "msg" => "Test");
echo "<pre>";
var_dump($db->delete($where));
echo "</pre>";
echo "hallo";