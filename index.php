<?php
require_once 'classes/db.class.php';
$db = new db();
$db->db_table = "USERS";
echo "Hello world!";
$test = array(
    "voornaam" => "Pascal",
    "achternaam" => "Drewes",
    "leeftijd" => "18"
);

echo $db->insert($test);
?>