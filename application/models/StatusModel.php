<?php if
( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
Models which makes queries to the Company table of your database
*/
class StatusModel extends CI_Model
{
    /* ############### BASIC CRUD ################ */

    #* _________________ CREATE __________________ */
    /**
    Create a new Status
    @params $data Array of data received and decode from the json
    */
    public function create($data)
    {
        //basic examples
        if (isset($data['status'])) $this->db->set ('status', $data['status']);
        if (isset($data['depositeCommission'])) $this->db->set ('depositeCommission', $data['depositeCommission']);
        if (isset($data['finalCommission'])) $this->db->set ('finalCommission', $data['finalCommission']);

        return $this->db->insert('status');
    }

    /* _________________ RETRIEVE __________________ */
    /**
    Retrieve all status
    @return query array of status
    */
    public function getAllStatus()
    {
        $this -> db -> select('*');
        $this -> db -> from('Status');

        $query = $this -> db -> get();

        if($query -> num_rows() >= 1) return $query->result();
        else return false;
    }

    /**
    Retrieve a specific company by its id
    @params $companyId company id
    @return query array with company data
    */
    public function getCompanyData($companyId)
    {
        $this->db->select('*');
        $this-> db->from('company');
        $this->db->where('id', $companyId);

        $query = $this->db->get();

        if($query->num_rows() == 1) return $query->result();
        else return false;
    }

    /**
    check if company exists and activated
    @params $companyId
    @return $licenseId
    */
    public function companyExists($companyId)
    {
        # code...
    }

    /**
    CHeck if the software version is up to date
    @params $companyId company id
    @params $version
    @return result array
    */
    public function companyUpToDate($companyId, $version)
    {
        # code...
    }

    /* ___________________ UPDATE ____________________ */
    /**
    Update an entreprise with new value(s)
    */
    public function update($companyId)
    {
        # code...
    }

    /* __________________ DELETE ______________________ */
    /**
    Delete a specific entreprise
    */
    public function delete($companyId)
    {
        # code...
    }


}
