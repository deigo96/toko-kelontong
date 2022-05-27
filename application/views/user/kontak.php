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
                        <h2>Hubungi kami</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Kontak</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Telepon/WA</h4>
                        <p>083872124419</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Alamat</h4>
                        <p>Pasar Randudongkal kecamatan Randudongkal kabupaten Pemalang</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Waktu buka</h4>
                        <p>24 Jam</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>amanah@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps?q=pasar randudongkal&output=embed"
            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Pasar Randudongkal</h4>
                <ul>
                    <li>Telepon: 083872124419</li>
                    <li>Alamat: Pasar Randudongkal kecamatan Randudongkal kabupaten Pemalang</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->