<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('level')==NULL){
			redirect('auth');
		}
	}	
	public function index()
	{
		$this->db->select('*')->from('kategori');
		$this->db->order_by('nama_kategori', 'ASC');
		$kategori = $this->db->get()->result_array();
		$data = array(
			'halaman' => 'Kategori Konten',
			'kategori' => $kategori
		);
		$this->template->load('admin/template_admin', 'admin/form_kategori', array_merge($data));
	}
	public function tambah()
	{
		$this->template->load('admin/template_admin', 'admin/tambah_kategori');
	}
	public function simpan()
	{
		$namafoto = date('YmdHis').'.jpg';
        $config['upload_path'] = 'assets/upload/kategori/';
        $config['max_size'] = 500 * 1024 * 1024 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types'] = '*';
		$config['file_name'] = $namafoto;
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 500 * 1024 * 1024 ){
            $this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body">
			<button class="close" data-dismiss="alert"><span>×</span></button>
			Ukuran foto terlalu besar.
			</div></div>'); 
            redirect('admin/kategori');
        } elseif (!$this->upload->do_upload('foto_kategori')) {
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data()); 
        } 

		$this->db->from('kategori');
		$this->db->where('nama_kategori', $this->input->post('nama_kategori'));
		$cek = $this->db->get()->result_array();
		if($cek<>NULL){
			$this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body">
			<button class="close" data-dismiss="alert"><span>×</span></button>
			Kategori sudah digunakan.
			</div></div>');
		
		redirect('admin/kategori/');
		}
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori'),
			'foto_kategori' => $namafoto,
		);
		$this->db->insert('kategori',$data);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible show fade"><div class="alert-body">
		<button class="close" data-dismiss="alert"><span>×</span></button>
		Berhasil menambahkan kategori
		</div></div>');
		redirect('admin/kategori/');
	}
	public function hapus($id)
	{
		$filename = FCPATH.'/assets/upload/kategori/'.$id;
			if (file_exists($filename)) {
				unlink("./assets/upload/kategori/".$id);
			}			
		$where = array('foto_kategori' => $id);
		$this->db->Delete('kategori', $where);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible show fade"><div class="alert-body">
		<button class="close" data-dismiss="alert"><span>×</span></button>
		Berhasil menghapus kategori
		</div></div>
        ');
		redirect('admin/kategori/');
	}
	public function edit($kategori){
        $this->db->select('*')->from('kategori');
        $this->db->where('foto_kategori', $kategori);
        $kategori = $this->db->get()->result_array();

        $data = array('kategori' => $kategori);
        $this->template->load('admin/template_admin','admin/edit_kategori', array_merge($data));
    }
	public function update()
	{
		$namafoto = $this->input->post('nama_foto');
        $config['upload_path'] = 'assets/upload/kategori/';
        $config['max_size'] = 500 * 1024 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
		$config['file_name'] = $namafoto;
		$config['overwrite'] = true;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        if($_FILES['foto_kategori']['size'] >= 500 * 1024 * 1024 ){
            $this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body">
			<button class="close" data-dismiss="alert"><span>×</span></button>
			Ukuran foto terlalu besar.
			</div></div>'); 
            redirect('admin/kategori');
        } elseif (!$this->upload->do_upload('foto_kategori')) {
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data()); 
        } 
		$data = array(
			'nama_kategori'  => $this->input->post('nama_kategori'),
			'foto_kategori' => $namafoto
		);
		$where = array(
			'foto_kategori' => $this->input->post('nama_foto')
		);
        $this->db->update('kategori', $data, $where);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible show fade"><div class="alert-body">
		<button class="close" data-dismiss="alert"><span>×</span></button>
		Kategori sudah berhasil diupdate</div></div>
        ');
        redirect('admin/kategori');
    }
}