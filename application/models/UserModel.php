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
    Retrieve all companies
    @return query array of companies
    */
    public function getAllUsers()
    {
        $this -> db -> select('*');
        $this -> db -> from('user');

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
        log_message('info', "userModel debut");
        if (isset($data['identifiant'])) $this->db->POST('identifiant', $data['identifiant']);
        if (isset($data['firstname'])) $this->db->POST('firstname', $data['firstname']);
        if (isset($data['lastname'])) $this->db->POST('lastname', $data['lastname']);
        if (isset($data['password'])) $this->db->POST('password', $data['password']);
        //if (isset($data['accountCreationDate'])) $this->db->set ('accountCreationDate', 'NOW()', FALSE);
        log_message('info', "userModel fin");
        return $this->db->insert('User');
    }

}
