<?php if
( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
Models which makes queries to the Company table of your database
*/
class TokenModel extends CI_Model
{
    /* ############### BASIC CRUD ################ */

    #* _________________ CREATE __________________ */
    /**
    Create a new token
    @params $data Array of data received and decode from the json
    */
    public function generate($idUser)
    {
        //basic examples
        $this->db->set ('idUser', $idUser);
        $token = '';
        $length = rand(120, 150);
        for ($i = 1; $i <= $length; $i++) {
            $token = $token . md5(uniqid(mt_rand(), true));
        }
        $this->db->set ('token', $token);
        $query = $this->db->insert('session');
        return $token;
    }
    
        #* _________________ CREATE __________________ */
    /**
    Delete a token
    @params $data Array of data received and decode from the json
    */
    public function delete($token)
    {
        //basic examples
        $this -> db -> where('token', $token);
        $this -> db -> delete('session');
    }


}
