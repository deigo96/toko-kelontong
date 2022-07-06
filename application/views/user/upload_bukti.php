<style>
    .file-upload {
        background-color: #ffffff;
        width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #7fad39;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #15824B;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .file-upload-btn:hover {
        background: #1AA059;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;
        border: 4px dashed #7fad39;
        position: relative;
    }

    .image-dropping,
    .image-upload-wrap:hover {
        background-color: #7fad39;
        border: 4px dashed #ffffff;
    }

    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #15824B;
        padding: 60px 0;
    }

    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    .remove-image {
        width: 200px;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
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
                    <h2>Upload Bukti Pembayaran</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Upload</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<div class="file-upload">
    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
    <form action="#" id="upload_bukti_pembayaran" method="post">
        <div class="image-upload-wrap">
            <input class="file-upload-input" name="bukti_upload" type='file' onchange="readURL(this);" accept="image/*" />
            <div class="drag-text">
                <h3>Drag and drop a file or select add Image</h3>
            </div>
        </div>
        <div class="file-upload-content">
            <img class="file-upload-image" src="#" alt="your image" />
            <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
            </div>
        </div>

        <input type="submit" value="Upload" class="site-btn btn-block mt-3">
    </form>
</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image-upload-wrap').hide();

                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function() {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function() {
        $('.image-upload-wrap').removeClass('image-dropping');
    });

    $('#upload_bukti_pembayaran').on('submit', function(e){
        e.preventDefault();
        var dataform = new FormData(this)
        var kode = '<?php echo $kode ?>';
        var baseUrl = '<?php echo base_url() ?>';
        $.ajax({
            url: baseUrl+'Pesanan/Upload_bukti_pembayaran/' + kode,
            type: "POST",
            data: new FormData(this),
            processData: false,
            cache: false,
            contentType: false,
            success: function(data){
                if(data == "true"){
                    Swal.fire(
                        'Berhasil!',
                        'Bukti Pembayaran Berhasil di Upload.',
                        'success'
                    ).then((result) => {
                        window.location.href = baseUrl + 'pesanan';
                    });
                    
                }else{
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
                    title: 'Signed in successfully'
                    })
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                Swal.fire(
                    'Gagal Menambah Lowongan', 
                    '', 
                    'error'
                )
            }
        })
    });
</script>