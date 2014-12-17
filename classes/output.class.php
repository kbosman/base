<?php
require_once 'db.class.php';
class output extends db {
    
    public function __construct() {
        parent::__construct();
        $this->db_table = "";
        session_start();
    }
    
    /*
    * Created by Lesley Jordan van Oostenrijk
    * Date: 17-12-2014
    * Description: public function tickets -> overzicht geven van alle tickets
     */
    
    public function tickets($velden, $bedrijf = NULL, $periode = NULL) {

        $alleTicketID = $this->select(array("idTicket"));
        $return = array();
        
        foreach ($alleTicketID as $ticket){
            $this->db_table = "TICKET";
            
            $return[$ticket]['IncidentType'] = $this->select(array("IncidentType"), array("idTicket" => $ticket));
            $return[$ticket]['ProbleemStelling'] = $this->select(array("ProbleemStelling"), array("idTicket" => $ticket));
            
            $this->db_table = "STATUS_WIJZIGING";
            $return[$ticket]['HuidigeStatus'] = $this->select(NULL, NULL, "SELECT Status FROM STATUS_WIJZIGING WHERE idTicket = " . $ticket . " ORDER BY idStatus DESC LIMIT 1");
            $return[$ticket]['GeopendOp'] = $this->select(NULL, NULL, "SELECT DatumTijd FROM STATUS_WIJZIGING WHERE idTicket = " . $ticket . " ORDER BY idStatus ASC LIMIT 1");
            
            $idBedrijf = $this->select(NULL, NULL, "SELECT idBedrijf FROM STATUS_WIJZIGING WHERE idTicket = " . $ticket . " ORDER BY idStatus ASC LIMIT 1");
            
            $this->db_table = "BEDRIJF";
            $return[$ticket]["Bedrijf"] = $this->select(array("BedrijfsNaam"), array("idBedrijf" => $idBedrijf));
        }
        
        return $return;
        
    }
 
    /*
    * Created by Lesley Jordan van Oostenrijk
    * Date: 17-12-2014
    * Description: public function tickets -> overzicht geven van alle tickets
     */
    
    public function openTickets() {
        
        $sql = "SELECT idTicket FROM STATUS_WIJZIGING WHERE Status != 'opgelost' OR Status != 'afgemeld' GROUP BY idTicket";
        $alleOpentickets = $this->select(NULL, NULL, $sql);
        $return = array();
        
        foreach ($alleOpentickets as $openticket){
            
            //Alle data uit Ticket wordt gehaald
            
            $this->db_table = "TICKET";
            
            $return[$ticket]['IncidentType'] = $this->select(array("IncidentType"), array("idTicket" => $ticket));
            $return[$ticket]['ProbleemStelling'] = $this->select(array("ProbleemStelling"), array("idTicket" => $ticket));
            
            //Alle data uit STATUS_WIJZIGING wordt gehaald
            
            $this->db_table = "STATUS_WIJZIGING";
            $return[$ticket]['HuidigeStatus'] = $this->select(NULL, NULL, "SELECT Status FROM STATUS_WIJZIGING WHERE idTicket = " . $ticket . " ORDER BY idStatus DESC LIMIT 1");
            $return[$ticket]['GeopendOp'] = $this->select(NULL, NULL, "SELECT DatumTijd FROM STATUS_WIJZIGING WHERE idTicket = " . $ticket . " ORDER BY idStatus ASC LIMIT 1");
            
            //Deze SQL moet uit STATUS_WIJZIGING GEHAALD worden voor bedrijf
            $idBedrijf = $this->select(NULL, NULL, "SELECT idBedrijf FROM STATUS_WIJZIGING WHERE idTicket = " . $ticket . " ORDER BY idStatus ASC LIMIT 1");
            
            //Alle data uit BEDRIJF wordt gehaald
            
            $this->db_table = "BEDRIJF";
            $return[$ticket]["Bedrijf"] = $this->select(array("BedrijfsNaam"), array("idBedrijf" => $idBedrijf));
        }
        
        return $return;
    }
    
    /*
    * Created by Lesley Jordan van Oostenrijk
    * Date: 17-12-2014
    * Description: public function tickets -> overzicht geven van alle tickets
     */
    
    public function oplostijdTickets() {
        $sql = "SELECT idTicket FROM STATUS_WIJZIGING WHERE Status = 'Nieuw' OR Status = 'afgemeld' GROUP BY idTicket";
        $solvetime = $this->select(NULL, NULL, $sql);
        $return = array();
    }
    
    /*
    * Created by Lesley Jordan van Oostenrijk
    * Date: 17-12-2014
    * Description: public function tickets -> overzicht geven van alle tickets
     */
    
    public function ticket() {
     $return = array();
     
     foreach($alletickets as $ticket){
         
     } 
     
    }
    
    public function MedewerkerOphalen($Achternaam = NULL, $idMedewerker = NULL)
    {   //OPHALEN GEGEVENS
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
    {   //OPHALEN GEGEVENS
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
    {
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
    {
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
