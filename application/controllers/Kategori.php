<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->model("m_login");
    }


	public function index()
	{
		if(adminLog()){
            $this->load->view('admin/header');
            $this->load->view('admin/navigation');
            $this->load->view('admin/topbar');
            $this->load->view('admin/kategori/kategori');
            $this->load->view('admin/footer');
        }
	}

    public function tambahKategori()
    {
        if(adminLog()){
            $this->load->view('admin/header');
            $this->load->view('admin/navigation');
            $this->load->view('admin/topbar');
            $this->load->view('admin/kategori/tambah_kategori');
            $this->load->view('admin/footer');
        }
    }

}