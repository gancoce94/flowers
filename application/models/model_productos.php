<?php

/**
 *
 */
class Model_Productos extends CI_Model{

  function insertar($data){
    $this->db->like('id_usuario',$data["id_usuario"]);
    $query = $this->db->get('configuracion');
    if ($query->num_rows() > 0) {
      $id = $query->row()->id;
      $this->db->where('id', $id);
      $this->db->update('configuracion', $data);
    } else {
      $this->db->insert('configuracion', $data);
    }
  }

  function getByIdUser($keyword){
    $this->db->where('id_usuario',$keyword);
    $query = $this->db->get('configuracion');
    return $query->row();
  }

}

?>
