<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class Model_Images extends CI_Model{

  function insertar($data = array()){
    $insert = $this->db->insert_batch('images', $data);
    return $insert?true:false;
  }

}

?>
