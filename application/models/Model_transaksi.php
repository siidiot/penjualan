<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_transaksi extends CI_Model {

	function simpan_barang()
	{
		$nama_barang    =  $this->input->post('nama');
		$qty			=  $this->input->post('qty');
		$barang         = $this->db->get_where('barang', array('nama_barang'=>$nama_barang))->row();
		$data          = array(
			              'barang_id'   => $barang->barang_id,
			              'qty'         => $qty,
			              'harga'       => $barang->harga,
			              'status'      => '0',
			              'prod_unit'   => $barang->prod_unit
			           );
	   $this->db->insert('transaksi_jual_detail', $data);
	}
	function tampil_detail()
	{
		$data  = "SELECT b.nama_barang,td.*
				  FROM transaksi_jual_detail AS td, barang AS b
				  WHERE td.barang_id=b.barang_id AND td.status='0'";
		$query = $this->db->query($data);
		return $query;
	}
	function tampil_detail2($id)
	{
		$data  = "SELECT b.nama_barang,td.*
				  FROM transaksi_jual_detail AS td, barang AS b
				  WHERE td.barang_id=b.barang_id AND td.transaksi_id='$id'";
		$query = $this->db->query($data);
		return $query;
	}
	function selesai($data)
	{
		$tgl_trans    = $this->input->post('tgl_trans');
		$durasi = $this->input->post('durasi');
		$totalalt = $this->input->post('total');
		$jatuh_tempo  = date("Y-m-d",strtotime($tgl_trans."+{$durasi} day"));
		$this->db->insert('transaksi_jual', $data);
		$id = $this->db->insert_id();
		$this->db->update('transaksi_jual_detail', array('transaksi_id'=>$id, 'status'=>'1'), array('status'=>'0'));
		$jumlah = $this->input->post('jumlah');
		$pituangalt = $totalalt - $jumlah;
		if ($pituangalt < 0) {
			$pituangalt = 0;
		}
		$this->db->update('transaksi_jual',array('total'=>$totalalt,'jumlah_bayar'=>$jumlah,'piutang'=>$pituangalt,'tgl_jatuh_tempo'=>$jatuh_tempo),array('transaksi_id'=>$id));
		$this->db->insert('history_bayar',array('transaksi_id'=>$id,'tgl_bayar'=>$tgl_trans,'jumlah_bayar'=>$jumlah,'sisa_bayar'=>$pituangalt));
	}
	function hapusitem($id)
	{
		$this->db->delete('transaksi_jual_detail', array('t_detail_id'=>$id));
	}
	function view_transaksi()
	{
		$query   = "SELECT t.*, o.nama_lengkap,c.nama_customer
					FROM  transaksi_jual AS t, operator AS o, customer AS c
					WHERE t.operator_id=o.operator_id AND t.cust_id=c.cust_id"; 
		return $this->db->query($query);
	}
	function view_transaksi_detail($id)
	{
		$query   = "SELECT t.*,c.nama_customer
					FROM  transaksi_jual AS t, customer AS c
					WHERE  t.cust_id=c.cust_id AND t.transaksi_id='$id'"; 
		return $this->db->query($query);
	}
	function bayar($id)
	{
        $tgl_bayar = $this->input->post('tgl_bayar');
        $jml_bayar = $this->input->post('jml_bayar');
        
        $data   = $this->db->get_where('transaksi_jual',array('transaksi_id'=>$id))->row();

        $jml_bayar_br =  $data->jumlah_bayar + $jml_bayar;
        $piutang = $data->total - $jml_bayar_br;
        if ($piutang<0) {
        	$piutang = 0;
        }
        $this->db->insert('history_bayar', array('transaksi_id'=>$id, 'tgl_bayar'=>$tgl_bayar,'jumlah_bayar'=>$jml_bayar,'sisa_bayar'=>$piutang));

        $this->db->update('transaksi_jual', array('jumlah_bayar'=>$jml_bayar_br, 'piutang'=>$piutang),array('transaksi_id'=>$id));

	}
	function view_history($id)
	{
       return $this->db->query("SELECT h.*,c.nama_customer FROM transaksi_jual AS t, customer AS c, history_bayar AS h WHERE t.transaksi_id=h.transaksi_id AND t.cust_id=c.cust_id AND t.transaksi_id='$id'");
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

/* End of file Model_transaksi.php */
/* Location: ./application/models/Model_transaksi.php */