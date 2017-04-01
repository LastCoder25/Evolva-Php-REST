<?php if
( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
Models which makes queries to the Company table of your database
*/
class ExchangeModel extends CI_Model
{
    /* ############### BASIC CRUD ################ */

    /* _________________ RETRIEVE __________________ */
    /**
    Retrieve all companies
    @return query array of companies
    */
    public function getAllExchanges()
    {
        log_message('info', "model - getAllExchanges");
        $query = $this->db->query("CALL getAllExchanges()");
        if($query -> num_rows() >= 1) return $query->result();
        else return false;
    }

    /**
    Retrieve all exchanges of a volunteer
    @return query array of exchanges
    */
    public function getExchangesOfAVolunteer($idUser)
    {
      log_message('info', "model - getExchangesOfAVolunteer");
      $query = $this->db->query("CALL getAllExchangesOfVolunteer($idUser)");
      if($query -> num_rows() >= 1) return $query->result();
      else return false;
    }

}
