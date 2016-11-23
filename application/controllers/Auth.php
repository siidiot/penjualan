<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_login');
	}

	public function login()
	{
		if (isset($_POST['submit'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$hasil    = $this->model_login->login($username, $password);

			if ($hasil==1) {
				$date =  date('Y-m-d');
				$this->db->update('operator', array('last_login'=>$date), array('username'=>$username));
				$this->session->set_userdata(array('status_login' => 'oke','username'=>$username));
				redirect('dashboard');
			}else{
				redirect('auth/login');
			}
		}else{
			sudah_login();
			$this->load->view('form_login');
		}
		
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */