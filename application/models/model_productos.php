<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class Model_Productos extends CI_Model{

  public function __construct(){
    parent::__construct();
  }

  function insertar($data){
    $insert = $this->db->insert('productos', $data);
    return $insert?true:false;
  }

  function search($keyword){
    $this->db->like('codigo',$keyword);
    $query = $this->db->get('productos');
    return $query->row();
  }

  function getById($keyword){
    $this->db->where('id',$keyword);
    $query = $this->db->get('productos');
    return $query->row();
  }

  function getRandom(){
    $this->db->order_by('RANDOM()');
    $this->db->limit(8);
    $query = $this->db->get('productos');
    return $query->result();
  }

  function getTopProducts(){
    $this->db->select('p.producto, SUM(d.total) as total');
    $this->db->from('detalles d');
    $this->db->join('productos p', 'd.id_producto = p.id');
    $this->db->group_by('p.producto');
    $this->db->order_by("total", "desc");
    $this->db->limit(10);
    $query = $this->db->get();
    return $query->result();
  }

  public function record_count() {
    return $this->db->count_all("productos");
  }

  public function fetch_products($limit, $start) {
    $sql="select p.*
          from productos p
          order by p.id desc
          OFFSET ".$start." ROWS FETCH NEXT ".$limit." ROWS ONLY";
    $query = $this->db->query($sql);

    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }


}

?>
