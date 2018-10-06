<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class Model_Productos extends CI_Model{

  function insertar($data){
    $insert = $this->db->insert('productos', $data);
    return $insert?true:false;
  }

  function search($keyword){
    $this->db->like('codigo',$keyword);
    $query = $this->db->get('productos');
    return $query->row();
  }

}

?>
