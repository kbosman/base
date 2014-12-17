<?php

class edit
{

// WIJZIG GEGEVENS MEDEWERKER
    public function editMedewerkerOphalen()
    {   //OPHALEN GEGEVENS
        $fields = array(
            "idMedewerker",
            "Gebruikersnaam",
            "Email",
            "Voornaam",
            "Achternaam",
            "Tussenvoegsel");

        $where = array("" => "");
    }

    public function editMedewerkerOpslaan()
    {//GEGEVENS TERUG VOEREN
        return $data = array(
            "idMedewerker" => "",
            "Gebruikersnaam" => "",
            "Email" => "",
            "Voornaam" => "",
            "Achternaam" => "",
            "Tussenvoegsel" => "");

        $where = array("" => "");
    }

// WIJZIG GEGEVENS BEDRIJFSMEDEWERKER
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

        $where = array("" => "");
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
