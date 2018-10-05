<?php

/**
 *
 */
class Products extends CI_Controller{
  public function Index(){
    $data['tittle']='Catálogo de Productos';
    $url='Products/Index';
    $this->load->view("Products/Index", $data);
  }

  public function Detail(){
    $data['tittle']='Detalles del Producto';
    $this->load->view("Products/Detail", $data);
  }

  public function Product(){
    $data['tittle']='Registrar Productos';
    $this->load->view("Products/Product", $data);
  }
}
?>
