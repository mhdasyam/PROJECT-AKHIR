<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
		$this->load->model('user_model');
    }
	public function index()
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('user');
		$user = $this->db->get()->row();

		$this->db->from('caraousel');
		$caraousel = $this->db->get()->result_array();
		
		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('konten a');
		$this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
		$this->db->join('user c','a.username=c.username','left');
		$this->db->order_by('tanggal', 'DESC');
		$konten = $this->db->get()->result_array();
		$data = array(
			'judul' => "Beranda | Asampedia",
			'konfig'  => $konfig,
			'kategori'  => $kategori,
			'caraousel'  => $caraousel,
			'user'  => $user,		
			'konten'  => $konten
		);
		$this->load->view('beranda', $data);
	}
	public function kategori($id)
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();
		
		$this->db->from('user');
		$user = $this->db->get()->row();
		
		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();
		
		$this->db->from('caraousel');
		$caraousel = $this->db->get()->result_array();

		$this->db->from('konten a');
		$this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
		$this->db->join('user c','a.username=c.username','left');
		$this->db->where('a.id_kategori',$id);
		$konten = $this->db->get()->result_array();

		$this->db->from('kategori');
		$this->db->where('id_kategori',$id);
		$nama_kategori = $this->db->get()->row()->nama_kategori;
		$data = array(
			'judul' => $nama_kategori." | Asampedia",
			'nama_kategori' => $nama_kategori,
			'konfig'  => $konfig,
			'user' => $user,
			'kategori'  => $kategori,
			'caraousel' => $caraousel,
			'konten'  => $konten
		);
		$this->load->view('kategori', $data);
	}
	
	public function artikel($id)
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('user');
		$user = $this->db->get()->row();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();
		
		$this->db->from('konten a');
		$this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
		$this->db->join('user c','a.username=c.username','left');
		$this->db->where('slug', $id);
		$konten = $this->db->get()->row();

		$this->db->from('detail a');
		$this->db->join('konten b','a.id_konten=b.id_konten','left');
		$this->db->where('a.id_konten',$id);
		$detail = $this->db->get()->result_array();

		$this->db->from('konten a');
		$this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
		$this->db->join('user c','a.username=c.username','left');
		$related = $this->db->get()->result_array();

		$data = array(
			'judul' =>  $konten->judul." | Asampedia",
			'konfig'  => $konfig,
			'user' => $user,
			'kategori'  => $kategori,
			'related'  => $related,
			'konten'  => $konten,
			'detail'  => $detail,
			
		);
		$this->load->view('detail', $data);	
	}
	public function produk()
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('user');
		$user = $this->db->get()->row();

		$this->db->from('caraousel');
		$caraousel = $this->db->get()->result_array();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
        $this->db->order_by('tanggal', 'DESC');
        $konten = $this->db->get()->result_array();

		$data = array(
			'judul'	=> "Jual Beli Akun Game | Asampedia",
			'konfig' => $konfig,
			'user' => $user,
			'kategori' => $kategori,
			'caraousel' => $caraousel,
			'konten' => $konten,
		);
		$this->load->view('kategori', $data);
	}
	public function cari()
	{
		$paramater=$this->input->post('ketik');

		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();
		
		$this->db->from('user');
		$user = $this->db->get()->row();

		$this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

		$this->db->from('kategori');
		$nama_kategori = $this->db->get()->row()->nama_kategori;
        if(isset($paramater)){
			$this->db->from('konten');
			$this->db->join('kategori', 'konten.id_kategori=kategori.id_kategori', 'left');
			$this->db->like('judul',$paramater);
			$this->db->or_like('nama_kategori',$paramater);
			$this->db->order_by('tanggal','DESC');
			$konten = $this->db->get()->result_array();
		} else{
			$this->db->from('konten');
			$this->db->join('kategori', 'konten.id_kategori=kategori.id_kategori', 'left');
			$this->db->order_by('tanggal','DESC');
			$konten = $this->db->get()->result_array();
		}
		$data = array(
            'judul'	=> "Cari Akun Game | Asampedia",
            'konfig'        => $konfig,
			'user'		=> $user,
			'nama_kategori'=> $nama_kategori,
            'kategori'      => $kategori,
            'konten'        => $konten
        );
		$this->load->view('kategori', $data);
	}
}
