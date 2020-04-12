<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExportModel extends CI_Model{

    public function __construct() {
        parent::__construct();

        // Load Models - Model_1 and Model_2
        $this->load->model('AsetModel');
        $this->load->model('PerusahaanModel');
        $this->load->model('KontrakModel');
        $this->load->model('CalculationModel');
        $this->load->model('TermofpaymentModel');
        $this->load->model('TanggalacuanModel');
    }

    function summary_export($param = array()) {
        $where_user = "WHERE kon.created_by != 0";
        if (isset($param['user']) && $param['user'] != '') {
            $where_user = "WHERE kon.created_by IN (".$param['user'].")";
        }
        $where_pt = '';
        if (isset($param['nama_pt']) && ($param['nama_pt'] != '' || $param['nama_pt'] != null)) {
            $where_pt = "AND kon.id_pt IN (".$param['nama_pt'].")";
        }

        $query = $this->db->query(
            "SELECT
                kon.nama_pt AS kon_nama_pt,
                kon.id_pt AS id_pt,
                kon.nomor_kontrak AS kon_nomor_kontrak,
                kon.vendor AS kon_vendor,
                sum.jenis_sewa AS sum_jenis_sewa,
                sum.ns_a AS sum_ns_a,
            CASE
    
                WHEN sum.ns_a = 'Yes' THEN
                CONCAT( 'Terdapat Notifikasi Dengan Kontrak No: ', sum.ns_a1 ) ELSE 'Tidak Terdapat Modifikasi' 
                END AS sum_modifikasi,
                sum.ns_b AS sum_ns_b,
                sum.ns_c1 AS sum_ns_c_1,
                sum.ns_c2 AS sum_ns_c_2,
                sum.ns_d1 AS sum_ns_d_1,
                sum.ns_d2 AS sum_ns_d_2,
                sum.is_1 AS sum_is_1,
                sum.is_2 AS sum_is_2,
                sum.is_3 AS sum_is_3,
                sum.is_4 AS sum_is_4,
                sum.is_5 AS sum_is_5,
                sum.is_6 AS sum_is_6,
                sum.is_7 AS sum_is_7,
                sum.k_1 AS sum_k_1,
                sum.lokasi AS sum_lokasi,
                CONCAT(
                    sum.periode_kontrak,
                    ' bulan (',
                    DAY ( sum.start_date ),
                    ' ',
                CASE
                        MONTH ( sum.start_date ) 
                        WHEN 1 THEN
                        'Januari' 
                        WHEN 2 THEN
                        'Februari' 
                        WHEN 3 THEN
                        'Maret' 
                        WHEN 4 THEN
                        'April' 
                        WHEN 5 THEN
                        'Mei' 
                        WHEN 6 THEN
                        'Juni' 
                        WHEN 7 THEN
                        'Juli' 
                        WHEN 8 THEN
                        'Agustus' 
                        WHEN 9 THEN
                        'September' 
                        WHEN 10 THEN
                        'Oktober' 
                        WHEN 11 THEN
                        'November' 
                        WHEN 12 THEN
                        'Desember' 
                    END,
                    ' ',
                    YEAR ( sum.start_date ),
                    ' s.d ',
                    DAY ( sum.end_date ),
                    ' ',
                CASE
                        MONTH ( sum.end_date ) 
                        WHEN 1 THEN
                        'Januari' 
                        WHEN 2 THEN
                        'Februari' 
                        WHEN 3 THEN
                        'Maret' 
                        WHEN 4 THEN
                        'April' 
                        WHEN 5 THEN
                        'Mei' 
                        WHEN 6 THEN
                        'Juni' 
                        WHEN 7 THEN
                        'Juli' 
                        WHEN 8 THEN
                        'Agustus' 
                        WHEN 9 THEN
                        'September' 
                        WHEN 10 THEN
                        'Oktober' 
                        WHEN 11 THEN
                        'November' 
                        WHEN 12 THEN
                        'Desember' 
                    END,
                    ' ',
                    YEAR ( sum.end_date ),
                    ' )' 
                ) AS periode,
                sum.nilai_kontrak AS sum_nilai_kontrak 
            FROM
                abm_summary sum
            LEFT JOIN t_kontrak kon ON sum.id_kontrak = kon.id
            $where_user
            $where_pt
            ORDER BY kon.created_at ASC"
        );
        // var_dump($array);
        return $query;
    }

    function kkp_export($param = array()) {
        $where_user = "WHERE kon.created_by != 0";
        if (isset($param['user']) && $param['user'] != '') {
            $where_user = "WHERE kon.created_by IN (".$param['user'].")";
        }
        $where_pt = '';
        if (isset($param['nama_pt']) && ($param['nama_pt'] != '' || $param['nama_pt'] != null)) {
            // $array = explode(',', $param['nama_pt']);
            // $array = implode("|",$array);
            // $where_pt = "AND kon.nama_pt LIKE '%".$param['nama_pt']."%'";
            $where_pt = "AND kon.id_pt IN (".$param['nama_pt'].")";
        }

        $query = $this->db->query(
            "SELECT
                kon.nama_pt AS nama_pt,
                kon.id_pt AS id_pt,
                kon.nomor_kontrak AS no_kontrak,
                kon.vendor AS nama_vendor,
                sum.jenis_sewa AS underlying_asset,
                sum.start_date AS tgl_mulai_kontrak,
                sum.end_date AS tgl_berakhir_kontrak,
                sum.periode_kontrak AS periode_kontrak,
                sum.ns_a AS modifikasi_kontrak,
                sum.ns_a1 AS kontrak_original,
                sum.ns_b AS negosiasi_dengan_kontrak_lain,
                sum.ns_c1 AS opsi_perpanjangan,
                sum.ns_c2 AS cukup_pasti_perpanjang,
                sum.ns_d1 AS terminasi,
                sum.ns_d2 AS cukup_pasti_menghentikan,
                sum.is_1 AS certain_asset,
                sum.is_2 AS rigth_to_operate,
                sum.is_3 AS control_utility,
                sum.is_4 AS control_physical_asset,
                sum.is_5 AS contract_price,
                sum.is_6 AS output_used_by_third_party,
                sum.is_7 AS right_control,
                CASE WHEN sum.is_1 = 'Yes' AND sum.is_7 = 'Yes' AND sum.is_2 = 'Yes' AND sum.is_3 = 'Yes' AND sum.is_4 = 'Yes' AND sum.is_6 = 'No' THEN 'Lease' ELSE 'Non Lease' END AS lease,
                sum.k_1 AS multi_komponen,
                sum.k_2 AS komponen_dalam_kontrak,
                sum.k_3 AS komponen_sewa,
                sum.k_4 AS penyewa_dapat_manfaat,
                sum.k_5 AS ketergantungan_tinggi_asset,
                CASE WHEN sum.k_4 = 'Yes' AND sum.k_5 = 'Yes' THEN 'Terpisah' ELSE 'Tidak Terpisah' END AS komponen_terpisah,
                sum.nilai_kontrak AS nilai_kontrak_exclude_ppn,
                cal.top AS termin_bayar,
                cal.awak AS akhir_awal_bulan_bayar,
                cal.frekuensi_pembayaran AS frekuensi_pembayaran,
                (sum.nilai_kontrak / cal.frekuensi_pembayaran) AS nilai_sewa_per_pembayaran,
                cal.status_ppn AS status_ppn,
                cal.ppn AS ppn,
                (sum.nilai_kontrak/sum.periode_kontrak) AS nilai_sewa_per_bulan,
                cal.jumlah_unit AS jumlah_unit_jumlah,
                cal.satuan AS jumlah_unit_satuan
            FROM
                abm_summary sum LEFT JOIN t_kontrak kon ON sum.id_kontrak = kon.id LEFT JOIN t_calculation cal ON cal.id_summary = sum.id
                $where_user
                $where_pt
                ORDER BY kon.created_at ASC"
        );

        return $query;
    }

    function calculation_export($param = array()) {
    	$where_user = "WHERE kon.created_by != 0";
        if (isset($param['user']) && $param['user'] != '') {
            $where_user = "WHERE kon.created_by IN (".$param['user'].")";
        }
        $where_pt = '';
        if (isset($param['nama_pt']) && ($param['nama_pt'] != '' || $param['nama_pt'] != null)) {
            // $array = explode(',', $param['nama_pt']);
            // $array = implode("|",$array);
            // $where_pt = "AND kon.nama_pt LIKE '%".$param['nama_pt']."%'";
            $where_pt = "AND kon.id_pt IN (".$param['nama_pt'].")";
        }

        $query = $this->db->query(
            "SELECT
                kon.nama_pt AS nama_pt,
                kon.id_pt AS id_pt,
                sum.serialnumber AS serial_number,
                sum.jenis_sewa AS jenis_sewa,
                kon.vendor AS vendor,
                kon.nomor_kontrak AS nomor_kontrak,
                sum.nilai_kontrak AS nilai_kontrak,
                ( sum.nilai_kontrak + cal.nilai_asumsi_perpanjangan ) AS kontrak_plus_perpanjangan,
                sum.start_date AS start_date,
                sum.end_date AS end_date,
                sum.periode_kontrak AS periode_kontrak,
                cal.tgl_perpanjangan AS tgl_perpanjangan,
            /*((cal.tgl_perpanjangan - sum.start_date) / 30) AS periode_kontrak_plus_perpanjangan -----dibikin buat pembulatan kebawah*/
                '10' AS periode_kontrak_plus_perpanjangan,
            /*(sum.periode_kontrak - periode_kontrak_plus_perpanjangan) AS kosongan*/
                '10' AS kosongan,
            /*if ((cal.tgl_perpanjangan - 12/31/2019--bisa berubah hardcode) / 30) <= 12 ='Position Paper' ELSE 'Lease' AS lease/ non lease*/
                'Position Paper' AS lease_non_lease,
            /*((cal.tgl_perpanjangan - 12/31/2019--bisa berubah hardcode) / 30) AS sisa_periode_31_des_2019*/
                '20' AS sisa_periode_31_des_2019,
                cal.top AS top,
                cal.awak AS awal_akhir_bulan,
                cal.pat AS payment_amount_per_term,
                '0' AS nilai_residu,
                cal.dr AS discount_rate,
            /*(((1+cal.dr)^(1/12))-1) AS effective_monthly_dr*/
                '2' AS effective_monthly_dr,
            /*((1+effective_monthly_dr)^1-1) AS effective_dr*/
                '3' AS effective_dr,
            /*https://stackoverflow.com/questions/22073169/need-help-converting-pv-formula-to-php AS pv_mlp*/
                '-60' AS pv_mlp,
                cal.prepaid AS prepaid,
            /*'10' AS prepaid,*/
            /*https://stackoverflow.com/questions/22073169/need-help-converting-pv-formula-to-php AS lease_liability_as_of_31_12_2019*/
                '-60' AS lease_liability_as_of_31_12_2019,
            /*( (pv_mlp - cal.prepaid) / sisa_periode_31_des_2019) -----dibikin buat pembulatan kebawah AS depresiasi_exp_per_month*/
                '100' AS depresiasi_exp_per_month,
            /*pv_mlp dibikin positif AS rou_as_of_31_12_2019*/
                '60' AS rou_as_of_31_12_2019,
            /*((pv_mlp-cal.prepaid)+rou_as_of_31_12_2019) AS kosongan_dua*/
                '0' AS kosongan_dua,
                '0' AS discount_rate_null
            FROM
                t_calculation cal
                LEFT JOIN abm_summary sum ON cal.id_summary = sum.id
                LEFT JOIN t_kontrak kon ON sum.id_kontrak = kon.id
            $where_user
            $where_pt
            ORDER BY kon.created_at ASC"
        );

        return $query;
    }

    function schedule_export($param = array()) {
        // $where = "WHERE IF(cal.tgl_perpanjangan = '','Position Paper',IF((DATEDIFF(cal.tgl_perpanjangan,'2019-12-31') / 30) <= 12,'Position Paper', 'Lease')) = 'Lease'";
        // $where_user = "WHERE kon.created_by != 0";
        // if (isset($param['user']) && $param['user'] != '') {
        //     $where_user = "WHERE kon.created_by IN (".$param['user'].")";
        // }
        // $where_pt = '';
        // if (isset($param['nama_pt']) && ($param['nama_pt'] != '' || $param['nama_pt'] != null)) {
        //     $where_pt = "AND kon.nama_pt LIKE '%".$param['nama_pt']."%'";
        // }
        $where_summary = "WHERE sum.id = ".$param['id_summary']."";

        $query = $this->db->query("
            SELECT
                kon.nama_pt AS nama_pt,
                sum.id AS id_summary,
                sum.serialnumber AS serial_number,
                sum.jenis_sewa AS jenis_sewa,
                kon.vendor AS vendor,
                kon.nomor_kontrak AS nomor_kontrak,
                sum.nilai_kontrak AS nilai_kontrak,
                ( sum.nilai_kontrak + cal.nilai_asumsi_perpanjangan ) AS kontrak_plus_perpanjangan,
                sum.start_date AS start_date,
                sum.end_date AS end_date,
                sum.periode_kontrak AS periode_kontrak,
                cal.tgl_perpanjangan AS tgl_perpanjangan,
                '10' AS periode_kontrak_plus_perpanjangan,
                '10' AS kosongan,
                IF(cal.tgl_perpanjangan = '','Position Paper',IF((DATEDIFF(cal.tgl_perpanjangan,'2019-12-31') / 30) <= 12,'Position Paper', 'Lease')) AS lease,
                '20' AS sisa_periode_31_des_2019,
                cal.top AS top,
                cal.awak AS awal_akhir_bulan,
                cal.pat AS payment_amount_per_term,
                '0' AS nilai_residu,
                cal.dr AS discount_rate,
                '2' AS effective_monthly_dr,
                '3' AS effective_dr,
                '-60' AS pv_mlp,
                cal.prepaid AS prepaid,
                '-60' AS lease_liability_as_of_31_12_2019,
                '100' AS depresiasi_exp_per_month,
                '60' AS rou_as_of_31_12_2019,
                '0' AS kosongan_dua,
                '0' AS discount_rate_null,
                kon.created_by AS dibuat_oleh
            FROM
                t_calculation cal
                LEFT JOIN abm_summary sum ON cal.id_summary = sum.id
                LEFT JOIN t_kontrak kon ON sum.id_kontrak = kon.id
                $where_summary
            ORDER BY kon.created_at ASC
        ");

        return $query;
    }
}