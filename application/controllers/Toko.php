<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {
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
		$data['getKategori']= $this->M_user->getKategori();
		$data['getProduk']  = $this->M_user->getProduk();
		$this->load->view('user/header');
		$this->load->view('user/topbar', $data);
		$this->load->view('user/toko', $data);
		$this->load->view('user/footer');
	}

	public function login()
	{
		$this->load->view('user/header');
		$this->load->view('auth/login');
		$this->load->view('user/footer');
	}

	public function produk_detail($id)
	{
		if(userLog()){
			$idUser 	= $this->session->userdata('idLogin');
			$getUser	= $this->M_user->getUser($idUser);
			$data['getUser'] = $getUser;
		}
		$data['getDetailProduk']= $this->M_user->getDetailProduk($id);
		$data['getKategori'] 	= $this->M_user->getKategori();
		$this->load->view('user/header');
		$this->load->view('user/topbar', $data);
		$this->load->view('user/product_detail', $data);
		$this->load->view('user/footer');
	}

	public function addCart($id)
	{
		if(userLog()){
            $getProdukId	= $this->M_user->getProdukId($id);
			$qty = $this->input->post('qty');
            $data = array(
                'id' 	=> $getProdukId->pId,
                'qty' 	=> $qty,
                'price'	=> $getProdukId->harga,
                'name' 	=> $getProdukId->pName,
                'image'	=> $getProdukId->pDp
            );
            $insert = $this->cart->insert($data);
            $status="";
			if($insert){
				$status=true;
			}
			echo json_encode($status);
        }else{
            $this->session->set_flashdata('error', 'Silahkan Login');
            redirect('login');
        }
	}

	public function updateCart()
	{
		if(userLog()){
			$rowId = $this->input->post('rowid');
			$qty = $this->input->post('qty');
			$num = count($rowId);
			$data = array();
			for($i=0; $i<$num; $i++){
				$data[$i] = array(
					'rowid' =>$rowId[$i],
					'qty' =>$qty[$i]
				);
			}
			$update = $this->cart->update($data);
            $status="";
			if($update){
				$status=true;
			}
			echo json_encode($status);
		}
	}

	public function pencarian($id)
	{
		if(userLog()){
			$idUser 	= $this->session->userdata('idLogin');
			$getUser	= $this->M_user->getUser($idUser);
			$data['getUser'] = $getUser;
		}
		$data['getKategori']= $this->M_user->getKategori();
		$data['getProdukKategori']  = $this->M_user->getProdukKategori($id);
		$this->load->view('user/header');
		$this->load->view('user/topbar', $data);
		$this->load->view('user/toko', $data);
		$this->load->view('user/footer');
	}

	public function search()
	{
		if(userLog()){
			$idUser 	= $this->session->userdata('idLogin');
			$getUser	= $this->M_user->getUser($idUser);
			$data['getUser'] = $getUser;
		}
		$namaProduk	= $this->input->post("search");
		$search = "/cari=".$namaProduk;
		$data['getKategori']= $this->M_user->getKategori();
		$data['getProdukSearch']  = $this->M_user->getProdukSearch($namaProduk);
		// var_dump($data['getProdukSearch']);

		$this->load->view('user/header');
		$this->load->view('user/topbar', $data);
		$this->load->view('user/toko', $data);
		$this->load->view('user/footer');
	}
}
