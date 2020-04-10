<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TanggalacuanModel extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    function tanggal_acuan_get_all() {
    	$query = $this->db->query("SELECT * FROM t_tanggal_acuan");

    	return $query;
    }

    function tanggal_acuan_add() {
        $tanggal_acuan = $this->input->post('tanggal_acuan');
        $keterangan = $this->input->post('keterangan_tanggal_acuan');

        $tanggal_acuan_add_data = array(
            'tanggal_acuan' => $tanggal_acuan,
            'keterangan' => $keterangan,
            'created_by' => $this->session->userdata('ses_id')
        );

        return $this->db->insert('t_tanggal_acuan', $tanggal_acuan_add_data);
    }

    function tanggal_acuan_edit() {
        $id_tanggal_acuan = $this->input->post('edit_id_tanggal_acuan');
        $tanggal_acuan = $this->input->post('edit_tanggal_acuan');
        $keterangan = $this->input->post('edit_keterangan_tanggal_acuan');

        $tanggal_acuan_edit_data = array(
            'tanggal_acuan' => $tanggal_acuan,
            'keterangan' => $keterangan
        );

        $this->db->where('id', $id_tanggal_acuan);
        return $this->db->update('t_tanggal_acuan', $tanggal_acuan_edit_data);
    }

    function tanggal_acuan_delete() {
		$id = $this->input->post('id');
		$this->db->where('id',$id);
		if (! $this->db->delete('t_tanggal_acuan')) {
			return false;
		}
    }
}