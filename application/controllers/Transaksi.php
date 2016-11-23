<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	    $this->load->model(array('model_transaksi','model_barang','model_customer'));
	    $this->load->library('cfpdf');
	    check_login();
	}
   
	public function index()
	{
			$data['title']  = "Data Penjualan Barang";
			$data['subtitle'] = "";
			$data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
			$data['record']  = $this->model_transaksi->view_transaksi();
			$this->template->load('template', 'transaksi/penjualan', $data);
	}
	public function add()
	{
		if (isset($_POST['submit'])) {
			$this->model_transaksi->simpan_barang();
			redirect('transaksi/add');
		}else{
			$data['title']  = "FORM PENJUALAN BARANG";
            $data['subtitle'] = "";
			$data['detail']    = $this->model_transaksi->tampil_detail();
			$data['record']    =  $this->db->get('barang');
			$data['customer']    =  $this->db->get('customer');
			$data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
			$this->template->load('template','transaksi/form_transaksi',$data);
		}
	}
	function get_detail_customer(){
        $id=$this->input->post('idc');
        $data=array(
            'detail_customer'=>$this->model_customer->get_by($id)->row(),
        );
        $this->load->view('customer/ajax_detail_customer',$data);
    }
	function get_detail_product(){
        $id=$this->input->post('id');
        $data=array(
            'detail_product'=>$this->model_barang->get_all_by($id)->row(),
        );
        $this->load->view('barang/ajax_detail_product',$data);
    }
	public function selesai()
	{
		$date = date('Y-m-d H:i:s');
		$user = $this->session->userdata('username');
		$nama_customer = $this->input->post('cust');
		$cust_id = $this->db->get_where('customer', array('nama_customer'=>$nama_customer))->row();
		$op_id = $this->db->get_where('operator', array('username'=>$user))->row();
		$data = array(
                 'operator_id'		   => $op_id->operator_id,
                 'tgl_transaksi'       => $this->input->post('tgl_trans'),
                 'cust_id'			   => $cust_id->cust_id,
                 'tgl_input'           => $date
			   );
		$this->model_transaksi->selesai($data);
		redirect('transaksi');
	}
	public function hapusitem()
	{
		$id = $this->uri->segment(3);
		$this->model_transaksi->hapusitem($id);
		redirect('transaksi/add');
	}
	public function view_history($id)
	{
		$data['title']  = "History Pembayaran";
	    $data['subtitle'] = "";
		$data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
		$data['his']  = $this->model_transaksi->view_history($id)->result();
		$data['nama'] = $this->model_transaksi->view_history($id)->row();
		$this->load->view('transaksi/view_history',$data);
		         
	}
	public function bayar($id)
	{
		if (isset($_POST['submit'])) {
			$this->model_transaksi->bayar($id);
			redirect('transaksi','refresh');
		}else{
			$data['title']  = "FORM PEMBAYARAN PIUTANG";
			$data['subtitle'] = "";
			$data['record']   = $this->model_transaksi->view_transaksi_detail($id)->row();
			$data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
			$this->template->load('template', 'transaksi/form_bayar',$data);
	   }
	} 
   
	public function detail($id)
	{
		$data['title']  = "DETAIL PENJUALAN";
			$data['subtitle'] = "";
			$data['record']   = $this->model_transaksi->view_transaksi_detail($id)->row();
			$data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
       $data['detail']    = $this->model_transaksi->tampil_detail2($id);
       $data['nama']    = $this->db->query("SELECT nama_customer 
       	                                   FROM transaksi_jual AS tj, customer AS c
       	                                   WHERE tj.cust_id=c.cust_id AND tj.transaksi_id='$id'")->row();
      $this->load->view('transaksi/detail', $data);
	}
	
	

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */