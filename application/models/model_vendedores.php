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

  function getBySucursal($sql){
    $this->db->where($sql);
    $this->db->where('estado', true);
    $this->db->order_by('id_usuario');
    $query = $this->db->get('vendedores');
    return $query->result_array();
  }

  function getAll(){
    $query = $this->db->get("vendedores");
    return $query->result_array();
  }

  function getSumByVendor($id, $month, $year){
    $this->db->select_sum('f.total');
    $this->db->from('facturas f');
    $this->db->join('vendedores v', 'f.id_vendedor = v.id_usuario');
    $this->db->join('sucursal s', 's.id = v.id_sucursal');
    $this->db->where('v.id_usuario', $id);
    $this->db->where('extract(month from f.fecha) =', $month);
    $this->db->where('extract(year from f.fecha) =', $year);
    $query = $this->db->get();
    return $query->row();
  }

  function getSumByVendorCategorie($id, $year){
    $this->db->select('cat.categoria, sum(d.total) as total');
    $this->db->from('detalles d');
    $this->db->join('facturas f', 'd.id_factura=f.id');
    $this->db->join('productos p', 'd.id_producto=p.id');
    $this->db->join('categorias cat', 'p.id_categoria=cat.id');
    $this->db->where('f.id_vendedor=', $id);
    $this->db->where('extract(year from f.fecha) =', $year);
    $this->db->group_by('cat.categoria');
    $query = $this->db->get();
    return $query->result_array();
  }

}

?>
