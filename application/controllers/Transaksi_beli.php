<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_beli extends CI_Controller {

   public function __construct()
	{
		parent::__construct();
	    $this->load->model('model_transaksi_beli');
	   // check_login();
	}


	public function index()
	{
		if (isset($_POST['submit'])) {
			$this->model_transaksi_beli->simpan_barang();
			redirect('transaksi_beli');
		}else{
			$data['detail']    = $this->model_transaksi_beli->tampil_detail();
			$data['record']    =  $this->db->get('barang');
			$this->template->load('template','transaksi_beli/form_transaksi',$data);
		}
	}
	public function selesai()
	{
		$data  = "SELECT *  FROM transaksi_beli_detail WHERE status='0'";
		$query = $this->db->query($data);
		  foreach ($query->result() as $r) {
		  	   $kd_barang = $r->barang_id;
               $qty = $r->qty;
           $this->load->model("model_stock");
           $update['stok'] = $this->model_stock->getTambahStok($kd_barang,$qty);
            $key['barang_id'] = $kd_barang;
            $this->model_stock->updateData("barang",$update,$key);
		  }

		$date = date('Y-m-d');
		$user = $this->session->userdata('username');
		$op_id = $this->db->get_where('operator', array('username'=>$user))->row();
		$data = array(
                 'tanggal_transaksi'   => $date,
                 'operator_id'		   => $op_id->operator_id
			   );
		$this->model_transaksi_beli->selesai($data);
		redirect('transaksi_beli');
	}

}

/* End of file Transaksi_beli.php */
/* Location: ./application/controllers/Transaksi_beli.php */