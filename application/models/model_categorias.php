<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class Model_Categorias extends CI_Model{

  function getAll(){
    $query = $this->db->get("categorias");
    return $query->result();
  }

}

?>
