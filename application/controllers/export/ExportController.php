<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ExportController extends CI_Controller{
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
		$data['title'] = 'Export';
		$data['view'] = 'export/export';
		$data['user'] = $this->AuthModel->auth_get_all()->result();
		$data['perusahaan'] = $this->PerusahaanModel->perusahaan_get_all()->result();
		$this->load->view('templates/layout', $data);
	}

	function summary() {
		$pt = $this->input->get('pt');
		$user = $this->input->get('user');

		$param = array('nama_pt'=>$pt, 'user' => $user);
		$data_summary = $this->ExportModel->summary_export($param);

		$spreadsheet = new Spreadsheet();

		$creator = $this->session->userdata('ses_nama');
		$title_excel = "Summary Contract Leasse";
		$date_export = date('d/m/Y');

		// var_dump($array);
		// die();
		$i = 0;
		foreach ($data_summary->result() as $key_summary) {
			$spreadsheet->createSheet($i);
			// settingan awal
			$spreadsheet->getProperties()->setCreator($creator)->setLastModifiedBy($creator)->setTitle($title_excel)->setSubject("Summary")->setDescription($key_summary->kon_nama_pt)->setKeywords($key_summary->kon_nama_pt);

			$spreadsheet->setActiveSheetindex($i)->setCellValue('A1', 'Leasse '.$key_summary->kon_nama_pt); //isian A1 (title)
			$spreadsheet->getActiveSheet()->mergeCells('A1:D1');
			$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(20); //set FontSize

			$spreadsheet->setActiveSheetindex($i)->setCellValue('A2', 'No. Kontrak :'); //isian A2 (title)
			$spreadsheet->getActiveSheet()->mergeCells('A2:B2');
			$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(20); //set FontSize

			$spreadsheet->setActiveSheetindex($i)->setCellValue('C2', 'Nomor : '.$key_summary->kon_nomor_kontrak); //isian C2 (title)
			$spreadsheet->getActiveSheet()->mergeCells('C2:D2');
			$spreadsheet->getActiveSheet()->getStyle('C2')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('C2')->getFont()->setSize(20); //set FontSize

			$spreadsheet->setActiveSheetindex($i)->setCellValue('A3', 'Vendor : '); //isian A3 (title)
			$spreadsheet->getActiveSheet()->mergeCells('A3:B3');
			$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(20); //set FontSize

			$spreadsheet->setActiveSheetindex($i)->setCellValue('C3', $key_summary->kon_vendor); //isian C3 (title)
			$spreadsheet->getActiveSheet()->mergeCells('C3:D3');
			$spreadsheet->getActiveSheet()->getStyle('C3')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('C3')->getFont()->setSize(20); //set FontSize

			// HEAD
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A4', 'No'); //isian A4 (title)
			$spreadsheet->getActiveSheet()->mergeCells('A4:A5');
			$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setSize(20); //set FontSize

			$spreadsheet->setActiveSheetindex($i)->setCellValue('B4', 'Kriteria'); //isian B4 (title)
			$spreadsheet->getActiveSheet()->mergeCells('B4:C5');
			$spreadsheet->getActiveSheet()->getStyle('B4')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('B4')->getFont()->setSize(20); //set FontSize

			$spreadsheet->setActiveSheetindex($i)->setCellValue('D4', 'Based on Contract'); //isian D4 (title)
			$spreadsheet->getActiveSheet()->mergeCells('D4:D5');
			$spreadsheet->getActiveSheet()->getStyle('D4')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('D4')->getFont()->setSize(20); //set FontSize

			// ISIAN
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A6', '1'); //isian A6 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B6', 'Jenis Sewa'); //isian B6 (title)
			$spreadsheet->getActiveSheet()->mergeCells('B6:C6');

			$spreadsheet->setActiveSheetindex($i)->setCellValue('D6', $key_summary->sum_jenis_sewa); //isian D4 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A7', '2'); //isian D4 (title)

			$spreadsheet->setActiveSheetindex($i)->setCellValue('B7', 'Nature Sewa'); //isian B7 (title)
			$spreadsheet->getActiveSheet()->mergeCells('B7:C7');

			$spreadsheet->setActiveSheetindex($i)->setCellValue('D7', ''); //isian D7 (title)

			$spreadsheet->setActiveSheetindex($i)->setCellValue('A8', ''); //isian A8 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B8', 'a'); //isian B8 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C8', 'Apakah Terdapat Modifikasi ?'); //isian C8 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D8', $key_summary->sum_modifikasi); //isian D8 (title)

			$spreadsheet->setActiveSheetindex($i)->setCellValue('A9', ''); //isian A9 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B9', 'b'); //isian B9 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C9', 'Apakah Kontrak Dinegosiasikan Dengan Kontrak Lain ?'); //isian C9 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D9', $key_summary->sum_ns_b); //isian D9 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A10', ''); //isian A10 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B10', 'c.1'); //isian B10 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C10', 'Apakah Kontrak Mengandung Opsi Perpanjangan ?'); //isian C10 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D10', $key_summary->sum_ns_c_1); //isian D10 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A11', ''); //isian A11 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B11', 'c.2'); //isian B11 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C11', 'Penyewa Cukup Pasti Untuk Mengeksekusi Opsi Tersebut ?'); //isian C11 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D11', $key_summary->sum_ns_c_2); //isian D11 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A12', ''); //isian A12 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B12', 'd.1'); //isian B12 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C12', 'Apakah Kontrak Mengandung Opsi Terminasi ?'); //isian C12 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D12', $key_summary->sum_ns_d_1); //isian D12 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A13', ''); //isian A13 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B13', 'd.2'); //isian B13 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C13', 'Penyewa Cukup Pasti Untuk Tidak Mengeksekusi Opsi Tersebut ?'); //isian C13 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D13', $key_summary->sum_ns_d_2); //isian D13 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A14', ''); //isian A14 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B14', 'e'); //isian B14 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C14', 'Identifikasi Sewa'); //isian C14 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D14', ''); //isian D14 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A15', ''); //isian A15 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B15', 'e.2'); //isian B15 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C15', 'Certain Asset'); //isian C15 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D15', $key_summary->sum_is_1); //isian D15 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A16', ''); //isian A16 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B16', 'e.3'); //isian B16 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C16', 'Right to Operate'); //isian C16 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D16', $key_summary->sum_is_2); //isian D16 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A17', ''); //isian A17 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B17', 'e.4'); //isian B17 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C17', 'Control of The Output or Other Utility'); //isian C17 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D17', $key_summary->sum_is_3); //isian D17 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A18', ''); //isian A18 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B18', 'e.5'); //isian B18 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C18', 'Control Physical Asset'); //isian C18 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D18', $key_summary->sum_is_4); //isian D18 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A19', ''); //isian A19 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B19', 'e.6'); //isian B19 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C19', 'Contract Price (tergantung pada output yang dihasilkan atau tidak)'); //isian C19 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D19', $key_summary->sum_is_5); //isian D19 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A20', ''); //isian A20 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B20', 'e.7'); //isian B20 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C20', 'Output Used by Third Party'); //isian C20 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D20', $key_summary->sum_is_6); //isian D20 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A21', ''); //isian A21 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B21', 'e.8'); //isian B21 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C21', 'Right to Control The Use of The Asset'); //isian C21 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D21', $key_summary->sum_is_7); //isian D21 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A22', ''); //isian A22 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B22', 'f'); //isian B22 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C22', 'Apakah Kontrak Sewa Terdiri Dari Beberapa Komponen (lease dan nonlease)'); //isian C22 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D22', $key_summary->sum_k_1); //isian D22 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A23', ''); //isian A23 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B23', 'g'); //isian B23 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C23', 'Lokasi Sewa'); //isian C23 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D23', $key_summary->sum_lokasi); //isian D23 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A24', ''); //isian A24 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B24', 'h'); //isian B24 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C24', 'Panjang Kontrak'); //isian C24 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D24', $key_summary->periode); //isian D24 (title)
			
			$spreadsheet->setActiveSheetindex($i)->setCellValue('A25', ''); //isian A25 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('B25', 'i'); //isian B25 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('C25', 'Besar Nilai Kontrak'); //isian C25 (title)
			$spreadsheet->setActiveSheetindex($i)->setCellValue('D25', $key_summary->sum_nilai_kontrak); //isian D25 (title)

			// set judul excel
			// $spreadsheet->getActiveSheet($i)->setTitle($i);
			$spreadsheet->getActiveSheet($i)->setTitle("summary");
			$i++;
		}

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$title_excel.'.xlsx"');
		header('Cache-Control: max-age=0');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	function kkp() {
		$pt = $this->input->get('pt');
		$user = $this->input->get('user');

		$param = array('nama_pt'=>$pt, 'user' => $user);
		$data_kkp = $this->ExportModel->kkp_export($param);

		$spreadsheet = new Spreadsheet();

		$creator = $this->session->userdata('ses_nama');
		$title_excel = "KKP Assessment Leasing";
		$date_export = date('d/m/Y');

		// settingan awal
		$spreadsheet->getProperties()->setCreator($creator)->setLastModifiedBy($creator)->setTitle($title_excel)->setSubject("KKP Assessment Leasing")->setDescription("Identifikasi Sewa")->setKeywords($title_excel);

		// pengaturan style header tabel
		$style_col = array(
			'font' => array('bold' => true), //set font bold
			'alignment' => array(
				// 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, //set text center horizontal
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER //set text center vertical
			),
			'borders' => array(
				'top' => array(
					'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
				), //set border top tipis
				'right' => array(
					'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
				), //set border right tipis
				'bottom' => array(
					'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
				), //set border bottom tipis
				'left' => array(
					'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
				), //set border left tipis
			)
		);

		// pengaturan style isi tabel
		$style_row = array(
			'font' => array('bold' => true), //set font bold
			'alignment' => array(
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER //set text center vertical
			),
			'borders' => array(
				'top' => array(
					'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
				), //set border top tipis
				'right' => array(
					'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
				), //set border right tipis
				'bottom' => array(
					'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
				), //set border bottom tipis
				'left' => array(
					'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
				), //set border left tipis
			)
		);

		$spreadsheet->setActiveSheetindex(0)->setCellValue('A2', 'PT'); //isian A2 (title)
		$spreadsheet->getActiveSheet()->mergeCells('A2:AP2');
		$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);
		$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(20); //set FontSize

		$spreadsheet->setActiveSheetindex(0)->setCellValue('A3', 'IFRS 16 - Lesse'); //isian A3 (title)
		$spreadsheet->getActiveSheet()->mergeCells('A3:AP3');
		$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE);
		$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(20); //set FontSize

		$spreadsheet->setActiveSheetindex(0)->setCellValue('A4', 'Per '.$date_export); //isian A4 (title)
		$spreadsheet->getActiveSheet()->mergeCells('A4:AP4');
		$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE);
		$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setSize(20); //set FontSize

		// header tabel dimulai dari baris ke 6
		$spreadsheet->setActiveSheetindex(0)->setCellValue('A6', "No.");
		$spreadsheet->getActiveSheet()->mergeCells('A6:A8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('B6', "No. Kontrak");
		$spreadsheet->getActiveSheet()->mergeCells('B6:B8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('C6', "Nama Vendor");
		$spreadsheet->getActiveSheet()->mergeCells('C6:C8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('D6', "Underlying Asset");
		$spreadsheet->getActiveSheet()->mergeCells('D6:D8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('E6', "Tanggal Mulai Kontrak(based on contract)");
		$spreadsheet->getActiveSheet()->mergeCells('E6:E8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('F6', "Tanggal Berakhir Kontrak(based on contract)");
		$spreadsheet->getActiveSheet()->mergeCells('F6:F8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('G6', "Periode Kontrak(dalam bulan) ((Tanggal berakhir - Tanggal Mulai) / 30)");
		$spreadsheet->getActiveSheet()->mergeCells('G6:G8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('H6', "Apakah Kontrak Merupakan Kontrak Modifikasi?");
		$spreadsheet->getActiveSheet()->mergeCells('H6:H8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('I6', "Jika Ya, Tuliskan Nomor Kontrak Originalnya");
		$spreadsheet->getActiveSheet()->mergeCells('I6:I8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('J6', "Apakah Kontrak Di Negosiasikan Dengan Kontrak Lain?");
		$spreadsheet->getActiveSheet()->mergeCells('J6:J8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('K6', "Apakah Kontrak Mengandung Opsi Perpanjangan?");
		$spreadsheet->getActiveSheet()->mergeCells('K6:K8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('L6', "Periode(dalam bulan) Yang Dicakup Oleh Opsi Untuk Memperpanjang Sewa Jika Penyewa Cukup Pasti Untuk Mengeksekusi Opsi Tersebut (Jika Kolom K Dijawab Yes)");
		$spreadsheet->getActiveSheet()->mergeCells('L6:L8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('M6', "Apakah Kontrak Mengandung Opsi Terminasi?");
		$spreadsheet->getActiveSheet()->mergeCells('M6:M8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('N6', "Periode(dalam bulan) Yang Dicakup Oleh Opsi Untuk Menghentikan Sewa Jika Penyewa Cukup Pasti Untuk Tidak Mengeksekusi Opsi Tersebut (Jika Kolom L Dijawab Yes)");
		$spreadsheet->getActiveSheet()->mergeCells('N6:N8');

		$spreadsheet->setActiveSheetindex(0)->setCellValue('O6', "");
		$spreadsheet->getActiveSheet()->mergeCells('O6:V6');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('O7', "Certain Asset");
		$spreadsheet->getActiveSheet()->mergeCells('O7:O8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('P7', "Right to Operate");
		$spreadsheet->getActiveSheet()->mergeCells('P7:P8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('Q7', "Control of Te Output or Other Utility");
		$spreadsheet->getActiveSheet()->mergeCells('Q7:Q8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('R7', "Control Physical Asset");
		$spreadsheet->getActiveSheet()->mergeCells('R7:R8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('S7', "Contract Price(tergantung pada output yang dihasilkan atau tidak)");
		$spreadsheet->getActiveSheet()->mergeCells('S7:S8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('T7', "Output Used by Third Party");
		$spreadsheet->getActiveSheet()->mergeCells('T7:T8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('U7', "Right to Control The Use of The Asset");
		$spreadsheet->getActiveSheet()->mergeCells('U7:U8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('V7', "Lease / No Lease");
		$spreadsheet->getActiveSheet()->mergeCells('V7:V8');

		$spreadsheet->setActiveSheetindex(0)->setCellValue('W6', "Kontrak Terdiri Dari Beberapa Komponen(lease dan nonlease)");
		$spreadsheet->getActiveSheet()->mergeCells('W6:W8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('X6', "Tuliskan Komponen Dalam Kontrak");
		$spreadsheet->getActiveSheet()->mergeCells('X6:X8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('Y6', "Komponen Merupakan Sewa?");
		$spreadsheet->getActiveSheet()->mergeCells('Y6:Y8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('Z6', "Penyewa Mendapat Manfaat Dari Penggunaan Aset Pendasar Secara Terpisah Atau Bersamaan Dengan Sumber Daya Lain Yang Tersedia Untuk Penyewa");
		$spreadsheet->getActiveSheet()->mergeCells('Z6:Z8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AA6', "Asset Pendasar Tersebut TIdak Memiliki Ketergantungan Yang Tinggi Dengan, Maupun Memiliki Interelasi Yang Tinggi Dengan, Aset Pendasar Lainnya Dalam Kontrak");
		$spreadsheet->getActiveSheet()->mergeCells('AA6:AA8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AB6', "Komponen Sewa Terpisah?");
		$spreadsheet->getActiveSheet()->mergeCells('AB6:AB8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AC6', "Nilai Kontrak(Exclude-PPN)");
		$spreadsheet->getActiveSheet()->mergeCells('AC6:AC8');

		$spreadsheet->setActiveSheetindex(0)->setCellValue('AD6', "Detail Kontrak");
		$spreadsheet->getActiveSheet()->mergeCells('AD6:AP6');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AD7', "Waktu Pembayaran");
		$spreadsheet->getActiveSheet()->mergeCells('AD7:AF7');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AD8', "Termin Pembayaran");
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AE8', "Diakhir Bulan / Awal Bulan");
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AF8', "Frekuensi Pembayaran");
		// Bisa Di hilangkan Satu Waktu Nanti
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AG7', "One Time Charge");
		$spreadsheet->getActiveSheet()->mergeCells('AG7:AG8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AH7', "Initial Direct Cost");
		$spreadsheet->getActiveSheet()->mergeCells('AH7:AH8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AI7', "Lease Incentives");
		$spreadsheet->getActiveSheet()->mergeCells('AI7:AI8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AJ7', "Estimasi Biaya Dismantling");
		$spreadsheet->getActiveSheet()->mergeCells('AJ7:AJ8');
		// END
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AK7', "Nilai Sewa Per-Pembayaran");
		$spreadsheet->getActiveSheet()->mergeCells('AK7:AK8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AL7', "Status(Sudah Termasuk PPN/Belum)");
		$spreadsheet->getActiveSheet()->mergeCells('AL7:AL8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AM7', "PPN");
		$spreadsheet->getActiveSheet()->mergeCells('AM7:AM8');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AN7', "Nilai Sewa Per-Bulan(Belum Termasuk PPN)");
		$spreadsheet->getActiveSheet()->mergeCells('AN7:AN8');

		$spreadsheet->setActiveSheetindex(0)->setCellValue('AO7', "Jumlah Unit");
		$spreadsheet->getActiveSheet()->mergeCells('AO7:AP7');
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AO8', "Jumlah");
		$spreadsheet->setActiveSheetindex(0)->setCellValue('AP8', "Satuan");

		// apply header style
		$spreadsheet->getActiveSheet()->getStyle('A6:A8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('B6:B8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('C6:C8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('D6:D8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('E6:E8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('F6:F8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('G6:G8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('H6:H8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('I6:I8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('J6:J8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('K6:K8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('L6:L8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('M6:M8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('N6:N8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('O6:O8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('P6:P8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('Q6:Q8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('R6:R8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('S6:S8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('T6:T8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('U6:U8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('V6:V8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('W6:W8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('X6:X8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('Y6:Y8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('Z6:Z8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('AA6:AA8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('AB6:AB8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('AC6:AC8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('AD6:AD8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('AE6:AE8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('AF6:AF8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('AG6:AG8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('AH6:AH8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('AI6:AI8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('AJ6:AJ8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('AK6:AK8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('AL6:AL8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('AM6:AM8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('AN6:AN8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('AO6:AO8')->applyFromArray($style_col);
		$spreadsheet->getActiveSheet()->getStyle('AP6:AP8')->applyFromArray($style_col);

		// isi tabel
		$start_row = 9; //set isian dimulai dari baris ke 9
		$i = 1;
		foreach ($data_kkp->result() as $key_kkp) {
			$y1 = date('Y',strtotime($key_kkp->tgl_mulai_kontrak));
			$y2 = date('Y',strtotime($key_kkp->tgl_berakhir_kontrak));

			$m1 = date('m',strtotime($key_kkp->tgl_mulai_kontrak));
			$m2 = date('m',strtotime($key_kkp->tgl_berakhir_kontrak));

			$diff = (($y2 - $y1) * 12) + ($m2 - $m1);
			
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$start_row, $i);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('B'.$start_row, $key_kkp->no_kontrak);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('C'.$start_row, $key_kkp->nama_vendor);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('D'.$start_row, $key_kkp->underlying_asset);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('E'.$start_row, $key_kkp->tgl_mulai_kontrak);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('F'.$start_row, $key_kkp->tgl_berakhir_kontrak);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('G'.$start_row, $diff);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('H'.$start_row, $key_kkp->modifikasi_kontrak);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('I'.$start_row, $key_kkp->kontrak_original);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('J'.$start_row, $key_kkp->negosiasi_dengan_kontrak_lain);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('K'.$start_row, $key_kkp->opsi_perpanjangan);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('L'.$start_row, $key_kkp->cukup_pasti_perpanjang);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('M'.$start_row, $key_kkp->terminasi);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('N'.$start_row, $key_kkp->cukup_pasti_menghentikan);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('O'.$start_row, $key_kkp->certain_asset);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('P'.$start_row, $key_kkp->rigth_to_operate);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('Q'.$start_row, $key_kkp->control_utility);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('R'.$start_row, $key_kkp->control_physical_asset);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('S'.$start_row, $key_kkp->contract_price);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('T'.$start_row, $key_kkp->output_used_by_third_party);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('U'.$start_row, $key_kkp->right_control);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('V'.$start_row, $key_kkp->lease);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('W'.$start_row, $key_kkp->multi_komponen);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('X'.$start_row, $key_kkp->komponen_dalam_kontrak);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('Y'.$start_row, $key_kkp->komponen_sewa);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('Z'.$start_row, $key_kkp->penyewa_dapat_manfaat);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AA'.$start_row, $key_kkp->ketergantungan_tinggi_asset);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AB'.$start_row, $key_kkp->komponen_terpisah);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AC'.$start_row, $key_kkp->nilai_kontrak_exclude_ppn);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AD'.$start_row, $key_kkp->termin_bayar);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AE'.$start_row, $key_kkp->akhir_awal_bulan_bayar);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AF'.$start_row, $key_kkp->frekuensi_pembayaran);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AG'.$start_row, 0);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AH'.$start_row, 0);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AI'.$start_row, 0);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AJ'.$start_row, 0);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AK'.$start_row, $key_kkp->nilai_sewa_per_pembayaran);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AL'.$start_row, $key_kkp->status_ppn);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AM'.$start_row, $key_kkp->ppn);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AN'.$start_row, $key_kkp->nilai_sewa_per_bulan);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AO'.$start_row, $key_kkp->jumlah_unit_jumlah);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AP'.$start_row, $key_kkp->jumlah_unit_satuan);

			// apply isian style
			$spreadsheet->getActiveSheet()->getStyle('A'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('B'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('C'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('D'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('E'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('F'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('G'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('H'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('I'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('J'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('K'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('L'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('M'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('N'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('O'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('P'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('Q'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('R'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('S'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('T'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('U'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('V'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('W'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('X'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('Y'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('Z'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('AA'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('AB'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('AC'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('AD'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('AE'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('AF'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('AG'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('AH'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('AI'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('AJ'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('AK'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('AL'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('AM'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('AN'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('AO'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('AP'.$start_row)->applyFromArray($style_row);

			$i++;
			$start_row++;
		}

		// set column width to auto
		foreach (range('A','N') as $columnIndex) {
		  $spreadsheet->getActiveSheet()->getColumnDimension($columnIndex)->setAutoSize(true);
		}

		// set row height to auto
		$spreadsheet->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// set judul excel
		$spreadsheet->getActiveSheet(0)->setTitle("Identifikasi Sewa");
		$spreadsheet->setActiveSheetindex(0);

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$title_excel.'.xlsx"');
		header('Cache-Control: max-age=0');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}
}