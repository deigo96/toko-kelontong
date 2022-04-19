<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_register extends CI_Model {
    public function checkLogin()
    {
        return $this->db->get('login')->result();
    }

    public function register($data)
    {
        $this->db->insert('login', $data);
    }
}