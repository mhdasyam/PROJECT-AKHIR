<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->model('User_model');
		if($this->session->userdata('level')<>'Admin'){
			redirect('auth');
		}
	}
	
	public function index()
	{
		$this->db->select('*')->from('user');
		$this->db->order_by('username', 'ASC');
		$user = $this->db->get()->result_array();
		$data = array(
			'halaman' => 'Halaman APP Samzs',
			'user' => $user
		);
		$this->template->load('admin/template_admin', 'admin/form_pengguna', array_merge($data));
	}
	public function tambah()
	{
		$this->template->load('admin/template_admin', 'admin/tambah_pengguna');
	}
	public function simpan()
	{
		$this->db->from('user');
		$this->db->where('username', $this->input->post('username'));
		$cek = $this->db->get()->result_array();
		if($cek<>NULL){
			$this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body">
			<button class="close" data-dismiss="alert"><span>×</span></button>
			Username sudah ada !
			</div></div>');
		
		redirect('admin/pengguna/');
		}
		$this->User_model->simpan();
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible show fade"><div class="alert-body">
		<button class="close" data-dismiss="alert"><span>×</span></button>
		Data berhasil disimpan :)
		</div></div>');
		redirect('admin/pengguna/');
	}
	public function hapus($user)
	{
		$where = array('id_user' => $user);
		$this->db->Delete('user', $where);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible show fade">
		<div class="alert-body">
		  <button class="close" data-dismiss="alert">
			<span>×</span>
		  </button>
		  Data sudah berhasil dihapus
		</div>
	  </div>
        ');
		redirect('admin/pengguna/');
	}
	public function edit($user){
        $this->db->select('*')->from('user');
        $this->db->where('id_user', $user);
        $user = $this->db->get()->result_array();
        $data = array('user' => $user);
        $this->template->load('admin/template_admin','admin/edit_pengguna', array_merge($data));
    }
	public function update(){
        $data = array(
            'nama'  => $this->input->post('nama'),
			'no_hp' => $this->input->post('no_hp'),
            'level'  => $this->input->post('level'),
        );
        $where = array('id_user' => $this->input->post('id_user'));
        $this->db->update('user', $data, $where);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible show fade">
		<div class="alert-body">
		  <button class="close" data-dismiss="alert">
			<span>×</span>
		  </button>
		  Data sudah berhasil diupdate
		</div>
	  </div>
        ');
        redirect('admin/pengguna/');
    }
}