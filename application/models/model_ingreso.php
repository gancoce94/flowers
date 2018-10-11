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

  function updateTipoUser($keyword){
    $this->db->set('tipo_usuario', 'v');
    $this->db->where('id_usuario', $keyword);
    $update = $this->db->update('ingreso');
    return $update?true:false;
  }

  function login_user($data){
    $this->db->like('correo',$data['correo']);
    $this->db->like('clave',$data['clave']);
    $query = $this->db->get('ingreso');
    if ($query->num_rows() == 1){
      return $query->row();
    }else {
      return 0;
    }
  }

}

?>
