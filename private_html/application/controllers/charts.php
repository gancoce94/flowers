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

	public function GetDataVendors(){
		if(isset($_POST['action']) && !empty($_POST['action'])) {
			$arr = $_POST['action'];
			$year =  $_POST['year'];
			$str = '';
			foreach ($arr as $item) {
				$str = $str . 'id_sucursal = '. $item .' or ';
			}
			$str = substr($str, 0, -3);
			$vendedores = $this->setArrayVendors($year, $this->model_vendedores->getBySucursal($str));
			echo $vendedores;
		}
	}

	public function GetDataSucursales(){
		if(isset($_POST['action']) && !empty($_POST['action'])) {
			$arr = $_POST['action'];
			$year =  $_POST['year'];
			$str = '';
			foreach ($arr as $item) {
				$str = $str . 'id = '. $item .' or ';
			}
			$str = substr($str, 0, -3);
			$data = $this->setArraySucursal($year, $this->model_sucursal->getBySucursal($str));
			echo $data;
		}
	}

	public function GetDataVendorsCategories(){
		if(isset($_POST['action']) && !empty($_POST['action'])) {
			$arr = $_POST['action'];
			$year =  $_POST['year'];
			$str = '';
			foreach ($arr as $item) {
				$str = $str . 'id = '. $item .' or ';
			}
			$str = substr($str, 0, -3);
			$data = $this->setArrayCategories($year, $this->model_sucursal->getBySucursal($str));
			echo $data;
		}
	}

	public function GetDataCategories(){
		if(isset($_POST['action']) && !empty($_POST['action'])) {
			$arr = $_POST['action'];
			$year =  $_POST['year'];
			$str = '';
			foreach ($arr as $item) {
				$str = $str . 'p.id_sucursal = '. $item .' or ';
			}
			$str = substr($str, 0, -3);
			$data = $this->model_categorias->getSumByCategorie($year, $str);
			$complete = array('all_data' => array());
			array_push($complete['all_data'], $data);
			$new_data = json_encode($complete);
			echo $new_data;
		}
	}

	public function GetDataProducts(){
		if(isset($_POST['action']) && !empty($_POST['action'])) {
			$arr = $_POST['action'];
			$year =  $_POST['year'];
			$str = '';
			foreach ($arr as $item) {
				$str = $str . 'p.id_sucursal = '. $item .' or ';
			}
			$str = substr($str, 0, -3);
			$data = $this->model_productos->getTopProducts($year, $str);
			$complete = array('all_data' => array());
			array_push($complete['all_data'], $data);
			$new_data = json_encode($complete);
			echo $new_data;
		}
	}

	public function Admin()	{
		$data['tittle']='Graficos del Administrador';

		$categories = $this->model_categorias->getSumByCategorie('2018', 'p.id_sucursal<>0');
		$total = 0;
		foreach ($categories as $row) {
			$total = $total + $row->total;
		}
		$data['sucursales']=$this->setArraySucursal('2018', $this->model_sucursal->getAll());
		$data['products']=$this->model_productos->getTopProducts('2018', 'p.id_sucursal<>0');
		$data['categories']=$categories;
		$data['total']=$total;

		$this->load->view('Charts/Admin', $data);
	}

	public function setArrayVendors($year, $items){
		$aux_2 = array('id'=>'', 'data' => array());
		$complete = array('all_data' => array());
		foreach ($items as $item) {
			$id = $item['id_usuario'];
			for ($i=1; $i <= 12; $i++) {
				$row = $this->model_vendedores->getSumByVendor($id, $i, $year);
				$aux[$i] = (isset($row->total))?$row->total:0;
			}
			$aux_2['id'] = $id;
			$aux_2['data'] = $aux;
			array_push($complete['all_data'], $aux_2);
		}
		$json = json_encode($complete);
		return $json;
	}

	public function setArraySucursal($year, $items){
		$aux_2 = array('id'=>'', 'sucursal' => '', 'data' => array());
		$complete = array('all_data' => array());
		foreach ($items as $item) {
			$id = $item['id'];
			for ($i=1; $i <= 12; $i++) {
				$row = $this->model_sucursal->getSumBySucursal($id, $i, $year);
				$aux[$i] = (isset($row->total))?$row->total:0;
			}
			$aux_2['id'] = $id;
			$aux_2['sucursal'] = (isset($item['nombre']))?$item['nombre']:'';
			$aux_2['data'] = $aux;
			array_push($complete['all_data'], $aux_2);
		}
		$json = json_encode($complete);
		return $json;
	}

	public function setArrayCategories($year, $items){
		$aux_2 = array('id'=>'', 'sucursal' => '', 'data' => array());
		$aux = array('id_usuario'=>'', 'data'=>array());
		$complete = array('all_data' => array());
		foreach ($items as $item) {
			$vendors = array();
			$id = $item['id'];
			$str = 'id_sucursal = '.$id;
			$rows = $this->model_vendedores->getBySucursal($str);
			foreach ($rows as $row) {
				$aux['id_usuario']=$row['id_usuario'];
				$aux['data']=$this->model_vendedores->getSumByVendorCategorie($row['id_usuario'], $year);
				array_push($vendors, $aux);
			}
			$aux_2['id'] = $id;
			$aux_2['sucursal'] = (isset($item['nombre']))?$item['nombre']:'';
			$aux_2['data'] = $vendors;
			array_push($complete['all_data'], $aux_2);
			$str='';
		}
		$json = json_encode($complete);
		return $json;
	}

}
