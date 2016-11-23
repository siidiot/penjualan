<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_customer extends CI_Model {

	public function get_all()
	{
		return $this->db->get('customer');
	}
	public function order_by()
	{
		return $this->db->query("SELECT * FROM customer ORDER BY cust_id DESC");
	}
	public function get_by($id)
	{
		return $this->db->get_where('customer', array('cust_id'=>$id));
	}
	public function insert()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$kota = $this->input->post('kota');
		$phone = $this->input->post('phone');
		$hp = $this->input->post('hp');
		$ket = $this->input->post('ket');

		$data = array(
			      'cust_id'			 => $id,
			      'nama_customer'    => $nama,
			      'alamat'			 => $alamat,
			      'kota'             => $kota,
			      'phone'			 => $phone,
			      'no_hp'			     => $hp,
			      'ket'				 => $ket
			    );
		$this->db->insert('customer', $data);
	}
	public function update()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$kota = $this->input->post('kota');
		$phone = $this->input->post('phone');
		$hp = $this->input->post('hp');
		$ket = $this->input->post('ket');

		$data = array(
			      'cust_id'			 => $id,
			      'nama_customer'    => $nama,
			      'alamat'			 => $alamat,
			      'kota'             => $kota,
			      'phone'			 => $phone,
			      'no_hp'			     => $hp,
			      'ket'				 => $ket
			    );
		$this->db->update('customer',$data, array('cust_id'=>$id));
	}
	public function delete($id)
	{
		$this->db->delete('customer', array('cust_id'=>$id));
	}

}

/* End of file Model_customer.php */
/* Location: ./application/models/Model_customer.php */