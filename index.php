<?php
error_reporting(E_ALL);

// DEMO ON DB.CLASS
//require_once 'classes/db.class.php';
//$db = new db();
//$db->db_table = "DEBUG";
//
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
//$fields = array("msg", "msg1");
//$where = array(
//    "id" => "1"
//);
//echo "<pre>";
//var_dump($db->select($fields, $where));
//echo "</pre>";
//
// DELETING STUFF
//$where = array(
//    "Msg" => "Test"
//);
//var_dump($db->delete($where));
//
require_once 'classes/create.class.php';
$user = new user();
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    var_dump($user->login());
}
var_dump($user->isLoggedIn());
?>
<html>
    <head>
        <title>Test</title>
    </head>
    <body>
        <form action="" method="POST">
            Gebruikersnaam: <input type="text" name="Gebruikersnaam" />
            <br/>
            Wachtwoord: <input type="text" name="Wachtwoord" />
            <br/>
            <input type="submit" value="submit" name="submit" />
        </form>
    </body>
</html>