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
                            <?php foreach($getKategori as $kategori) { ?>
                                <li><a href="<?php echo base_url('toko/pencarian/').$kategori->cId ?>"><?php echo $kategori->cName ?></a></li>
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
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+62 821214124</h5>
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

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Billing Detail</h4>
                <form action="<?php echo base_url('checkOut/pembayaran') ?>" method="POST">
                    <?php $no=1; foreach ($this->cart->contents() as $items){ ?>
                        <input type="hidden" class="idProduk" name="idProduk[]" value="<?php echo $items['id'] ?>">
                        <input type="hidden" class="harga" name="harga[]" value="<?php echo $items['price'] ?>">
                        <input type="hidden" class="jumlah" name="jumlah[]" value="<?php echo $items['qty'] ?>">
                        <input type="hidden" class="rowId" name="rowId[]" value="<?php echo $items['rowid'] ?>">
                    <?php } ?>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nama Depan<span>*</span></p>
                                        <input type="text" require name="namaDepan" class="namaDepan">
                                        <!-- <div id="validationServer03Feedback" class="invalid-feedback"> -->
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nama Belakang<span>*</span></p>
                                        <input type="text" require name="namaBelakang" class="namaBelakang">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Alamat<span>*</span></p>
                                <input type="text" require placeholder="Nama Jalan" class="checkout__input__add alamat" name="alamat">
                            </div>
                            <div class="checkout__input">
                                <p>Kota<span>*</span></p>
                                <input type="text" require name="kota" class="kota">
                            </div>
                            <div class="checkout__input">
                                <p>Kabupaten<span>*</span></p>
                                <input type="text" require name="kabupaten" class="kabupaten">
                            </div>
                            <div class="checkout__input">
                                <p>Kode Pos<span>*</span></p>
                                <input type="text" require name="kodePos" class="kodePos">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>No.Telepon/Handphone<span>*</span></p>
                                        <input type="text" require name="noTelp" class="noTelp">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" require name="email" class="email">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Catatan<span>*</span></p>
                                <input type="text" require
                                    placeholder="Masukan catatan yang anda inginkan" name="catatan" class="catatan">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Pesanan Anda</h4>
                                <div class="checkout__order__products">Produk <span>Total</span></div>
                                <ul>
                                    <?php $no=1; foreach ($this->cart->contents() as $items){ ?>
                                        <li><?php echo $items['name'] ?>
                                            <span>Rp. 
                                                <?php 
                                                    $total = $items['qty']*$items['price'];
                                                    echo number_format($total, 0,',','.') 
                                                ?>
                                            </span>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <div class="checkout__order__total">Total <span>Rp. <?php echo number_format($this->cart->total(), 0,',','.') ?></span></div>
                                <!-- <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> -->
                                <button type="button" class="site-btn pesan">PESAN</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/js/bootbox.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script>
    var baseUrl = "<?php echo base_url() ?>";
    $(document).ready(function(){
        // Delete 
        $('.pesan').click(function(){
            var namaDepan = $('.namaDepan').val();
            var namaBelakang = $('.namaBelakang').val();
            var alamat = $('.alamat').val();
            var kota = $('.kota').val();
            var kabupaten = $('.kabupaten').val();
            var noTelp = $('.noTelp').val();
            var email = $('.email').val();
            var catatan = $('.catatan').val();
            var idProduk = $('input[name="idProduk[]"]').map(function(){ 
                    return this.value; 
                }).get();
            var jumlah = $('input[name="jumlah[]"]').map(function(){ 
                return this.value; 
            }).get();
            var harga = "<?php echo $this->cart->total() ?>";
            // Delete id
            // Confirm box
            if((namaBelakang && namaDepan && alamat && kota && kabupaten && noTelp && email) != ""){
                bootbox.confirm("Pastikan data yang anda isi benar", function(result) {
                    if(result){
                        // AJAX Request
                        $.ajax({
                            url: baseUrl + 'CheckOut/pesanBarang',
                            type: 'POST',
                            data: {
                                'namaDepan': namaDepan,
                                'namaBelakang': namaBelakang,
                                'alamat': alamat,
                                'kota': kota,
                                'kabupaten': kabupaten,
                                'noTelp': noTelp,
                                'email': email,
                                'catatan': catatan,
                                'idProduk': idProduk,
                                'harga': harga,
                                'jumlah': jumlah
                            },
                            success: function(data){
                                if(data != ""){
                                    bootbox.alert({
                                        message: "Kami akan mengirim pesanan sesuai alamat anda!",
                                        title: "Pesanan Berhasil",
                                        className: 'text-center',
                                        callback: function(){
                                            window.location.href = baseUrl + "home";
                                        }
                                    });
                                }else{
                                    bootbox.alert({
                                        message: "Mohon pesanan diulang kembali!",
                                        title: "Pesanan Gagal",
                                        className: 'text-center'
                                    });
                                }
                            // Removing row from HTML Table
                                // if(response != ""){
                                //     bootbox.alert('Barang berhasil dipesan');
                                //     $(el).closest('tr').css('background','tomato');
                                //     $(el).closest('tr').fadeOut(800,function(){
                                //         $(this).remove();
                                //     });
                                // }else{
                                //     bootbox.alert('Data Memesan Barang');
                                //     location.reload();
                                // }
                            }
                        });
                    }
                });
            }else{
                bootbox.alert("Semua data harus diisi")
            }
        });
    });
</script>