<?php

error_reporting(E_ALL);
    
require_once 'classes/db.class.php';
$db = new db();
$db->db_table = "DEBUG";


//INSERT UPDATE SELECT DELETE
//
//  INSERTING STUFF
//$array = array(
//    "id" => 150,
//    "msg" => "Twitter is kut",
//    "msg1" => "vooral de foto's"
//);
//var_dump($db->insert($array));
//
//  UPDATING STUFF
//$data = array(
//    "msg" => "Je moeder"
//);
//$where = array(
//    "id" => "2"
//);
//var_dump($db->update($data, $where));
//
// SELECTING STUFF

$fields = array("msg", "msg1");
$where = array(
    "id" => "1"
);
echo "<pre>";
var_dump($fields, $where);
echo "</pre>";