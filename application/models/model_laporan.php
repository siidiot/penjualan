<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_laporan extends CI_Model {

	function get_date(){
		$date = date('Y-m-d');
		return $this->db->query("SELECT b.nama_barang,b.prod_unit,td.*,c.nama_customer,tj.tgl_transaksi
						FROM transaksi_jual_detail AS td, barang AS b, transaksi_jual AS tj , customer AS c
						WHERE td.barang_id=b.barang_id AND tj.transaksi_id=td.transaksi_id AND tj.cust_id=c.cust_id AND tj.tgl_transaksi='$date'
						");
	}
	function get_all(){
		return $this->db->query("SELECT b.nama_barang,b.prod_unit,td.*,c.nama_customer,tj.tgl_transaksi
						FROM transaksi_jual_detail AS td, barang AS b, transaksi_jual AS tj , customer AS c
						WHERE td.barang_id=b.barang_id AND tj.transaksi_id=td.transaksi_id AND tj.cust_id=c.cust_id ORDER BY tj.tgl_transaksi DESC
						");
	}
	function get_periode($tgl1, $tgl2){
		return $this->db->query("SELECT b.nama_barang,b.prod_unit,td.*,c.nama_customer,tj.tgl_transaksi
						FROM transaksi_jual_detail AS td, barang AS b, transaksi_jual AS tj , customer AS c
						WHERE td.barang_id=b.barang_id AND tj.transaksi_id=td.transaksi_id AND tj.cust_id=c.cust_id AND tj.tgl_transaksi BETWEEN '$tgl1' AND '$tgl2' ORDER BY tj.tgl_transaksi DESC
						");
	}

}

/* End of file model_laporan.php */
/* Location: ./application/models/model_laporan.php */