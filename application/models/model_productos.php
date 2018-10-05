<?php

/**
 *
 */
class Model_Productos extends CI_Model{

  function insertar($data){
    
  }

  function getByIdUser($keyword){
    $this->db->where('id_usuario',$keyword);
    $query = $this->db->get('configuracion');
    return $query->row();
  }

}

?>
