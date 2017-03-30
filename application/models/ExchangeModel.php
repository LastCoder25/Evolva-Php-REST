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
        // $this -> db -> select('*');
        // $this -> db -> from('exchange');
        //
        // $query = $this -> db -> get();
        //
        // if($query -> num_rows() >= 1) return $query->result();
        // else return false;
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
      log_message('info', "getExchangesOfAVolunteer");
      //log_message('info', $idUser);
      $query = $this->db->query("CALL getAllExchangesOfVolunteer($idUser)");
      //log_message('info', $query->result());
      if($query -> num_rows() >= 1) return $query->result();
      else return false;
    }

}
