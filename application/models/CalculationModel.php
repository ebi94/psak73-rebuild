<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CalculationModel extends CI_Model{

    public function __construct() {
        parent::__construct();

        // Load Models - Model_1 and Model_2
        $this->load->model('KontrakModel');
        $this->load->model('AsetModel');
    }

    function calculation_add($calculaion_add_data) {
    	return $this->db->insert('t_calculation', $calculaion_add_data);
    }
}