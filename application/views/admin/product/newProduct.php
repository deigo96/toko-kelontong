
    
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo site_url('admin'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>Kategori
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('admin/newCategory'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('admin/allCategories'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Semua Kategori</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>Produk
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('admin/newProduct'); ?>" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('admin/allProducts'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Semua Produk</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('admin/allUsers'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                            <p>Semua users</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/allOrder'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Pesanan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-6 offset-lg-3 mt-50">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Produk</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if($this->session->flashdata('class')): ?>
                                <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dimissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
                                    <?php echo $this->session->flashdata('message'); ?>
                                </div>
                            <?php endif ; ?>
                            <?php echo form_open_multipart('admin/addProduct', '', '') ?>
                                <div class="form-group">
                                    <label for="inputClientCompany">Nama Produk</label>
                                    <?php echo form_input('productName', '', array('placeholder' => 'Masukan nama produk', 'class' => 'form-control')); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Kategori</label>
                                    <?php
                                        $categoriesOptions = array();
                                        foreach ($categories->result() as $category) {
                                            $categoriesOptions[$category->cId] = $category->cName;
                                        }
                                        echo form_dropdown('categoryId', $categoriesOptions, '', 'class="form-control custom-select"');
                                    ?>            
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Harga</label>
                                    <input type="number" name="price" min="0" step="100" id="price" placeholder="0.00" class="form-control" value="<?= set_value('price') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Stok Barang</label>
                                    <input type="number" name="stok" id="stok" placeholder="Jumlah stok" class="form-control" value="<?= set_value('stok') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Gambar</label>
                                    <?php echo form_upload('prodDp', '','class="form-control custom-file mb-3'); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_submit('Tambah Product', 'Tambah Product', 'class="btn btn-primary offset-4"') ?>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section class="content">
            <div class="row">
                <div class="col-md-6 offset-3 mt-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Title</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if($this->session->flashdata('class')): ?>
                            <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dimissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
                                <?php echo $this->session->flashdata('message'); ?>
                            </div>
                        <?php endif ; ?>
                        <?php echo form_open_multipart('admin/addProduct', '', '') ?>
                            <div class="form-group">
                                <label for="inputName">Job Name</label>
                                <?php echo form_input('productName', '', array('placeholder' => 'Enter Job Name', 'class' => 'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php
                                    $categoriesOptions = array();
                                    foreach ($categories->result() as $category) {
                                        $categoriesOptions[$category->cId] = $category->cName;
                                    }
                                    echo form_dropdown('categoryId', $categoriesOptions, '', 'class="form-control"');
                                ?>       
                            </div>
                            <div class="form-group">
                                <?php echo form_upload('prodDp','','class=="form-control custom-file'); ?>
                            </div>
                            <?php echo form_submit('Add Job', 'Add Job', 'class="btn btn-primary') ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </section> -->
    </div>
    <!-- /.content-wrapper -->