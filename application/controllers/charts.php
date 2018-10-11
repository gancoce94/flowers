<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charts extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('model_usuarios');
		$this->load->model('model_sucursal');
		$this->load->model('model_vendedores');
	}

	public function Admin()	{
		$data['tittle']='Graficos del Administrador';
    $data['sucursal']=$this->model_sucursal->getAll();
		$this->load->view('Charts/Admin', $data);
	}

	public function Vendor()	{
		$data['tittle']='Graficos del Vendedor';
		$data['sucursal']=$this->model_sucursal->getAll();
		$this->load->view('Charts/Vendor', $data);
	}
}
