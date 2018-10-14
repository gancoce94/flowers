<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('model_productos');
  }

	public function index()
	{
		$tag = 'flowers';
		$url = 'https://www.instagram.com/explore/tags/'.$tag.'/?__a=1';

		$all_result = $this->processURL($url);
		$all_result = json_decode($all_result);
		$i = 0;
		$arr = array();
		foreach ($all_result->graphql->hashtag->edge_hashtag_to_media->edges as $edges) {
		  if($i >= 5) {break;}else{
		    foreach ($edges->node->edge_media_to_caption->edges as $tex) {
					$id = $edges->node->owner->id;
					$url_name = 'https://i.instagram.com/api/v1/users/'.$id.'/info/';
					$aux = $this->processURL($url_name);
					$aux = json_decode($aux);
					$name = $aux->user->username;
					$arr[$i] = array('url' => $edges->node->display_url,
												'desc' => $tex->node->text,
												'likes' => $edges->node->edge_liked_by->count,
												'username' => $name);
		    }
		    $i++;
		  }
		}

		$r_products = $this->model_productos->getRandom();

		$data['posts'] = $arr;
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

	function processURL($url){
    $ch = curl_init();
    curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => 2
    ));

   $result = curl_exec($ch);
   curl_close($ch);
   return $result;
 }

}
