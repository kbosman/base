<?php

class edit
{
// WIJZIG GEGEVENS MEDEWERKER
    public function editMedewerker()
    {   //OPHALEN GEGEVENS
        $fields = array(
            "idMedewerker", 
            "Gebruikersnaam", 
            "Email", 
            "Voornaam", 
            "Achternaam", 
            "Tussenvoegsel");
        
        $where = array("" => "");
        
        //GEGEVENS TERUG VOEREN
        return $data = array (
            "idMedewerker" => "",
            "Gebruikersnaam" => "",
            "Email" => "",
            "Voornaam" => "", 
            "Achternaam" => "",
            "Tussenvoegsel" => ""); 
        
        $where = $where;   
    }

//WIJZIG GEGEVENS BEDRIJFSMEDEWERKER
    public function editBedrijfsmedewerker()
    {   //OPHALEN GEGEVENS
        $fields = array(
            "idBedrijfsMedewerkers", 
            "idBedrijf", 
            "Gebruikersnaam", 
            "Email", 
            "Voornaam", 
            "Achternaam", 
            "Tussenvoegsel", 
            "Functie");
        
        $where = array("" => "");
        
        //GEGEVENS TERUG VOEREN
        return $data = array
            ("idBedrijfsMedewerkers" => "", 
            "idBedrijf" => "",
            "Gebruikersnaam" => "",
            "Email" => "",
            "Voornaam" => "", 
            "Achternaam" => "", 
            "Tussenvoegsel" => "",
            "Functie" => "");
        
        $where = $where;}

//WIJZIG GEGEVENS BEDRIJF
    public function editBedrijf()
    {   //OPHALEN GEGEVENS
        $fields = array(
            "idBedrijf",
            "Bedrijfsnaam",
            "Adresgegevens",
            "Telefoon",
            "Email", 
            "Licentie");
        
        $where = array("" => "");
        
        //GEGEVENS TERUG VOEREN
        return $data = array(
            "idBedrijf" => "",
            "Bedrijfsnaam" => "",
            "Adresgegevens" => "",
            "Telefoon" => "",
            "Email" => "", 
            "Licentie" => "");
        
        $where = $where;
    }
}
