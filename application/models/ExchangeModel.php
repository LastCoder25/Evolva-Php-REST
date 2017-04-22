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

    /**
    Retrieve all exchanges of a non volunteer
    @return query array of exchanges
    */
    public function getExchangesOfANonVolunteer($idUser)
    {
      log_message('info', "model - getExchangesOfANonVolunteer");
      $query = $this->db->query("CALL getAllExchangesOfNonVolunteer($idUser)");
      if($query -> num_rows() >= 1) return $query->result();
      else return false;
    }

    /**
    Retrieve all exchanges of a volunteer
    @return query array of exchanges
    */
    public function getEndedExchangesOfAVolunteer($idUser)
    {
      log_message('info', "model - getEndedExchangesOfAVolunteer");
      $query = $this->db->query("CALL getAllEndedExchangesOfVolunteer($idUser)");
      if($query -> num_rows() >= 1) return $query->result();
      else return false;
    }

    /**
    Retrieve all exchanges of a non volunteer
    @return query array of exchanges
    */
    public function getEndedExchangesOfANonVolunteer($idUser)
    {
      log_message('info', "model - getEndedExchangesOfANonVolunteer");
      $query = $this->db->query("CALL getAllEndedExchangesOfNonVolunteer($idUser)");
      if($query -> num_rows() >= 1) return $query->result();
      else return false;
    }
    
    #* _________________ CREATE __________________ */
    /**
    Create a new exchange
    @params $data Array of data received and decode from the json
    */
    public function create($data)
    {
        /* INSERT INTO User */
        if (isset($data['depositeFromDate']))   $this->db->set('depositeFromDate',      $data['depositeFromDate']);
        if (isset($data['depositeByDate']))     $this->db->set('depositeByDate',        $data['depositeByDate']);
        if (isset($data['sellFromDate']))       $this->db->set('sellFromDate',          $data['sellFromDate']);
        if (isset($data['sellByDate']))         $this->db->set('sellByDate',            $data['sellByDate']);
        if (isset($data['withdrawalFromDate'])) $this->db->set('withdrawalFromDate',    $data['withdrawalFromDate']);
        if (isset($data['withdrawalByDate']))   $this->db->set('withdrawalByDate',      $data['withdrawalByDate']);
        if (isset($data['type']))               $this->db->set('type',                  $data['type']);     
        return $this->db->insert('Exchange');
    }
    
    #* _________________ MODIFY __________________ */
    /**
    Modify an exchange
    @params $data Array of data received and decode from the json
    */
    public function update($data)
    {
        if (isset($data['depositeFromDate']))   $this->db->set('depositeFromDate',      $data['depositeFromDate']);
        if (isset($data['depositeByDate']))     $this->db->set('depositeByDate',        $data['depositeByDate']);
        if (isset($data['sellFromDate']))       $this->db->set('sellFromDate',          $data['sellFromDate']);
        if (isset($data['sellByDate']))         $this->db->set('sellByDate',            $data['sellByDate']);
        if (isset($data['withdrawalFromDate'])) $this->db->set('withdrawalFromDate',    $data['withdrawalFromDate']);
        if (isset($data['withdrawalByDate']))   $this->db->set('withdrawalByDate',      $data['withdrawalByDate']);
        //if (isset($data['type']))               $this->db->set('type',                  $data['type']);
        $this->db->where('idExchange', $data['idExchange']);
        return $this->db->update('Exchange', $data);
    }

}
