<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('model_customer'));
	}

	public function index()
	{
		$data['title']   = "Tampil"; 
		$data['subtitle']   = "Data Customer"; 
		$data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
		$data['record']  = $this->model_customer->get_all();
		$this->template->load('template', 'customer/lihat_data', $data);
	}

	public function post()
	{
		if (isset($_POST['submit'])) {
			$this->model_customer->insert();
			redirect('customer','refresh');
		}else{
			$data['title']   = "Form"; 
			$data['subtitle']   = "Tambah Customer"; 
			$data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
			$id    = $this->db->query("SELECT cust_id FROM customer ORDER BY cust_id DESC")->row();
			$data['id'] = $id->cust_id + 1;
			$this->template->load('template', 'customer/form_input', $data);
	    }
	}

	public function edit($id=null)
	{
		if (isset($_POST['submit'])) {
			$this->model_customer->update();
			redirect('customer','refresh');
		}else{
			$data['title']   = "Form"; 
			$data['subtitle']   = "Edit Customer";
			$data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
			$data['record']   = $this->model_customer->get_by($id)->row();
			$this->template->load('template', 'customer/form_edit', $data);
	    }
	}
	public function delete($id=null)
	{
		$this->model_customer->delete($id);
		redirect('customer','refresh');
	}

}

/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */