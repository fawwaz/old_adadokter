<!DOCTYPE HTML>
<html>
<head>
	<title></title>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo css_url().'login.css';?>">
	<script src="<?php echo js_url().'jquery-validation-bootstrap.min.js';?>"></script>
</head>
<body>


	<div id="phone_verification" class="container">
		<div class="col-md-4 col-md-offset-4">
		  <div class="row">
		    <div class="main">
		      <h4>Ok, kami butuh untuk memverifikasi anda <a id="login_link" href="#"></a></h4>
		      <form id="verification_form" role="form" method="POST" action="do_verify_phone">
		      	<p>silahkan masukan kode verifikasi yang sudah kami kirimkan. jika anda ragu dengan nomor
		      		handphone yang dimasukan, anda bisa <strong><a href="<?php echo base_url().'user/resend';?>">mengulangi lagi</a></strong>
		      	</p>
		      	<div class="form-group">
		          <label for="kode_verifikasi">Kode Verifikasi</label>
		          <input type="text" class="form-control" id="kode_verifikasi" name="kode_verifikasi">
		        </div>
		          <button type="submit" class="btn btn btn-primary">
		          Kirim Verifikasi
		          </button>
		      </form>
		    </div>
		  </div>
		</div>
	</div>


</body>
</html>