<?php

/**
 *
 */
class Products extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('model_productos');
    $this->load->model('model_categorias');
    $this->load->model('model_sucursal');
    $this->load->model('model_images');
  }

  public function Index(){
    $data['tittle']='Catálogo de Productos';

    $url = 'Products/Index';
    $rows=$this->model_productos->record_count();
    $config=getConfig($url, $rows);
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data["query"] = $this->model_productos->fetch_products($config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();
    $data["rows"] = $rows;

    $this->load->view("Products/Index", $data);
  }

  public function Detail(){
    $data['tittle']='Detalles del Producto';
    $id = decryptId($this->uri->segment(3));
    $row = $this->model_productos->getById($id);
    $images = $this->model_images->getById($id);
    $data['producto'] = $row;
    $data['images'] = $images;
    $r_products = $this->model_productos->getRandom();
    $data["rproducts"] = $r_products;

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
      if($this->input->post('fileSubmit') && !empty($_FILES['files']['name'])){
          $filesCount = count($_FILES['files']['name']);
          for($i = 0; $i < $filesCount; $i++){
              $_FILES['file']['name']     = $_FILES['files']['name'][$i];
              $_FILES['file']['type']     = $_FILES['files']['type'][$i];
              $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
              $_FILES['file']['error']     = $_FILES['files']['error'][$i];
              $_FILES['file']['size']     = $_FILES['files']['size'][$i];

              // File upload configuration
              $uploadPath = './uploads/files/';
              $config['upload_path'] = $uploadPath;
              $config['encrypt_name'] = TRUE;
              $config['allowed_types'] = 'jpg|jpeg|png|gif';

              // Load and initialize upload library
              $this->load->library('upload', $config);
              $this->upload->initialize($config);

              // Upload file to server
              if($this->upload->do_upload('file')){
                  // Uploaded file data
                  $fileData = $this->upload->data();
                  $uploadData[$i]['image_name'] = $fileData['file_name'];
                  $uploadData[$i]['uploaded'] = date("Y-m-d H:i:s");
              }
          }
      }
      $data = array(
        'id_sucursal'=>$this->input->post('lstSucursal'),
        'id_categoria'=>$this->input->post('lstCategoria'),
        'codigo'=>$this->input->post('txtCodigo'),
        'producto'=>$this->input->post('txtNombre'),
        'descripcion'=>$this->input->post('txtDescripcion'),
        'cantidad'=>$this->input->post('txtCantidad'),
        'precio'=>$this->input->post('txtPrecio'),
        'disponibilidad'=>true,
        'imagen'=>$uploadData[0]['image_name'],
        'modified'=>date('Y-m-d'),
        'created'=>date('Y-m-d')
      );

      if ($this->model_productos->insertar($data)) {
        $this->session->set_flashdata("message", "Producto registrado correctamente.");
      }else {
        $this->session->set_flashdata("error", "Hubo un error al registrar el producto.");
      }

      $product = $this->model_productos->search($data['codigo']);
      $idPro = $product->id;
      //Insert images in db
      if(!empty($uploadData)){
        //Add id product to array
        foreach($uploadData as &$row) {
          $row['id_producto'] = $idPro;
        }
        $insert = $this->model_images->insertar($uploadData);
      }

    }

    $data['tittle']='Registrar Productos';
    $data['categorias']=$this->model_categorias->getAll();
    $data['sucursal']=$this->model_sucursal->getAll();
    $this->load->view("Products/Product", $data);
  }

}
?>
