<?php

class Model_kategori extends CI_Model{

	function tampil_data()
	{
		return $this->db->query("select * from kategori_barang");
	}
	function get_by_id()
	{
       $id = $this->uri->segment(3);

       return $this->db->get_where('kategori_barang', array('kategori_id'=>$id));
	}
	function post(){
		$nama_kategori =  $this->input->post('nama_kategori');
		$this->db->insert('kategori_barang', array('nama_kategori'=>$nama_kategori));
	}
	function edit(){
		$id = $this->uri->segment(3);
        $nama_kategori = $this->input->post('nama_kategori');
		$this->db->where('kategori_id',$id)
		         ->update('kategori_barang', array('nama_kategori'=> $nama_kategori));
	}
	function delete(){
		$id = $this->uri->segment(3);
		$this->db->where('kategori_id', $id)
		         ->delete('kategori_barang');
	}
}