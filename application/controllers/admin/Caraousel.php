<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Caraousel extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('level')==NULL){
			redirect('auth');
		}
	}	
	public function index()
	{
		$this->db->select('*')->from('caraousel');
		$caraousel = $this->db->get()->result_array();
		$data = array(
			'halaman' => 'Halaman Caraousel',
			'caraousel' => $caraousel,
		);
		$this->template->load('admin/template_admin', 'admin/form_caraousel', array_merge($data));
	}
	public function simpan()
	{
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path'] = 'assets/upload/caraousel/';
        $config['max_size'] = 500 * 1024 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types'] = '*';
		$config['file_name'] = $namafoto;
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 500 * 1024 * 1024 ){
            $this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body">
			<button class="close" data-dismiss="alert"><span>×</span></button>
			Ukuran foto terlalu besar.
			</div></div>'); 
            redirect('admin/caraousel');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data()); 
        } 
		$this->db->from('caraousel');
		$this->db->where('judul', $this->input->post('judul'));
		$cek = $this->db->get()->result_array();
		if($cek<>NULL){
			$this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body">
			<button class="close" data-dismiss="alert"><span>×</span></button>
			Judul caraousel sudah digunakan.
			</div></div>');
		
		redirect('admin/caraousel/');
		}
		$data = array(
			'judul' => $this->input->post('judul'),
			'foto' => $namafoto,
		);
		$this->db->insert('caraousel',$data);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible show fade"><div class="alert-body">
		<button class="close" data-dismiss="alert"><span>×</span></button>
		Berhasil menambahkan caraousel
		</div></div>');
		redirect('admin/caraousel/');
	}

	public function hapus($id)
	{
		$filename = FCPATH.'/assets/upload/caraousel/'.$id;
			if (file_exists($filename)) {
				unlink("./assets/upload/caraousel/".$id);
			}			
		$where = array('foto' => $id);
		$this->db->Delete('caraousel', $where);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible show fade"><div class="alert-body">
		<button class="close" data-dismiss="alert"><span>×</span></button>
		Berhasil menghapus caraousel
		</div>
	  </div>
        ');
		redirect('admin/caraousel/');
	}

    public function edit($caraousel){
        $this->db->select('*')->from('caraousel');
        $this->db->where('foto', $caraousel);
        $caraousel = $this->db->get()->result_array();

        $data = array('caraousel' => $caraousel,);
        $this->template->load('admin/template_admin','admin/edit_caraousel', array_merge($data));
    }
	public function update()
	{
        $namafoto = $this->input->post('nama_foto');
        $config['upload_path'] = 'assets/upload/caraousel/';
        $config['max_size'] = 500 * 1024 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
		$config['file_name'] = $namafoto;
		$config['overwrite'] = true;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 500 * 1024 * 1024){
            $this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body">
			<button class="close" data-dismiss="alert"><span>×</span></button>
			Ukuran foto terlalu besar.
			</div></div>'); 
            redirect('admin/caraousel');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data()); 
        } 
		$data = array(
			'judul' => $this->input->post('judul'),
			'foto' => $namafoto,
		);
		$where = array(
			'foto' => $this->input->post('nama_foto')
		);
		$this->db->update('caraousel',$data,$where);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible show fade"><div class="alert-body">
		<button class="close" data-dismiss="alert"><span>×</span></button>
		Berhasil perbarui caraousel
		</div></div>');
		redirect('admin/caraousel/');
	}

}