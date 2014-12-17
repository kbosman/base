<?php

require_once 'db.class.php';

class edit extends db
{

// WIJZIG GEGEVENS MEDEWERKER
    public function MedewerkerOpslaan($idMedewerker)
    {//GEGEVENS TERUG VOEREN
        $fields = array(
            $idMedewerker,
            $Gebruikersnaam,
            $Email,
            $Voornaam,
            $Achternaam,
            $Tussenvoegsel);

        foreach ($fields as $key)
        {
            $data[$key] = filter_input(INPUT_POST, $key);
            if ($data[$key] === '')
            {
                trigger_error("Lege input");
            }
        }
        $where = array("idMedewerker" => $idMedewerker);

        return $this->update($data, $where);
    }

    public function BedrijfsmedewerkerOpslaan($idBedrijfsmedewerker)
    {   //GEGEVENS TERUG VOEREN
        $fields = array(
            $idBedrijfsMedewerkers,
            $idBedrijf,
            $Gebruikersnaam,
            $Email,
            $Voornaam,
            $Achternaam,
            $Tussenvoegsel,
            $Functie);

        foreach ($fields as $key)
        {
            $data[$key] = filter_input(INPUT_POST, $key);
            if ($data[$key] === '')
            {
                trigger_error("Lege input");
            }
        }

        $where = array("idBedrijfsmedewerker" => $idBedrijfsmedewerker);

        return $this->update($data, $where);
    }

    public function BedrijfOpslaan($idBedrijf)
    { //GEGEVENS TERUG VOEREN
        return $data = array(
            $idBedrijf,
            $Bedrijfsnaam,
            $Adresgegevens,
            $Telefoon,
            $Email,
            $Licentie);

        foreach ($fields as $key)
        {
            $data[$key] = filter_input(INPUT_POST, $key);
            if ($data[$key] === '')
            {
                trigger_error("Lege input");
            }
        }

        $where = array("idBedrijf" => $idBedrijf);

        return $this->update($data, $where);
    }

}
