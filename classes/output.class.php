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
//        $sql = "SELECT " . join(", ", $velden) ." FROM TICKET, STATUS_WIJZIGING";
//        $result = $this->select(NULL, NULL, $sql);
        // idTicket     TICKET      
        // bedrijfsnaam BEDRIJF     STATUS_WIJZIGING.idBedrijf
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
 
    public function openTickets() {
        
    }
    
    public function oplostijdTickets() {
        
    }
    
    public function ticket() {
        
    }
}
