<?php

class edit extends output
{

// WIJZIG GEGEVENS MEDEWERKER
    public function MedewerkerOpslaan($idMedewerker)
    {//GEGEVENS TERUG VOEREN
        return $data = array(
            "idMedewerker" => "",
            "Gebruikersnaam" => "",
            "Email" => "",
            "Voornaam" => "",
            "Achternaam" => "",
            "Tussenvoegsel" => "");

        $where = array("idMedewerker" => $idMedewerker);
    }

    public function editBedrijfsmedewerkerOpslaan($idBedrijfsmedewerker)
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

        $where = array("idBedrijfsmedewerker" => $idBedrijfsmedewerker);
    }

    public function EditBedrijfOpslaan($idBedrijf)
    { //GEGEVENS TERUG VOEREN
        return $data = array(
            "idBedrijf" => "",
            "Bedrijfsnaam" => "",
            "Adresgegevens" => "",
            "Telefoon" => "",
            "Email" => "",
            "Licentie" => "");

        $where = array("idBedrijf" => $idBedrijf );
    }
}
