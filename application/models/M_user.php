<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class M_user extends CI_Model{
        public function getUser($id)
        {
            return $this->db->get_where('login', array('id_login'=>$id))->row();
        }

        public function getKategori()
        {
            return $this->db->get('categories')->result();
        }

        public function getProduk()
        {
            $this->db->select('*');
            $this->db->from('products');
            $this->db->join('categories', 'cId=categoryId');
            $this->db->order_by('pId', 'desc');
            $this->db->limit('5');
            $query = $this->db->get();
            return $query->result();
        }

        public function getProdukId($id)
        {
            return $this->db->get_where('products', array('pId' => $id))->row();
        }

        public function prosesPesanan($data)
        {
            return $this->db->insert('pesanan', $data);
        }

        public function getDetailProduk($id)
        {
            $query = $this->db->query("SELECT products.*, categories.cName FROM products LEFT JOIN categories ON products.categoryId = categories.cId WHERE products.pId = '$id' ");
            return $query->row();
        }

        public function lastRecord()
        {
            $query = $this->db->query("SELECT kode_pesanan FROM `pesanan` ORDER BY kode_pesanan DESC LIMIT 1");
            return $query->row();
        }

        public function proses($data)
        {
            $this->db->trans_begin();
            foreach($data as $row) {
                $filter_data = array(
                    'namaDepan'      => $row['namaDepan'],
                    'namaBelakang'   => $row['namaBelakang'],
                    'alamat'         => $row['alamat'],
                    'kota'           => $row['kota'],
                    'kabupaten'      => $row['kabupaten'],
                    'noTelp'         => $row['noTelp'],
                    'email'          => $row['email'],
                    'catatan'        => $row['catatan'],
                    'id_Produk'      => $row['id_Produk'],
                    'jumlah'         => $row['jumlah'],
                    'harga'          => $row['harga'],
                    'tanggalBeli'    => $row['tanggalBeli'],
                    'id_user'        => $row['id_user'],
                    'kode_pesanan'   => $row['kode_pesanan']
                );
            //Call the save method
            $this->M_user->save_as_new($filter_data);
            }

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                echo json_encode("Failed to Save Data");
            } else {
                $this->db->trans_commit();
                $this->cart->destroy();
                echo json_encode("Success!");
            }
        }

        public function save_as_new($data)
        {
            return $this->db->insert('pesanan', $data);
        }

        public function getProdukKategori($id)
        {
            $query = $this->db->query(" SELECT products.*, categories.* FROM `products` LEFT JOIN categories ON products.categoryId = categories.cId WHERE categories.cId = '$id'");
            return $query->result();
        }

        public function getProdukSearch($nama)
        {
            $query = $this->db->query(" SELECT products.* FROM `products` WHERE products.pName LIKE '%$nama%'");
            return $query->result();
        }

        public function updatePass($data, $id)
        {
            $this->db->where('id_login', $id);
            return $this->db->update('login', $data);
        }

        public function getUserPass($id)
        {
            $this->db->where('id_login', $id);
            $query = $this->db->get('login');
            return $query->row();
        }
    }