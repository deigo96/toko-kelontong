<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct()
    {
            parent::__construct();
            $this->load->model("m_register");
    }

	public function index()
	{
		$this->load->view('auth/register');
	}

    public function auth()
    {
        $username   = $this->input->post('username', true);
        $email      = $this->input->post('email', true);
        $password   = $this->input->post('password', true);
        $this->form_validation->set_rules('username', 'Username', 'is_unique[login.nama]', [
            'is_unique' => "Username sudah dipakai"
        ]);
        $this->form_validation->set_rules('email', 'Email', 'is_unique[login.email]', [
            'is_unique' => "Email sudah dipakai"
        ]);
        if($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        }else {
            $data['nama']       = $username;
            $data['email']      = $email;
            $data['password']   = hash('md5',$password);
            $data['type_id']    = 1;
            $data['date']       = date('d-m-Y H:i:s');
            
            $this->m_register->register($data);
            $this->session->set_flashdata('error', 'Silahkan login');
            redirect('login');
        }

    }
}