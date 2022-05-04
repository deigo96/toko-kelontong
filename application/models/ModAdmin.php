<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class ModAdmin extends CI_Model{
        
        public function checkAdmin($data)
        {
            return $this->db->get_where('admin', $data)
                ->result_array(); 
        }

        public function checkAdminById()
        {
            return $this->db->get_where('admin', array('aId'=>1))->result_array();
        }

        public function checkProfile($where=null)
        {
            return $this->db->get_where('login', array('id_login' =>$where))->row();
        }

        public function checkCategory($data)
        {
            return $this->db->get_where('categories', array('cName' =>$data['cName']));
        }

        public function addCategory($data)
        {
            return $this->db->insert('categories', $data);
        }

        public function getAllCategories()
        {
            return $this->db->get_where('categories', array('cStatus'=>1))->num_rows();
        }

        public function fetchAllCategories($limit, $start)
        {
            $this->db->limit($limit, $start);
            $query = $this->db->get_where('categories', array('cStatus'=>1));
            if($query->num_rows() > 0){
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }

        public function checkCategoryById($cId)
        {
            return $this->db->get_where('categories', array('cId'=>$cId))->result_array();
        }

        public function updateCategory($data, $cId)
        {
            $this->db->where('cId', $cId);
            return $this->db->update('categories', $data);
        }

        public function deleteCategory($cId)
        {
            
            $this->db->where('cId', $cId);
            $query = $this->db->delete('categories');
            if($query == false){
                return false;
            }else{
                return true;
            }
        }

        public function getCategories()
        {
            return $this->db->get_where('categories', array('cStatus' => 1));
        }

        public function checkProduct($data)
        {
            return $this->db->get_where('products', array(
                'pName' => $data['pName'],
                'categoryId' => $data['categoryId']
            ));
        }

        public function addProduct($data)
        {
            return $this->db->insert('products', $data);
        }

        public function getAllProducts()
        {
            return $this->db->get_where('products', array('pStatus'=>1))->num_rows();
        }

        public function fetchAllProducts($limit, $start)
        {
            $this->db->limit($limit, $start);
            $query = $this->db->get_where('products', array('pStatus'=>1));
            if($query->num_rows() > 0){
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }

        public function deleteProduct($pId)
        {
            $this->db->where('pId', $pId);
            return $this->db->delete('products');
        }

        public function checkProductById($pId)
        {
            return $this->db->get_where('products', array('pId'=>$pId))->result_array();
        }

        public function updateProduct($data, $pId)
        {
            $this->db->where('pId', $pId);
            return $this->db->update('products', $data);
        }

        public function getProducts()
        {
            return $this->db->select('pId,pName')
                ->from('products')
                ->where('pStatus', 1)
                ->get();
        }

        public function deleteUser($uId)
        {
            $this->db->where('id_login', $uId);
            return $this->db->delete('login');
        }

        public function count_all_users()
        {
            return $this->db->get_where('login', array('type_id' => 1))->num_rows();
        }

        public function count_all_products()
        {
            return $this->db->get('products')->num_rows();
        }

        public function count_all_categories()
        {
            return $this->db->get('categories')->num_rows();
        }

        public function checkUserById($uId)
        {
            return $this->db->get_where('login', array('id_login'=>$uId))->result_array();
        }

        public function fetchAllUsersAdmin($limit, $start)
        {
            $this->db->limit($limit, $start);
            $this->db->order_by('id_login', 'asc');
            $this->db->limit('5');
            $query = $this->db->get('login', array('type_id'=>1));
            if($query->num_rows() > 0){
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }

        public function fetchAllUsers($limit, $start)
        {
            $this->db->limit($limit, $start);
            $this->db->order_by('id_login', 'desc');
            $this->db->limit('100');
            $query = $this->db->get_where('login', array('type_id'=>1));
            if($query->num_rows() > 0){
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }

        public function getAllUsers()
        {
            return $this->db->get_where('users', array('aId'=>1))->num_rows();
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

        public function get_admin($aId)
        {
            $this->db->where('id_login', $aId);
            $query = $this->db->get('login');
            return $query->row();
        }

        public function updatePass($data, $adminId)
        {
            $this->db->where('id_login', $adminId);
            return $this->db->update('login', $data);
        }

        public function totalPesanan()
        {
            return $this->db->get('pesanan')->num_rows();
        }

        public function getTotalPemasukan()
        {
            $query = $this->db->query("SELECT products.harga as harga_produk, pesanan.jumlah
                                        FROM pesanan
                                        LEFT JOIN products ON pesanan.id_produk = products.pId
                                        ORDER BY pesanan.id_pesanan DESC
                                    ");
            return $query->result();
        }

        public function getPesanan()
        {
            $query = $this->db->query("SELECT products.pName,products.harga as harga_produk, categories.cName, pesanan.*
                                        FROM pesanan
                                        LEFT JOIN products ON pesanan.id_produk = products.pId
                                        LEFT JOIN categories ON products.categoryId = categories.cId
                                        ORDER BY pesanan.id_pesanan DESC LIMIT 5
                                    ");
            return $query->result();
        }
        
        public function getAllOrders()
        {
            return $this->db->get('pesanan')->num_rows();
        }
        
        public function fetchAllOrders($limit, $start)
        {
            // $query = $this->db->query("SELECT products.pName,products.harga as harga_produk, categories.cName, pesanan.*
            //                             FROM pesanan
            //                             LEFT JOIN products ON pesanan.id_produk = products.pId
            //                             LEFT JOIN categories ON products.categoryId = categories.cId
            //                             ORDER BY pesanan.id_pesanan DESC LIMIT $limit
            //                         ");
            // return $query->result();
            $this->db->select('products.pName, products.pDp,products.harga as harga_produk, categories.cName, pesanan.*');
            $this->db->from('pesanan');
            $this->db->join('products', 'pesanan.id_produk = products.pId');
            $this->db->join('categories', 'products.categoryId = categories.cId');
            $this->db->limit($limit, $start);
            $this->db->order_by('id_pesanan', 'desc');
            $this->db->limit('100');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }
    }