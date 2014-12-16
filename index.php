<?php

<<<<<<< HEAD
echo "<h1>Hello world</h1>";
echo "Hallo, dit is een test van Lesley";
echo "banaan"
=======
error_reporting(E_ALL);
>>>>>>> d6ed5fa8a748f26693d5202d50c73a4cc2cb648f

require_once 'classes/db.class.php';
$db = new db();
$db->db_table = "DEBUG";
$where = array("id" => "2", "msg" => "Test");
echo "<pre>";
var_dump($db->delete($where));
echo "</pre>";
