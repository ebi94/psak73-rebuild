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
}