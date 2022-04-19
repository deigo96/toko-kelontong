<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->view('user/header');
		$this->load->view('user/home');
		$this->load->view('user/footer');
	}

	public function login()
	{
		$this->load->view('user/header');
		$this->load->view('auth/login');
		$this->load->view('user/footer');
	}
}
