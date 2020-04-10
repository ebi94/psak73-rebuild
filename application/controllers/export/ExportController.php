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
			$spreadsheet->getActiveSheet($i)->setTitle($key_summary->kon_nama_pt);
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

		$array_pt = explode(',', $pt);
		$jumlah_pt = count($array_pt);

		$spreadsheet = new Spreadsheet();

		for ($i=0; $i < $jumlah_pt; $i++) {
			$spreadsheet->createSheet($i);

			$param = array('nama_pt'=>$array_pt[$i], 'user' => $user);
			$data_kkp = $this->ExportModel->kkp_export($param);

			$creator = $this->session->userdata('ses_nama');
			$title_excel = "KKP Assessment Leasing";
			$date_export = date('d/m/Y');

			$nomor = 1;
			$start_row = 9;
			foreach ($data_kkp->result() as $key_kkp) {
				// settingan awal
				$spreadsheet->getProperties()->setCreator($creator)->setLastModifiedBy($creator)->setTitle($title_excel)->setSubject("KKP Assessment Leasing")->setDescription("Identifikasi Sewa")->setKeywords($title_excel);

				// HEAD
					$spreadsheet->setActiveSheetindex($i)->setCellValue('A2', $key_kkp->nama_pt); //isian A2 (title)
					$spreadsheet->getActiveSheet()->mergeCells('A2:AP2');
					$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);
					$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(20); //set FontSize

					$spreadsheet->setActiveSheetindex($i)->setCellValue('A3', 'IFRS 16 - Lesse'); //isian A3 (title)
					$spreadsheet->getActiveSheet()->mergeCells('A3:AP3');
					$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE);
					$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(20); //set FontSize

					$spreadsheet->setActiveSheetindex($i)->setCellValue('A4', 'Per '.$date_export); //isian A4 (title)
					$spreadsheet->getActiveSheet()->mergeCells('A4:AP4');
					$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE);
					$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setSize(20); //set FontSize

					// header tabel dimulai dari baris ke 6
					$spreadsheet->setActiveSheetindex($i)->setCellValue('A6', "No.");
					$spreadsheet->getActiveSheet()->mergeCells('A6:A8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('B6', "No. Kontrak");
					$spreadsheet->getActiveSheet()->mergeCells('B6:B8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('C6', "Nama Vendor");
					$spreadsheet->getActiveSheet()->mergeCells('C6:C8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('D6', "Underlying Asset");
					$spreadsheet->getActiveSheet()->mergeCells('D6:D8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('E6', "Tanggal Mulai Kontrak(based on contract)");
					$spreadsheet->getActiveSheet()->mergeCells('E6:E8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('F6', "Tanggal Berakhir Kontrak(based on contract)");
					$spreadsheet->getActiveSheet()->mergeCells('F6:F8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('G6', "Periode Kontrak(dalam bulan) ((Tanggal berakhir - Tanggal Mulai) / 30)");
					$spreadsheet->getActiveSheet()->mergeCells('G6:G8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('H6', "Apakah Kontrak Merupakan Kontrak Modifikasi?");
					$spreadsheet->getActiveSheet()->mergeCells('H6:H8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('I6', "Jika Ya, Tuliskan Nomor Kontrak Originalnya");
					$spreadsheet->getActiveSheet()->mergeCells('I6:I8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('J6', "Apakah Kontrak Di Negosiasikan Dengan Kontrak Lain?");
					$spreadsheet->getActiveSheet()->mergeCells('J6:J8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('K6', "Apakah Kontrak Mengandung Opsi Perpanjangan?");
					$spreadsheet->getActiveSheet()->mergeCells('K6:K8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('L6', "Periode(dalam bulan) Yang Dicakup Oleh Opsi Untuk Memperpanjang Sewa Jika Penyewa Cukup Pasti Untuk Mengeksekusi Opsi Tersebut (Jika Kolom K Dijawab Yes)");
					$spreadsheet->getActiveSheet()->mergeCells('L6:L8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('M6', "Apakah Kontrak Mengandung Opsi Terminasi?");
					$spreadsheet->getActiveSheet()->mergeCells('M6:M8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('N6', "Periode(dalam bulan) Yang Dicakup Oleh Opsi Untuk Menghentikan Sewa Jika Penyewa Cukup Pasti Untuk Tidak Mengeksekusi Opsi Tersebut (Jika Kolom L Dijawab Yes)");
					$spreadsheet->getActiveSheet()->mergeCells('N6:N8');

					$spreadsheet->setActiveSheetindex($i)->setCellValue('O6', "");
					$spreadsheet->getActiveSheet()->mergeCells('O6:V6');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('O7', "Certain Asset");
					$spreadsheet->getActiveSheet()->mergeCells('O7:O8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('P7', "Right to Operate");
					$spreadsheet->getActiveSheet()->mergeCells('P7:P8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('Q7', "Control of Te Output or Other Utility");
					$spreadsheet->getActiveSheet()->mergeCells('Q7:Q8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('R7', "Control Physical Asset");
					$spreadsheet->getActiveSheet()->mergeCells('R7:R8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('S7', "Contract Price(tergantung pada output yang dihasilkan atau tidak)");
					$spreadsheet->getActiveSheet()->mergeCells('S7:S8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('T7', "Output Used by Third Party");
					$spreadsheet->getActiveSheet()->mergeCells('T7:T8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('U7', "Right to Control The Use of The Asset");
					$spreadsheet->getActiveSheet()->mergeCells('U7:U8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('V7', "Lease / No Lease");
					$spreadsheet->getActiveSheet()->mergeCells('V7:V8');

					$spreadsheet->setActiveSheetindex($i)->setCellValue('W6', "Kontrak Terdiri Dari Beberapa Komponen(lease dan nonlease)");
					$spreadsheet->getActiveSheet()->mergeCells('W6:W8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('X6', "Tuliskan Komponen Dalam Kontrak");
					$spreadsheet->getActiveSheet()->mergeCells('X6:X8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('Y6', "Komponen Merupakan Sewa?");
					$spreadsheet->getActiveSheet()->mergeCells('Y6:Y8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('Z6', "Penyewa Mendapat Manfaat Dari Penggunaan Aset Pendasar Secara Terpisah Atau Bersamaan Dengan Sumber Daya Lain Yang Tersedia Untuk Penyewa");
					$spreadsheet->getActiveSheet()->mergeCells('Z6:Z8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AA6', "Asset Pendasar Tersebut TIdak Memiliki Ketergantungan Yang Tinggi Dengan, Maupun Memiliki Interelasi Yang Tinggi Dengan, Aset Pendasar Lainnya Dalam Kontrak");
					$spreadsheet->getActiveSheet()->mergeCells('AA6:AA8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AB6', "Komponen Sewa Terpisah?");
					$spreadsheet->getActiveSheet()->mergeCells('AB6:AB8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AC6', "Nilai Kontrak(Exclude-PPN)");
					$spreadsheet->getActiveSheet()->mergeCells('AC6:AC8');

					$spreadsheet->setActiveSheetindex($i)->setCellValue('AD6', "Detail Kontrak");
					$spreadsheet->getActiveSheet()->mergeCells('AD6:AP6');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AD7', "Waktu Pembayaran");
					$spreadsheet->getActiveSheet()->mergeCells('AD7:AF7');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AD8', "Termin Pembayaran");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AE8', "Diakhir Bulan / Awal Bulan");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AF8', "Frekuensi Pembayaran");
					// Bisa Di hilangkan Satu Waktu Nanti
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AG7', "One Time Charge");
					$spreadsheet->getActiveSheet()->mergeCells('AG7:AG8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AH7', "Initial Direct Cost");
					$spreadsheet->getActiveSheet()->mergeCells('AH7:AH8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AI7', "Lease Incentives");
					$spreadsheet->getActiveSheet()->mergeCells('AI7:AI8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AJ7', "Estimasi Biaya Dismantling");
					$spreadsheet->getActiveSheet()->mergeCells('AJ7:AJ8');
					// END
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AK7', "Nilai Sewa Per-Pembayaran");
					$spreadsheet->getActiveSheet()->mergeCells('AK7:AK8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AL7', "Status(Sudah Termasuk PPN/Belum)");
					$spreadsheet->getActiveSheet()->mergeCells('AL7:AL8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AM7', "PPN");
					$spreadsheet->getActiveSheet()->mergeCells('AM7:AM8');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AN7', "Nilai Sewa Per-Bulan(Belum Termasuk PPN)");
					$spreadsheet->getActiveSheet()->mergeCells('AN7:AN8');

					$spreadsheet->setActiveSheetindex($i)->setCellValue('AO7', "Jumlah Unit");
					$spreadsheet->getActiveSheet()->mergeCells('AO7:AP7');
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AO8', "Jumlah");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AP8', "Satuan");
				// END HEAD

				// ISI
					$y1 = date('Y',strtotime($key_kkp->tgl_mulai_kontrak));
					$y2 = date('Y',strtotime($key_kkp->tgl_berakhir_kontrak));

					$m1 = date('m',strtotime($key_kkp->tgl_mulai_kontrak));
					$m2 = date('m',strtotime($key_kkp->tgl_berakhir_kontrak));

					$diff = (($y2 - $y1) * 12) + ($m2 - $m1);

					$spreadsheet->setActiveSheetIndex($i)->setCellValue('A'.$start_row, $nomor);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('B'.$start_row, $key_kkp->no_kontrak);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('C'.$start_row, $key_kkp->nama_vendor);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('D'.$start_row, $key_kkp->underlying_asset);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('E'.$start_row, $key_kkp->tgl_mulai_kontrak);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('F'.$start_row, $key_kkp->tgl_berakhir_kontrak);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('G'.$start_row, $diff);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('H'.$start_row, $key_kkp->modifikasi_kontrak);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('I'.$start_row, $key_kkp->kontrak_original);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('J'.$start_row, $key_kkp->negosiasi_dengan_kontrak_lain);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('K'.$start_row, $key_kkp->opsi_perpanjangan);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('L'.$start_row, $key_kkp->cukup_pasti_perpanjang);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('M'.$start_row, $key_kkp->terminasi);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('N'.$start_row, $key_kkp->cukup_pasti_menghentikan);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('O'.$start_row, $key_kkp->certain_asset);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('P'.$start_row, $key_kkp->rigth_to_operate);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('Q'.$start_row, $key_kkp->control_utility);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('R'.$start_row, $key_kkp->control_physical_asset);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('S'.$start_row, $key_kkp->contract_price);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('T'.$start_row, $key_kkp->output_used_by_third_party);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('U'.$start_row, $key_kkp->right_control);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('V'.$start_row, $key_kkp->lease);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('W'.$start_row, $key_kkp->multi_komponen);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('X'.$start_row, $key_kkp->komponen_dalam_kontrak);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('Y'.$start_row, $key_kkp->komponen_sewa);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('Z'.$start_row, $key_kkp->penyewa_dapat_manfaat);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AA'.$start_row, $key_kkp->ketergantungan_tinggi_asset);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AB'.$start_row, $key_kkp->komponen_terpisah);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AC'.$start_row, $key_kkp->nilai_kontrak_exclude_ppn);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AD'.$start_row, $key_kkp->termin_bayar);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AE'.$start_row, $key_kkp->akhir_awal_bulan_bayar);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AF'.$start_row, $key_kkp->frekuensi_pembayaran);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AG'.$start_row, 0);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AH'.$start_row, 0);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AI'.$start_row, 0);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AJ'.$start_row, 0);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AK'.$start_row, $key_kkp->nilai_sewa_per_pembayaran);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AL'.$start_row, $key_kkp->status_ppn);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AM'.$start_row, $key_kkp->ppn);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AN'.$start_row, $key_kkp->nilai_sewa_per_bulan);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AO'.$start_row, $key_kkp->jumlah_unit_jumlah);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AP'.$start_row, $key_kkp->jumlah_unit_satuan);
				// END ISI

				$nomor++;
				$start_row++;
				// set judul excel
				$spreadsheet->getActiveSheet($i)->setTitle($key_kkp->nama_pt);
			}
		}
		
		// set column width to auto
		foreach (range('A','N') as $columnIndex) {
		  $spreadsheet->getActiveSheet()->getColumnDimension($columnIndex)->setAutoSize(true);
		}

		// set row height to auto
		$spreadsheet->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

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
		exit();
	}

	function calculation() {
		$pt = $this->input->get('pt');
		$user = $this->input->get('user');

		$array_pt = explode(',', $pt);
		$jumlah_pt = count($array_pt);

		$spreadsheet = new Spreadsheet();

		for ($i=0; $i < $jumlah_pt; $i++) {
			$spreadsheet->createSheet($i);

			$param = array('nama_pt'=>$array_pt[$i], 'user' => $user);
			$data_calculation = $this->ExportModel->calculation_export($param);

			$creator = $this->session->userdata('ses_nama');
			$title_excel = "Calculation IFRS16 - PSAK73";
			$date_export = date('d/m/Y');

			$nomor = 1;
			$start_row = 7;
			foreach ($data_calculation->result() as $key_calculation) {
				// settingan awal
				$spreadsheet->getProperties()->setCreator($creator)->setLastModifiedBy($creator)->setTitle($title_excel)->setSubject("Calculation IFRS16")->setDescription("Calculation")->setKeywords($title_excel);

				// HEAD
					$spreadsheet->setActiveSheetindex($i)->setCellValue('A6', "No.");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('B6', "Serial Number / Nomor Polisi");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('C6', "Jenis Sewa");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('D6', "Vendor");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('E6', "Nomor Kontrak");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('F6', "Nilai Kontrak");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('G6', "Nilai Kontrak + Nilai Asumsi Perpanjangan");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('H6', "Start Date");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('I6', "End Date");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('J6', "Periode");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('K6', "Perpanjangan (asumsi)");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('L6', "Periode Kontrak + Asumsi Perpanjangan");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('M6', "");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('N6', "Lease / Non Lease");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('O6', "Sisa Periode Dari 31 Des 2019");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('P6', "TOP");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('Q6', "Di belakang (0), Di depan (1)");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('R6', "Payment Amount/ Term");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('S6', "Nilai Residu");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('T6', "Discount Rate");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('U6', "Effective Monthly Discount Rate");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('V6', "Effective Discount Rate");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('W6', "PV MLP");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('X6', "Prepaid");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('Y6', "Lease Liability as of 31 Dec 2019");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('Z6', "Depreciation Exp./month");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AA6', "ROU as of 31 Dec 2019");
					$spreadsheet->setActiveSheetindex($i)->setCellValue('AB6', "");
				// END HEAD

				// ISI
					$y1 = date('Y',strtotime($key_calculation->tgl_perpanjangan));
					$y2 = date('Y',strtotime($key_calculation->start_date));

					$m1 = date('m',strtotime($key_calculation->tgl_perpanjangan));
					$m2 = date('m',strtotime($key_calculation->start_date));

					$periode_kontrak_plus_perpanjangan = (($y1 - $y2) * 12) + ($m1 - $m2);
					
					// $key_calculation->periode_kontrak - periode_kontrak_plus_perpanjangan	
						$kosongan = $key_calculation->periode_kontrak - $periode_kontrak_plus_perpanjangan;

					// if ((cal.tgl_perpanjangan - 12/31/2019--bisa berubah hardcode) / 30) <= 12 ='Position Paper' ELSE 'Lease' 
						$lease_non_lease = "";
						$y1_l = date('Y',strtotime($key_calculation->tgl_perpanjangan));
						$y2_l = date('Y',strtotime('2019-12-31'));

						$m1_l = date('m',strtotime($key_calculation->tgl_perpanjangan));
						$m2_l = date('m',strtotime('2019-12-31'));

						$lease_non_lease_hasil = (($y1_l - $y2_l) * 12) + ($m1_l - $m2_l);
						if ($lease_non_lease_hasil <= 12) {
							$lease_non_lease = 'Position Paper';
						} else {
							$lease_non_lease = 'Lease';
						}

					// ((cal.tgl_perpanjangan - 12/31/2019--bisa berubah hardcode) / 30)
						$y1_sisa = date('Y',strtotime($key_calculation->tgl_perpanjangan));
						$y2_sisa = date('Y',strtotime('2019-12-31'));

						$m1_sisa = date('m',strtotime($key_calculation->tgl_perpanjangan));
						$m2_sisa = date('m',strtotime('2019-12-31'));

						$sisa_periode_31_des_2019 = (($y1_sisa - $y2_sisa) * 12) + ($m1_sisa - $m2_sisa);

					// (((1+cal.dr)^(1/12))-1)
						$effective_monthly_dr = "";

						// $get_decimal = $key_calculation->discount_rate/100;
						$replacements_dr = [
						    "%" => "",
						    " " => "",
						    "," => ".",
						];
						$before_get_decimal = strtr($key_calculation->discount_rate, $replacements_dr);
						// $before_get_decimal = $key_calculation->discount_rate;
						if($before_get_decimal === null){
							// $get_decimal = $key_calculation->discount_rate_null/100;
							$get_decimal = 0/100;
						}else if ($before_get_decimal === 0){
							// $get_decimal = $key_calculation->discount_rate_null/100;
							$get_decimal = 0/100;
						}else if ($before_get_decimal === '0'){
							// $get_decimal = $key_calculation->discount_rate_null/100;
							$get_decimal = 0/100;
						}else if ($before_get_decimal === ''){
							// $get_decimal = $key_calculation->discount_rate_null/100;
							$get_decimal = 0/100;
						}else{
						    $get_decimal = $before_get_decimal/100;
						};

						// var_dump($get_decimal);

						$get_decimal_plus_1 = 1+$get_decimal;

						$effective_monthly_dr_pangkat = pow($get_decimal_plus_1, 1/12);

						$effective_monthly_dr = $effective_monthly_dr_pangkat - 1;

					// ((1+effective_monthly_dr)^1-1)
						$dr_dr = 1 + $effective_monthly_dr;

						$effective_dr = (pow((1 + $effective_monthly_dr), 1))-1;


					$pv_mlp = '=PV((V'.$start_row.'),O'.$start_row.',R'.$start_row.',S'.$start_row.',Q'.$start_row.')';

					// ( (pv_mlp - cal.prepaid) / sisa_periode_31_des_2019)
						// $depresiasi_exp_per_month = (($pv_mlp - $key_calculation->prepaid) / $sisa_periode_31_des_2019);
						
						$depresiasi_exp_per_month = '=(W'.$start_row.'-X'.$start_row.')/O'.$start_row.'';

					// ((pv_mlp-cal.prepaid)+rou_as_of_31_12_2019)
						// $kosongan_dua = (($pv_mlp - $key_calculation->prepaid) + $rou_as_of_31_12_2019);
						
					$kosongan_dua = '=(W'.$start_row.'-X'.$start_row.')+AA'.$start_row.'';

					$replacements = [
					    "," => "",
					    "." => "",
					];
					$pat_nya = strtr($key_calculation->payment_amount_per_term, $replacements);
					if (is_numeric($pat_nya)) {
						$pat = (int)$pat_nya;
					} else {
						$pat = (int)0;
					}


					$spreadsheet->setActiveSheetIndex($i)->setCellValue('A'.$start_row, $nomor);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('B'.$start_row, $key_calculation->serial_number);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('C'.$start_row, $key_calculation->jenis_sewa);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('D'.$start_row, $key_calculation->vendor);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('E'.$start_row, $key_calculation->nomor_kontrak);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('F'.$start_row, $key_calculation->nilai_kontrak);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('G'.$start_row, $key_calculation->kontrak_plus_perpanjangan);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('H'.$start_row, $key_calculation->start_date);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('I'.$start_row, $key_calculation->end_date);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('J'.$start_row, $key_calculation->periode_kontrak);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('K'.$start_row, $key_calculation->tgl_perpanjangan);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('L'.$start_row, $periode_kontrak_plus_perpanjangan);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('M'.$start_row, $kosongan);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('N'.$start_row, $lease_non_lease);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('O'.$start_row, $sisa_periode_31_des_2019);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('P'.$start_row, $key_calculation->top);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('Q'.$start_row, $key_calculation->awal_akhir_bulan);
					// $spreadsheet->setActiveSheetIndex($i)->setCellValue('R'.$start_row, $key_calculation->payment_amount_per_term);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('R'.$start_row, $pat);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('S'.$start_row, $key_calculation->nilai_residu);
					// $spreadsheet->setActiveSheetIndex($i)->setCellValue('T'.$start_row, $key_calculation->discount_rate);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('T'.$start_row, $before_get_decimal);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('U'.$start_row, $effective_monthly_dr);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('V'.$start_row, $effective_dr);
					// $spreadsheet->setActiveSheetIndex($i)->setCellValue('W'.$start_row, $pv_mlp);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('W'.$start_row, $pv_mlp);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('X'.$start_row, $key_calculation->prepaid);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('Y'.$start_row, '=W'.$start_row);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('Z'.$start_row, $depresiasi_exp_per_month);
					// $spreadsheet->setActiveSheetIndex($i)->setCellValue('AA'.$start_row, $rou_as_of_31_12_2019);
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AA'.$start_row, '=ABS(W'.$start_row.')');
					$spreadsheet->setActiveSheetIndex($i)->setCellValue('AB'.$start_row, $kosongan_dua);
				// END ISI

				$nomor++;
				$start_row++;
				// set judul excel
				$spreadsheet->getActiveSheet($i)->setTitle($key_calculation->nama_pt);
			}


			// baris terakhir
			$highestRow = $spreadsheet->setActiveSheetindex($i)->getHighestRow();

			// column terakhir
			$highestColumn = $spreadsheet->setActiveSheetindex($i)->getHighestColumn();

			// set column width to auto
			for ($i_col='A'; $i_col != $highestColumn; $i_col++) { 
				$spreadsheet->getActiveSheet()->getStyle(''.$i_col.'6:'.$i_col.$highestRow.'')->getAlignment()->setWrapText(true);
			}
		}

		// set row height to auto
		$spreadsheet->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

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
		exit();
	}

	function schedule() {
		$id_summary = $this->input->get('id_summary');

		$param = array('id_summary'=>$id_summary);
		$data_calculation = $this->ExportModel->schedule_export($param);

		$data_data = $data_calculation->row();
		// var_dump($data_data);
		// die();

		$spreadsheet = new Spreadsheet();

		$creator = $this->session->userdata('ses_nama');
		$title_excel = "Schedule - PSAK73";
		$date_export = date('d/m/Y');

		// settingan awal
		$spreadsheet->getProperties()->setCreator($creator)->setLastModifiedBy($creator)->setTitle($title_excel)->setSubject("Schedule")->setDescription("Schedule")->setKeywords($title_excel);

		// HEAD
			$spreadsheet->setActiveSheetindex(0)->setCellValue('B2', 'No'); //isian B2 (title)
			$spreadsheet->getActiveSheet()->getStyle('B2')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('B2')->getFont()->setSize(20); //set FontSize

			$spreadsheet->setActiveSheetindex(0)->setCellValue('C2', $data_data->serial_number); //isian C2 (title)
			$spreadsheet->getActiveSheet()->getStyle('C2')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('C2')->getFont()->setSize(20); //set FontSize

			$spreadsheet->setActiveSheetindex(0)->setCellValue('B3', 'Jenis Sewa'); //isian B3 (title)
			$spreadsheet->getActiveSheet()->getStyle('B3')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('B3')->getFont()->setSize(20); //set FontSize

			$spreadsheet->setActiveSheetindex(0)->setCellValue('C3', $data_data->jenis_sewa); //isian C3 (title)
			$spreadsheet->getActiveSheet()->getStyle('C3')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('C3')->getFont()->setSize(20); //set FontSize

			$spreadsheet->setActiveSheetindex(0)->setCellValue('B4', 'No Kontrak'); //isian B4 (title)
			$spreadsheet->getActiveSheet()->getStyle('B4')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('B4')->getFont()->setSize(20); //set FontSize

			$spreadsheet->setActiveSheetindex(0)->setCellValue('C4', $data_data->nomor_kontrak); //isian C4 (title)
			$spreadsheet->getActiveSheet()->getStyle('C4')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('C4')->getFont()->setSize(20); //set FontSize

			// header tabel dimulai dari baris ke 7
			$spreadsheet->setActiveSheetindex(0)->setCellValue('B7', "Periode");
			$spreadsheet->getActiveSheet()->mergeCells('B7:B8');
			$spreadsheet->getActiveSheet()->getStyle('B7')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('B7')->getFont()->setSize(20); //set FontSize

			$spreadsheet->setActiveSheetindex(0)->setCellValue('C7', "LEASE LIABILITY");
			$spreadsheet->getActiveSheet()->mergeCells('C7:F7');
			$spreadsheet->getActiveSheet()->getStyle('C7')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('C7')->getFont()->setSize(20); //set FontSize

			$spreadsheet->setActiveSheetindex(0)->setCellValue('C8', "Beg.Balance");
			$spreadsheet->setActiveSheetindex(0)->setCellValue('D8', "Payment");
			$spreadsheet->setActiveSheetindex(0)->setCellValue('E8', "Interest");
			$spreadsheet->setActiveSheetindex(0)->setCellValue('F8', "End.Balance");

			$spreadsheet->setActiveSheetindex(0)->setCellValue('G7', "RIGHT OF USE ASSET");
			$spreadsheet->getActiveSheet()->mergeCells('G7:I7');
			$spreadsheet->getActiveSheet()->getStyle('G7')->getFont()->setBold(TRUE);
			$spreadsheet->getActiveSheet()->getStyle('G7')->getFont()->setSize(20); //set FontSize

			$spreadsheet->setActiveSheetindex(0)->setCellValue('G8', "Beg.Balance");
			$spreadsheet->setActiveSheetindex(0)->setCellValue('H8', "Depreciation Expense");
			$spreadsheet->setActiveSheetindex(0)->setCellValue('I8', "End.Bal");
		// END HEAD

		// ISI
			$start_row = 9; //set isian dimulai dari baris ke 9
			$i = 1;
			// (((1+cal.dr)^(1/12))-1)
				$effective_monthly_dr = "";

				$get_decimal = $data_data->discount_rate/100;

				$get_decimal_plus_1 = 1+$get_decimal;

				$effective_monthly_dr_pangkat = pow($get_decimal_plus_1, 1/12);

				$effective_monthly_dr = $effective_monthly_dr_pangkat - 1;

				// var_dump($effective_monthly_dr);
				// die();

			// ((1+effective_monthly_dr)^1-1)
				$dr_dr = 1 + $effective_monthly_dr;

				$effective_dr = (pow((1 + $effective_monthly_dr), 1))-1;

				// var_dump($effective_dr);
				// die();

			// ((cal.tgl_perpanjangan - 12/31/2019--bisa berubah hardcode) / 30)
				$y1_sisa = date('Y',strtotime($data_data->tgl_perpanjangan));
				$y2_sisa = date('Y',strtotime('2019-11-31'));

				$m1_sisa = date('m',strtotime($data_data->tgl_perpanjangan));
				$m2_sisa = date('m',strtotime('2019-11-31'));

				$date1 = date_create($data_data->tgl_perpanjangan);
				$date2 = date_create('2019-12-31');

				$diff=date_diff($date1,$date2);
				$hasil = $diff->format("%a");
				$akhir = $hasil/30;
				// $sisa_periode_31_des_2019 = (($y1_sisa - $y2_sisa) * 12) + ($m1_sisa - $m2_sisa);
				$sisa_periode_31_des_2019 = floor($akhir);

				// var_dump($sisa_periode_31_des_2019);
				// die();

			// ( (pv_mlp - cal.prepaid) / sisa_periode_31_des_2019)
				$depresiasi_exp_per_month = '=(C'.$start_row.'-'.$data_data->prepaid.')/'.$sisa_periode_31_des_2019.'';

				// var_dump($depresiasi_exp_per_month);
				// die();

				$replacements = [
				    "," => "",
				    "." => "",
				];
				$pat_nya = strtr($data_data->payment_amount_per_term, $replacements);
				if (is_numeric($pat_nya)) {
					$pat = (int)$pat_nya;
				} else {
					$pat = (int)0;
				}

			$spreadsheet->setActiveSheetIndex(0)->setCellValue('Z'.$start_row, $effective_dr);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AA'.$start_row, $sisa_periode_31_des_2019);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AB'.$start_row, $pat);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AC'.$start_row, $data_data->nilai_residu);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AD'.$start_row, $data_data->awal_akhir_bulan);

			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AE'.$start_row, $effective_monthly_dr);
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('AF'.$start_row, $depresiasi_exp_per_month);

			// $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$start_row, '2020');		
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('B'.$start_row, 'January - 2020');

			$spreadsheet->setActiveSheetIndex(0)->setCellValue('C'.$start_row, '=PV((Z'.$start_row.'),AA'.$start_row.',AB'.$start_row.',AC'.$start_row.',AD'.$start_row.')');
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('D'.$start_row, '=('.$pat.')*(-1)');
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('E'.$start_row, '=(C'.$start_row.')*('.$effective_monthly_dr.')');	
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('F'.$start_row, '=C'.$start_row.'-(D'.$start_row.'-E'.$start_row.')');

			$spreadsheet->setActiveSheetIndex(0)->setCellValue('G'.$start_row, '=ABS(C'.$start_row.')');	
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('H'.$start_row, '=AF9');	
			$spreadsheet->setActiveSheetIndex(0)->setCellValue('I'.$start_row, '=G'.$start_row.'+H'.$start_row.'');

			// $spreadsheet->getActiveSheet()->getStyle('A'.$start_row)->applyFromArray($style_row);
			// $spreadsheet->getActiveSheet()->getStyle('B'.$start_row)->applyFromArray($style_row);
			$spreadsheet->getActiveSheet()->getStyle('C'.$start_row)->getNumberFormat()->setFormatCode('_-* #,##0_-;-* #,##0_-;_-* "-"??_-;_-@_-');
			$spreadsheet->getActiveSheet()->getStyle('D'.$start_row)->getNumberFormat()->setFormatCode('_-* #,##0_-;-* #,##0_-;_-* "-"??_-;_-@_-');
			$spreadsheet->getActiveSheet()->getStyle('E'.$start_row)->getNumberFormat()->setFormatCode('_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-');
			$spreadsheet->getActiveSheet()->getStyle('F'.$start_row)->getNumberFormat()->setFormatCode('_-* #,##0_-;-* #,##0_-;_-* "-"??_-;_-@_-');
			$spreadsheet->getActiveSheet()->getStyle('G'.$start_row)->getNumberFormat()->setFormatCode('_-* #,##0_-;-* #,##0_-;_-* "-"??_-;_-@_-');
			$spreadsheet->getActiveSheet()->getStyle('H'.$start_row)->getNumberFormat()->setFormatCode('_-* #,##0_-;-* #,##0_-;_-* "-"??_-;_-@_-');
			$spreadsheet->getActiveSheet()->getStyle('I'.$start_row)->getNumberFormat()->setFormatCode('_-* #,##0_-;-* #,##0_-;_-* "-"??_-;_-@_-');

			$cell_f9 = $spreadsheet->getActiveSheet()->getCell('F'.$start_row)->getFormattedValue();
			// $cell_f9 = $spreadsheet->getActiveSheet()->getCell('F'.$start_row)->getValue();
			$sudah_nol = 0;
			$ix=1;
			$stop = 0;
			$month = strtotime('2020-02-01');

			do{
				$showMonth = date('F - Y', $month);
				$month = strtotime("+1 month", $month);
				$row = $start_row+$ix;
				$bulan_awal = 1;
				$row_2 = ($start_row+$ix)-1;
				// $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$start_row, '2020');
				$spreadsheet->setActiveSheetIndex(0)->setCellValue('B'.$row, ''.$showMonth);
				$spreadsheet->setActiveSheetIndex(0)->setCellValue('C'.$row, '=F'.$row_2);
				$spreadsheet->setActiveSheetIndex(0)->setCellValue('D'.$row, '=('.$pat.')*(-1)');
				$spreadsheet->setActiveSheetIndex(0)->setCellValue('E'.$row, '=(C'.$row.')*('.$effective_monthly_dr.')');
				$spreadsheet->setActiveSheetIndex(0)->setCellValue('F'.$row, '=C'.$row.'-(D'.$row.'-E'.$row.')');

				$spreadsheet->setActiveSheetIndex(0)->setCellValue('G'.$row, '=I'.$row_2.'');	
				$spreadsheet->setActiveSheetIndex(0)->setCellValue('H'.$row, '=AF9');	
				$spreadsheet->setActiveSheetIndex(0)->setCellValue('I'.$row, '=G'.$row.'+H'.$row.'');

				// apply isian style
				// $spreadsheet->getActiveSheet()->getStyle('A'.$row)->applyFromArray($style_row);
				// $spreadsheet->getActiveSheet()->getStyle('B'.$row)->applyFromArray($style_row);
				$spreadsheet->getActiveSheet()->getStyle('C'.$row)->getNumberFormat()->setFormatCode('_-* #,##0_-;-* #,##0_-;_-* "-"??_-;_-@_-');
				$spreadsheet->getActiveSheet()->getStyle('D'.$row)->getNumberFormat()->setFormatCode('_-* #,##0_-;-* #,##0_-;_-* "-"??_-;_-@_-');
				$spreadsheet->getActiveSheet()->getStyle('E'.$row)->getNumberFormat()->setFormatCode('_-* #,##0.00_-;-* #,##0.00_-;_-* "-"??_-;_-@_-');
				// $spreadsheet->getActiveSheet()->getStyle('F'.$row)->applyFromArray($style_row);
				$spreadsheet->getActiveSheet()->getStyle('F'.$row)->getNumberFormat()->setFormatCode('_-* #,##0_-;-* #,##0_-;_-* "-"??_-;_-@_-');
				$spreadsheet->getActiveSheet()->getStyle('G'.$row)->getNumberFormat()->setFormatCode('_-* #,##0_-;-* #,##0_-;_-* "-"??_-;_-@_-');
				$spreadsheet->getActiveSheet()->getStyle('H'.$row)->getNumberFormat()->setFormatCode('_-* #,##0_-;-* #,##0_-;_-* "-"??_-;_-@_-');
				$spreadsheet->getActiveSheet()->getStyle('I'.$row)->getNumberFormat()->setFormatCode('_-* #,##0_-;-* #,##0_-;_-* "-"??_-;_-@_-');

				$cell_f = $spreadsheet->getActiveSheet()->getCell('F'.$row)->getFormattedValue();
				// $cell_f = $spreadsheet->getActiveSheet()->getCell('F'.$row)->getValue();
				
				$cell_f9 = $cell_f;

				$replace1 = str_replace(',', '', $cell_f9);
				$replace2 = str_replace('.', '', $replace1);

				// $cell_f9_pos = (int)$replace2;
				$cell_f9_pos = $replace2;
				// if ($cell_f9_pos > 0) {
				if ($cell_f9_pos > 0) {
					$stop = 1;

				}
			$bulan_awal++;
			$ix++;
			}while ( $stop < 1 );

			$highestRow = $spreadsheet->setActiveSheetindex(0)->getHighestRow();
			// $spreadsheet->setActiveSheetIndex(0)->removeRow($highestRow);
			// $spreadsheet->getActiveSheet()->setCellValue('J8', $highestRow);
		// END ISI

		// set column width to auto
			foreach (range('A','I') as $columnIndex) {
			  # code...
			  $spreadsheet->getActiveSheet()->getColumnDimension($columnIndex)->setAutoSize(true);
			}

		// set row height to auto
		$spreadsheet->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

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
		exit();
	}
}