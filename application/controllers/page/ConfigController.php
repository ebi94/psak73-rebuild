<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConfigController extends CI_Controller{
	function __construct(){
		parent::__construct();

		if($this->session->userdata('masuk') != TRUE){
			$url = base_url('');
	        redirect($url);
		}
	}

	function index() {
		$data['title'] = 'Config';
		$data['view'] = 'pages/config';
		$this->load->view('templates/layout', $data);
	}
}