<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charts extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model');
		$this->load->model('sucursal_model');
		$this->load->model('vendedores_model');
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
