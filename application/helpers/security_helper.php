<?php

	function check_login()
	{
		 $CI =& get_instance();
		if (!$CI->session->userdata('status_login')=='oke') {
			redirect('auth/login');
		}
	}
	function sudah_login()
	{
		$CI =& get_instance();
		if ($CI->session->userdata('status_login')=='oke') {
			redirect('dashboard');
		}
	}