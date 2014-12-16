<?php
require_once 'user.class.php';
class create extends user {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function testParent() {
        echo $this->db_table;
        echo $this->test;
    }
}

//if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
//    $fields = array("Gebruikersnaam", "Wachtwoord", "Autorisatie");
//    var_dump($user->register($fields));
//}
////
//<html>
//    <head>
//        <title>Test</title>
//    </head>
//    <body>
//        <form action="" method="POST">
//            Gebruikersnaam: <input type="text" name="Gebruikersnaam" />
//            <br/>
//            Wachtwoord: <input type="text" name="Wachtwoord" />
//            <br/>
//            Autorisatie:<br/>
//            <select name="Autorisatie">
//                <option value="Teamleider">Teamleider</option>
//                <option value="Admin">Admin</option>
//                <option value="Medewerker">Medewerker</option>
//                <option value="Bedrijfsmedewerker">Bedrijfsmedewerker</option>
//            </select>
//            <br/>
//            <input type="submit" value="submit" name="submit" />
//        </form>
//    </body>
//</html>