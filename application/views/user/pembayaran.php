<?php
    function format($nomor){
        $ones = array(
            1 => "One",
            2 => "Two",
            3 => "Three",
            4 => "Four",
            5 => "Five",
            6 => "Six",
            7 => "Seven",
            8 => "Eight",
            9 => "Nine",
            );
        return $ones[$nomor];
    }
?>

<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Semua Kategori</span>
                    </div>
                    <ul>
                        <?php foreach ($getKategori as $kategori) { ?>
                            <li><a href="<?php echo base_url('toko/pencarian/') . $kategori->cId ?>"><?php echo $kategori->cName ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="<?php echo base_url('toko/search') ?>" method="POST">
                            <input type="text" name="search" placeholder="Apa yang anda cari?">
                            <button type="submit" class="site-btn">CARI</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <a href="https://api.whatsapp.com/send?phone=083872124419" target="blank" style="color: #7fad39;"><i class="fa fa-phone"></i></a>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>083872124419</h5>
                            <span>Buka 24 Jam</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url('assets/img/breadcrumb.jpg') ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Pembayaran</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Pembayaran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<section class="checkout spad">
    <div class="container">



        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="card">
                    <div class="accordion" id="accordionExample">
                        <?php $no=1; foreach($getRekening as $rekening) { ?>
                            <div class="card">
                                <div class="card-header p-0" id="heading<?php echo format($no) ?>">
                                    <h2 class="mb-0">
                                        <button class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapse<?php echo format($no) ?>" aria-expanded="false" aria-controls="collapse<?php echo format($no) ?>">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span><?php echo $rekening->nama_bank ?></span>
                                                <img src="<?php echo base_url($rekening->LOGO) ?>" width="30">
                                            </div>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse<?php echo format($no) ?>" class="collapse" aria-labelledby="heading<?php echo format($no) ?>" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="col-md-10">
                                                <label for="nomor">Nomor Rekening</label>
                                            </div>
                                            <div class="col-md-2 text-right">
                                                <button onclick="CopyToClipboard('rekening<?php echo format($no) ?>')" style="border: none;">Copy <span class="fa fa-copy"></span></button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $rekening->nomor_rekening ?>" class="form-control" id="rekening<?php echo format($no) ?>" readonly>
                                        </div>
                                        <div class="col-md-12 mt-1">
                                            <label for="nomor">Atas Nama</label>
                                            <input type="text" value="<?php echo $rekening->atas_nama ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $no++; } ?>
                        
                    </div>

                </div>

            </div>
            <div class="col-lg-4 col-md-6">
                <div class="checkout__order">
                    <div class="checkout__order__total">Total Bayar<span>Rp. <?php echo number_format($total->harga, 0, ',', '.') ?></span></div>
                    <span style="color: red;"><i>* copy nomor rekening disamping dan upload bukti pembayaran</i></span>
                    <a href="<?php echo base_url('CheckOut/upload_bukti/').$kode ?>" type="button" class="site-btn upload-pembayaran" style="font-size: 18px;
                                                                                        letter-spacing: 2px;
                                                                                        width: 100%;
                                                                                        margin-top: 10px;
                                                                                        text-align: center;">
                    Upload Bukti</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    function CopyToClipboard(id)
    {
        var r = document.createRange();
        r.selectNode(document.getElementById(id));
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(r);
        document.execCommand('copy');
        window.getSelection().removeAllRanges();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
        icon: 'success',
        title: 'Berhasil di copy'
        })
    }
    
</script>