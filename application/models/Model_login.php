<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function login($username, $password)
	{
       $hasil = $this->db->get_where('operator', array('username' => $username, 'password'=>md5($password)));
      if($hasil->num_rows()>0){
      	return 1;
      }else{
      	return 0;
      }
	}

}

/* End of file Model_login.php */
/* Location: ./application/models/Model_login.php */