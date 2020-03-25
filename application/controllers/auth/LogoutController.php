<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogoutController extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model('AuthModel');
	}

	function log_out() {
		$this->AuthModel->auth_up_logout();
		$this->session->sess_destroy();
		$url=base_url('');
		redirect($url);
	}
}