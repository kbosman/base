<!--http://stenden-ehelp.nl/classes/create.class%20-%20Martijn.php-->

<?php
require_once 'user.class.php';

class create extends user
{

    public function __construct()
    {
        parent::__construct();
    }

    
    public function medewerker()
    {
        $this->db_table = "MEDEWERKER";
        if ($this->register(array("Gebruikersnaam", "Wachtwoord", "Autorisatie"), "Medewerker"))
        {
            $data = array();
            $fields = array(
                "idMedewerker",
                "Email",
                "voornaam",
                "Achternaam",
                "Tussenvoegsel");
            foreach ($fields as $field)
            {
                $data[$field] = filter_input(INPUT_POST, $field);
                if ($data[$field] === '')
                {
                    trigger_error("Lege input");
                }
            }
        }
        // Insert the data into the database
        $this->db_table = "MEDEWERKER";
        $check = $this->insert($data);
        if ($check === 1)
        {
            return TRUE;
        } else
        {
            trigger_error("Error bij het aanmaken van uw account!");
        }
    }

    
    public function bedrijfsMedewerker($idBedrijf)
    {
        $this->db_table = "BEDRIJF";
        $check = $this->select(array($idBedrijf), array("idBedrijf" => $idBedrijf));
        if (count($check) === 1)
        {
            if ($this->register(array("Gebruikersnaam", "Wachtwoord", "Autorisatie"), "bedrijfsMedewerker"))
            {
                $data = array();
                $fields = array(
                    "idBedrijfsMedewerker",
                    "idBedrijf",
                    "Email",
                    "voornaam",
                    "Achternaam",
                    "Tussenvoegsel",
                    "Functie");
                foreach ($fields as $field)
                {
                    $data[$field] = filter_input(INPUT_POST, $field);
                    if ($data[$field] === '')
                    {
                        trigger_error("Lege input");
                    }
                }
            }
            // Insert the data into the database
            $this->db_table = "BEDRIJFSMEDEWERKER";
            $check = $this->insert($data);
            if ($check === 1)
            {
                return TRUE;
            } else
            {
                trigger_error("Error bij het aanmaken van uw account!");
            }
        } else
        {
            echo "bedrijf bestaat niet";
        }
    }

    
    public function bedrijf($idBedrijf)
    {
        $this->db_table = "BEDRIJF";
        $check = $this->select(array($idBedrijf), array("idBedrijf" => $idBedrijf));
        if (count($check) === 1)
        {
            if ($this->register(array("Gebruikersnaam", "Wachtwoord", "Autorisatie"), "bedrijfsMedewerker"))
            {
                $data = array();
                $fields = array(
                    "idBedrijf",
                    "Bedrijfsnaam",
                    "Adresgegevens",
                    "Telefoon",
                    "Email",
                    "Licentie");
                foreach ($fields as $field)
                {
                    $data[$field] = filter_input(INPUT_POST, $field);
                    if ($data[$field] === '')
                    {
                        trigger_error("Lege input");
                    }
                }
            }
            // Insert the data into the database
            $this->db_table = "BEDRIJF";
            $check = $this->insert($data);
            if ($check === 1)
            {
                return TRUE;
            } else
            {
                trigger_error("Error bij het aanmaken van uw account!");
            }
        } else
        {
            echo "bedrijf bestaat niet";
        }
    }

}