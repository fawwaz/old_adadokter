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

	<div id="phone_update" class="container">
		<div class="col-md-4 col-md-offset-4">
		  <div class="row">
		    <div class="main">
		      <h4>Ragu dengan nomor handphone yang pernah anda masukan ?</h4>
		      <p>Silahkan masukan nomor handphone</p>
		      <form id="phone_update_form" role="form" method="POST" action="do_update_phone_registration">
		        <div class="form-group">
		          <label for="no_hp_update">Nomor Handphone</label>
		          <div class="input-group">
		          <span class="input-group-addon">+62</span>
		          <input type="text" class="form-control" id="no_hp_update" name="no_hp_update">
		          </div>
		        </div>
		        <button type="submit" class="btn btn btn-primary">
		          Kirim Ulang
		        </button>
		      </form>
		    </div>
		  </div>
		</div>
	</div>

</body>
</html>