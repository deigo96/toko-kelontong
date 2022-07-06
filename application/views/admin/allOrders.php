
    
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
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>Produk
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('admin/newProduct'); ?>" class="nav-link">
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
                            <a href="<?php echo site_url('admin/allUsers'); ?>" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                            <p>Semua Users</p>
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
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>Application
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('admin/allApplications'); ?>" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                            <p>All Application</p>
                            </a>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h2 class="card-title">Pesanan</h2>
                            </div>
                            <?php if($this->session->flashdata('class')): ?>
                            <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dimissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
                                <?php echo $this->session->flashdata('message'); ?>
                            </div>
                            <?php endif ; ?>
                            <div class="card-body">
                                <!-- <div>
                                    <div class=" w-100 mb-2"> -->
                                        <?php if($allOrders): ?>
                                            <table id="example" class="table table-bordered table-dark" style="width:100%;">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Kode Pesanan</th>
                                                        <th>Nama</th>
                                                        <th>Kategori</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                        <th>Gambar</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <?php 
                                                    $i = 0;
                                                    foreach ($allOrders as $order): 
                                                    $i++;
                                                ?>
                                                    <tr class="">
                                                        <td>
                                                            <?php echo $order->kode_pesanan ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $order->pName ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $order->cName ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $order->jumlah?>
                                                        </td>
                                                        <td>
                                                            <?php echo $order->harga_produk * $order->jumlah ?>
                                                        </td>
                                                        <td>
                                                            <img src="<?php echo base_url('assets/upload/produk/'). $order->pDp ?>" alt="" class="img-thumbnail img-size-50 mx-auto d-block">
                                                        </td>
                                                        <td class="text-center py-0 align-middle">
                                                            <div class="btn-group btn-group-sm">
                                                                <?php if($order->status == 0) { ?>
                                                                    <span class="btn btn-warning btn-sm" style="cursor: default;"><i class="fas fa-globe"></i> Menunggu Verifikasi</span>
                                                                    <a href="<?php echo base_url('admin/detail_pesanan/').$order->kode_pesanan ?>"><span class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat Detail</span></a>
                                                                <?php }else{ ?>
                                                                    <span class="btn btn-success btn-sm"><i class="fas fa-check"></i> Berhasil</span>
                                                                    <a href="<?php echo base_url('admin/detail_pesanan/').$order->kode_pesanan ?>"><span class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat Detail</span></a>
                                                                <?php } ?>
                                                                <!-- <a href="<?php echo base_url('admin/userDetail/'. $user->id_login); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a> -->
                                                            </div> 
                                                        </td>
                                                        <!-- <td class="align-middle">
                                                            <div class="btn-group btn-group-sm">
                                                                <a href="<?php echo base_url('admin/userDetail/'. $user->uId); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                                                            </div> 
                                                        </td> -->
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>         
                                            <?php else: ?>
                                                Pesanan tidak ditemukan
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <!-- <p><?php echo $links;?></p>    -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
    