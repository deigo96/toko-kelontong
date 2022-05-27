<style>
    .form-error{
        margin-top: -30px;
        color: #f21126;
    }
</style>
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
                        <h2>Profile</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Profile saya</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Profile</h2>
                    </div>
                </div>
            </div>
            <form action="<?php echo base_url('profile/ganti_password/').$getUser->id_login ?>" method="POST">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="blog__details__author">
                            <div class="blog__details__author__pic" style="text-align: center; margin-bottom:20px;float:none">
                                <img src="
                                    <?php 
                                        if($getUser->gambar == "")
                                            echo base_url('assets/upload/user_profile/male.png');
                                        else
                                            echo base_url('assets/upload/user_profile/').$getUser->gambar;
                                    ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="username" placeholder="Nama" value="<?php echo $getUser->nama ?>" readonly>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="email" placeholder="Email" value="<?php echo $getUser->email ?>" readonly>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="password" name="oldPass" placeholder="Password lama" >
                        <?php echo form_error('oldPass', '<div class="form-error">', '</div>');?>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="password" name="newPass" placeholder="Password baru" >
                        <?php echo form_error('newPass', '<div class="form-error">', '</div>');?>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="site-btn">Ganti Password</button>
                    </div>
                    <!-- <div class="col-lg-12 text-center">
                        <div class="blog__item__text">
                            <a href="<?php echo base_url('profile/ganti_password/').$getUser->id_login ?>" class="blog__btn">GANTI PASSWORD <span class="arrow_right"></span></a>
                        </div>
                    </div> -->
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->