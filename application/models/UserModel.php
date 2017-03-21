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
    Retrieve one user
    @return query array of user
    */
    public function getOneUser($data)
    {
        log_message('info', "getOneUser");
        $this -> db -> select('identifiant');
        $this -> db -> from('user');
        $this -> db -> where('identifiant', $data['identifiant']);

        $query = $this -> db -> get();

        if($query -> num_rows() >= 1) return $query->result();
        else return false;
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
        //if (isset($data['accountCreationDate'])) $this->db->set ('accountCreationDate', 'NOW()', FALSE);
        return $this->db->insert('User');
    }

}
