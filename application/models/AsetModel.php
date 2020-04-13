<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsetModel extends CI_Model{

    public function __construct() {
        parent::__construct();

        // Load Models - Model_1 and Model_2
        $this->load->model('KontrakModel');
        $this->load->model('CalculationModel');
        $this->load->model('PerusahaanModel');
    }

    function aset_get_all($param= array()) {
        $user = "WHERE k.created_by != 0";
        if (isset($param['user']) && $param['user'] != '') {
        // if ($param['user'] != 'ALL') {
            // $user = "WHERE k.created_by = ".$param['user']."";
            $user = "WHERE k.created_by IN (".$param['user'].")";
        }

        $nama_pt = '';
        if (isset($param['nama_pt']) && ($param['nama_pt'] != '' || $param['nama_pt'] != null)) {
          // $array = explode(',', $param['nama_pt']);
          // $array = implode("|",$array);
          // $nama_pt = "AND k.nama_pt REGEXP '".$array."'";
          $nama_pt = "AND k.id_pt IN (".$param['nama_pt'].")";
        }

        $kontrak = "";
        if (isset($param['kontrak']) && ($param['kontrak'] != '' || $param['kontrak'] != null)) {
            $kontrak = "AND k.nomor_kontrak LIKE '%".$param['kontrak']."%'";
        }

        $vendor = "";
        if (isset($param['vendor']) && ($param['vendor'] != '' || $param['vendor'] != null)) {
        // if ($param['vendor'] != '' || $param['vendor'] != null) {
            $vendor = "AND k.vendor LIKE '%".$param['vendor']."%'";
        }

        $schedule = "";
        if (isset($param['schedule'])) {
          $schedule = "AND (DATEDIFF(c.tgl_perpanjangan,'2019-12-31') / 30) > 12";
        }
        
        $query = $this->db->query("
              SELECT
                    k.id AS id_id_kontrak,
                    k.nama_pt AS nama_pt,
                    k.id_pt AS id_pt,
                    k.nomor_kontrak AS nomor_kontrak,
                    k.vendor AS vendor,
                    k.pdf_url AS pdf_url,
                    sum.id AS id_summary,
                    sum.jenis_sewa AS jenis_sewa,
                    sum.serialnumber AS serial_number,
                    sum.page_in_pdf AS page_in_pdf,
                    sum.ns_a AS ns_a,
                    sum.ns_b AS ns_b,
                    sum.ns_c1 AS ns_c1,
                    sum.ns_c2 AS ns_c2,
                    sum.ns_d1 AS ns_d1,
                    sum.ns_d2 AS ns_d2,
                    sum.is_1 AS is_1,
                    sum.is_2 AS is_2,
                    sum.is_3 AS is_3,
                    sum.is_4 AS is_4,
                    sum.is_5 As is_5,
                    sum.is_6 AS is_6,
                    sum.is_7 AS is_7,
                    sum.k_1 AS ks1,
                    sum.k_2 AS ks2,
                    sum.k_3 AS ks3,
                    sum.k_4 AS ks4,
                    sum.k_5 AS ks5,
                    sum.lokasi AS lokasi,
                    sum.start_date AS start_date,
                    sum.end_date AS end_date,
                    sum.nilai_kontrak AS nilai_kontrak,
                    sum.periode_kontrak AS periode_kontrak,
                    sum.page_in_pdf AS page_in_pdf,
                    k.created_by AS dibuat_kontrak,
                    c.id AS id_calculation,
                    c.dr AS dr,
                    c.pat AS pat,
                    c.top AS top,
                    c.awak AS awak,
                    c.frekuensi_pembayaran AS frekuensi_pembayaran,
                    c.pd AS pd,
                    c.prepaid AS prepaid,
                    c.status_ppn AS status_ppn,
                    c.ppn AS ppn,
                    c.jumlah_unit AS jumlah_unit,
                    c.satuan AS satuan,
                    c.nilai_asumsi_perpanjangan AS nilai_asumsi_perpanjangan,
                    c.tgl_perpanjangan AS tgl_perpanjangan,
                    (DATEDIFF(c.tgl_perpanjangan,'2019-12-31') / 30) As lease
              FROM
                    abm_summary sum
                    LEFT JOIN t_kontrak k ON sum.id_kontrak = k.id
                    LEFT JOIN t_calculation c ON c.id_summary = sum.id
                    $user
                    $nama_pt
                    $schedule
                    $kontrak
                    $vendor
                    ORDER BY k.created_at ASC
        ");
        return $query;
    }

    function aset_add_batch($title,$id_kontrak,$diff,$nama_pt,$nomor_kontrak,$vendor,$created_by,$pageinpdf,$jenis_sewa,$serialnumber,$ns_a,$ns_a1,$ns_b,$ns_c1,$ns_c2,$ns_d1,$ns_d2,$is_1,$is_2,$is_3,$is_4,$is_5,$is_6,$is_7,$k_1,$k_2,$k_3,$k_4,$k_5,$lokasi,$start_date,$end_date,$kontrak_int,$pdf_up,$dr,$pat,$top,$awak,$pd,$prepaid,$status_ppn,$ppn,$jumlah_unit,$satuan,$nilai_asumsi_perpanjangan,$tgl_perpanjangan,$frekuensi_pembayaran) {

        if ($title == 'Add Plus New Aset') {
              $this->db->trans_begin();
              // insert summary/aset
              $id_kontrak_ = $id_kontrak;
              $aset_add_data = array(
                      'id_kontrak' => $id_kontrak_,
                      'page_in_pdf' => $pageinpdf,
                      'jenis_sewa' => $jenis_sewa,
                      'serialnumber' => $serialnumber,
                      'ns_a' => $ns_a,
                      'ns_a1' => $ns_a1,
                      'ns_b' => $ns_b,
                      'ns_c1' => $ns_c1,
                      'ns_c2' => $ns_c2,
                      'ns_d1' => $ns_d1,
                      'ns_d2' => $ns_d2,
                      'is_1' => $is_1,
                      'is_2' => $is_2,
                      'is_3' => $is_3,
                      'is_4' => $is_4,
                      'is_5' => $is_5,
                      'is_6' => $is_6,
                      'is_7' => $is_7,
                      'k_1' => $k_1,
                      'k_2' => $k_2,
                      'k_3' => $k_3,
                      'k_4' => $k_4,
                      'k_5' => $k_5,
                      'lokasi' => $lokasi,
                      'start_date' => $start_date,
                      'end_date' => $end_date,
                      'nilai_kontrak' => $kontrak_int,
                      'periode_kontrak' => $diff
              );
              $this->aset_add($aset_add_data);
              $id_summary = $this->db->insert_id();

              // insert calculation
              $calculaion_add_data = array(
                    'dr' => $dr,
                    'pat' => $pat,
                    'top' => $top,
                    'awak' => $awak,
                    'pd' => $pd,
                    'id_summary' => $id_summary,
                    'prepaid' => $prepaid,
                    'status_ppn' => $status_ppn,
                    'ppn' => $ppn,
                    'jumlah_unit' => $jumlah_unit,
                    'satuan' => $satuan,
                    'nilai_asumsi_perpanjangan' => $nilai_asumsi_perpanjangan,
                    'tgl_perpanjangan' => $tgl_perpanjangan,
                    'frekuensi_pembayaran' => $frekuensi_pembayaran
              );
              $this->CalculationModel->calculation_add($calculaion_add_data);
              
              if ($this->db->trans_status() === FALSE)
              {
                $this->db->trans_rollback();
              }
              else
              {
                $this->db->trans_commit();
              }

              $id_kontrak_new = $id_kontrak_;
        } else {
              // $result_kontrak = $this->db->insert('t_kontrak',$kontrak_add_data);
              // $result = $this->db->insert('abm_summary',$aset_add_data);
              $param_pt = array('id_nya' => $nama_pt);
              $pt_pt_get = $this->PerusahaanModel->perusahaan_get_all($param_pt);
              $pt_nya = $pt_pt_get->row();
              $this->db->trans_begin();
              // insert kontrak
              $kontrak_add_data = array(
                    'nama_pt' => $pt_nya->nama_perusahaan,
                    'id_pt' => $nama_pt,
                    'nomor_kontrak' => $nomor_kontrak,
                    'vendor' => $vendor,
                    'created_by' => $this->session->userdata('ses_id'),
                    'pdf_url' => $pdf_up
              );
              $this->KontrakModel->kontrak_add($kontrak_add_data);
              $id_kontrak_new = $this->db->insert_id();

              // insert summary/aset
              $aset_add_data = array(
                    'id_kontrak' => $id_kontrak_new,
                    'page_in_pdf' => $pageinpdf,
                    'jenis_sewa' => $jenis_sewa,
                    'serialnumber' => $serialnumber,
                    'ns_a' => $ns_a,
                    'ns_a1' => $ns_a1,
                    'ns_b' => $ns_b,
                    'ns_c1' => $ns_c1,
                    'ns_c2' => $ns_c2,
                    'ns_d1' => $ns_d1,
                    'ns_d2' => $ns_d2,
                    'is_1' => $is_1,
                    'is_2' => $is_2,
                    'is_3' => $is_3,
                    'is_4' => $is_4,
                    'is_5' => $is_5,
                    'is_6' => $is_6,
                    'is_7' => $is_7,
                    'k_1' => $k_1,
                    'k_2' => $k_2,
                    'k_3' => $k_3,
                    'k_4' => $k_4,
                    'k_5' => $k_5,
                    'lokasi' => $lokasi,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'nilai_kontrak' => $kontrak_int,
                    'periode_kontrak' => $diff
              );
              $this->aset_add($aset_add_data);
              $id_summary = $this->db->insert_id();

              // insert calculation
              $calculaion_add_data = array(
                    'dr' => $dr,
                    'pat' => $pat,
                    'top' => $top,
                    'awak' => $awak,
                    'pd' => $pd,
                    'id_summary' => $id_summary,
                    'prepaid' => $prepaid,
                    'status_ppn' => $status_ppn,
                    'ppn' => $ppn,
                    'jumlah_unit' => $jumlah_unit,
                    'satuan' => $satuan,
                    'nilai_asumsi_perpanjangan' => $nilai_asumsi_perpanjangan,
                    'tgl_perpanjangan' => $tgl_perpanjangan,
                    'frekuensi_pembayaran' => $frekuensi_pembayaran
              );
              $this->CalculationModel->calculation_add($calculaion_add_data);

              if ($this->db->trans_status() === FALSE)
              {
                $this->db->trans_rollback();
              }
              else
              {
                $this->db->trans_commit();
              }
        }
        return $id_kontrak_new;
    }

    function aset_edit_batch($diff,$nama_pt,$nomor_kontrak,$vendor,$created_by,$pageinpdf,$jenis_sewa,$serialnumber,$ns_a,$ns_a1,$ns_b,$ns_c1,$ns_c2,$ns_d1,$ns_d2,$is_1,$is_2,$is_3,$is_4,$is_5,$is_6,$is_7,$k_1,$k_2,$k_3,$k_4,$k_5,$lokasi,$start_date,$end_date,$kontrak_int,$dr,$pat,$top,$awak,$pd,$prepaid,$status_ppn,$ppn,$jumlah_unit,$satuan,$nilai_asumsi_perpanjangan,$tgl_perpanjangan,$frekuensi_pembayaran,$idCalculation,$idSummary,$idKontrak) {

              $param_pt = array('id_nya' => $nama_pt);
              $pt_pt_get = $this->PerusahaanModel->perusahaan_get_all($param_pt);
              $pt_nya = $pt_pt_get->row();
              $this->db->trans_begin();
              // edit kontrak
              $kontrak_edit_data = array(
                    'nama_pt' => $pt_nya->nama_perusahaan,
                    'id_pt' => $nama_pt,
                    'nomor_kontrak' => $nomor_kontrak,
                    'vendor' => $vendor,
                    'updated_by' => $this->session->userdata('ses_id')
              );
              $this->KontrakModel->kontrak_edit($idKontrak, $kontrak_edit_data);

              // edit summary/aset
              $aset_edit_data = array(
                    'page_in_pdf' => $pageinpdf,
                    'jenis_sewa' => $jenis_sewa,
                    'serialnumber' => $serialnumber,
                    'ns_a' => $ns_a,
                    'ns_a1' => $ns_a1,
                    'ns_b' => $ns_b,
                    'ns_c1' => $ns_c1,
                    'ns_c2' => $ns_c2,
                    'ns_d1' => $ns_d1,
                    'ns_d2' => $ns_d2,
                    'is_1' => $is_1,
                    'is_2' => $is_2,
                    'is_3' => $is_3,
                    'is_4' => $is_4,
                    'is_5' => $is_5,
                    'is_6' => $is_6,
                    'is_7' => $is_7,
                    'k_1' => $k_1,
                    'k_2' => $k_2,
                    'k_3' => $k_3,
                    'k_4' => $k_4,
                    'k_5' => $k_5,
                    'lokasi' => $lokasi,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'nilai_kontrak' => $kontrak_int,
                    'periode_kontrak' => $diff
              );
              $this->aset_edit($idSummary, $aset_edit_data);

              // edit calculation
              // Check have calculation
            if($idCalculation !== ''){
                $calculaion_edit_data = array(
                    'dr' => $dr,
                    'pat' => $pat,
                    'top' => $top,
                    'awak' => $awak,
                    'pd' => $pd,
                    'prepaid' => $prepaid,
                    'status_ppn' => $status_ppn,
                    'ppn' => $ppn,
                    'jumlah_unit' => $jumlah_unit,
                    'satuan' => $satuan,
                    'nilai_asumsi_perpanjangan' => $nilai_asumsi_perpanjangan,
                    'tgl_perpanjangan' => $tgl_perpanjangan,
                    'frekuensi_pembayaran' => $frekuensi_pembayaran
                );
                $this->CalculationModel->calculation_edit($idCalculation, $calculaion_edit_data);
            } else {
                $calculaion_add_data = array(
                    'dr' => $dr,
                    'pat' => $pat,
                    'top' => $top,
                    'awak' => $awak,
                    'id_summary' => $idSummary,
                    'pd' => $pd,
                    'prepaid' => $prepaid,
                    'status_ppn' => $status_ppn,
                    'ppn' => $ppn,
                    'jumlah_unit' => $jumlah_unit,
                    'satuan' => $satuan,
                    'nilai_asumsi_perpanjangan' => $nilai_asumsi_perpanjangan,
                    'tgl_perpanjangan' => $tgl_perpanjangan,
                    'frekuensi_pembayaran' => $frekuensi_pembayaran
                );
                $this->CalculationModel->calculation_add($calculaion_add_data);
              }
            //   End Edit calculation

              if ($this->db->trans_status() === FALSE)
              {
                $this->db->trans_rollback();
              }
              else
              {
                $this->db->trans_commit();
              }
        return true;
    }

    function aset_add($aset_add_data) {
        return $this->db->insert('abm_summary', $aset_add_data);
    }

    function aset_edit($idSummary, $aset_add_data) {
        $this->db->where('id', $idSummary);
        return $this->db->update('abm_summary', $aset_add_data);
    }

    function aset_only_check($param = array()) {
        $where = "";
        if (isset($param['id_summary']) && $param['id_summary'] != 'ALL') {
            $where = "WHERE id = ".$param['id_summary']."";
        }

        if (isset($param['id_kontrak']) && $param['id_kontrak'] != 'ALL') {
            $where = "WHERE id_kontrak = ".$param['id_kontrak']."";
        }

        $query = $this->db->query("
            SELECT *
            FROM abm_summary
            $where
        ");

        return $query;
    }

    function aset_delete() {
        $id_aset = $this->input->post('idSummary');
        $param_check_aset = array('id_summary' => $id_aset);

        $check_aset = $this->aset_only_check($param_check_aset)->row();
        $id_kontrak = $check_aset->id_kontrak;

        $param_check_count_aset = array('id_kontrak' => $id_kontrak);
        $check_kontrak = $this->aset_only_check($param_check_count_aset)->num_rows();

        if ($check_kontrak > 1) { // delete summary & calculation
            $this->db->where('id', $id_aset);
            if (! $this->db->delete('abm_summary')) {
                return false;
            }
            $this->db->where('id_summary', $id_aset);
            if (! $this->db->delete('t_calculation')) {
                return false;
            }
        } else { // delete kontrak, summary & calculation
            $this->db->where('id', $id_kontrak);
            if (! $this->db->delete('t_kontrak')) {
                return false;
            }
            $this->db->where('id', $id_aset);
            if (! $this->db->delete('abm_summary')) {
                return false;
            }
            $this->db->where('id_summary', $id_aset);
            if (! $this->db->delete('t_calculation')) {
                return false;
            }
        }
        return true;
    }
}