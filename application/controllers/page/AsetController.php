<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsetController extends CI_Controller{
	function __construct(){
		parent::__construct();

		if($this->session->userdata('masuk') != TRUE){
			$url = base_url('');
	        redirect($url);
		}

		$this->load->model('AuthModel');
		$this->load->model('AsetModel');
        $this->load->model('KontrakModel');
	}

	function index() {
		$data['title'] = 'List Aset';
		$data['view'] = 'pages/aset';
		$this->load->view('templates/layout', $data);
	}

	function get_aset_list() {
		$pt = $this->input->get('pt');
        $kontrak = $this->input->get('kontrak');
		$vendor = $this->input->get('vendor');
		$dibuat_oleh = $this->input->get('dibuat_oleh');

		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        if ($this->session->userdata('level') == 0) {
            $param = array('nama_pt' => $pt, 'kontrak' => $kontrak, 'vendor' => $vendor, 'user' => $dibuat_oleh);
        } else {
            $param = array('nama_pt' => $pt, 'kontrak' => $kontrak, 'vendor' => $vendor, 'user' => $this->session->userdata('ses_id'));
        }
        
        $query = $this->AsetModel->aset_get_all($param);

        $data_aset = [];
        $i = 1;

        foreach ($query->result() as $key_aset) {
        	// jadiin nilai_kontrak ke angka semua
        	$replacements = [
        	    "," 	=> "",
        	    "." 	=> "",
        	    "Rp" 	=> "",
        	    "rp" 	=> "",
        	    " " 	=> "",
        	];
        	$nilai_kontraknya = strtr($key_aset->nilai_kontrak, $replacements);
        	$nilai_kontrak = (int)$nilai_kontraknya;
        	// end

        	$action_lihat = 
        	'
        		<button 
					type="button" 
					class="modalihat btn btn-block btn-outline-primary btn-xs"  
					data-toggle="modal" 
					data-target="#modal-lihat"
					data-idkontrak="'.$key_aset->id_id_kontrak.'"
					data-iduser="'.$key_aset->dibuat_kontrak.'"
					data-idsummary="'.$key_aset->id_summary.'"
					data-title="'.$key_aset->nama_pt.'" 
					data-nomorkontrak="'.$key_aset->nomor_kontrak.'"
					data-vendor="'.$key_aset->vendor.'"
					data-jenissewa="'.$key_aset->jenis_sewa.'"
					data-nsa="'.$key_aset->ns_a.'"
					data-nsb="'.$key_aset->ns_b.'"
					data-nsc1="'.$key_aset->ns_c1.'"
					data-nsc2="'.$key_aset->ns_c2.'"
					data-nsd1="'.$key_aset->ns_d1.'"
					data-nsd2="'.$key_aset->ns_d2.'"
					data-is1="'.$key_aset->is_1.'"
					data-is2="'.$key_aset->is_2.'"
					data-is3="'.$key_aset->is_3.'"
					data-is4="'.$key_aset->is_4.'"
					data-is5="'.$key_aset->is_5.'"
					data-is6="'.$key_aset->is_6.'"
					data-is7="'.$key_aset->is_7.'"
					data-komponen="'.$key_aset->komponen.'"
					data-lokasi="'.$key_aset->lokasi.'"
					data-startdate="'.$key_aset->start_date.'"
					data-enddate="'.$key_aset->end_date.'"
					data-nilaikontrak="'.$nilai_kontrak.'"
					data-pdfurl="'.$key_aset->pdf_url.'"
					data-pdfpage="'.$key_aset->page_in_pdf.'">
					Lihat
				</button>
        	';

        	$action_edit = 
        	'
        		<button 
        			type="button" 
        			class="modaedit btn btn-block btn-outline-info btn-xs"  
        			data-toggle="modal" 
        			data-target="#modal-edit" 
        			data-backdrop="static"
        			data-keyboard="false"
        			data-idkontrak="'.$key_aset->id_id_kontrak.'"
        			data-idsummary="'.$key_aset->id_summary.'"
        			data-namapt="'.$key_aset->nama_pt.'" 
        			data-nomorkontrak="'.$key_aset->nomor_kontrak.'"
        			data-vendor="'.$key_aset->vendor.'"
        			data-jenissewa="'.$key_aset->jenis_sewa.'"
        			data-nsa="'.$key_aset->ns_a.'"
        			data-nsb="'.$key_aset->ns_b.'"
        			data-nsc="'.$key_aset->ns_c1.'"
        			data-nsc2="'.$key_aset->ns_c2.'"
        			data-nsd1="'.$key_aset->ns_d1.'"
        			data-nsd2="'.$key_aset->ns_d2.'"
        			data-is1="'.$key_aset->is_1.'"
        			data-is2="'.$key_aset->is_2.'"
        			data-is3="'.$key_aset->is_3.'"
        			data-is4="'.$key_aset->is_4.'"
        			data-is5="'.$key_aset->is_5.'"
        			data-is6="'.$key_aset->is_6.'"
        			data-is7="'.$key_aset->is_7.'"
        			data-komponen="'.$key_aset->komponen.'"
        			data-lokasi="'.$key_aset->lokasi.'"
        			data-startdate="'.$key_aset->start_date.'"
        			data-enddate="'.$key_aset->end_date.'"
        			data-nilaikontrak="'.$key_aset->nilai_kontrak.'"
        			data-dr="'.$key_aset->dr.'"
        			data-pat="'.$key_aset->pat.'"
        			data-top="'.$key_aset->top.'"
        			data-awak="'.$key_aset->awak.'"
        			data-frekuensi_pembayaran="'.$key_aset->frekuensi_pembayaran.'"
        			data-pd="'.$key_aset->pd.'"
        			data-prepaid="'.$key_aset->prepaid.'"
        			data-status_ppn="'.$key_aset->status_ppn.'"
        			data-ppn="'.$key_aset->ppn.'"
        			data-jumlah_unit="'.$key_aset->jumlah_unit.'"
        			data-satuan="'.$key_aset->satuan.'"
        			data-nilai_asumsi_perpanjangan="'.$key_aset->nilai_asumsi_perpanjangan.'"
        			data-tgl_perpanjangan="'.$key_aset->tgl_perpanjangan.'">
        			Ubah Data
        		</button>
        	';

        	$action_export = 
        	'
        		<button
	        		type="button"
	        		class="export_schedule btn btn-block btn-outline-success btn-xs"
	        		data-id="'.$key_aset->id_summary.'"
	        		>
	        		Export Schedule
        		</button>
        	';

        	$action_hapus = 
        	'
	    		<a title="Delete Data" href="javascript:void(0);" class="modahapus btn btn-block btn-outline-danger btn-xs" data-id="'.$key_aset->id_summary.'"">Hapus</a>
        	';

        	$action = '';

        	if ($this->session->userdata('level') == 0) {
        		$action = $action_lihat.$action_edit.$action_export.$action_hapus;
        	} else {
        		$action = $action_lihat.$action_export;
        	}

        	$data_aset[] = array(
        		$i++,
        		$key_aset->nama_pt,
        		$key_aset->nomor_kontrak,
        		$key_aset->vendor,
        		$key_aset->jenis_sewa,
        		$key_aset->lokasi,
        		date('d M Y',strtotime($key_aset->start_date)),
                date('d M Y',strtotime($key_aset->end_date)),
        		rupiah($nilai_kontrak),
        		auth_name($key_aset->dibuat_kontrak),
        		$action
        	);
        }

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data_aset
        );

        echo json_encode($result);
        exit();
	}

    function aset_do_add() {
        // print_r($this->input->post());
        // die();
        $config['upload_path']="./assets/pdf";
        $config['allowed_types']='gif|jpg|png|pdf';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload',$config);
        $this->upload->do_upload('file');

        $data   = array('upload_data' => $this->upload->data());
        $pdf_up = $data['upload_data']['file_name'];

        $title = $this->input->post('title');
        $id_kontrak = $this->input->post('id_kontrak');

        $y1 = date('Y',strtotime($this->input->post('start_date')));
        $y2 = date('Y',strtotime($this->input->post('end_date')));

        $m1 = date('m',strtotime($this->input->post('start_date')));
        $m2 = date('m',strtotime($this->input->post('end_date')));

        $diff = (($y2 - $y1) * 12) + ($m2 - $m1);

        $nama_pt = $this->input->post('nama_pt');
        $nomor_kontrak = $this->input->post('nomor_kontrak');
        $vendor = $this->input->post('vendor');
        $created_by = $this->session->userdata('ses_id');

        $pageinpdf = $this->input->post('pageinpdf');
        if (empty($this->input->post('pageinpdf')) || $this->input->post('pageinpdf') == '' || $this->input->post('pageinpdf') == null) {
            $pageinpdf = 0;
        }
        
        $jenis_sewa = $this->input->post('jenis_sewa');
        $serialnumber = $this->input->post('serialnumber');
        $ns_a = $this->input->post('nsa');
        $ns_a1 = $this->input->post('nsa1');
        $ns_b = $this->input->post('nsb');
        $ns_c1 = $this->input->post('nsc1');
        $ns_c2 = $this->input->post('ns_c2');
        $ns_d1 = $this->input->post('nsd1');
        $ns_d2 = $this->input->post('ns_d2');
        $is_1 = $this->input->post('is_1');
        $is_2 = $this->input->post('is_2');
        $is_3 = $this->input->post('is_3');
        $is_4 = $this->input->post('is_4');
        $is_5 = $this->input->post('is_5');
        $is_6 = $this->input->post('is_6');
        $is_7 = $this->input->post('is_7');
        $k_1 = $this->input->post('kontrak_dari_beberapa_komponen');
        $k_2 = $this->input->post('komponen_dalam_kontrak');
        $k_3 = $this->input->post('komponen_merupakan_sewa');
        $k_4 = $this->input->post('penyewa_mendapat_manfaat');
        $k_5 = $this->input->post('aset_dasar');
        $lokasi = $this->input->post('lokasi');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        // CALCULATION
        $prepaid_int = $this->input->post('prepaid');
        $nap_int = $this->input->post('nilai_asumsi_perpanjangan');
        $pat_int = $this->input->post('pat');

        $dr = $this->input->post('dr');
        $pat = $pat_int;
        $top = $this->input->post('top');
        $awak = $this->input->post('awak');
        $pd = $this->input->post('pd');
        $prepaid = $prepaid_int;
        $status_ppn = $this->input->post('status_ppn');
        $ppn = $this->input->post('ppn');
        $jumlah_unit = $this->input->post('jumlah_unit');
        $satuan = $this->input->post('satuan');
        $nilai_asumsi_perpanjangan = $nap_int;
        $tgl_perpanjangan = $this->input->post('tgl_perpanjangan');
        $frekuensi_pembayaran = $this->input->post('frekuensi_pembayaran');

        $kontrak_int = str_replace(".", "", $this->input->post('nilai_kontrak'));

        $data = $this->AsetModel->aset_add_batch($title,$id_kontrak,$diff,$nama_pt,$nomor_kontrak,$vendor,$created_by,$pageinpdf,$jenis_sewa,$serialnumber,$ns_a,$ns_a1,$ns_b,$ns_c1,$ns_c2,$ns_d1,$ns_d2,$is_1,$is_2,$is_3,$is_4,$is_5,$is_6,$is_7,$k_1,$k_2,$k_3,$k_4,$k_5,$lokasi,$start_date,$end_date,$kontrak_int,$pdf_up,$dr,$pat,$top,$awak,$pd,$prepaid,$status_ppn,$ppn,$jumlah_unit,$satuan,$nilai_asumsi_perpanjangan,$tgl_perpanjangan,$frekuensi_pembayaran);
        // echo json_encode($data);
        $param = array('id_kontrak' => $data);
        $kontrak = $this->KontrakModel->kontrak_check($param)->row();

        $response = "";

        $response .= "<strong>Apakah ada penambahan aset dalam no kontrak '<b> ".$kontrak->nomor_kontrak." </b>' ?</strong>";
        $response .= "<input type='text' id='id_kontraks' name='id_kontraks' value='".$kontrak->id."'>";

        echo $response;
        exit();
    }

    function aset_do_delete() {
        $data=$this->AsetModel->aset_delete();
        echo json_encode($data);
    }
}