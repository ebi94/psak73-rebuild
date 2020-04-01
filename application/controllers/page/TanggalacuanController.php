<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TanggalacuanController extends CI_Controller{
	function __construct(){
		parent::__construct();

		if($this->session->userdata('masuk') != TRUE){
			$url = base_url('');
	        redirect($url);
		}

		$this->load->model('TanggalacuanModel');
	}

	function index() {
		$data['title'] = 'List Tanggal Acuan';
		$data['view'] = 'pages/tanggal_acuan';
		$this->load->view('templates/layout', $data);
	}

	function get_tanggal_acuan_list() {
		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->TanggalacuanModel->tanggal_acuan_get_all();

        $data_tanggal_acuan = [];

        foreach ($query->result() as $key_tanggal_acuan) {
        	$data_tanggal_acuan[] = array(
        		$key_tanggal_acuan->tanggal_acuan.'('.$key_tanggal_acuan->keterangan.')',
        		'<button
        		type="button" 
        		class="edit_tanggalacuan btn btn-block btn-outline-warning btn-xs" 
        		style="color:black;" 
        		data-toggle="modal" 
        		data-target="#editTanggalAcuanModal" 
        		data-backdrop="static"
        		data-keyboard="false"
        		data-idtanggalacuan="'.$key_tanggal_acuan->id.'"
        		data-tanggalacuan="'.$key_tanggal_acuan->tanggal_acuan.'"
        		data-keterangantanggalacuan="'.$key_tanggal_acuan->keterangan.'">
        		Ubah Data
        		</button>'
        	);
        }

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data_tanggal_acuan
        );

        echo json_encode($result);
        exit();
	}

	function tanggal_acuan_do_add() {
		$data=$this->TanggalacuanModel->tanggal_acuan_add();
		echo $data;
		exit();
	}

	function tanggal_acuan_do_edit() {
		$data=$this->TanggalacuanModel->tanggal_acuan_edit();
		echo $data;
		exit();
	}
}