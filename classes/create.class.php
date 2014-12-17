<?php
require_once 'user.class.php';
class create extends user {
    
    public function __construct() {
        parent::__construct();
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

public function create_FAQ() {
//Kevin Bosman
$this->db_table = "MEDEWERKER";

$fields = array("idMedewerker");
$where = array("Gebruikersnaam" => $_SESSION['gebruikersnaam']);

$idMedewerker = $this->select($fields, $where); 
//Medewerker id from logged in user


$this->db_table = "FAQ";

 $fields = array(
	"Vraag",
	"Beschrijving",
	"Oplossing");
	
//Ophalen van de benodige velden

	$data = array();
        foreach ($fields as $key) {
            $data[$key] = filter_input(INPUT_POST, $key);
				if ($data[$key] === '') {
					trigger_error("U heeft niets ingevuld!");
				}
		}
//Vullen van de benodige velden
			
	$check = $this->insert($data);
        if ($check === 1){
            return TRUE;
        } 	else{
				trigger_error("Fout tijdens het aanmaken van uw FAQ");
			}
//velden naar database sturen


}

public function create_ticket() {
$this->db_table = "TICKET";

}

public function create_status() {
$this->db_table = "STATUS_WIJZIGING";

}