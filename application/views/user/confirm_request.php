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
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo css_url().'login.css';?>"> -->
	<script src="<?php echo js_url().'jquery-validation-bootstrap.min.js';?>"></script>
	<style type="text/css">
	#my_confirmation{
		position: absolute;
		top: 250px;
		margin-left: 200px;
	}
	</style>
</head>
<body>

	<div id="my_confirmation" class="container">
		<form action="do_checkout" method="post">
		<div class="col-md-offset-1">
			<div class="col-md-4">

					<div class="row">
						<div class="col-md-12">
						<div class="alert alert-info">
							<h2><strong>Konfirmasi</strong></h2>
							<!-- <strong>anda akan memesan perjanjian bertemu dengan</strong> -->
							<p>Masukan kode berikut lalu klik tombol checkout untuk memesan</p>
						</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<?=$recaptcha_html?>
						</div>
					</div>

			</div>

			<div class="col-md-4">
			  <div class="row">
			    <div class="main">

			    <div class="well">
			    	<p>anda akan memesan perjanjian bertemu dengan</p>
			    	<h2 class="text-center">
			    		<?=$nama_dokter;?>
			    	</h2>
			    	<h4 class="text-center"><strong>pada jam & tanggal</strong></h4>
			    	<h4 class="text-center">
			    		<?=$jam;?>
			    	</h4>

			    	<h4 class="text-center">
			    		<?=$tanggal;?>
			    	</h4>
			    	<h5 class="text-center">
			    		<?=$alamat_klinik;?>
			    	</h5>

			    </div>

			    
			    <div class="row">
			    	<div class="col-md-12">
				    	<div class="pull-left">
				    	<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> Kembali Pilih Jadwal</a>
				    	</div>
				    	<div class="pull-right">
						<button type="submit" class="btn btn-success">Checkout <span class="glyphicon glyphicon-chevron-right"></span></button>			    		
				    	<!-- <a href="#" class="btn btn-success">Checkout <span class="glyphicon glyphicon-chevron-right"></span> </a> -->
				    	</div>
			    	</div>
			    </div>


			    </div>
			  </div>
			</div>

		</div>
		</form>
	</div>


</body>
</html>