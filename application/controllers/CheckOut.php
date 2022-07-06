<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckOut extends CI_Controller {
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
		$this->load->view('user/checkOut', $data);
		$this->load->view('user/footer');
	}

    public function pesanBarang()
    {
        if(userLog()){
			$idUser 	        = $this->session->userdata('idLogin');
			$getUser	        = $this->M_user->getUser($idUser);
            
            $idProduk           = count($this->input->post('idProduk'));
            $id                 = ($this->input->post('idProduk'));
            $jumlah             = ($this->input->post('jumlah'));
            $kode               = $this->M_user->lastRecord();
            $kode_pesanan       = $kode->kode_pesanan + 1;
            $data=array();
            for($i=0; $i<$idProduk; $i++){

                $data[$i] = array(
                    'namaDepan'      => $this->input->post('namaDepan'),
                    'namaBelakang'   => $this->input->post('namaBelakang'),
                    'alamat'         => $this->input->post('alamat'),
                    'kota'           => $this->input->post('kota'),
                    'kabupaten'      => $this->input->post('kabupaten'),
                    'noTelp'         => $this->input->post('noTelp'),
                    'email'          => $this->input->post('email'),
                    'catatan'        => $this->input->post('catatan'),
                    'id_Produk'      => $id[$i],
                    'jumlah'         => $jumlah[$i],
                    'harga'          => $this->input->post('harga'),
                    'tanggalBeli'    => date('d-m-Y H:i:s'),
                    'id_user'        => $idUser,
                    'kode_pesanan'   => $kode_pesanan
                );
            }
            $prosesPesanan = $this->M_user->proses($data);

            // var_dump(json_encode(($data)));
            // $prosesPesanan  = $this->M_user->prosesPesanan($data);
            $status = "";
            if($prosesPesanan){
                $this->cart->destroy();
                $status="benar";
                echo json_encode($kode_pesanan);
            }
			$data['getUser']    = $getUser;
        }
    }

    public function pembayaran($kode)
    {
        if(userLog()){
			$idUser 	= $this->session->userdata('idLogin');
			$getUser	= $this->M_user->getUser($idUser);
            $data['getRekening']= $this->M_user->getAllRekening();
			$data['getUser']    = $getUser;
			$data['total']      = $this->M_user->getTotalByKode($kode);
            $data['kode']       = $kode;
		}
		$data['getKategori'] = $this->M_user->getKategori();
		$this->load->view('user/header');
		$this->load->view('user/topbar', $data);
		$this->load->view('user/pembayaran', $data);
		$this->load->view('user/footer');
    }

    public function upload_bukti($kode)
    {
        if(userLog()){
			$idUser 	= $this->session->userdata('idLogin');
			$getUser	= $this->M_user->getUser($idUser);
            $data['getRekening']= $this->M_user->getAllRekening();
			$data['getUser']    = $getUser;
			$data['total']      = $this->M_user->getTotalByKode($kode);
            $data['kode']       = $kode;
		}
		$data['getKategori'] = $this->M_user->getKategori();
		$this->load->view('user/header');
		$this->load->view('user/topbar', $data);
		$this->load->view('user/upload_bukti', $data);
		$this->load->view('user/footer');
    }

}
