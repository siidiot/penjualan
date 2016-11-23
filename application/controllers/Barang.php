<?php


class Barang extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_barang');
		check_login();
	}
	function index()
	{
		$data['title']  = "Tampil";
		$data['subtitle'] = "Data Barang";
		$data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
		$data['record']  = $this->model_barang->tampil_data();
		$this->template->load('template', 'barang/lihat_data', $data);
	}
	function post()
	{
		if (isset($_POST['submit'])) {
			$this->model_barang->post();
			redirect('barang');
		}else{
			$data['title']  = "Form";
			$data['subtitle'] = "Tambah Barang";
			$data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
			$data['record']  =  $this->db->get('kategori_barang');
			$this->template->load('template', 'barang/form_input', $data);
	    }
	}
	function edit()
	{
		if (isset($_POST['submit'])) {
			$this->model_barang->edit();
			redirect('barang');
		}else{
			$data['title']  = "Form";
			$data['subtitle'] = "Edit Barang";
			$data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
			$data['record'] = $this->model_barang->get_by_id()->row();
			$data['kategori'] = $this->db->get('kategori_barang');
			$this->template->load('template', 'barang/form_edit', $data);
		}
	}
	function delete()
	{
		$this->model_barang->delete();
		redirect('barang');
	}
}
