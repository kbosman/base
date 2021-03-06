<?php
//Made by Remco Beikes
require_once 'db.class.php';
class output extends db {
    public function MedewerkerOphalen($Achternaam = NULL, $idMedewerker = NULL)
    {   //OPHALEN MEDEWERKER GEGEVENS
        $this->db_table = "MEDEWERKER";
        $fields = array(
            "idMedewerker",
            "Voornaam",
            "Achternaam",
            "Tussenvoegsel");
        if($Achternaam !== NULL)
        {
        $where = array('Achternaam' => $Achternaam);
        }
        elseif($idMedewerker !== NULL)
        {
            $where = array('idMedewerker' => $idMedewerker);
        }
        $Medewerker = $this->select($fields, $where);
        return $Medewerker;
    }
    public function BedrijfsmedewerkerOphalen($idBedrijfsMedewerker)
    {   //OPHALEN BEDRIJFSMEDEWERKER GEGEVENS
        $this->db_table = "BEDRIJFSMEDEWERKER";
        $fields = array(
            "idBedrijfsMedewerker",
            "Voornaam",
            "Achternaam",
            "Tussenvoegsel");
        $where = array('Achternaam' => $Achternaam, 'idBedrijfsMedewerker' => $idBedrijfsMedewerker);
        $BedrijfsMedewerker = $this->select($fields, $where);
        return $BedrijfsMedewerker;
    }
    public function BedrijfOphalen($Bedrijfsnaam)
    {   //OPHALEN BEDRIJFS GEGEVENS
        $this->db_table = "BEDRIJF";
        $fields = array(
            "idBedrijf",
            "Bedrijfsnaam",
            "Adresgegevens",
            "Telefoon",
            "Email",
            "Licentie");
        $where = array('Bedrijfsnaam' => $Bedrijfsnaam);
        $Bedrijf = $this->select($fields, $where);
        return $Bedrijf;
    }   
    public function FaqOphalen()
    {   //OPHALEN FAQ GEGEVENS
        $this->db_table = "FAQ";
        $fields = array(
            "Vraag",
            "Beschrijving",
            "Oplossing",
            "idMedewerker"
        );
        $FAQ = $this->select($fields);
        return $FAQ;
    }
}
