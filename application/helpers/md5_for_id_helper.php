<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

define('SALT', 'whateveryouwant');

function encryptId($string){
  $output = false;
  $encrypt_method = "AES-256-CBC";
  $secret_key = 'This is my secret key';
  $secret_iv = 'This is my secret iv';
  $key = hash('sha256', $secret_key);
  $iv = substr(hash('sha256', $secret_iv), 0, 16);

  $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
  $output = base64_encode($output);
  return $output;
}

function decryptId($string){
  $output = false;
  $encrypt_method = "AES-256-CBC";
  $secret_key = 'This is my secret key';
  $secret_iv = 'This is my secret iv';
  $key = hash('sha256', $secret_key);
  $iv = substr(hash('sha256', $secret_iv), 0, 16);
  
  $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
  return $output;
}

/* End of file dropdwon_helper.php */
/* Location: ./application/helper/dropdown_helper.php */
