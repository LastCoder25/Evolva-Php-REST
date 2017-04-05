<?php if
( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
Models which makes queries to the Company table of your database
*/
class DepositeModel extends CI_Model
{
    /* ############### BASIC CRUD ################ */

    /**
    Retrieve all exchanges of a non volunteer
    @return query array of exchanges
    */
    public function getArticlesOfUserOnExchange($idUser, $idExchange)
    {
      log_message('info', "model - getArticlesOfUserOnExchange");
      $query = $this->db->query("CALL getArticlesOfUserOnExchange($idUser, $idExchange)");
      return $query->result();
    }

    #* _________________ MODIFY __________________ */
    /**
    Modify an article
    @params $data Array of data received and decode from the json
    */
    public function modify($data)
    {
        $d['idUser'] = $data['idUser'];
        $d['idExchange'] = $data['idExchange'];
        $d['idArticle'] = $data['idArticle'];
        $d['price'] = $data['price'];
        $d['registrationStatus'] = $data['registrationStatus'];
        if (isset($data['price'])) $this->db->set('price', $data['price']);
        if (isset($data['registrationStatus'])) $this->db->set('registrationStatus', $data['registrationStatus']);
        $this->db->where('idUser', $d['idUser']);
        $this->db->where('idExchange', $d['idExchange']);
        $this->db->where('idArticle', $d['idArticle']);
        $this->db->update('deposite', $d);
        // return $this->db->update('deposite', $d);

        if (isset($data['description'])) {
          $dd['idArticle'] = $data['idArticle'];
          $dd['description'] = $data['description'];
          $this->db->set('description', $dd['description']);
          $this->db->where('idArticle', $dd['idArticle']);
          $this->db->update('articles', $dd);
        }

        $ddd['idArticle'] = $data['idArticle'];
        $ddd['size'] = $data['size'];
        $ddd['color'] = $data['color'];
        $ddd['brand'] = $data['brand'];
        $ddd['typeOfClothes'] = $data['typeOfClothes'];
        $ddd['category'] = $data['category'];
        $this->db->where('idArticle', $ddd['idArticle']);
        return $this->db->update('clothes', $ddd);
    }

}
