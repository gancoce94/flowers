<?php

/**
 *
 */
class Users extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('model_productos');
    $this->load->model('model_categorias');
    $this->load->model('model_sucursal');
    $this->load->model('model_images');
  }

  public function Index(){
    $data['tittle']='Usuarios';
    $this->load->view("Users/Index", $data);
  }

  public function Detail(){
    $data['tittle']='Detalles del Producto';
    $this->load->view("Products/Detail", $data);
  }

  public function Product(){
    $data['tittle']='Registrar Productos';
    $data['categorias']=$this->model_categorias->getAll();
    $data['sucursal']=$this->model_sucursal->getAll();
    $this->load->view("Products/Product", $data);
  }

  public function AddProduct(){
    $this->form_validation->set_rules('txtCodigo', 'Cod. de Producto', 'required|is_unique[productos.codigo]');
    $this->form_validation->set_rules('txtNombre', 'Nombre', 'required');
    $this->form_validation->set_rules('lstCategoria', 'Categoría', 'required');
    $this->form_validation->set_rules('txtCantidad', 'Cantidad', 'required');
    $this->form_validation->set_rules('txtPrecio', 'Precio', 'required');
    $this->form_validation->set_rules('lstSucursal', 'Sucursal', 'required');

    if ($this->form_validation->run() != FALSE) {
      $data = array(
        'id_sucursal'=>$this->input->post('lstSucursal'),
        'id_categoria'=>$this->input->post('lstCategoria'),
        'codigo'=>$this->input->post('txtCodigo'),
        'producto'=>$this->input->post('txtNombre'),
        'descripcion'=>$this->input->post('txtDescripcion'),
        'cantidad'=>$this->input->post('txtCantidad'),
        'precio'=>$this->input->post('txtPrecio'),
        'disponibilidad'=>true,
        'modified'=>date('Y-m-d'),
        'created'=>date('Y-m-d')
      );

      if ($this->model_productos->insertar($data)) {
        $this->session->set_flashdata("message", "Producto registrado correctamente.");
      }else {
        $this->session->set_flashdata("error", "Hubo un error al registrar el producto.");
      }

    }

    $data['tittle']='Registrar Productos';
    $data['categorias']=$this->model_categorias->getAll();
    $data['sucursal']=$this->model_sucursal->getAll();
    $this->load->view("Products/Product", $data);
  }

}
?>
