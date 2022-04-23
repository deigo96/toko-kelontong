<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }

    public function index()
    {
        if(userLog()){
            $idUser 	= $this->session->userdata('idLogin');
			$getUser	= $this->M_user->getUser($idUser);
			$data['getUser'] = $getUser;
        }
        $data['getKategori'] = $this->M_user->getKategori();

        $this->load->view('user/header');
        $this->load->view('user/topbar', $data);
        $this->load->view('user/kontak');
        $this->load->view('user/footer');
    }

}
