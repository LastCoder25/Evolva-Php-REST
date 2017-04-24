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
    public function getClothesOfUserOnExchange($idUser, $idExchange)
    {
      log_message('info', "model - getClothesOfUserOnExchange");
      $query = $this->db->query("CALL getClothesOfUserOnExchange($idUser, $idExchange)");
      return $query->result();
    }
    
        public function getToysOfUserOnExchange($idUser, $idExchange)
    {
      log_message('info', "model - getToysOfUserOnExchange");
      $query = $this->db->query("CALL getToysOfUserOnExchange($idUser, $idExchange)");
      return $query->result();
    }
    
    /**
    Retrieve all exchanges of a non volunteer
    @return query array of exchanges
    */
    public function getClothesOnExchange($idExchange)
    {
      log_message('info', "model - getClothesOnExchange");
      $query = $this->db->query("CALL getClothesOnExchange($idExchange)");
      return $query->result();
    }
    
    public function getToysOnExchange($idExchange)
    {
      log_message('info', "model - getToysOnExchange");
      $query = $this->db->query("CALL getToysOnExchange($idExchange)");
      return $query->result();
    }
    
    /**
    Retrieve all accounts with amounts
    @return query array of exchanges
    */
    public function amountByUser($idExchange)
    {
      log_message('info', "model - amountByUser");
      $query = $this->db->query("CALL getAmountByUser($idExchange)");
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
        if (isset($data['finalStatus'])) $this->db->set('finalStatus', $data['finalStatus']);
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

    #* _________________ CREATE __________________ */
    /**
    Create a new article
    @params $data Array of data received and decode from the json
    */
    public function createClothes($data)
    {
        /* INSERT INTO Article */
        if (isset($data['description']))  $this->db->set('description', $data['description']);
        $this->db->set('type', "Vêtements");
        $this->db->insert('articles');
        $insert_id = $this->db->insert_id();

        /* INSERT INTO Clothes */
        $this->db->set('idArticle', $insert_id);
        if (isset($data['size']))           $this->db->set('size',          $data['size']);
        if (isset($data['color']))          $this->db->set('color',         $data['color']);
        if (isset($data['brand']))          $this->db->set('brand',         $data['brand']);
        if (isset($data['typeOfClothes']))  $this->db->set('typeOfClothes', $data['typeOfClothes']);
        if (isset($data['category']))       $this->db->set('category',      $data['category']);
        $this->db->insert('clothes');
        
        /* INSERT INTO fromStatus for the first article of the seller */
        $this -> db -> select('*');
        $this -> db -> from('fromStatus');
        $this -> db -> where('idExchange', $data['idExchange']);
        $this -> db -> where('idUser', $data['idUser']);
        $query = $this -> db -> get();
        if($query -> num_rows() == 0){
            $this->db->set('idExchange', $data['idExchange']);
            $this->db->set('idUser', $data['idUser']);
            $this->db->set('idStatus', 2);
            $this->db->insert('fromStatus');
        };

        /* INSERT INTO Deposite */
        $this->db->set('idArticle', $insert_id);
        if (isset($data['idExchange']))    $this->db->set('idExchange',   $data['idExchange']);
        if (isset($data['idUser']))        $this->db->set('idUser',       $data['idUser']);
        if (isset($data['price']))         $this->db->set('price',        $data['price']);
        return $this->db->insert('deposite');
    }
    
        public function createToy($data)
    {
        /* INSERT INTO Article */
        if (isset($data['description']))  $this->db->set('description', $data['description']);
        $this->db->set('type', "Jouets");
        $this->db->insert('articles');
        $insert_id = $this->db->insert_id();

        /* INSERT INTO Clothes */
        $this->db->set('idArticle', $insert_id);
        if (isset($data['typeOfToy']))  $this->db->set('typeOfToy', $data['typeOfToy']);
        $this->db->insert('toy');
        
        /* INSERT INTO fromStatus for the first article of the seller */
        $this -> db -> select('*');
        $this -> db -> from('fromStatus');
        $this -> db -> where('idExchange', $data['idExchange']);
        $this -> db -> where('idUser', $data['idUser']);
        $query = $this -> db -> get();
        if($query -> num_rows() == 0){
            $this->db->set('idExchange', $data['idExchange']);
            $this->db->set('idUser', $data['idUser']);
            $this->db->set('idStatus', 2);
            $this->db->insert('fromStatus');
        };

        /* INSERT INTO Deposite */
        $this->db->set('idArticle', $insert_id);
        if (isset($data['idExchange']))    $this->db->set('idExchange',   $data['idExchange']);
        if (isset($data['idUser']))        $this->db->set('idUser',       $data['idUser']);
        if (isset($data['price']))         $this->db->set('price',        $data['price']);
        return $this->db->insert('deposite');
    }

    #* _________________ DELETE __________________ */
    /**
    Remove a volunteer
    @params $data Array of data received and decode from the json
    */
    public function deleteClothes($data)
    {
      log_message('info', "DepositeModel - delete");
      $idUser = $data['idUser'];
      $idExchange = $data['idExchange'];
      $idArticle = $data['idArticle'];
      
      /* DELETE from deposite */
      $this -> db -> where('idUser', $idUser);
      $this -> db -> where('idExchange', $idExchange);
      $this -> db -> where('idArticle', $idArticle);
      $this -> db -> delete('deposite');

      /* DELETE from clothes */
      $this -> db -> where('idArticle', $idArticle);
      $this -> db -> delete('clothes');

      /* DELETE from articles */
      $this -> db -> where('idArticle', $idArticle);
      $this -> db -> delete('articles');
      
        $this -> db -> select('*');
        $this -> db -> from('deposite');
        $this -> db -> where('idExchange', $data['idExchange']);
        $this -> db -> where('idUser', $data['idUser']);
        $query = $this -> db -> get();
        if($query -> num_rows() == 0){
            /* DELETE from fromStatus */
            $this -> db -> where('idUser', $idUser);
            $this -> db -> where('idExchange', $idExchange);
            $this -> db -> where('idStatus', 2);
            $this -> db -> delete('fromStatus');
        };
    }
    
    public function deleteToy($data)
    {
      log_message('info', "DepositeModel - delete");
      $idUser = $data['idUser'];
      $idExchange = $data['idExchange'];
      $idArticle = $data['idArticle'];
      log_message('info', $idUser);
      log_message('info', $idExchange);
      log_message('info', $idArticle);
      
      /* DELETE from deposite */
      $this -> db -> where('idUser', $idUser);
      $this -> db -> where('idExchange', $idExchange);
      $this -> db -> where('idArticle', $idArticle);
      $this -> db -> delete('deposite');

      /* DELETE from clothes */
      $this -> db -> where('idArticle', $idArticle);
      $this -> db -> delete('toy');

      /* DELETE from articles */
      $this -> db -> where('idArticle', $idArticle);
      $this -> db -> delete('articles');
      
        $this -> db -> select('*');
        $this -> db -> from('deposite');
        $this -> db -> where('idExchange', $data['idExchange']);
        $this -> db -> where('idUser', $data['idUser']);
        $query = $this -> db -> get();
        if($query -> num_rows() == 0){
            /* DELETE from fromStatus */
            $this -> db -> where('idUser', $idUser);
            $this -> db -> where('idExchange', $idExchange);
            $this -> db -> where('idStatus', 2);
            $this -> db -> delete('fromStatus');
        };
    }

}
