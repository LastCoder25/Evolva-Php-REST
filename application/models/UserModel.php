<?php if
( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
Models which makes queries to the Company table of your database
*/
class UserModel extends CI_Model
{
    /* ############### BASIC CRUD ################ */

    /* _________________ RETRIEVE __________________ */
    /**
    Retrieve all users
    @return query array of users
    */
    public function getAllUsers()
    {
        $this -> db -> select('*');
        $this -> db -> from('user');

        $query = $this -> db -> get();

        if($query -> num_rows() >= 1) return $query->result();
        else return false;
    }

    /**
    Retrieve all users free to be volunteers of exchange
    @return query array of user
    */
    public function getUsersFreeToBeVolunteers($idExchange)
    {
      log_message('info', "getUsersFreeToBeVolunteers");
      $query = $this->db->query("CALL getUsersFreeToBeVolunteers($idExchange)");
      if($query -> num_rows() >= 1) return $query->result();
      else return false;
    }

    /**
    Retrieve one user
    @return query array of user
    */
    public function getOneUser($identifiant)
    {
        log_message('info', "getOneUser");
        log_message('info', $identifiant);
        $this -> db -> select('identifiant');
        $this -> db -> from('user');
        $this -> db -> where('identifiant', $identifiant);

        $query = $this -> db -> get();
        return $query->result();
    }

    /**
    Retrieve one account
    @return query array of user
    */
    public function getAccount($identifiant, $password)
    {
        log_message('info', "getAccount");
        $this -> db -> select('idUser, firstname, lastname');
        $this -> db -> from('user');
        $this -> db -> where('identifiant', $identifiant);
        $this -> db -> where('password', $password);

        $query = $this -> db -> get();

        return $query->result();
    }

    #* _________________ CREATE __________________ */
    /**
    Create a new user
    @params $data Array of data received and decode from the json
    */
    public function create($data)
    {
        if (isset($data['identifiant'])) $this->db->set('identifiant', $data['identifiant']);
        if (isset($data['firstname'])) $this->db->set('firstname', $data['firstname']);
        if (isset($data['lastname'])) $this->db->set('lastname', $data['lastname']);
        if (isset($data['password'])) $this->db->set('password', $data['password']);
        if (isset($data['active'])) $this->db->set('active', "true");
        $this->db->set ('accountCreationDate', 'NOW()', FALSE);
        return $this->db->insert('User');
    }

    #* _________________ MODIFY __________________ */
    /**
    Modify a user
    @params $data Array of data received and decode from the json
    */
    public function modify($data)
    {
        $this->db->where('idUser', $data['idUser']);
        return $this->db->update('user', $data);
    }

}
