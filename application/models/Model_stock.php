<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_stock extends CI_Model {

	public function getKurangStok($kd_barang,$kurangi)
    {
        $q = $this->db->query("select stok from barang where barang_id='".$kd_barang."'");
        //$stok = "";
        foreach($q->result() as $d)
        {
            return $d->stok - $kurangi;
        }
       // return $stok;
    }
    public function getTambahStok($kd_barang,$kurangi)
    {
        $q = $this->db->query("select stok from barang where barang_id='".$kd_barang."'");
        //$stok = "";
        foreach($q->result() as $d)
        {
            return $d->stok + $kurangi;
        }
       // return $stok;
    }
	function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }

	
}
