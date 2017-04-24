<?php if
( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
Models which makes queries to the Company table of your database
*/
class TypeOfClothesModel extends CI_Model
{
    /* ############### BASIC CRUD ################ */

    /* _________________ RETRIEVE __________________ */
    /**
    Retrieve all type of clothes
    @return query array of status
    */
    public function getAllTypeOfClothes()
    {
        $this -> db -> select('*');
        $this -> db -> from('typeOfClothes');

        $query = $this -> db -> get();

        if($query -> num_rows() >= 1) return $query->result();
        else return false;
    }
    
    /* _________________ RETRIEVE __________________ */
    /**
    Retrieve all type of toys
    @return query array of status
    */
    public function getAllTypeOfToys()
    {
        $this -> db -> select('*');
        $this -> db -> from('typeOfToy');

        $query = $this -> db -> get();

        if($query -> num_rows() >= 1) return $query->result();
        else return false;
    }

}
