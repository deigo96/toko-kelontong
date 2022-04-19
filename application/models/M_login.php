<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
    public function dataLogin($data)
    {
        return $this->db->get_where('login', $data)->result();
    }

    public function register($data)
    {
        $this->db->insert('login', $data);
    }
}