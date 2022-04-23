<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_register extends CI_Model {
    public function checkLogin()
    {
        return $this->db->get('login')->result();
    }

    public function register($data)
    {
        return $this->db->insert('login', $data);
    }

    public function getIdLog($nama)
    {
        return $this->db->get_where('login', array('nama' => $nama))->row();
    }
}