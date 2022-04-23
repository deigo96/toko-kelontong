<!DOCTYPE html>
<html lang="en">
<head>
	<title>Amanah | Daftar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?= base_url('assets/img'); ?>/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/animate/animate.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/css-hamburgers/hamburgers.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/select2/select2.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/util.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/main.css') ?>">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url('assets/img/A-logos_black.png') ?>" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="<?php echo base_url('register/auth') ?>" method="POST">
					<span class="login100-form-title">
						Daftar Member
					</span>
                    <div class="wrap-input100 message">

					</div>
					<div class="wrap-input100 username validate-input" data-validate = "Username tidak boleh kosong">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
                    <div class="wrap-input100 email validate-input" data-validate = "Email tidak valid">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input passwordValidate" data-validate = "Password harus diisi">
						<input class="input100 password" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<!-- <div class="wrap-input100 validate-input" data-validate = "Password tidak sesuai">
						<input class="input100 confirmPassword" type="password" name="confirmPass" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div> -->
					<div class="container-login100-form-btn">
						<button class="login100-form-btn daftar">
							Daftar
						</button>
					</div>
					<div class="text-center p-t-12">
						<span class="txt1">
                            Sudah punya akun?
						</span>
						<a class="txt2" href="<?php echo base_url('login') ?>">
							Login
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
<!-- 
					<div class="text-center p-t-136">
                        <span class="txt1">
                            Sudah punya akun?
						</span>
						<a class="txt2" href="<?php echo base_url('login') ?>">
							Login
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	
	

	
	<script src="<?php echo base_url('assets/login/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/login/vendor/bootstrap/js/popper.js') ?>"></script>
	<script src="<?php echo base_url('assets/login/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/login/vendor/select2/select2.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/login/vendor/tilt/tilt.jquery.min.js') ?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="<?php echo base_url('assets/login/js/main.js') ?>"></script>
    <?php if(form_error('email')) { ?>
        <script>
            $(document).ready(function(){
                $('.email').addClass('alert-validate')
                $('.email').attr('data-validate', 'Email sudah dipakai')
            });
        </script>
    <?php } ?>
    <?php if(form_error('username')) { ?>
        <script>
            $(document).ready(function(){
                $('.username').addClass('alert-validate')
                $('.username').attr('data-validate', 'Username sudah dipakai')
            });
        </script>
    <?php } ?>
</body>
</html>