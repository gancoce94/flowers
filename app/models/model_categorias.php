<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class Model_Categorias extends CI_Model{

  public function __construct(){
    parent::__construct();
  }

  function getAll(){
    $query = $this->db->get("categorias");
    return $query->result();
  }

  function getSumByCategorie($year, $sql){
    $this->db->select('c.categoria, SUM(f.total) as total');
    $this->db->from('facturas f');
    $this->db->join('detalles d', 'f.id = d.id_factura');
    $this->db->join('productos p', 'd.id_producto = p.id');
    $this->db->join('categorias c', 'p.id_categoria = c.id');
    $this->db->where('EXTRACT(year from f.fecha) =', $year);
    $this->db->where('('.$sql.')');
    $this->db->group_by('c.categoria');
    $query = $this->db->get();
    return $query->result();
  }

}

?>
