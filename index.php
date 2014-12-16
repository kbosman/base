<?php
error_reporting(E_ALL);

require_once 'classes/db.class.php';
$db = new db();
$db->db_table = "DEBUG";


//INSERT UPDATE SELECT DELETE

$array = array(
    "id" => 150,
    "msg" => "Twitter is kut",
    "msg1" => "vooral de foto's"
);
var_dump($db->insert($array));