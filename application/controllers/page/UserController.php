<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller{
	function __construct(){
		parent::__construct();

		if($this->session->userdata('masuk') != TRUE){
			$url = base_url('');
	        redirect($url);
		}

        $this->load->model('AuthModel');
	}

	function index() {
		$data['title'] = 'Users Management';
		$data['view'] = 'pages/user';
		// $data['jumlah_asset'] = $this->db->query('SELECT COUNT(id) AS jumlah_asset FROM abm_summary')->row();
		// $data['jumlah_kontrak'] = $this->db->query('SELECT COUNT(nomor_kontrak) AS jumlah_kontrak FROM t_kontrak')->row();
		// $data['jumlah_nilai_kontrak'] = $this->db->query('SELECT SUM(nilai_kontrak) AS jumlah_nilai_kontrak FROM abm_summary')->row();
		// $data['jumlah_user'] = $this->db->query('SELECT COUNT(id) AS jumlah_user FROM users')->row();
		$this->load->view('templates/layout', $data);
    }

    function get_user_list() {

        $query = $this->AuthModel->auth_get_all();

        $data_user = [];
        $i = 1;

        foreach ($query->result() as $key_user) {
            // $userActive = '';
            if ($key_user->active == 1){
                $userActive = 'Active';
            } else {
                $userActive = 'Not Active';
            }

        	$data_user[] = array(
        		$i++,
        		$key_user->name,
                $key_user->email,
        		$userActive,
        		'<button
        		type="button" 
        		class="edit_user btn btn-outline-warning px-3" 
        		data-toggle="modal" 
        		data-target="#editUserModal" 
        		data-backdrop="static"
        		data-keyboard="false"
        		data-idu="'.$key_user->id.'"
        		data-namau="'.$key_user->name.'"
                data-passwordu="'.$key_user->password.'"
        		data-emailu="'.$key_user->email.'">
        		<i class="fas fa-edit"></i>
				</button>
				<button
        		type="button" 
        		class="delete_user btn btn-outline-danger px-3" 
        		data-toggle="modal" 
        		data-target="#deleteUserModal" 
        		data-backdrop="static"
        		data-keyboard="false"
        		data-idu="'.$key_user->id.'">
        		<i class="fas fa-trash-alt"></i>
				</button>'
        	);
        }

        $result = array(
            "recordsTotal" => $query->num_rows(),
            "data" => $data_user
        );

        echo json_encode($result);
        exit();
    }

    function user_do_add() {
		$data=$this->AuthModel->auth_add();
		echo $data;
		exit();
	}

	function user_do_edit() {
		$data=$this->AuthModel->auth_edit();
		echo $data;
		exit();
	}

	function user_do_delete() {
		$data=$this->AuthModel->auth_delete();
		echo $data;
	}

    function profile_do_edit() {
        $data=$this->AuthModel->auth_profile_edit();
        echo $data;
        exit();
    }
}