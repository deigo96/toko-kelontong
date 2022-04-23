<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
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
            $this->load->view('user/profile', $data);
            $this->load->view('user/footer');
        }else{
            $this->session->set_flashdata('error', 'Silahkan Login');
            redirect('login');
        }
    }

    public function ganti_password($id)
    {
        if(userLog()){
            $datadb['password']   = $this->input->post('newPass', true);
            $datadb['password']   = hash('md5', $datadb['password']);
            $idUser 	        = $this->session->userdata('idLogin');
			$getUser	        = $this->M_user->getUser($idUser);
            $data['getUser']    = $getUser;
            $data['getKategori']= $this->M_user->getKategori();

            $this->form_validation->set_rules('oldPass', 'old Password', 'callback_password_check');
            $this->form_validation->set_rules('newPass', 'new password', 'required|min_length[8]',[
                'min_length' => 'Password minimal 8 karakter',
                'required' => 'Semua kolom harus diisi'
            ]);

            if($this->form_validation->run() == true) {
                $addData = $this->M_user->updatePass($datadb, $idUser);
                if($addData) {
                    $this->session->set_flashdata('error', 'Silahkan login');
                    redirect('login');
                }
                else {
                    $this->session->set_flashdata('error', 'Gagal mengganti password');
                    redirect('profile');
                }
            }else{
                $this->load->view('user/header');
                $this->load->view('user/topbar', $data);
                $this->load->view('user/profile', $data);
                $this->load->view('user/footer');
            }
            return false;
        }
    }
    
    public function password_check($oldpass)
    {
        $id = $this->session->userdata('idLogin');
        $user = $this->M_user->getUserPass($id);
        if($user->password != hash('md5', $oldpass)) {
            $this->form_validation->set_message('password_check', 'Password lama tidak sesuai');
            return false;
        }
        return true;
    }

}
