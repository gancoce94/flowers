<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class Model_Sucursal extends CI_Model{

  function getAll(){
    $query = $this->db->get("sucursal");
    return $query->result();
  }

}

?>
