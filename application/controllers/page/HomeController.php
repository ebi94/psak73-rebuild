<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller{
	function __construct(){
		parent::__construct();

		if($this->session->userdata('masuk') != TRUE){
			$url = base_url('');
	        redirect($url);
		}

		$this->load->model('AuthModel');
	}

	function index() {
		$data['title'] = 'Dashboard';
		$data['view'] = 'pages/dashboard';
		$data['jumlah_asset'] = $this->db->query('SELECT COUNT(id) AS jumlah_asset FROM abm_summary')->row();
		$data['jumlah_kontrak'] = $this->db->query('SELECT COUNT(nomor_kontrak) AS jumlah_kontrak FROM t_kontrak')->row();
		$data['jumlah_nilai_kontrak'] = $this->db->query('SELECT SUM(nilai_kontrak) AS jumlah_nilai_kontrak FROM abm_summary')->row();
		$this->load->view('templates/layout', $data);
	}
}