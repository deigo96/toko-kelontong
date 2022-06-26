<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amanah | Cetak Pesanan</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img'); ?>/favicon.ico">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <i class="fas fa-globe"></i> Amanah
                        <small class="float-right">Tanggal: <?php echo date('d/m/Y') ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    Dari
                    <address>
                        <strong>Amanah Kelontong</strong><br>
                        Pasar Randudongkal kecamatan Randudongkal<br>
                        kabupaten Pemalang<br>
                        Telepon: 083872124419<br>
                        Email: amanah@gmail.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    Ke
                    <address>
                        <strong><?php echo $pesanan[0]->namaDepan.' '.$pesanan[0]->namaBelakang ?></strong><br>
                        <?php echo $pesanan[0]->alamat ?><br>
                        <?php echo $pesanan[0]->kota.', '.$pesanan[0]->kabupaten ?><br>
                        Telepon: <?php echo $pesanan[0]->noTelp ?><br>
                        Email: <?php echo $pesanan[0]->email ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Kode Pesanan: <?php echo $pesanan[0]->kode_pesanan ?></b>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th class="text-right">Jumlah</th>
                                <th></th>
                                <th class="text-right">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $subTotal = 0;
                                foreach($pesanan as $pesanan){
                                    $total = $pesanan->harga_produk*$pesanan->jumlah;
                                    $subTotal +=$total;    
                            ?>
                                <tr>
                                    <td><?php echo $pesanan->pName ?></td>
                                    <td class="text-right"><?php echo $pesanan->jumlah ?></td>
                                    <td>x <?php echo $pesanan->harga_produk ?></td>
                                    <td class="text-right"><?php echo $pesanan->jumlah*$pesanan->harga_produk ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <!-- <p class="lead">Payment Methods:</p>
                    <img src="../../dist/img/credit/visa.png" alt="Visa">
                    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                    <img src="../../dist/img/credit/american-express.png" alt="American Express">
                    <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
                        jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p> -->
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>Rp. <?php echo $subTotal ?></td>
                            </tr>
                            <tr>
                                <th>Ongkos Kirim:</th>
                                <td>Rp. 5000</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>Rp. <?php echo $subTotal+5000 ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>