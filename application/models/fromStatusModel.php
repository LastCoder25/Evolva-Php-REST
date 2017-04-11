<?php if
( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
Models which makes queries to the Company table of your database
*/
class FromStatusModel extends CI_Model
{
    /* ############### BASIC CRUD ################ */

    #* _________________ GET __________________ */
    /**
    Retrieve all volunteers of exchange
    @return query array of user
    */
    public function getVolunteersOfExchange($idExchange)
    {
      log_message('info', "getVolunteersOfExchange");
      $query = $this->db->query("CALL getVolunteersOfExchange($idExchange)");
      if($query -> num_rows() >= 1) return $query->result();
      else return false;
    }

    #* _________________ CREATE __________________ */
    /**
    Add a new volunteer
    @params $data Array of data received and decode from the json
    */
    public function add($data)
    {
        if (isset($data['idUser'])) $this->db->set('idUser', $data['idUser']);
        if (isset($data['idExchange'])) $this->db->set('idExchange', $data['idExchange']);
        $this->db->set ('idStatus', 1, FALSE);
        return $this->db->insert('fromStatus');
    }

    #* _________________ DELETE __________________ */
    /**
    Remove a volunteer
    @params $data Array of data received and decode from the json
    */
    public function remove($data)
    {
      log_message('info', "remove");
      $idUser = $data['idUser'];
      $idExchange = $data['idExchange'];
      return $this->db->query("CALL removeVolunteerOfExchange($idUser, $idExchange)");
      //if($query -> num_rows() >= 1) return $query->result();
      //else return false;
    }

}
