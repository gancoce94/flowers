<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class Model_Ingreso extends CI_Model{

  function insertar($data){
    $insert = $this->db->insert('ingreso', $data);
    return $insert?true:false;
  }

}

?>
