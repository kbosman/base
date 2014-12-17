<?php

class edit
{

// WIJZIG GEGEVENS MEDEWERKER
    public function MedewerkerOphalen()
    {   //OPHALEN GEGEVENS
        $fields = array(
            "idMedewerker",
            "Gebruikersnaam",
            "Email",
            "Voornaam",
            "Achternaam",
            "Tussenvoegsel");

        $where = array("idMedewerker" => "");
    }

    public function MedewerkerOpslaan()
    {//GEGEVENS TERUG VOEREN
        return $data = array(
            "idMedewerker" => "",
            "Gebruikersnaam" => "",
            "Email" => "",
            "Voornaam" => "",
            "Achternaam" => "",
            "Tussenvoegsel" => "");

        $where = array("idMedewerker" => "");
    }

// WIJZIG GEGEVENS BEDRIJFSMEDEWERKER
    public function BedrijfsmedewerkerOphalen($idBedrijfsmedewerker)
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

        $where = array("idBedrijfsmedewerker" => $idBedrijfsmedewerker);
        
    }

    public function editBedrijfsmedewerkerOpslaan()
    {   //GEGEVENS TERUG VOEREN
        return $data = array
            ("idBedrijfsMedewerkers" => "",
            "idBedrijf" => "",
            "Gebruikersnaam" => "",
            "Email" => "",
            "Voornaam" => "",
            "Achternaam" => "",
            "Tussenvoegsel" => "",
            "Functie" => "");

        $where = array("ID" => "");
    }

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
    }

    public function EditBedrijfOpslaan()
    { //GEGEVENS TERUG VOEREN
        return $data = array(
            "idBedrijf" => "",
            "Bedrijfsnaam" => "",
            "Adresgegevens" => "",
            "Telefoon" => "",
            "Email" => "",
            "Licentie" => "");

        $where = array("" => "");
    }
}
