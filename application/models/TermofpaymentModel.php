<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TermofpaymentModel extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    function top_get_all() {
    	$query = $this->db->query("SELECT * FROM t_top");

    	return $query;
    }

    function top_add(){
        $top = $this->input->post('top');
        $keterangan = $this->input->post('keterangan');

        $top_add_data = array(
            'top' => $top,
            'keterangan' => $keterangan,
            'created_by' => $this->session->userdata('ses_id')
        );

        return $this->db->insert('t_top', $top_add_data);
    }

    function top_edit() {
        $id_top = $this->input->post('edit_id_top');
        $top = $this->input->post('edit_top_top');
        $keterangan = $this->input->post('edit_keterangan_top');

        $top_edit_data = array(
            'top' => $top,
            'keterangan' => $keterangan
        );

        $this->db->where('id', $id_top);
        return $this->db->update('t_top', $top_edit_data);
    }
}