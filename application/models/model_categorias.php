<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class Categorias_model extends CI_Model{

    public function __construct(){
      parent::__construct();
    }

    function getAll(){
    $query = $this->db->get("categorias");
    return $query->result();
  }

}

?>
