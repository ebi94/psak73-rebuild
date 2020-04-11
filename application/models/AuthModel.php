<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model{
	function auth_cek($user,$pass) {
		$query = $this->db->query("SELECT * FROM users WHERE email='".$user."' AND password = '".$pass."'");
		return $query;
	}

	function auth_up_login() {
		$login_time = date('Y-m-d H:i:s');
		$id = $this->session->userdata('ses_id');
		$auth_up_login_data = array(
			'logged_in' => 1,
			'logged_in_time' => $login_time
		);

		$this->db->where('id', $id);
		$result = $this->db->update('users', $auth_up_login_data);
		return $result;
	}

	function auth_up_logout() {
		$id = $this->session->userdata('ses_id');
		$auth_up_logout_data = array(
			'logged_in' => 0
		);

		$this->db->where('id', $id);
		$result = $this->db->update('users', $auth_up_logout_data);
		return $result;
	}

	function auth_get_all() {
		$query = $this->db->query("SELECT * FROM users WHERE active = 1 ORDER BY name ASC");
		return $query;
	}

	function auth_add() {
		$id = $this->session->userdata('ses_id');
		$auth_add_data = array(
			'name' => $this->input->post('nama_user'),
			'email' => $this->input->post('email_user'),
			'level' => $this->input->post('level_user'),
			'password' => do_hash($this->input->post('password_user')),
			'created_by' => $id,
		);

		$result = $this->db->insert('users',$auth_add_data);
		return $result;
	}

	function auth_edit() {
		$id_user = $this->input->post('edit_id_user');
		$user_edit_data = array(
			'name' => $this->input->post('edit_nama_user'),
			'email' => $this->input->post('edit_email'),
		);
		$this->db->where('id',$id_user);
		$result = $this->db->update('users',$user_edit_data);
		return $result;
	}

	function auth_delete() {
		$update_date = date('Y-m-d H:i:s');
		$id = $this->input->post('delete_id');
		$auth_delete_data = array(
			'active' => 0,
			'updated_at' => $update_date,
		);	
		$this->db->where('id',$id);
		$result = $this->db->update('users', $auth_delete_data);
		return $result;
	}
}