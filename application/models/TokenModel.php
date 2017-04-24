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
        $this -> db -> select('*');
        $this -> db -> from('Admin');
        $this -> db -> where('idUser', $idUser);
        $query = $this -> db -> get();
        if(count($query -> result()) > 0) {
            $this -> db -> set ('status', "Admin");
        } else {
            $this -> db -> set ('status', "user");
        }
        
        $token = '';
        $length = rand(12, 15);
        for ($i = 1; $i <= $length; $i++) {
            $token = $token . md5(uniqid(mt_rand(), true));
        }
        $this -> db -> set ('idUser', $idUser);
        $this -> db -> set ('token', $token);
        $query = $this -> db -> insert('session');
        return $token;
    }
    
    #* _________________ GET __________________ */
    /**
    Get idUser by token
    @params $data Array of data received and decode from the json
    */
    public function getIdUserFromToken($data)
    {
        log_message('info', "getIdUserFromToken");
        $this -> db -> select('*');
        $this -> db -> from('session');
        $this -> db -> where('token', $data);
        $query = $this -> db -> get();
        return $query->result();
    }
    
    #* _________________ DELETE __________________ */
    /**
    Delete a token
    @params $data Array of data received and decode from the json
    */
    public function deleteSession($data)
    {
        log_message('info', "deleteSession");
        $this -> db -> where('token', $data);
        $query = $this -> db -> delete('session');
        return "ok";
    }


}
