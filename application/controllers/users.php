<?php

/**
 *
 */
class Users extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('model_usuarios');
    $this->load->model('model_ingreso');
    $this->load->model('model_sucursal');
    $this->load->model('model_vendedores');
  }

  public function Index(){
    $data['tittle']='Usuarios';
    $this->load->view("Users/Index", $data);
  }

  public function Login(){
    if ($this->session->userdata('id') !== null) {
      redirect(base_url());
    }
    $data['tittle']='Login';
    $this->load->view("Users/Login", $data);
  }

  public function Signup(){
    $data['tittle']='Signup';
    $this->load->view("Users/Signup", $data);
  }

  public function Profile(){
    $data['tittle']='Usuarios';
    $this->load->view("Users/Profile", $data);
  }

  public function Role(){
    $data['tittle']='Gestión de Vendedores';
    $data['sucursal']=$this->model_sucursal->getAll();
    $this->load->view("Users/Role", $data);
  }

  public function AddUser(){
    $this->form_validation->set_rules('txtCi', 'Cédula', 'required|is_unique[usuarios.ci]');
    $this->form_validation->set_rules('txtFechaNac', 'Fecha de Nacimiento', 'required');
    $this->form_validation->set_rules('txtTelefono', 'Telefono', 'required');
    $this->form_validation->set_rules('txtCorreo', 'Email', 'required');
    $this->form_validation->set_rules('txtClave', 'Clave', 'required');

    if ($this->form_validation->run() != FALSE) {
      $dataUsers = array(
        'ci'=>$this->input->post('txtCi'),
        'nombres'=>$this->input->post('txtNombres'),
        'apellidos'=>$this->input->post('txtApellidos'),
        'telefono'=>$this->input->post('txtTelefono'),
        'direccion'=>$this->input->post('txtDireccion'),
        'fecha_nacimiento'=>$this->input->post('txtFechaNac'),
        'modified'=>date('Y-m-d'),
        'created'=>date('Y-m-d')
      );
      $dataLogIn = array(
        'correo'=>$this->input->post('txtCorreo'),
        'clave'=>hash('sha512', $this->input->post('txtClave')),
        'tipo_usuario'=>'c'
      );

      $insert = $this->model_usuarios->insertar($dataUsers);
      if ($insert) {
        $user = $this->model_usuarios->search($dataUsers['ci']);
        $dataLogIn['id_usuario'] = $user->id;
        $insert = $this->model_ingreso->insertar($dataLogIn);
      }

      if ($insert) {
        $this->session->set_flashdata("message", "Usuario registrado correctamente.");
      }else {
        $this->session->set_flashdata("error", "Hubo un error al registrar al usuario.");
      }
    }

    $data['tittle']='Registro de Usuario';
    $this->load->view("Users/Signup", $data);
  }

  public function Authenticate(){
    $this->form_validation->set_rules('txtCorreo', 'Email', 'required');
    $this->form_validation->set_rules('txtClave', 'Clave', 'required');

    if ($this->form_validation->run() != FALSE) {
      $data = array(
        'correo'=>$this->input->post('txtCorreo'),
        'clave'=>hash('sha512', $this->input->post('txtClave'))
      );

      $login_data = $this->model_ingreso->login_user($data);
      if($login_data){
        $user_data = $this->model_usuarios->getById($login_data->id_usuario);
        $this->session->set_userdata('id',$user_data->id);
        $this->session->set_userdata('ci',$user_data->ci);
        $this->session->set_userdata('correo',$login_data->correo);
        $this->session->set_userdata('persona',($user_data->nombres .' '. $user_data->apellidos));
        $this->session->set_userdata('nombres',$user_data->nombres);
        $this->session->set_userdata('apellidos',$user_data->apellidos);
        $this->session->set_userdata('telefono',$user_data->telefono);
        $this->session->set_userdata('fecha_nacimiento',$user_data->fecha_nacimiento);
        $this->session->set_userdata('direccion',$user_data->direccion);
        $this->session->set_userdata('tipo_usuario',$login_data->tipo_usuario);

        redirect(base_url());
      }else {
        $this->session->set_flashdata("error", "El usuario o la contraseña son incorrectos.");
        $data['tittle']='Login';
        $this->load->view("Users/Login", $data);
      }
    }
  }

  public function Logout(){
    $this->session->sess_destroy();
    redirect(base_url(),'refresh');
  }


  public function Asign(){
    $this->form_validation->set_rules('txtCi', 'Cédula', 'required');
    $this->form_validation->set_rules('txtContrato', 'Contrato', 'required');

    if ($this->form_validation->run() != FALSE) {
      $user = $this->model_usuarios->search($this->input->post('txtCi'));
      if (empty($user)){
        $this->session->set_flashdata("error", "No existe usuario con el numero de CI ingresado.");
      }else {
        if (empty($this->model_vendedores->getById($user->id))) {
          $data = array(
            'id_usuario'=>$user->id,
            'id_sucursal'=>$this->input->post('lstSucursal'),
            'contrato'=>$this->input->post('txtContrato'),
            'estado'=>true
          );

          $insert = $this->model_vendedores->insertar($data);

          if ($insert) {
            $this->session->set_flashdata("message", "El usuario ha sido asignado correctamente.");
          }else {
            $this->session->set_flashdata("error", "Hubo un error al registrar al usuario.");
          }
        }else {
          $this->session->set_flashdata("error", "El usuario ya ha sido asignado como vendedor.");
        }
      }
    }

    $data['tittle']='Gestión de Vendedores';
    $data['sucursal']=$this->model_sucursal->getAll();
    $this->load->view("Users/Role", $data);
  }

}
?>
