<?php
require_once 'db.class.php';
class user extends db {

    // ONDERSTAANDE FUNCTIES NOG NIET GETEST!!! //
    public $test = TRUE;
    
    public function __construct() {
        parent::__construct();
        $this->db_table = "ACCOUNT";
        
        session_start();
    }

    public function register($fields, $Autorisatie) {
        // Store post input into $data and check for content
        $data = array();
        foreach ($fields as $key) {
            $data[$key] = filter_input(INPUT_POST, $key);
            if ($data[$key] === '') {
                trigger_error("Lege input");
            }
        }
        // Check if autorisatie is correct
        $autorisatieCheck = array('Teamleider', 'Admin', 'Medewerker', 'Bedrijfsmedewerker');
        if (!in_array($Autorisatie, $autorisatieCheck))
            trigger_error("Foute input in 'Autorisatie'");
        // Generate password hash using the safe PHP password_hash
        $data["Wachtwoord"] = password_hash($data["Wachtwoord"], PASSWORD_DEFAULT);
        // Check if the username allready exists
        $check = $this->select(array("Gebruikersnaam"), array("Gebruikersnaam" => $data["Gebruikersnaam"]));
        if (count($check) >= 1) {
            return "Gebruikersnaam bestaat al!";
        } else {
            // Insert the data into the database
            $check = $this->insert($data);
            if ($check === 1) {
                return TRUE;
            } else {
                trigger_error("Error bij het aanmaken van uw account!");
            }
        }
    }

    public function login() {
        // Store data into variables
        $gebruikersnaam = filter_input(INPUT_POST, "Gebruikersnaam");
        $wachtwoord = filter_input(INPUT_POST, "Wachtwoord");
        // Check if data exists
        if ($gebruikersnaam == '' OR $wachtwoord == '') {
            trigger_error("Niet genoeg gegevens ingevoerd!");
        } else {
            // Check if user exists
            $result = $this->select(array("Wachtwoord", "Autorisatie"), array("Gebruikersnaam" => $gebruikersnaam));
            if (count($result) === 0) {
                return "Gebruikersnaam niet gevonden!";
            } else {
                // Store hash and check if password is correct
                $hash = $result[0]["Wachtwoord"];
                if (password_verify($wachtwoord, $hash)) {
                    // Generate session variables
                    $_SESSION['loggedIn'] = TRUE;
                    $_SESSION['autorisatie'] = $result[0]["Autorisatie"];
                    $_SESSION['gebruikersnaam'] = $gebruikersnaam;
                    return TRUE;
                } else {
                    return "Verkeerd wachtwoord!";
                }
            }
        }
    }

    public function isLoggedIn() {
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
