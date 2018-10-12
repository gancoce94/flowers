<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('model_productos');
  }

	public function index()
	{
		$r_products = $this->model_productos->getRandom();
		$data["rproducts"] = $r_products;
		$this->load->view('Index', $data);
	}

	public function Contact()
	{
		$this->load->view('Contact');
	}

	public function About()
	{
		$this->load->view('About');
	}

}
