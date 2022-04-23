<style>
    tr.strikeout {
        background-color: rgb(78 83 84 / 50%);
   pointer-events: none;
   width: 100%;
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
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+62 0821331241</h5>
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
                        <h2>Keranjang Belanja</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Keranjang Belanja</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js')?>"></script>
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($this->cart->total_items()>0){ ?>
                                    <?php $no=1; foreach ($this->cart->contents() as $items){ ?>
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <a href="<?php echo base_url('toko/produk_detail/').$items['id'] ?>"><img width="100px" src="<?php echo base_url('assets/upload/produk/').$items['image'] ?>" alt=""></a>
                                                <h5><?php echo $items['name'] ?></a></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                Rp. <?php echo number_format($items['price'], 0,',','.') ?>
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <!-- <span class="dec qtybtn">-</span> -->
                                                        <input class="jumlah" type="text" value="<?php echo $items['qty'] ?>">
                                                        <!-- <span class="inc qtybtn">+</span> -->
                                                    </div>
                                                </div>
                                            </td>
                                            <input class="rowId" type="hidden" value="<?php echo $items['rowid'] ?>">
                                            <td class="shoping__cart__total total">
                                                Rp. <?php 
                                                        $total = $items['qty']*$items['price'];
                                                        echo number_format($total, 0,',','.') 
                                                    ?>
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <span class="icon_close remove"></span>
                                            </td>
                                        </tr>
                                <?php $no++; }} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <!-- <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a> -->
                        <button type="button" class="primary-btn cart-btn cart-btn-right update"><span class="icon_loading"></span>
                            Update Cart</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Total Keranjang</h5>
                        <ul>
                            <li>Total <span>Rp. <?php echo number_format($this->cart->total(), 0,',','.') ; ?></span></li>
                        </ul>
                        <a href="<?php echo base_url('CheckOut') ?>" class="primary-btn">Proses Keranjang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootbox.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script>
        var baseUrl = "<?php echo base_url() ?>";
        $(document).ready(function(){
            $('.remove').click(function(){
                $(this).closest('tr').addClass("strikeout ");
                $('.strikeout input.jumlah').val(0)
            })

            // $('input.jumlah').each(function(i){
            //     console.log($(this).val())
            //     $(this).change(function(){
                    
            //         // var a = i($('.jumlah')).val()
            //         alert(a)
            //     });
            // });
            $('.update').click(function(e){
                var jumlahArray = []
                var rowIdArray = []
                $('input.jumlah').each(function(i){
                    jumlahArray.push($(this).val())
                });
                $('.rowId').each(function(i){
                    rowIdArray.push($(this).val())
                });
                $.ajax({
                    url: baseUrl + 'Toko/updateCart',
                    type: 'POST',
                    data: {
                        'qty': jumlahArray,
                        'rowid': rowIdArray
                    },
                    success: function(data){
                        if(data == "true"){
                            bootbox.alert({
                                message: "Produk berhasil diupdate!",
                                className: 'text-center',
                                callback: function(){
                                    window.location.href = baseUrl + "cart";
                                }
                            });
                        }else{
                            bootbox.alert({
                                message: "Gagal mengubah produk!",
                                className: 'text-center'
                            });
                        }
                    }
                });
            });
        });
    </script>