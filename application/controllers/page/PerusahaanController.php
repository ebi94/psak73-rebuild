<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerusahaanController extends CI_Controller{
	function __construct(){
		parent::__construct();

		if($this->session->userdata('masuk') != TRUE){
			$url = base_url('');
	        redirect($url);
		}

		$this->load->model('PerusahaanModel');
	}

	function index() {
		$data['title'] = 'List Perusahaan';
		$data['view'] = 'pages/perusahaan';
		$this->load->view('templates/layout', $data);
	}

	function get_perusahaan_list() {
		$pt = $this->input->get('pt');
        $alamat = $this->input->get('alamat');

		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $param = array('pt' => $pt, 'alamat' => $alamat);

        $query = $this->PerusahaanModel->perusahaan_get_all($param);

        $data_perusahaan = [];
        $i = 1;

        foreach ($query->result() as $key_perusahaan) {
        	$data_perusahaan[] = array(
        		$i++,
        		$key_perusahaan->nama_perusahaan,
        		$key_perusahaan->alamat,
        		$key_perusahaan->telepon,
        		'<button
        		type="button" 
        		class="edit_perusahaan btn btn-outline px-3" 
        		data-toggle="modal" 
        		data-target="#editPerusahaanModal" 
        		data-backdrop="static"
        		data-keyboard="false"
        		data-idp="'.$key_perusahaan->id.'"
        		data-namap="'.$key_perusahaan->nama_perusahaan.'"
        		data-alamatp="'.$key_perusahaan->alamat.'"
        		data-teleponp="'.$key_perusahaan->telepon.'">
        		<i class="fas fa-edit"></i>
				</button>
				<button
        		type="button" 
        		class="delete_perusahaan btn btn-outline px-3" 
        		data-toggle="modal" 
        		data-target="#deletePerusahaanModal" 
        		data-backdrop="static"
        		data-keyboard="false"
        		data-idp="'.$key_perusahaan->id.'">
        		<i class="fas fa-trash-alt"></i>
				</button>'
        	);
        }

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data_perusahaan
        );

        echo json_encode($result);
        exit();
	}

	function perusahaan_do_add() {
		$data = $this->PerusahaanModel->perusahaan_add();
		echo $data;
		exit();
	}

	function perusahaan_do_edit() {
		$data=$this->PerusahaanModel->perusahaan_edit();
		echo json_encode($data);
		exit();
	}

	function perusahaan_do_delete() {
		$data=$this->PerusahaanModel->perusahaan_delete();
		echo json_encode($data);
	}
}