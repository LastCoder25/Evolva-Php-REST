<?php if
( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
Models which makes queries to the Company table of your database
*/
class UserModel extends CI_Model
{
    log_message('info', "UserModel ici");
    /* ############### BASIC CRUD ################ */

    /* _________________ RETRIEVE __________________ */
    /**
    Retrieve all companies
    @return query array of companies
    */
    public function getAllUsers()
    {
        log_message('info', "UserModel ici");
        $this -> db -> select('*');
        $this -> db -> from('user');

        $query = $this -> db -> get();

        if($query -> num_rows() >= 1) return $query->result();
        else return false;
    }

}
