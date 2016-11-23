<?php

class Operator extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_operator');
		check_login();
	}

	public function index()
	{
		$data['title']  = "Tampil";
        $data['subtitle'] = "Data Operator";
        $data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
 		$data['record']  = $this->model_operator->tampil_data();
		$this->template->load('template', 'operator/lihat_data', $data);
	}
	public function post()
	{
		if (isset($_POST['submit'])) {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 300;
            $config['max_width']            = 2000;
            $config['max_height']           = 2000;

            $this->load->library('upload', $config);
            $this->upload->do_upload();
	        $hasil=$this->upload->data();

			$this->model_operator->post($hasil);
			redirect('operator');
		}else{
		    $data['title']  = "Form";
            $data['subtitle'] = "Tambah Users";
            $data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
	        $this->template->load('template', 'operator/input_data', $data);
		}
	}
	public function edit()
	{
		if (isset($_POST['submit'])) {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 300;
            $config['max_width']            = 2000;
            $config['max_height']           = 2000;

            $this->load->library('upload', $config);
            $this->upload->do_upload();
	        $hasil=$this->upload->data();

			$this->model_operator->edit($hasil);
			redirect('operator');
		}else{
			$data['title']  = "Form";
            $data['subtitle'] = "Edit Users";
            $data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
			$data['record']  =  $this->model_operator->get_by_id()->row();
			$this->template->load('template', 'operator/form_edit', $data);
	    }
	}
	public function delete()
	{
		$this->model_operator->delete();
		redirect('operator');
	}
}