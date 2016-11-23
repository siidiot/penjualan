<?php

class Model_operator extends CI_Model{
   
   function tampil_data()
   {
   	 return $this->db->get('operator');
   }
   function get_by_id()
   {
   	  return $this->db->get_where('operator', array('operator_id'=>$this->uri->segment(3)));
   }
   function post($hasil)
   {
   	  $data =  array(
                 'nama_lengkap' => $this->input->post('nama'),
                 'foto'       => $hasil['file_name'],
                 'username'     => $this->input->post('username'),
                 'password' 	=> md5($this->input->post('password')),
                 'level'      => $this->input->post('level')
   	  	        );
   	  $this->db->insert('operator', $data);
   }
   function edit($hasil)
   {
    if($hasil['file_name']==null){
   	  if ($this->input->post('password')=='') {
   	  	$data  = array(
   	  	        'nama_lengkap' => $this->input->post('nama'),
   	  	        'username'	   => $this->input->post('username'),
                'level'      => $this->input->post('level')
   	  	       );
   	  $this->db->update('operator', $data, array('operator_id'=>$this->uri->segment(3)));
   	  }else{
   	  	$data  = array(
   	  	        'nama_lengkap' => $this->input->post('nama'),
   	  	        'username'	   => $this->input->post('username'),
   	  	        'password'	   => md5($this->input->post('password')),
                'level'      => $this->input->post('level')
   	  	       );
   	  $this->db->update('operator', $data, array('operator_id'=>$this->uri->segment(3)));
   	  }
    }else{
      if ($this->input->post('password')=='') {
        $data  = array(
                'nama_lengkap' => $this->input->post('nama'),
                 'foto'       => $hasil['file_name'],
                'username'     => $this->input->post('username'),
                'level'      => $this->input->post('level')
               );
      $this->db->update('operator', $data, array('operator_id'=>$this->uri->segment(3)));
      }else{
        $data  = array(
                'nama_lengkap' => $this->input->post('nama'),
                 'foto'       => $hasil['file_name'],
                'username'     => $this->input->post('username'),
                'password'     => md5($this->input->post('password')),
                'level'      => $this->input->post('level')
               );
      $this->db->update('operator', $data, array('operator_id'=>$this->uri->segment(3)));
      }
    }
   }
   function delete()
   {
   	 $this->db->delete('operator', array('operator_id'=>$this->uri->segment(3)));
   }

}