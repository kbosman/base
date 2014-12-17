<?php
require_once 'user.class.php';
class create extends user {
    
    public function __construct() {
        parent::__construct();
    }
    


public function FAQ() {
//Kevin Bosman
$this->db_table = "MEDEWERKER";

$fields = array("idMedewerker");
$where = array("Gebruikersnaam" => $_SESSION['gebruikersnaam']);

$idMedewerker = $this->select($fields, $where); 
//↑Medewerker id from logged in user


$this->db_table = "FAQ";

 $fields = array(
	"Vraag",
	"Beschrijving",
	"Oplossing");
	
//↑Ophalen van de benodige velden

	$data = array();
        foreach ($fields as $key) {
            $data[$key] = filter_input(INPUT_POST, $key);
				if ($data[$key] === '') {
					trigger_error("U heeft niets ingevuld!");
				}
		}
//↑Vullen van de benodige velden
			
	$check = $this->insert($data);
        if ($check === 1){
            return TRUE;
        } 	else{
				trigger_error("Fout tijdens het aanmaken van uw FAQ");
			}
//↑Velden naar database sturen
}



public function ticket() {
//Kevin Bosman
$this->db_table = "TICKET";

$fields = array(
	"IncidentType",
	"Probleemstelling",
	"Oplossing");
	
//↑Ophalen van de benodige velden

	$data = array();
        foreach ($fields as $key) {
            $data[$key] = filter_input(INPUT_POST, $key);
				if ($data[$key] === '') {
					trigger_error("U heeft niets ingevuld!");
				}
		}
		
		$incident = array('Vraag','Wens','Uitval','Functioneel probleem','Technisch probleem');
			if(!in_array($data["IncidentType"], $incident)){
				trigger_error("De invulmogelijkheden zijn: Vraag, Wens, Uitval, Functioneel probleem, Technisch probleem. Uw ingevulde incidenttype voldoet hier niet aan!");
			}
		
//↑Vullen van de benodige velden
			
	$check = $this->insert($data);
        if ($check === 1){
            return TRUE;
        } 	else{
				trigger_error("Fout tijdens het aanmaken van uw ticket");
			}
//↑Velden naar database sturen

}



public function create_status() {
$this->db_table = "STATUS_WIJZIGING";

}
}