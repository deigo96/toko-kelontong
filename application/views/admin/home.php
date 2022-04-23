

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
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
                      <a href="<?php echo site_url('admin/allUsers'); ?>" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                      <p>Semua users</p>
                      </a>
                  </li>
              </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fab fa-shopify"></i></span>

              <div class="info-box-content">
                <a href="<?php echo base_url('admin/allOrder') ?>" class="users-list-name"><span class="info-box-text">Pesanan</span></a>
                <span class="info-box-number"><?php echo $totalPesanan ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-city"></i></span>

              <div class="info-box-content">
                <a href="<?php echo base_url('admin/allProducts') ?>" class="users-list-name"><span class="info-box-text">Produk</span></a>
                <span class="info-box-number"><?php echo $total_products;  ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-hand-holding-usd"></i></span>

              <div class="info-box-content">
                <a href="<?php echo base_url('admin/allOrder') ?>" class="users-list-name"><span class="info-box-text">Pemasukan</span></a>
                <span class="info-box-number"><?php echo number_format($total, 0,',','.') ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <a href="<?php echo base_url('admin/allUsers'); ?>" class="users-list-name">
                <span class="info-box-text">Users</span>
                </a>
                <span class="info-box-number"><?php echo $total_users;  ?></span>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- MAP & BOX PANE -->
            
            <!-- /.card -->
            <div class="row">
              <div class="col-md-6">
                <!-- PRODUCT LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Produk terbaru</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-0 pr-0 clearfix">
                    <?php foreach ($getProduk as $produk): ?>
                      <li class="item">
                        <div class="product-img">
                          <img src="<?= site_url('assets/upload/produk/'. $produk->pDp); ?>" alt="Product Image" class="img-size-50 img-thumbnail">
                        </div>
                        <div class="product-info">
                          <a href="<?php echo site_url('admin/editProduct/'. $produk->pId) ?>" class="product-title"> <?= $produk->pName ?>
                            <span class="badge badge-warning float-right">Rp <?= number_format($produk->harga, 0,',','.') ?></span></a>
                          <span class="product-description">
                            <?= $produk->cName ?>
                          </span>
                        </div>
                      </li>
                      <!-- /.item -->
                    <?php endforeach; ?>  
                    </ul>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="<?php echo base_url('admin/allProducts') ?>" class="uppercase">Lihat semua produk</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <!-- PRODUCT LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Member Terbaru</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-0 pr-0 clearfix">
                    <?php foreach ($getUsers as $user): ?>
                      <li class="item">
                        <div class="product-img">
                          <img src="<?php 
                                      if($user->gambar != "")
                                        echo base_url('assets/upload/user_profile/'. $user->gambar);
                                      else
                                        echo base_url('assets/upload/user_profile/male.png')
                                    ?>" alt="Product Image" class="img-size-50 img-thumbnail">
                        </div>
                        <div class="product-info">
                          <a href="<?php echo base_url('admin/userDetail/'.$user->id_login); ?>" class="product-title"> <?php echo $user->nama ?>
                            <span class="badge badge-warning float-right"><?php echo $user->date ?></span></a>
                          <span class="product-description">
                            <?php echo $user->status == 1 ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-warning">Tidak Aktif</span>' ?>
                          </span>
                        </div>
                      </li>
                      <!-- /.item -->
                    <?php endforeach; ?> 
                    </ul>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="<?php echo base_url('admin/allUsers') ?>" class="uppercase">Lihat semua member</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>
            <!-- /.row -->
            </div>
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Produk dipesan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nama</th>
                      <th>Kategori</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($getPesanan as $pesanan){
                      ?>
                        <tr>
                          <td><?php echo $pesanan->kode_pesanan ?></td>
                          <td><?php echo $pesanan->pName ?></td>
                          <td><?php echo $pesanan->cName ?></td>
                          <td><?php echo $pesanan->jumlah ?></td>
                          <td>
                            <?php 
                              $totalJumlah = $pesanan->harga_produk * $pesanan->jumlah ;
                              echo number_format($totalJumlah, 0,',','.')
                            ?>  
                          </td>
                        </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="<?php echo base_url('Admin/allOrder') ?> " class="btn btn-sm btn-primary float-right">Lihat semua</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->