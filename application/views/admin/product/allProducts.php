
    
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
                            <a href="<?php echo site_url('admin/newProduct'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('admin/allProducts'); ?>" class="nav-link active">
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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h2 class="card-title">Semua Produk</h2>
                            </div>
                            <?php if($this->session->flashdata('class')): ?>
                            <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dimissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
                                <?php echo $this->session->flashdata('message'); ?>
                            </div>
                            <?php endif ; ?>
                            <div class="card-body pb-0">
                                <div class="table">
                                    <div class="btn-group w-100 mb-2">
                                        <?php if($allProducts): ?>
                                            <table class="table  text-center table-dark">
                                                <thead>
                                                    <tr>
                                                        <!-- <th>No</th> -->
                                                        <th>Id</th>
                                                        <th>Produk</th>
                                                        <th>Harga</th>
                                                        <th>Gambar</th>
                                                        <!-- <th>Company</th> -->
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $i = 0;
                                                        foreach ($allProducts as $product): 
                                                        $i++;
                                                    ?>
                                                        <tr>
                                                            <!-- <td>
                                                                <?php echo $i ?>
                                                            </td> -->
                                                            <td>
                                                                <?php echo $product->pId ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $product->pName ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $product->harga ?>
                                                            </td>
                                                            <td>
                                                                <img width="100px" src="<?php echo base_url('assets/upload/produk/').$product->pDp ?>" alt="">
                                                            </td>
                                                            <td class="text-right py-0 align-middle">
                                                                <div class="btn-group btn-group-sm">
                                                                    <a href="<?php echo site_url('admin/editProduct/'. $product->pId) ?>" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                                    <!-- <a href="javascript:void(0)" class="btn btn-danger delcat" data-id="<?php echo $category->cId ?>" data-text="<?php echo $this->encryption->encrypt($category->cId) ?>">Delete</a> -->
                                                                    <button type="button" class="delete btn btn-danger btn-sm" id="del_<?= $product->pId ?>" data-id="<?= $product->pId ?>" data-toggle="modal" data-target="#exampleModalCenter">
                                                                        <i class="fas fa-trash"></i> Delete
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <input type="hidden" name="id" value="<?php echo $product->pId ?>">
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <?php echo $links;?>            
                                            <?php else: ?>
                                                Kaegori tidak tersedia
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <!-- modal -->
    <div class="modal fade" id/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/js/bootbox.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script>
    var baseUrl = "<?php echo base_url() ?>";
    $(document).ready(function(){
        // Delete 
        $('.delete').click(function(){
            var el = this;
            // Delete id
            var deleteid = $(this).data('id');
            // Confirm box
            bootbox.confirm("Apakah anda yakin ingin menghapus data?", function(result) {
                if(result){
                    // AJAX Request
                    $.ajax({
                        url: baseUrl + 'admin/deleteProduct/'+ deleteid,
                        type: 'POST',
                        data: { id:deleteid },
                        success: function(response){
                        // Removing row from HTML Table
                            if(response != ""){
                                bootbox.alert('Data Berhasil dihapus');
                                $(el).closest('tr').css('background','tomato');
                                $(el).closest('tr').fadeOut(800,function(){
                                    $(this).remove();
                                });
                            }else{
                                bootbox.alert('Data Gagal Dihapus');
                                location.reload();
                            }
                        }
                    });
                }
            });
        });
    });
</script>
    