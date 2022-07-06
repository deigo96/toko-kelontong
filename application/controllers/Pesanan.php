<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {
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
			$data['getUser']    = $getUser;
            $data['getKategori']= $this->M_user->getKategori();
            $data['getPesanan'] = $this->M_user->getAllPesananUser($idUser);

            $this->load->view('user/header');
            $this->load->view('user/topbar', $data);
            $this->load->view('user/pesanan', $data);
            $this->load->view('user/footer');
        }else{
            $this->session->set_flashdata('error', 'Silahkan Login');
            redirect('login');
        }
    }

    public function Upload_bukti_pembayaran($kode)
    {
        if(userLog()){
            $idUser 	= $this->session->userdata('idLogin');
            if(isset($_FILES['bukti_upload']['name']) && !empty($_FILES['bukti_upload']['name'])){
                $path = realpath(APPPATH.'../assets/upload/bukti_pembayaran/');
                $config['upload_path'] = $path;
                $config['max_size'] = 2000;
                $config['allowed_types'] = 'gif|png|jpg|jpeg';
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('bukti_upload')){
                    echo "error";
                }
                else{
                    $fileName = $this->upload->data();
                    $data['bukti_upload'] = $fileName['file_name'];
                }
                
            }
            $this->load->library('upload');
            if(empty($this->upload->display_errors())){
                $saveBukti = $this->M_user->saveBuktiUpload($data, $kode);
                if($saveBukti){
                    echo 'true';
                }else{
                    echo 'false';
                }
            }else{
                echo 'false';
            }
        }else{
            $this->session->set_flashdata('error', 'Silahkan Login');
            redirect('login');
        }
    }

}
