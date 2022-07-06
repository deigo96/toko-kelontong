<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="home"><img src="<?php echo base_url('assets/img/amanah-logo.png') ?>" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
            <li><a href="<?php echo base_url('cart') ?>"><i class="fa fa-shopping-bag"></i> <span><?php echo count($this->cart->contents()) ?></span></a></li>
            </ul>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="<?php echo base_url('assets/img/bendera.png') ?>" alt="">
                <div>Indonesia</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Indonesia</a></li>
                </ul>
            </div>
            <?php if(isset($getUser)) { ?>
                <div class="header__top__right__language">
                    <span ><i class="fa fa-user"></i> <?php echo $getUser->nama?></span>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="<?php echo base_url('profile') ?>">Profile</a></li>
                        <li><a href="<?php echo base_url('login/logOut') ?>">Log out</a></li>
                    </ul>
                </div>
            <?php } else { ?>
                <div class="header__top__right__auth">
                    <a href="<?php echo base_url('login') ?>"><i class="fa fa-user"></i> Login</a>
                </div>
            <?php } ?>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <?php 
                    $home = "";
                    $shop = "";
                    $kontak = "";
                    if(current_url() == "http://localhost/amanah/home")
                        $home = "class = 'active'";
                    elseif(current_url() == "http://localhost/amanah/toko")
                        $shop = "class = 'active'";
                    elseif(current_url() == "http://localhost/amanah/kontak")
                        $kontak = "class = 'active'";
                ?>
                <li <?php echo $home ?>><a href="<?php echo base_url('home') ?>">Home</a></li>
                <li <?php echo $shop ?>><a href="<?php echo base_url('toko') ?>">Toko</a></li>
                <li <?php echo $kontak ?>><a href="<?php echo base_url('kontak') ?>">Kontak</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> amanah@gmail.com</li>
                <li>Toko Paling Murah dan Segar</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> amanah@gmail.com</li>
                                <li>Toko Paling Murah dan Segar</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="<?php echo base_url('assets/img/bendera.png') ?>" alt="">
                                <div>Indonesia</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Indonesia</a></li>
                                </ul>
                            </div>
                            <?php if(isset($getUser)) { ?>
                                <div class="header__top__right__language">
                                    <span ><i class="fa fa-user"></i> <?php echo $getUser->nama?></span>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="<?php echo base_url('profile') ?>">Profile</a></li>
                                        <li><a href="<?php echo base_url('Pesanan') ?>">Pesanan</a></li>
                                        <li><a href="<?php echo base_url('login/logOut') ?>">Log out</a></li>
                                    </ul>
                                </div>
                            <?php } else { ?>
                                <div class="header__top__right__auth">
                                    <a href="<?php echo base_url('login') ?>"><i class="fa fa-user"></i> Login</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="home"><img src="<?php echo base_url('assets/img/amanah-logo.png') ?>" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <?php 
                                $home = "";
                                $shop = "";
                                $kontak = "";
                                if(current_url() == "http://localhost/amanah/home")
                                    $home = "class = 'active'";
                                elseif(current_url() == "http://localhost/amanah/toko")
                                    $shop = "class = 'active'";
                                elseif(current_url() == "http://localhost/amanah/kontak")
                                    $kontak = "class = 'active'";
                            ?>
                            <li <?php echo $home ?>><a href="<?php echo base_url('home') ?>">Home</a></li>
                            <li <?php echo $shop ?>><a href="<?php echo base_url('toko') ?>">Toko</a></li>
                            <li <?php echo $kontak ?>><a href="<?php echo base_url('kontak') ?>">Kontak</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                            <li><a href="<?php echo base_url('cart') ?>"><i class="fa fa-shopping-bag"></i> <span><?php echo count($this->cart->contents()) ?></span></a></li>
                        </ul>
                        <!-- <div class="header__cart__price">item: <span>$150.00</span></div> -->
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
