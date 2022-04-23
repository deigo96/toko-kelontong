<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
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
            $data['getKategori'] = $this->M_user->getKategori();

            $this->load->view('user/header');
            $this->load->view('user/topbar', $data);
            $this->load->view('user/cart');
            $this->load->view('user/footer');
        }else{
            $this->session->set_flashdata('error', 'Silahkan Login');
            redirect('login');
        }
    }

	public function addCart($id)
	{
		if(userLog()){
            $getProdukId	= $this->M_user->getProdukId($id);

            $data = array(
                'id' 	=> $getProdukId->pId,
                'qty' 	=> 1,
                'price'	=> $getProdukId->harga,
                'name' 	=> $getProdukId->pName,
                'image'	=> $getProdukId->pDp
            );
            $this->cart->insert($data);
            redirect('toko');
        }else{
            $this->session->set_flashdata('error', 'Silahkan Login');
            redirect('login');
        }
	}
}
