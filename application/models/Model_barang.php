<?php
 
 class Model_barang extends CI_Model{

 	function tampil_data()
 	{
 		return $this->db->query("SELECT b.*, kb.nama_kategori
								FROM barang as b, kategori_barang as kb
								WHERE b.kategori_id=kb.kategori_id");
 	}
 	function get_by_id()
 	{
 		$id   = $this->uri->segment(3);
 		return $this->db->get_where('barang', array('barang_id'=>$id));
 	}
  function get_all_by($id)
  {
  
    return $this->db->get_where('barang', array('barang_id'=>$id));
  }
 	function post(){
 		$data = array(
              'nama_barang' => $this->input->post('nama_barang'),
              'kategori_id' => $this->input->post('kategori'),
              'prod_unit' => $this->input->post('prod_unit'),
              'harga'		=> $this->input->post('harga')
 			);
 		$this->db->insert('barang', $data);
 	}
 	function edit(){
       $id =  $this->uri->segment(3);
       $data = array(
                'nama_barang'   => $this->input->post('nama_barang'),
                'kategori_id'   => $this->input->post('kategori'),
                'prod_unit'   => $this->input->post('prod_unit'),
                'harga'			=> $this->input->post('harga')
       	     );
       $this->db->update('barang', $data, array('barang_id'=> $id));
 	}
 	function delete(){
 		$this->db->delete('barang', array('barang_id'=>$this->uri->segment(3)));
 	}
 }
