<?php

class edit
{
    $select = 
    // WIJZIG GEGEVENS MEDEWERKER
    public function editMedewerker()
    {
        $fields = array("idMedewerker", "Gebruikersnaam", "Email" , "Voornaam", "Achternaam", "Tussenvoegsel");
        $where = array($_POST['textveld']);    
    }
    //WIJZIG GEGEVENS BEDRIJFSMEDEWERKER
    public function editBedrijfsmedewerker()
    {
        $fields = array("idBedrijfsMedewerkers", "idBedrijf", "Gebruikersnaam", "Email", "Voornaam", "Achternaam", "Tussenvoegsel", "Functie");
        $where = array($_POST['textveld']);        
    }
    //WIJZIG GEGEVENS BEDRIJF
    public function editBedrijf()
    {
        $fields = array("idBedrijf", "Bedrijfsnaam");
        $where = array($_POST['textveld']);        
    }

}
