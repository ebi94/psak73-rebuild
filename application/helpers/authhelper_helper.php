<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function auth_level($level=''){
		switch ($level) {
			case '0':
			$val_level = 'Super Admin';
			break;
			case '1':
			$val_level = 'Admin';
			break;
			case '2':
			$val_level = 'Client';
			break;
			default:
			  $val_level = '';
			break;
		}
		return $val_level;
	}

	function auth_name($id_user=''){
		$ci =& get_instance();
		$ci->load->database();
		$query = $ci->db->query('SELECT name FROM users WHERE id = '.$id_user)->row();
		$return = $query->name;
		return $return;
	}