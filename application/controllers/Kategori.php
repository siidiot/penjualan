<?php

class Kategori extends CI_COntroller{
      
      function __construct(){
      	parent::__construct();
      	$this->load->model('model_kategori');
            check_login();
      }

      function index(){
            $data['title']  = "Tampil";
            $data['subtitle'] = "Kategori Barang";
            $data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
      	$data['record']  = $this->model_kategori->tampil_data();
            $this->template->load('template', 'kategori/lihat_data', $data);
      }

      function post(){
      	if (isset($_POST['submit'])) {
      		$this->model_kategori->post();
      		redirect('kategori');
      	}else{
                  $data['title']  = "Form";
                  $data['subtitle'] = "Tambah Kategori";
                  $data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
                  $this->template->load('template', 'kategori/form_input', $data);
      	}
      }

      function edit()
      {
      	if (isset($_POST['submit'])) {
      		$this->model_kategori->edit();
      		redirect('kategori');
      	}else{
                  $data['title']  = "Form";
                  $data['subtitle'] = "Edit Kategori";
                  $data['operator'] = $this->db->get_where('operator', array('username'=>$this->session->userdata('username')))->row();
            	$data['record']  = $this->model_kategori->get_by_id()->row();
                  $this->template->load('template', 'kategori/form_edit', $data);
            }
      }

      function delete()
      {
      	$this->model_kategori->delete();
      	redirect('kategori');
      }

}