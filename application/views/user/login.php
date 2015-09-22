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

	<div id="my_login" class="container">
		<div class="col-md-4 col-md-offset-4">
		  <div class="row">
		    <div class="main">
		    <?= $this->session->flashdata('message');?>
		      <?php if($message = $this->session->flashdata('message')){?>
		      	<div class="alert alert-warning">
		      		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      		<strong>Warning!</strong> <?php echo $message;?>.
		      	</div>
		      <?php }?>
		      <h4>Please Log In, using one of theese account<a id="sign_up_link" href="#"></a></h4>
		      <div class="row">
		        <div class="col-xs-6 col-sm-6 col-md-6">
		          <a href="<?php echo base_url().'user/twitter_login';?>" class="btn btn-lg btn-info btn-block">Twitter</a>
		        </div>
		        <div class="col-xs-6 col-sm-6 col-md-6">
		          <a href="<?=base_url('user/fb_login')?>" class="btn btn-lg btn-primary btn-block">Facebook</a>
		          <!-- <a href="<?=$fb_login_url;?>" class="btn btn-lg btn-primary btn-block">Facebook</a> -->
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>


</body>
</html>