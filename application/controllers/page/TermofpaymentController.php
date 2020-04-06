<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TermofpaymentController extends CI_Controller{
	function __construct(){
		parent::__construct();

		if($this->session->userdata('masuk') != TRUE){
			$url = base_url('');
	        redirect($url);
		}

		$this->load->model('TermofpaymentModel');
	}

	function index() {
		$data['title'] = 'List Term of Payment';
		$data['view'] = 'pages/termofpayment';
		$this->load->view('templates/layout', $data);
	}

	function get_top_list() {
		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->TermofpaymentModel->top_get_all();

		$data_top = [];
		$i = 1;

        foreach ($query->result() as $key_top) {
        	$data_top[] = array(
				$i++,
        		$key_top->top.'('.$key_top->keterangan.')',
        		// $key_top->keterangan,
        		'<button
        		type="button" 
        		class="edit_top btn btn-outline btn-xs px-3" 
        		data-toggle="modal" 
        		data-target="#editTOPModal" 
        		data-backdrop="static"
        		data-keyboard="false"
        		data-idtop="'.$key_top->id.'"
        		data-top="'.$key_top->top.'"
        		data-keterangantop="'.$key_top->keterangan.'">
        			<i class="fas fa-edit"></i>
				</button>
				<button
        		type="button" 
        		class="delete_tanggalacuan btn btn-outline px-3" 
        		data-toggle="modal" 
        		data-target="#deleteTanggalAcuanModal" 
        		data-backdrop="static"
        		data-keyboard="false"
        		data-idp="'.$key_top->id.'">
        			<i class="fas fa-trash-alt"></i>
				</button>
				'
        	);
        }

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data_top
        );

        echo json_encode($result);
        exit();
	}

	function top_do_add() {
		$data=$this->TermofpaymentModel->top_add();
		echo $data;
		exit();
	}

	function top_do_edit() {
		$data=$this->TermofpaymentModel->top_edit();
		echo $data;
		exit();
	}
}