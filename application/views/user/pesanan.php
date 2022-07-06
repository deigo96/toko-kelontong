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
                    <h2>Pesanan</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Pesanan Saya</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Kode Pesanan</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($getPesanan as $pesanan) { ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <h5><?php echo $pesanan->kode_pesanan ?></h5>
                                    </td>
                                    <td class="shoping__cart__total">
                                    <?php echo $pesanan->harga ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <?php if(empty($pesanan->bukti_upload)) { ?> 
                                            <a href="<?php echo base_url('CheckOut/upload_bukti/').$pesanan->kode_pesanan ?>" class="primary-btn cart-btn">Upload Bukti</a>
                                        <?php } else { ?>
                                            <button type="submit" class="site-btn" readonly>Selesai</button>    
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>$454.98</span></li>
                            <li>Total <span>$454.98</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div> -->
    </div>
</section>