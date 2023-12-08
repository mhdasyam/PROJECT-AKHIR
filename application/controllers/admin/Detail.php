<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('level')==NULL){
			redirect('auth');
		}
	}	
	public function detail_konten($id)
	{
		$this->db->select('*')->from('caraousel');
		$caraousel = $this->db->get()->result_array();

        $this->db->from('konten');
        $this->db->where('id_konten',$id);
        $konten = $this->db->get()->row();

        $this->db->from('detail a');
        $this->db->join('konten b','a.id_konten=b.id_konten','left');
        $this->db->where('a.id_konten',$id);
        $detail = $this->db->get()->result_array();

		$data = array(
			'halaman' => 'Halaman Caraousel',
			'caraousel' => $caraousel,
			'konten' => $konten,
			'detail' => $detail,
			'judul' => $id,
		);
		$this->template->load('admin/template_admin', 'admin/form_detail', array_merge($data));
	}
	public function simpan()
	{
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path'] = 'assets/upload/detail/';
        $config['max_size'] = 500 * 1024 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types'] = '*';
		$config['file_name'] = $namafoto;
        $this->load->library('upload', $config);
        if($_FILES['foto_detail']['size'] >= 500 * 1024 * 1024 ){
            $this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body">
			<button class="close" data-dismiss="alert"><span>×</span></button>
			Ukuran foto terlalu besar.
			</div></div>'); 
            redirect('admin/detail/detail_konten/'.$this->input->post('id_konten'));
        } elseif (!$this->upload->do_upload('foto_detail')) {
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data()); 
        }
		$data = array(
			'judul_detail' => $this->input->post('judul_detail'),
			'id_konten' => $this->input->post('id_konten'),
			'foto_detail' => $namafoto,
		);
		$this->db->insert('detail',$data);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible show fade"><div class="alert-body">
		<button class="close" data-dismiss="alert"><span>×</span></button>
		Berhasil menambahkan detail
		</div></div>');
		redirect('admin/detail/detail_konten/'.$this->input->post('id_konten'));
	}

	public function hapus($id,$id_konten)
	{
		$filename = FCPATH.'/assets/upload/detail/'.$id;
			if (file_exists($filename)) {
				unlink("./assets/upload/detail/".$id);
			}			
		$where = array('foto_detail' => $id);
		$this->db->delete('detail', $where);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible show fade"><div class="alert-body">
		<button class="close" data-dismiss="alert"><span>×</span></button>
		Berhasil menghapus foto detail
		</div>
	  </div>
        ');
		redirect('admin/detail/detail_konten/'.$id_konten);
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