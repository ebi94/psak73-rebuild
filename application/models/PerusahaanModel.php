<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerusahaanModel extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    function perusahaan_get_all($param = array()) {
    	$where = "WHERE created_by != 0";

    	$pt = "";
    	if (isset($param['pt']) && ($param['pt'] != '' || $param['pt'] != null)) {
    	    $pt = "AND nama_perusahaan LIKE'%".$param['pt']."%'";
    	}

    	$alamat = "";
    	if (isset($param['alamat']) && ($param['alamat'] != '' || $param['alamat'] != null)) {
    	    $alamat = "AND alamat LIKE'%".$param['alamat']."%'";
    	}

    	$query = $this->db->query("
    		SELECT *
    		FROM t_perusahaan
    		$where
    		$pt
    		$alamat
    	");

    	return $query;
    }

    function perusahaan_add() {
    	$nama_perusahaan = $this->input->post('nama_perusahaan');
    	$alamat = $this->input->post('alamat');
    	$telepon = $this->input->post('telepon');

    	$perusahaan_add_data = array(
    		'nama_perusahaan' => $nama_perusahaan,
    		'alamat' => $alamat,
    		'telepon' => $telepon,
    		'created_by' => $this->session->userdata('ses_id')
    	);

    	return $this->db->insert('t_perusahaan', $perusahaan_add_data);
    }

    function perusahaan_edit() {
    	$id_perusahaan = $this->input->post('edit_id_perusahaan');
    	$nama_perusahaan = $this->input->post('edit_nama_perusahaan');
    	$alamat = $this->input->post('edit_alamat');
    	$telepon = $this->input->post('edit_telepon');

    	$perusahaan_edit_data = array(
    		'nama_perusahaan' => $nama_perusahaan,
    		'alamat' => $alamat,
    		'telepon' => $telepon
    	);

    	$this->db->where('id',$id_perusahaan);
    	return $this->db->update('t_perusahaan', $perusahaan_edit_data);
	}
	
	function perusahaan_delete() {
		$id = $this->input->post('id');
		$this->db->where('id',$id);
		if (! $this->db->delete('t_perusahaan')) {
			return false;
		}
    }
}