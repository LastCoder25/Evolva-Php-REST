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
        $this -> db -> select('User.idUser, User.identifiant, Participant.firstname, Participant.lastname, Participant.mail, Participant.sexe, Participant.address, Participant.city, Participant.birthday');
        $this -> db -> from('User');
        $this -> db -> join('Participant', 'Participant.idUser = User.idUser');
        $this -> db -> where('User.identifiant', $identifiant);
        $this -> db -> where('User.password', $password);
        $query = $this -> db -> get();
        return $query->result();
    }

    /**
    Retrieve an admin
    @return query array of user
    */
    public function checkAdmin($idUser)
    {
        log_message('info', "checkAdmin");
        $this -> db -> select('*');
        $this -> db -> from('Admin');
        $this -> db -> where('idUser', $idUser);
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
        /* INSERT INTO User */
        if (isset($data['identifiant'])) $this->db->set('identifiant', $data['identifiant']);
        if (isset($data['password'])) $this->db->set('password', $data['password']);
        $this->db->insert('User');
        $insert_id = $this->db->insert_id();

        /* INSERT INTO Participant */
        $this->db->set('idUser', $insert_id);
        if (isset($data['firstname'])) $this->db->set('firstname', $data['firstname']);
        if (isset($data['lastname'])) $this->db->set('lastname', $data['lastname']);
        if (isset($data['active'])) $this->db->set('active', "true");
        $this->db->set ('accountCreationDate', 'NOW()', FALSE);
        return $this->db->insert('Participant');
    }

    #* _________________ MODIFY __________________ */
    /**
    Modify a user
    @params $data Array of data received and decode from the json
    */
    public function modify($data)
    {
        if (isset($data['firstname'])) $this->db->set('firstname', $data['firstname']);
        if (isset($data['lastname'])) $this->db->set('lastname', $data['lastname']);
        if (isset($data['mail'])) $this->db->set('mail', $data['mail']);
        if (isset($data['sexe'])) $this->db->set('sexe', $data['sexe']);
        if (isset($data['address'])) $this->db->set('address', $data['address']);
        if (isset($data['city'])) $this->db->set('city', $data['city']);
        if (isset($data['birthday'])) $this->db->set('birthday', $data['birthday']);
        $this->db->where('idUser', $data['idUser']);
        return $this->db->update('Participant', $data);
    }

}
