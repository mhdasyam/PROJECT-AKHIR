<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
	public function index()
	{
		$this->load->view('login');
	}
    public function login()
	{
        $username =$this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->from('user');
        $this->db->where('username', $username)->where('password',$password);
        $data = $this->db->get()->row();
        if($data==NULL){
            $this->session->set_flashdata('alert','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i> Mohon perhatikan username dan password 
            </div>
            ');
            redirect('auth');
        } else{
            $userdata = array(
                'id_user' => $data->id_user,
                'username' => $data->username,
                'level' => $data->level,
                'nama' => $data->nama,  
            );
            $this->session->set_userdata($userdata);
            redirect('admin/home');
        
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('');
    }
}