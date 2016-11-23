<?php

class Dashboard extends CI_Controller{

    public function __construct()
    {
    	parent::__construct();
    	check_login();
    }
	public function index()
	{
		$data['title']  = "";
		$data['subtitle'] = "";
		$data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
		$this->template->load('template','view_dashboard',$data);
	}
}