<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charts extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('model_usuarios');
		$this->load->model('model_sucursal');
		$this->load->model('model_vendedores');
		$this->load->model('model_categorias');
		$this->load->model('model_productos');
	}

	public function Admin()	{
		$data['tittle']='Graficos del Administrador';

		$categories = $this->model_categorias->getSumByCategorie();
		$total = 0;
		foreach ($categories as $row) {
			$total = $total + $row->total;
		}
		$data['sucursales']=$this->setArraySucursal($this->model_sucursal->getAll());
		$data['vendedores']=$this->setArraySucursal($this->model_vendedores->getAll());
		$data['products']=$this->model_productos->getTopProducts();
		$data['categories']=$categories;
		$data['total']=$total;

		$this->load->view('Charts/Admin', $data);
	}

	public function Vendor()	{
		$data['tittle']='Graficos del Vendedor';
		$data['sucursal']=$this->model_sucursal->getAll();
		$this->load->view('Charts/Vendor', $data);
	}

	public function setArraySucursal($result){
		$aux_2 = array('id'=>'', 'sucursal' => '', 'data' => array());
		$complete = array('all_data' => array());
		foreach ($result as $item) {
			$id = $item->id;
			for ($i=1; $i <= 12; $i++) {
				$row = $this->model_sucursal->getSumBySucursal($id, $i);
				$aux[$i] = (isset($row->total))?$row->total:0;
			}
			$aux_2['id'] = $id;
			$aux_2['sucursal'] = (isset($item->nombre))?$item->nombre:'';
			$aux_2['data'] = $aux;
			array_push($complete['all_data'], $aux_2);
		}
		return $complete;
	}

	public function setArrayVendors($result){
		$aux_2 = array('id'=>'', 'data' => array());
		$complete = array('all_data' => array());
		foreach ($result as $item) {
			$id = $item->id;
			for ($i=1; $i <= 12; $i++) {
				$row = $this->model_vendedores->getSumByVendor($id, $i);
				$aux[$i] = (isset($row->total))?$row->total:0;
			}
			$aux_2['id'] = $id;
			$aux_2['data'] = $aux;
			array_push($complete['all_data'], $aux_2);
		}
		return $complete;
	}
}
