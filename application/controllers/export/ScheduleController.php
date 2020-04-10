<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ScheduleController extends CI_Controller{
	function __construct(){
		parent::__construct();

		if($this->session->userdata('masuk') != TRUE){
			$url = base_url('');
	        redirect($url);
		}

		$this->load->model('AuthModel');
		$this->load->model('AsetModel');
        $this->load->model('KontrakModel');
        $this->load->model('CalculationModel');
        $this->load->model('PerusahaanModel');
        $this->load->model('ExportModel');
	}

	function index() {
		$data['title'] = 'Schedule';
		$data['view'] = 'export/schedule';
		$data['user'] = $this->AuthModel->auth_get_all()->result();
		$data['perusahaan'] = $this->PerusahaanModel->perusahaan_get_all()->result();
		$this->load->view('templates/layout', $data);
	}

	function get_schedule_list() {
		$pt = $this->input->get('pt');
		$dibuat_oleh = $this->input->get('dibuat_oleh');

		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        if ($pt != '') {
            $pt = implode(",", $pt);
        }
        
        if ($dibuat_oleh != '') {
            // $dibuat_oleh = array_map('intval', explode(',', $dibuat_oleh));
            $dibuat_oleh = implode(",",$dibuat_oleh);
        }

        if ($this->session->userdata('level') == 0) {
            $param = array('nama_pt' => $pt, 'user' => $dibuat_oleh, 'schedule' => 'ada');
        } else {
            $param = array('nama_pt' => $pt, 'user' => $this->session->userdata('ses_id'), 'schedule' => 'ada');
        }

        // $query = $this->ExportModel->schedule_export($param);
        $query = $this->AsetModel->aset_get_all($param);

        $data_schedule = [];
        $i = 1;

        foreach ($query->result() as $key_schedule) {
        	$replacements = [
        	    "," 	=> "",
        	    "." 	=> "",
        	    "Rp" 	=> "",
        	    "rp" 	=> "",
        	    " " 	=> "",
        	];
        	$nilai_kontraknya = strtr($key_schedule->nilai_kontrak, $replacements);
        	$nilai_kontrak = (int)$nilai_kontraknya;

        	$data_schedule[] = array(
        		$i++,
        		$key_schedule->nama_pt,
        		$key_schedule->nomor_kontrak,
        		$key_schedule->vendor,
        		$key_schedule->jenis_sewa,
        		$key_schedule->lokasi,
        		date('d M Y',strtotime($key_schedule->start_date)),
                date('d M Y',strtotime($key_schedule->end_date)),
        		rupiah($nilai_kontrak),
        		auth_name($key_schedule->dibuat_kontrak),
        		'<button
				type="button"
				class="export_schedule btn btn-block btn-outline-success btn-xs"
				data-idsummary="'.$key_schedule->id_summary.'"
				>
				Export Schedule
				</button>',
        	);
        }

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data_schedule
        );

        echo json_encode($result);
        exit();
	}
}