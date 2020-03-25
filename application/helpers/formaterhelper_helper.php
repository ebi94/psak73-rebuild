<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function rupiah($angka=''){
		$rupiah_format = "Rp " . number_format($angka,0,',','.');
		return $rupiah_format;
	}

	function ribuan($angka=''){
		$ribuan_format = number_format($angka,0,',','.');
		return $ribuan_format;
	}