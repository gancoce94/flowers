<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class Model_Usuarios extends CI_Model{

  function insertar($data){
    $insert = $this->db->insert('usuarios', $data);
    return $insert?true:false;
  }

  function search($keyword){
    $this->db->like('ci',$keyword);
    $query = $this->db->get('usuarios');
    return $query->row();
  }

}

?>
