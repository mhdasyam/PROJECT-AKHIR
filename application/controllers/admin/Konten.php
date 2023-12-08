<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konten extends CI_Controller{
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

        $this->db->from('konten a');
		$this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
		$this->db->join('user c','a.username=c.username','left');
		$this->db->order_by('tanggal', 'DESC');
		if($this->session->userdata('level')=='User'){
			$this->db->where('a.username',$this->session->userdata('username'));
		}
		$konten = $this->db->get()->result_array();
		$data = array(
			'halaman' => 'Halaman Konten',
			'kategori' => $kategori,
            'konten' => $konten
		);
		$this->template->load('admin/template_admin', 'admin/form_konten', array_merge($data));
	}
	public function tambah()
	{
        $this->db->select('*')->from('kategori');
		$this->db->order_by('nama_kategori', 'ASC');
		$kategori = $this->db->get()->result_array();
        $data = array(
			'halaman' => 'Tambah Konten',
			'kategori' => $kategori,
		);
		$this->template->load('admin/template_admin', 'admin/tambah_konten', array_merge($data));
	}
	public function simpan()
	{
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path'] = 'assets/upload/konten/';
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
            redirect('admin/konten');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data()); 
        } 
		$this->db->from('konten');
		$this->db->where('judul', $this->input->post('judul'));
		$cek = $this->db->get()->result_array();
		if($cek<>NULL){
			$this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body">
			<button class="close" data-dismiss="alert"><span>×</span></button>
			Judul konten sudah digunakan.
			</div></div>');
		
		redirect('admin/konten/');
		}
		$data = array(
			'judul' => $this->input->post('judul'),
			'harga' => $this->input->post('harga'),
			'id_kategori' => $this->input->post('id_kategori'),
			'keterangan' => $this->input->post('keterangan'),
			'tanggal' => date('Y-m-d'),
			'foto' => $namafoto,
			'username'	=> $this->session->userdata('username'),
			'slug' => str_replace(' ','-',$this->input->post('judul'))
		);
		$this->db->insert('konten',$data);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible show fade"><div class="alert-body">
		<button class="close" data-dismiss="alert"><span>×</span></button>
		Berhasil menambahkan konten
		</div></div>');
		redirect('admin/konten/');
	}

	public function hapus($id)
	{
		$filename = FCPATH.'/assets/upload/konten/'.$id;
			if (file_exists($filename)) {
				unlink("./assets/upload/konten/".$id);
			}			
		$where = array('foto' => $id);
		$this->db->Delete('konten', $where);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible show fade"><div class="alert-body">
		<button class="close" data-dismiss="alert"><span>×</span></button>
		Berhasil menghapus konten
		</div>
	  </div>
        ');
		redirect('admin/konten/');
	}

    public function edit($konten){
        $this->db->select('*')->from('konten');
        $this->db->where('foto', $konten);
        $konten = $this->db->get()->result_array();
		
		$this->db->select('*')->from('kategori');
		$this->db->order_by('nama_kategori', 'ASC');
		$kategori = $this->db->get()->result_array();

        $data = array(
			'konten' => $konten, 
			'kategori' => $kategori);
        $this->template->load('admin/template_admin','admin/edit_konten', array_merge($data));
    }
	public function update()
	{
        $namafoto = $this->input->post('nama_foto');
        $config['upload_path'] = 'assets/upload/konten/';
        $config['max_size'] = 500 * 1024 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
		$config['file_name'] = $namafoto;
		$config['overwrite'] = true;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 500 * 1024 * 1024 ){
            $this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body">
			<button class="close" data-dismiss="alert"><span>×</span></button>
			Ukuran foto terlalu besar.
			</div></div>'); 
            redirect('admin/konten');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data()); 
        } 
		$data = array(
			'judul' => $this->input->post('judul'),
			'harga' => $this->input->post('harga'),
			'id_kategori' => $this->input->post('id_kategori'),
			'keterangan' => $this->input->post('keterangan'),
			'slug' => str_replace(' ','-',$this->input->post('judul'))
		);
		$where = array(
			'foto' => $this->input->post('nama_foto')
		);
		$this->db->update('konten',$data,$where);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible show fade"><div class="alert-body">
		<button class="close" data-dismiss="alert"><span>×</span></button>
		Berhasil perbarui konten
		</div></div>');
		redirect('admin/konten/');
	}

}