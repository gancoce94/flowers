<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class Model_Vendedores extends CI_Model{

  public function __construct(){
    parent::__construct();
  }

  function insertar($data){
    $insert = $this->db->insert('vendedores', $data);
    return $insert?true:false;
  }

  function getById($keyword){
    $this->db->where('id_usuario',$keyword);
    $query = $this->db->get('vendedores');
    return $query->row();
  }

  function getBySucursal($sucursal){
    $this->db->where('id_sucursal', $sucursal);
    $this->db->where('estado', true);
    $query = $this->db->get('vendedores');
    return $query->result();
  }

  function getVentasByUser($value=''){
    // code...
  }

}

?>
