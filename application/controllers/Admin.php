<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin extends CI_Controller{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('modAdmin');
		}

        public function index(){
            if($this->session->userdata('adminLog')){
                $config['base_url'] = site_url('admin');
                // $totalRows = $this->modAdmin->getAllUsers();
                // $config['total_rows'] = $totalRows;
                $config['per_page'] = 8;
                $config['uri_segment'] = 3;
                $this->load->library('pagination');
                $this->pagination->initialize($config);

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3): 0;
                $data['allUsers'] = $this->modAdmin->fetchAllUsersAdmin($config['per_page'], $page);
                $data['links'] = $this->pagination->create_links();
                $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));
                // $data['total_customers'] = $this->modAdmin->count_all_customers(); 

                $this->load->view('admin/header', $data);                
                $this->load->view('admin/home', $data);                
                $this->load->view('admin/footer');                
            }
            else{
                $this->session->set_flashdata('error', 'Silahkan login terlebih dahulu');
                    redirect('admin/login');
            }
        }

        public function login(){
            $this->load->view('admin/login');
        }

        public function checkAdmin(){
            $data['aEmail'] = $this->input->post('email', true);
            $data['aPassword'] = $this->input->post('password', true);

            if(!empty($data['aEmail']) && !empty($data['aPassword'])){
                $admindata = $this->modAdmin->checkAdmin($data);
                if(count($admindata) == 1 ){
                    $forSession = array(
                    'aId' => $admindata[0]['aId'],
                        'aName' => $admindata[0]['aName'],
                        'aEmail' => $admindata[0]['aEmail']
                    );
                    $this->session->set_userdata($forSession);
                    if($this->session->userdata('aId')){
                        redirect('admin');
                    }
                    else{
                        echo 'session is not created';
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Email or Password is not matched');
                    redirect('admin/login');
                }
            }
            else{
                $this->session->set_flashdata('error', 'Please check the required fields');
                redirect('admin/login');
            }
        }

        public function adminProfile($aId)
        {
            if(adminLog()){
                if(!empty($aId) && isset($aId)){
                    $data['admin'] = $this->modAdmin->checkAdminById($aId);
                    if(count($data['admin']) == 1){
                        $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));
                        $this->load->view('admin/header', $data);
                        $this->load->view('admin/adminProfile', $data);
                        $this->load->view('admin/footer', $data);
                    }
                    else{
                        setFlashData('alert-danger', 'Model not found', 'admin/allModels');
                    }
                }
                else {
                    setFlashData('alert-danger', 'Something went wrong', 'admin/allModels');
                }
            }
            else{
                setFlashData('alert-danger', 'Please login first to edit your category', 'admin/login');

            }
        }

        public function changePassword($aId)
        {
            if(adminLog()){
                if(!empty($aId) && isset($aId)){
                    $data['admin'] = $this->modAdmin->checkAdminById($aId);
                    if(count($data['admin']) == 1){
                        $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));
                        $this->load->view('admin/header', $data);                
                        $this->load->view('admin/changePassword', $data);                
                        $this->load->view('admin/footer', $data);
                    }
                    else{
                        setFlashData('alert-danger', 'Model not found', 'admin/allModels');
                    }
                }
                else {
                    setFlashData('alert-danger', 'Something went wrong', 'admin/allModels');
                }
            }
            else{
                setFlashData('alert-danger', 'Please login first to edit your category', 'admin/login');

            }
        }

        public function updatePassword()
        {
            if(adminLog()) {
                $data['aPassword'] = $this->input->post('newpass', true);
                $adminId = $this->input->post('aId', true);

                $this->form_validation->set_rules('oldpass', 'old Password', 'callback_password_check');
                $this->form_validation->set_rules('newpass', 'new password', 'required|min_length[6]',[
                    'min_length' => 'The Password must contain at least 6 characters',
                    'required' => 'Please check the required'
                ]);
                $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[newpass]',[
                    'matches' => 'Passwords does not match'
                ]);

                if($this->form_validation->run() == true) {
                    $aId = $this->session->userdata('aId');
                    $addData = $this->modAdmin->updatePass($data, $adminId);
                    if($addData) {
                        $this->session->set_flashdata('error', 'Please Login to Continue');
                        redirect('admin/login');
                    }
                    else {
                        // setFlashData('alert-danger', 'Something went wrong', 'admin/adminProfile');
                    }
                }
                else {
                    $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));
                    $data['admin'] = $this->modAdmin->checkAdminById();

                    $this->load->view('admin/header', $data);                
                    $this->load->view('admin/changePassword', $data);                
                    $this->load->view('admin/footer', $data);
                }
                return false;
            }

        }

        public function password_check($oldpass)
        {
            $aId = $this->session->userdata('aId');
            $admin = $this->modAdmin->get_admin($aId);
            if($admin->aPassword !== ($oldpass)) {
                $this->form_validation->set_message('password_check', 'Old password does not match');
                return false;
            }
            return true;
        }

        public function logOut(){
            if($this->session->userdata('aId')){
                $this->session->set_userdata('aId');
                $this->session->set_flashdata('error', 'You have successfully logged out');
                redirect('admin/login');
            }
            else{
                $this->session->set_flashdata('error', 'Please login now');
                redirect('admin/login');
            }
        }

        public function newCategory(){
            if(adminLog()){
                $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));

                $this->load->view('admin/header', $data);
                $this->load->view('admin/category/newCategory');
                $this->load->view('admin/footer');
            }
            else{
                setFlashData('alert-danger', 'Please login first to add your category', 'admin/login');
            }
        }

        public function addCategory()
        {
            if(adminLog()){
                $data['cName'] = $this->input->post('categoryName', true);
                if(!empty($data['cName'])){
					$data['cStatus'] = 1;
					$data['cDate'] = date('Y-m-d H:i:s');
					$data['adminId'] = getAdminId();
                    $addData = $this->modAdmin->checkCategory($data);
                    if($addData->num_rows() > 0 ){
                        setFlashData('alert-danger', 'Kategori sudah ada', 'admin/newCategory');     
                    }
                    else{
                        $addData = $this->modAdmin->addCategory($data);
                        if($addData){
                            setFlashData('alert-success', 'Kategori baru berhasil ditambah', 'admin/newCategory');
                        }   
                        else{
                            setFlashData('alert-danger', 'Kategori tidak dapat ditambah', 'admin/newCategory');
                        }
                    }
                }
                else{
                    setFlashData('alert-danger', 'Kategori tidak boleh kosong', 'admin/newCategory');
                }
            }
            else{
                setFlashData('alert-danger', 'Silahkan Login', 'admin/login');
            }
        }

        public function allCategories()
        {
            if(adminLog()){
                $config['base_url'] = site_url('admin/category/allCategories');
                $totalRows = $this->modAdmin->getAllCategories();
                $config['total_rows'] = $totalRows;
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $this->load->library('pagination');
                $this->pagination->initialize($config);

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3): 0;
                $data['allCategories'] = $this->modAdmin->fetchAllCategories($config['per_page'], $page);
                $data['links'] = $this->pagination->create_links();
                $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));


                $this->load->view('admin/header', $data);
                $this->load->view('admin/category/allCategories', $data);
                $this->load->view('admin/footer', $data);
            }
            else{
                setFlashData('alert-danger', 'Please login first to add your category', 'admin/login');
            }
        }

        public function editCategory($cId)  
        {   
            if(adminLog()){
                if(!empty($cId) && isset($cId)){
                    $data['category'] = $this->modAdmin->checkCategoryById($cId);
                    if(count($data['category']) == 1){
                        $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));

                        $this->load->view('admin/header', $data);
                        $this->load->view('admin/category/editCategory', $data);
                        $this->load->view('admin/footer', $data);
                    }
                    else{
                        setFlashData('alert-danger', 'Category not found', 'admin/allCategories');
                    }
                }
                else {
                    setFlashData('alert-danger', 'Something went wrong', 'admin/allCategories');
                }
            }
            else{
                setFlashData('alert-danger', 'Please login first to edit your category', 'admin/login');

            }
        }

        public function updateCategory()
        {
            if(adminLog()){
                $data['cName'] = $this->input->post('categoryName', true);
                $cId = $this->input->post('xid', true);
                $oldImg = $this->input->post('oldImg', true);

                if(!empty($data['cName']) && isset($data['cName'])){
					$data['cDate'] = date('Y-m-d H:i:s');
					$addData = $this->modAdmin->checkCategory($data);
                    if($addData->num_rows() > 0 ){
                        setFlashData('alert-danger', 'Kategori sudah ada', 'admin/allCategories');     
                    }
                    else{
						$reply = $this->modAdmin->updateCategory($data, $cId);
						if($reply){
							setFlashData('alert-success', 'Kategori berhasil diubah', 'admin/allCategories');
						}
						else {
							setFlashData('alert-danger', 'Kategori gagal diubah', 'admin/allCategories');
						}
					}
                }
                else {
                    setFlashData('alert-danger', 'Kategori tidak boleh kosong', 'admin/allCategories');
                }
            }
            else {
                setFlashData('alert-danger', 'Silahkan Login', 'admin/login');
            }
        }

        public function deleteCategory()
        {
            if(adminLog()){
                $cId = $this->uri->segment(3);
                var_dump($cId);
                // $delete = $this->modAdmin->deleteCategory($cId);
                // if($delete == true){
                //     setFlashData('alert-success', 'Kategori berhasil dihapus', 'admin/allCategories');
                // }else{
                //     setFlashData('alert-danger', 'Kategori tidak dapat dihapus', 'admin/allCategories');
                // }
            }
            else {
                setFlashData('alert-danger', 'Silahkan login', 'admin/login');
            }
        }

        public function newProduct()
        {
            if(adminLog()){
                $data['categories'] = $this->modAdmin->getCategories();
                $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));

                $this->load->view('admin/header', $data);
                $this->load->view('admin/product/newProduct', $data);
                $this->load->view('admin/footer', $data);
            }
            else{
                setFlashData('alert-danger', 'Please login first to add your category', 'admin/login');
            }
        }

        public function addProduct()
        {
            if(adminLog()){
                $data['pName'] = $this->input->post('productName', true);
                $data['harga'] = $this->input->post('price', true);
                $data['stok'] = $this->input->post('stok', true);
                // $data['pCompany'] = $this->input->post('company', true);
                $data['categoryId'] = $this->input->post('categoryId', true);

                if(!empty($data['pName']) && !empty($data['categoryId']) && !empty($data['harga']) && !empty($data['stok'])){
                    $addData = $this->modAdmin->checkProduct($data);
                    if($addData->num_rows() > 0 ){
                        setFlashData('alert-danger', 'Produk sudah ada', 'admin/newProduct');     
                    }
                    else{
                        $path = realpath(APPPATH.'../assets/upload/produk/');
                        $config['upload_path'] = $path;
                        $config['max_size'] = 1000;
                        $config['allowed_types'] = 'gif|png|jpg|jpeg';
                        $this->load->library('upload', $config);
                        if(!$this->upload->do_upload('prodDp')){
                            $error = $this->upload->display_errors();
                            setFlashData('alert-danger', $error, 'admin/newProduct');
                        }
                        else{
                            $fileName = $this->upload->data();
                            $data['pDp'] = $fileName['file_name'];
                            $data['pStatus'] = 1;
                            $data['pDate'] = date('Y-m-d H:i:s');
                            $data['adminId'] = getAdminId();
                        }
                        $addData = $this->modAdmin->addProduct($data);
                        if($addData){
                            setFlashData('alert-success', 'Produk berhasil ditambah', 'admin/newProduct');
                        }
                        else{
                            setFlashData('alert-danger', 'Gagal menambah produk', 'admin/newProduct');
                        }
                    }
                }
                else{
                    setFlashData('alert-danger', 'Pastikan semua kolom terisi', 'admin/newProduct');
                }
            }
            else{
                setFlashData('alert-danger', 'Silahkan Login', 'admin/login');
            }
        }

        public function allProducts()
        {
            if(adminLog()){
                $config['base_url'] = site_url('admin/allProducts');
                $totalRows = $this->modAdmin->getAllProducts();
                $config['total_rows'] = $totalRows;
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $this->load->library('pagination');
                $this->pagination->initialize($config);

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3): 0;
                $data['allProducts'] = $this->modAdmin->fetchAllProducts($config['per_page'], $page);
                $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));
                $data['links'] = $this->pagination->create_links();

                $this->load->view('admin/header', $data);
                $this->load->view('admin/product/allProducts', $data);
                $this->load->view('admin/footer', $data);
            }
            else{
                setFlashData('alert-danger', 'Please login first to add your category', 'admin/login');
            }
        }

        public function editProduct($pId)  
        {   
            if(adminLog()){
                if(!empty($pId) && isset($pId)){
                    $data['products'] = $this->modAdmin->checkProductById($pId);
                    if(count($data['products']) == 1){
                        $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));
                        $data['categories'] = $this->modAdmin->getCategories();
                        $this->load->view('admin/header',$data);
                        $this->load->view('admin/product/editProduct', $data);
                        $this->load->view('admin/footer', $data);
                    }
                    else{
                        setFlashData('alert-danger', 'Product not found', 'admin/allProducts');
                    }
                }
                else {
                    setFlashData('alert-danger', 'Something went wrong', 'admin/allProducts');
                }
            }
            else{
                setFlashData('alert-danger', 'Please login first to edit your category', 'admin/login');

            }
        }

        public function updateProduct()
        {
            if(adminLog()){
                $data['pName'] = $this->input->post('productName', true);
                $data['harga'] = $this->input->post('harga', true);
                $data['stok'] = $this->input->post('stok', true);
                // $data['pCompany'] = $this->input->post('company', true);
                $data['categoryId'] = $this->input->post('categoryId', true);
                $pId = $this->input->post('xid', true);
                $oldImage = $this->input->post('oldImg', true);

                if(!empty($data['pName']) && !empty($data['categoryId']) && !empty($data['harga']) && !empty($data['stok'])){
                    if(isset($_FILES['prodDp']) && is_uploaded_file($_FILES['prodDp']['tmp_name'])){
                        $path = realpath(APPPATH.'../assets/images/products/');
                        $config['upload_path'] = $path;
                        $config['max_size'] = 400;
                        $config['allowed_types'] = 'gif|png|jpg|jpeg';
                        $this->load->library('upload', $config);
                        if(!$this->upload->do_upload('prodDp')){
                            $error = $this->upload->display_errors();
                            setFlashData('alert-danger', $error, 'admin/newProduct');
                        }
                        else{
                            $fileName = $this->upload->data();
                            $data['pDp'] = $fileName['file_name'];
                            $data['pDate'] = date('Y-m-d H:i:s');
                        }
                    }
                    $addData = $this->modAdmin->updateProduct($data, $pId);
                    if($addData){
                        if(!empty($data['pDp']) && isset($data['pDp'])){
                            if(file_exists($path.'/'.$oldImage)){
                                unlink($path.'/'.$oldImage);
                            }
                        }
                        setFlashData('alert-success', 'Produk berhasil diubah', 'admin/allProducts');
                    }
                    else{
                        setFlashData('alert-danger', 'Gagal mengubah produk', 'admin/allProducts');
                    }
                }
                else{
                    setFlashData('alert-danger', 'Pastikan data benar', 'admin/allProducts');
                }
            }
            else{
                setFlashData('alert-danger', 'Silahkan Login', 'admin/login');
            }
        }

        public function deleteProduct()
        {
            if(adminLog()){
                $pId = $this->input->post('id',true);
                var_dump($pId);
                $delete = $this->modAdmin->deleteProduct($pId);
                // if($delete)
                //     setFlashData('alert-success', 'Data berhasil dihapus', 'admin/allProducts');
                // else
                //     setFlashData('alert-danger', 'Gagal menghapus data', 'admin/allProducts');
            }
            else {
                setFlashData('alert-danger', 'Please login first to edit your category', 'admin/login');
            }
        }

        public function newModel()
        {
            if(adminLog()){
                $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));
                $data['products'] = $this->modAdmin->getProducts();
                $this->load->view('admin/header', $data);
                $this->load->view('admin/model/newModel', $data);
                $this->load->view('admin/footer', $data);
            }
            else{
                setFlashData('alert-danger', 'Please login first to add your category', 'admin/login');
            }
        }

        public function addModel()
        {
            if(adminLog()){
                $data['mName'] = $this->input->post('modelName', true);
                $data['mDescription'] = $this->input->post('md', true);
                $data['location'] = $this->input->post('location', true);
                $data['productId'] = $this->input->post('productId', true);
                $data['price'] = $this->input->post('price', true);

                if(!empty($data['mName']) && !empty($data['mDescription']) && !empty($data['productId'])){
                    $path = realpath(APPPATH.'../assets/images/models/');
                    $config['upload_path'] = $path;
                    $config['max_size'] = 400;
                    $config['allowed_types'] = 'gif|png|jpg|jpeg';
                    $this->load->library('upload', $config);
                    if(!$this->upload->do_upload('modelDp')){
                        $error = $this->upload->display_errors();
                        setFlashData('alert-danger', $error, 'admin/newModel');
                    }
                    else{
                        $fileName = $this->upload->data();
                        $data['mDp'] = $fileName['file_name'];
                        $data['mStatus'] = 1;
                        $data['mDate'] = date('Y-m-d H:i:s');
                        $data['adminId'] = getAdminId();
                    }
                    $addData = $this->modAdmin->checkModel($data);
                    if($addData->num_rows() < 0 ){
                        setFlashData('alert-danger', 'The model already exist', 'admin/newModel');     
                    }
                    else{
                        $addData = $this->modAdmin->addModel($data);
                        if($addData){
                            setFlashData('alert-success', 'You have successfully added your job', 'admin/newModel');
                        }
                        else{
                            setFlashData('alert-danger', 'You cannot add model right now', 'admin/newModel');
                        }
                    }
                }
                else{
                    setFlashData('alert-danger', 'Please check the required fields', 'admin/newModel');
                }
            }
            else{
                setFlashData('alert-danger', 'Please login first to add your model', 'admin/login');
            }
        }

        public function allModels()
        {
            if(adminLog()){
                $config['base_url'] = site_url('admin/allModels');
                $totalRows = $this->modAdmin->getAllModels();
                $config['total_rows'] = $totalRows;
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $this->load->library('pagination');
                $this->pagination->initialize($config);

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3): 0;
                $data['allModels'] = $this->modAdmin->newFetchAllModels();
                $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));
                $data['links'] = $this->pagination->create_links();

                $this->load->view('admin/header', $data);
                $this->load->view('admin/model/allModels', $data);
                $this->load->view('admin/footer', $data);
            }
            else{
                setFlashData('alert-danger', 'Please login first to add your Model', 'admin/login');
            }
        }

        public function deleteModel()
        {
            if(adminLog()){
                $mId = $this->uri->segment(3);
                $this->modAdmin->deleteModel($mId);
                setFlashData('alert-success', 'Successfully Deleted', 'admin/allModels');
            }
            else {
                setFlashData('alert-danger', 'Please login first to edit your Model', 'admin/login');
            }
        }

        public function editModel($mId)  
        {   
            if(adminLog()){
                if(!empty($mId) && isset($mId)){
                    $data['models'] = $this->modAdmin->checkModelById($mId);
                    if(count($data['models']) == 1){
                        $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));
                        $data['products'] = $this->modAdmin->getProducts();
                        $this->load->view('admin/header', $data);
                        $this->load->view('admin/model/editModel', $data);
                        $this->load->view('admin/footer', $data);
                    }
                    else{
                        setFlashData('alert-danger', 'Model not found', 'admin/allModels');
                    }
                }
                else {
                    setFlashData('alert-danger', 'Something went wrong', 'admin/allModels');
                }
            }
            else{
                setFlashData('alert-danger', 'Please login first to edit your category', 'admin/login');

            }
        }

        public function updateModel()
        {
            if(adminLog()){
                $data['mName'] = $this->input->post('modelName', true);
                $data['mDescription'] = $this->input->post('md', true);
                $data['location'] = $this->input->post('location', true);
                $data['price'] = $this->input->post('price', true);
                $data['productId'] = $this->input->post('productId', true);
                $modelId = $this->input->post('mDi', true);
                $oldImage = $this->input->post('oldImg', true);

                if(!empty($data['mName']) && !empty($data['mDescription']) && !empty($data['productId'])){
                    if(isset($_FILES['modelDp']) && is_uploaded_file($_FILES['modelDp']['tmp_name'])){
                        $path = realpath(APPPATH.'../assets/images/models/');
                        $config['upload_path'] = $path;
                        $config['max_size'] = 400;
                        $config['allowed_types'] = 'gif|png|jpg|jpeg';
                        $this->load->library('upload', $config);
                        if(!$this->upload->do_upload('modelDp')){
                            $error = $this->upload->display_errors();
                            setFlashData('alert-danger', $error, 'admin/newModel');
                        }
                        else{
                            $fileName = $this->upload->data();
                            $data['mDp'] = $fileName['file_name'];
                            $data['mDate'] = date('Y-m-d H:i:s');
                        }
                    }

                    $addData = $this->modAdmin->checkModel($data);
                    if($addData->num_rows() == 0 ){
                        setFlashData('alert-danger', 'The product already exist', 'admin/allModels');     
                    }
                    else{
                        $addData = $this->modAdmin->updateModel($data, $modelId);var_dump($addData);
                        if($addData){
                            if(!empty($data['mDp']) && isset($data['mDp'])){
                                if(file_exists($path.'/'.$oldImage)){
                                    unlink($path.'/'.$oldImage);
                                }
                            }
                            setFlashData('alert-success', 'You have successfully updated your model', 'admin/allModels');
                        }
                        else{
                            setFlashData('alert-danger', 'You cannot update model right now', 'admin/allModels');
                        }
                    }
                }
                else{
                    setFlashData('alert-danger', 'Please check the required fields', 'admin/allModels');
                }
            }
            else{
                setFlashData('alert-danger', 'Please login first to add your category', 'admin/login');
            }
        }

        public function allUsers()
        {
            if(adminLog()){
                $config['base_url'] = site_url('admin/allUsers');
                $totalRows = $this->modAdmin->getAllUsers();
                $config['total_rows'] = $totalRows;
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $config['use_global_url_suffix'] = FALSE;
                $config['use_page_numbers'] = TRUE;
                $config['num_links'] = 2;
                $config['first_link']       = 'First';
                $config['last_link']        = 'Last';
                $config['next_link']        = 'Next';
                $config['prev_link']        = 'Prev';
                $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
                $config['full_tag_close']   = '</ul></nav></div>';
                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close']    = '</span></li>';
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['prev_tagl_close']  = '</span>Next</li>';
                $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                $config['first_tagl_close'] = '</span></li>';
                $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['last_tagl_close']  = '</span></li>';
                $this->load->library('pagination');
                $this->pagination->initialize($config);

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3): 0;
                $data['allUsers'] = $this->modAdmin->fetchAllUsers($config['per_page'], $page);
                $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));
                $data['links'] = $this->pagination->create_links();

                $this->load->view('admin/header', $data);
                $this->load->view('admin/allUsers', $data);
                $this->load->view('admin/footer', $data);
            }
            else{
                setFlashData('alert-danger', 'Please login first to add your Model', 'admin/login');
            }
        }

        public function userDetail($uId)  
        {   
            if(adminLog()){
                if(!empty($uId) && isset($uId)){
                    $data['users'] = $this->modAdmin->checkUserById($uId);
                    if(count($data['users']) == 1){
                        $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));
                        // $data['products'] = $this->modAdmin->getProducts();
                        $this->load->view('admin/header',$data);
                        $this->load->view('admin/userDetail', $data);
                        $this->load->view('admin/footer');
                    }
                    else{
                        setFlashData('alert-danger', 'User tidak ditemukan', 'admin/allUsers');
                    }
                }
                else {
                    setFlashData('alert-danger', 'Gagal memuat data', 'admin/allUsers');
                }
            }
            else{
                setFlashData('alert-danger', 'Silahkan Login', 'admin/login');

            }
        }

        public function deleteUser()
        {
            if(adminLog()){
                $uId = $this->uri->segment(3);
                $delete= $this->modAdmin->deleteUser($uId);
                if($delete){
                    setFlashData('alert-success', 'User berhasil dihapus', 'admin/allUsers');
                }else{
                    setFlashData('alert-danger', 'Gagal menghapus user', 'admin/allUsers');
                }
            }
            else {
                setFlashData('alert-danger', 'Please login first to edit your Model', 'admin/login');
            }
        }

        public function activity()
        {
            $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));

            $this->load->view('admin/invoice');
        }   

        public function invoice()
        {
            $data['invoice'] = $this->modAdmin->show_data();
            $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));

            $this->load->view('admin/header', $data);
            $this->load->view('admin/invoice', $data);
            $this->load->view('admin/footer', $data);
        }

        public function allApplications()
        {
            if(adminLog()){
                $config['base_url'] = site_url('admin/allUsers');
                $totalRows = $this->modAdmin->getAllApplications();
                $config['total_rows'] = $totalRows;
                $config['per_page'] = 10;
                $config['uri_segment'] = 3;
                $config['use_global_url_suffix'] = FALSE;
                $config['use_page_numbers'] = TRUE;
                $config['num_links'] = 2;
                $config['first_link']       = 'First';
                $config['last_link']        = 'Last';
                $config['next_link']        = 'Next';
                $config['prev_link']        = 'Prev';
                $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
                $config['full_tag_close']   = '</ul></nav></div>';
                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close']    = '</span></li>';
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['prev_tagl_close']  = '</span>Next</li>';
                $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                $config['first_tagl_close'] = '</span></li>';
                $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['last_tagl_close']  = '</span></li>';
                $this->load->library('pagination');
                $this->pagination->initialize($config);

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3): 0;
                $data['allApplications'] = $this->modAdmin->fetchAllApplications($config['per_page'], $page);
                $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));
                $data['links'] = $this->pagination->create_links();

                $this->load->view('admin/header', $data);
                $this->load->view('admin/allApplications', $data);
                $this->load->view('admin/footer', $data);
            }
            else{
                setFlashData('alert-danger', 'Please login first to add your Model', 'admin/login');
            }
        }

        public function proccess($id)
        {
            if(adminLog()){
                if(!empty($id) && isset($id)){
                    $data['action'] = $this->modAdmin->getDataById($id);
                    if(count($data['action']) == 1){
                        $data['profiles'] = $this->modAdmin->checkProfile($this->session->userdata('adminLog'));
                        $this->load->view('admin/header', $data);
                        $this->load->view('admin/proccess', $data);
                        $this->load->view('admin/footer', $data);
                    }
                    else{
                        setFlashData('alert-danger', 'Model not found', 'admin/allModels');
                    }
                }
                else {
                    setFlashData('alert-danger', 'Something went wrong', 'admin/allModels');
                }
            }
            else{
                setFlashData('alert-danger', 'Please login first to edit your category', 'admin/login');
            }
        }
        
        public function actionProccess()
        {
            if(adminLog()) {
                $id = $this->input->post('id');
                if($this->input->post('accept') == 'ACCEPT'){
                    $data['status'] = 3;
                } elseif($this->input->post('reject') == 'REJECT') {
                    $data['status'] = 2;
                }

                $action = $this->modAdmin->updateProccess($data, $id);
                if($action) {
                    setFlashData('alert-success', 'You have successfully updated your data', 'admin/allApplications');
                } else {
                    setFlashData('alert-danger', 'Something went wrong', 'admin/allApplications');
                }
            } else {
                setFlashData('alert-danger', 'Please login first', 'admin/login');
            }
        }
    }