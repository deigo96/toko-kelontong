<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->model("m_login");
    }


	public function index()
	{
		$this->load->view('auth/login');
	}

	public function auth()
	{
		$data['nama']		= $this->input->post('username');
		$data['password']	= $this->input->post('password');
		$data['password'] 	= hash('md5', $data['password']);

		$dataLogin	= $this->m_login->dataLogin($data);
		if(count($dataLogin) == 1){
			if($dataLogin[0]->password == $data['password']){
				if($dataLogin[0]->type_id == 1){
					$data = array(
						'idLogin' =>$dataLogin[0]->id_login,
						'nama' =>$dataLogin[0]->nama,
						'email' =>$dataLogin[0]->email,
						'status' =>$dataLogin[0]->status,
						'type_id' =>$dataLogin[0]->type_id
					);
					$this->session->set_userdata($data);
					if($this->session->userdata('idLogin')){
						redirect('home');
					}
				}else{
					$data = array(
						'adminLog' =>$dataLogin[0]->id_login,
						'nama' =>$dataLogin[0]->nama,
						'email' =>$dataLogin[0]->email,
						'status' =>$dataLogin[0]->status,
						'type_id' =>$dataLogin[0]->type_id
					);
					$this->session->set_userdata($data);
					if($this->session->userdata('adminLog')){
						redirect('admin', $data);
					}
				}
			}else{
				$this->session->set_flashdata('error', 'Password salah!');
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('error', 'Username atau Password salah!');
			redirect('login');
		}
	}

	public function logOut(){
		if($this->session->userdata('idLogin')){
			$this->session->set_userdata('idLogin');
			$this->session->set_flashdata('error', 'Anda berhasil log out');
			redirect('login');
		}
		else{
			$this->session->set_flashdata('error', 'Silahkan Login');
			redirect('login');
		}
	}
}