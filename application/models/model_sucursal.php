<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class Model_Sucursal extends CI_Model{

  public function __construct(){
    parent::__construct();
  }

  function getAll(){
    $this->db->order_by('id');
    $query = $this->db->get("sucursal");
    return $query->result_array();
  }

  function getBySucursal($sql){
    $this->db->where($sql);
    $query = $this->db->get('sucursal');
    return $query->result_array();
  }

  function getSumBySucursal($id, $month, $year){
    $this->db->select_sum('f.total');
    $this->db->from('facturas f');
    $this->db->join('vendedores v', 'f.id_vendedor = v.id_usuario');
    $this->db->join('sucursal s', 'v.id_sucursal = s.id');
    $this->db->where('EXTRACT(month from f.fecha) =', $month);
    $this->db->where('EXTRACT(year from f.fecha) =', $year);
    $this->db->where('s.id', $id);
    $query = $this->db->get();
    return $query->row();
  }

}

?>
