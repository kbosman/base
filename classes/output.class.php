<?php
require_once 'db.class.php';
class output extends db {
    
    public function __construct() {
        parent::__construct();
        $this->db_table = "";
        session_start();
    }

    public function tickets($velden, $bedrijf = NULL, $periode = NULL) {
//        $sql = "SELECT " . join(", ", $velden) ." FROM TICKET, STATUS_WIJZIGING";
//        $result = $this->select(NULL, NULL, $sql);
        // idTicket     TICKET      
        // bedrijfsnaam BEDRIJF     STATUS_WIJZIGING.idBedrijf
        $alleTicketID = $this->select(array("idTicket"));
        $return = array();
        foreach ($alleTicketID as $ticket){
            $return[$ticket] = $this->select();
        }
    }
    // SELECTING STUFF
//$fields = array("msg", "msg1");
//$where = array(
//    "id" => "1"
//);
//echo "<pre>";
//var_dump($db->select($fields, $where));
//echo "</pre>";
//
    
    public function openTickets() {
        
    }
    
    public function oplostijdTickets() {
        
    }
    
    public function ticket() {
        
    }
}
