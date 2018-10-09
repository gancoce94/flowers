<?php

/**
 *
 */
class Users extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('model_usuarios');
    $this->load->model('model_ingreso');
  }

  public function Index(){
    $data['tittle']='Usuarios';
    $this->load->view("Users/Index", $data);
  }

  public function Login(){
    $data['tittle']='Login';
    $this->load->view("Users/Login", $data);
  }

  public function Signup(){
    $data['tittle']='Signup';
    $this->load->view("Users/Signup", $data);
  }

  public function AddUser(){
    $this->form_validation->set_rules('txtCi', 'Cédula', 'required|is_unique[usuarios.ci]');
    $this->form_validation->set_rules('txtFechaNac', 'Fecha de Nacimiento', 'required');
    $this->form_validation->set_rules('txtTelefono', 'Telefono', 'required|regex_match[/^[0-9]{10}$/]');
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

}
?>
