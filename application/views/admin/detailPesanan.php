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
                    <a href="<?php echo site_url('admin/allCategories'); ?>" class="nav-link active">
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
            <div class="col-md-12  mt-3">
                <div class="card card-primary">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title bold">Kode Pesanan #<?php echo $pesanan[0]->kode_pesanan ?></h3>

                                </div>
                                <div class="col-md-6">
                                    <a href="<?php echo base_url('admin/cetak_pesanan/') . $pesanan[0]->kode_pesanan ?>" target="blank" class="btn btn-secondary float-sm-right"><i class="fas fa-print"></i> Cetak</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Produk</th>
                                        <th class="text-right">Jumlah</th>
                                        <th class="text-right">Harga Satuan</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $subTotal = 0;
                                    foreach ($pesanan as $pesanan) {
                                        $no++;
                                        $total = $pesanan->harga_produk * $pesanan->jumlah;
                                        $subTotal += $total;
                                        $penerima = $pesanan->namaDepan . ' ' . $pesanan->namaBelakang;
                                        $alamat = $pesanan->alamat;
                                        $alamat2 = $pesanan->kota . ', ' . $pesanan->kabupaten;
                                        $telepon = $pesanan->noTelp;
                                        $email = $pesanan->email;
                                        $status = $pesanan->status;
                                        $kode = $pesanan->kode_pesanan;
                                        $bukti = $pesanan->bukti_upload;
                                    ?>
                                        <tr>
                                            <td><?php echo $no ?>.</td>
                                            <td><?php echo $pesanan->pName ?></td>
                                            <td class="text-right"><?php echo $pesanan->jumlah ?></td>
                                            <td class="text-right"><?php echo $pesanan->harga_produk ?></td>
                                            <td class="text-right"><?php echo $total ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="4" class="text-right">Sub Total</td>
                                        <td class="text-right">Rp. <?php echo $subTotal ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Bukti Pembayaran</h3>
                    </div>
                    <?php 
                        if(!empty($bukti)) {
                            echo '<img class="card-img-top" src="'.base_url('assets/upload/bukti_pembayaran/').$bukti.'" alt="Card image cap">';
                        } else {
                            echo '<span class="text-center font-weight-bold">Bukti Pembayaran Belum di Upload</span>';
                        } 
                    ?>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Detail Pengiriman</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-user mr-1"></i> Penerima</strong>

                        <p class="text-muted">
                            <?php echo $penerima ?>
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                        <p class="text-muted"><?php echo $alamat . '<br>' . $alamat2 ?></p>

                        <hr>

                        <strong><i class="fas fa-phone mr-1"></i> Telepon</strong>

                        <p class="text-muted"><?php echo $telepon ?></p>

                        <hr>

                        <strong><i class="far fa-envelope mr-1"></i> Email</strong>

                        <p class="text-muted"><?php echo $email ?></p>

                        <hr>
                        <?php if ($status == 0) { ?>
                            <button class="button btn btn-success btn-block" onclick="verifikasi('<?php echo $kode ?>')">Verifikasi</button>
                        <?php } else { ?>
                            <button class="btn btn-secondary btn-block" disabled>Sudah diverifikasi</button>
                        <?php } ?>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/js/bootbox.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script>
    var baseUrl = "<?php echo base_url() ?>";

    function verifikasi(kode) {
        bootbox.confirm("Apakah anda yakin ingin memverifikasi pesanan ini?", function(result) {
            if (result) {
                // AJAX Request
                $.ajax({
                    url: baseUrl + 'admin/verifikasi/' + kode,
                    type: 'POST',
                    data: {
                        kode: kode
                    },
                    success: function(response) {
                        // Removing row from HTML Table
                        if (response != "") {
                            bootbox.alert('Berhasil diverifikasi');
                            location.reload();
                        } else {
                            bootbox.alert('Gagal verifikasi');
                            location.reload();
                        }
                    }
                });
            }
        });
    }
</script>