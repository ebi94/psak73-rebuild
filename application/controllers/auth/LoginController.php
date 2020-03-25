<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
	function __construct(){
		parent::__construct();

		if($this->session->userdata('masuk') == TRUE){
		 	redirect('home');
		}

		$this->load->model('AuthModel');
	}

	function index() {
		$this->load->view('auth/login');
	}

	function do_login() {
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');

		$this->form_validation->set_message('required', '<div class="alert alert-danger" id="error_alert_field" role="alert">
					    <button type="button" class="close" data-dismiss="alert">x</button>
					    <strong><i class="fas fa-exclamation-circle"></i> {field} </strong> Harus di Isi!
					</div>');

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$password = do_hash($this->input->post('password'));

			$cek = $this->AuthModel->auth_cek($username,$password);

			if ($cek->num_rows() > 0) {
				$auth = $cek->row();

				$this->session->set_userdata('masuk',TRUE);
				$this->session->set_userdata('level',$auth->level);
			    $this->session->set_userdata('ses_id',$auth->id);
			    $this->session->set_userdata('ses_nama',$auth->name);
			    $this->session->set_userdata('ses_email',$auth->email);
			    $this->session->set_userdata('ses_username',$auth->email);
			    $this->AuthModel->auth_up_login();
			    redirect('home');
			} else {
				$data['error'] = '<div class="alert alert-danger" id="error_alert" role="alert">
					    <button type="button" class="close" data-dismiss="alert">x</button>
					    <strong><i class="fas fa-exclamation-circle"></i> Username / Password Salah!</strong>
					</div>';
	            $this->load->view('auth/login', $data);
			}
		} else {
			$this->load->view('auth/Login');
		}
	}
}