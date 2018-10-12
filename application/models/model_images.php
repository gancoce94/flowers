<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
 class Images_model extends CI_Model{

   public function __construct(){
     parent::__construct();
   }

  function insertar($data = array()){
    $insert = $this->db->insert_batch('images', $data);
    return $insert?true:false;
  }

  function getById($keyword){
    $this->db->where('id_producto',$keyword);
    $query = $this->db->get('images');
    return $query->result();
  }

}

?>
