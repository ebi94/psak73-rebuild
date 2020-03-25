<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KontrakModel extends CI_Model{

    public function __construct() {
        parent::__construct();

        // Load Models - Model_1 and Model_2
        $this->load->model('AsetModel');
        $this->load->model('CalculationModel');
    }

    function kontrak_add($kontrak_add_data) {
    	return $this->db->insert('t_kontrak', $kontrak_add_data);
    }

    function kontrak_check($param = array()) {
    	$where = "";
    	if (isset($param['id_kontrak'])) {
    		$where = "WHERE id = ".$param['id_kontrak'];
    	}

    	$query = $this->db->query("
    		SELECT
    			*
    		FROM t_kontrak
    		$where
    	");

    	return $query;
    }
}