<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_transaksi_beli extends CI_Model {

	function simpan_barang()
	{
		$nama_barang    =  $this->input->post('nama');
		$qty			=  $this->input->post('qty');
		$barang         = $this->db->get_where('barang', array('nama_barang'=>$nama_barang))->row();
           
		$data          = array(
			              'barang_id'   => $barang->barang_id,
			              'qty'         => $qty,
			              'harga'       => $barang->harga,
			              'status'      => '0'
			           );
	   $this->db->insert('transaksi_beli_detail', $data);
	}
	function tampil_detail()
	{
		$data  = "SELECT b.nama_barang,td.*
				  FROM transaksi_beli_detail AS td, barang AS b
				  WHERE td.barang_id=b.barang_id AND td.status='0'";
		$query = $this->db->query($data);
		return $query;
	}
	function selesai($data)
	{
		$this->db->insert('transaksi_beli', $data);
		$id = $this->db->insert_id();
		$this->db->update('transaksi_beli_detail', array('transaksi_id'=>$id, 'status'=>'1'), array('status'=>'0'));
	}
	function hapusitem($id)
	{
		$this->db->delete('transaksi_jual_detail', array('t_detail_id'=>$id));
	}
	function laporan()
	{
		$query   = "SELECT t.tanggal_transaksi, o.nama_lengkap, SUM(td.harga* td.qty) AS total
					FROM transaksi_jual_detail AS td, transaksi_jual AS t, operator AS o
					WHERE td.transaksi_id=t.transaksi_id AND t.operator_id=o.operator_id
					GROUP BY td.transaksi_id";
		return $this->db->query($query);
	}
	function laporan_periode($tgl1, $tgl2)
	{
		$query   = "SELECT t.tanggal_transaksi, o.nama_lengkap, SUM(td.harga* td.qty) AS total
					FROM transaksi_jual_detail AS td, transaksi_jual AS t, operator AS o
					WHERE td.transaksi_id=t.transaksi_id AND t.operator_id=o.operator_id AND t.tanggal_transaksi BETWEEN '$tgl1' AND '$tgl2'
					GROUP BY td.transaksi_id";
		$hasil = $this->db->query($query);
		if ($hasil->num_rows()>0) {
			return $hasil;
		}else{
			return false;
		}
	}

}

/* End of file Model_transaksi_jual.php */
/* Location: ./application/models/Model_transaksi_jual.php */