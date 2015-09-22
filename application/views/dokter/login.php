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
		      <h3>Please Log In, or <a id="sign_up_link" href="#">Sign Up</a></h3>
		     <?php echo form_open('dokter/do_login',array('role'=>'form'));?> 
		     	<div class="row">
		      	<?php if($error=$this->session->flashdata('error')){
		      		?>
		      		<div class="alert alert-danger"><?php echo $error;?></div>
		      		<?php
		      	}?>
		      	</div>
		        <div class="form-group">
		          <label for="email">Email</label>
		          <input type="text" class="form-control" id="email" name="email" value="<?php set_value('email')?>">
		        </div>
		        <div class="form-group">
		          <a class="pull-right" href="#">Forgot password?</a>
		          <label for="password">Password</label>
		          <input type="password" class="form-control" id="password" name="password">
		        </div>
		        <div class="checkbox pull-right">
		          <label>
		            <input type="checkbox">
		            Remember me </label>
		        </div>
		        <button type="submit" class="btn btn btn-primary">
		          Log In
		        </button>
		      <?php echo form_close();?>
		    </div>
		  </div>
		</div>
	</div>

	<div id="register" class="container">
		<div class="col-md-4 col-md-offset-4">
		  <div class="row">
		    <div class="main">
		      <h3>You can register here or <a id="login_link" href="#">login</a></h3>
		      <form id="registration_form" role="form" method="POST" action="do_register">
		      	<div class="form-group">
		          <label for="nama">Nama</label>
		          <input type="text" class="form-control" id="nama" name="nama">
		        </div>
		        <div class="form-group">
		          <label for="email">Email</label>
		          <input type="text" class="form-control" id="email" name="email">
		        </div>
		        <div class="form-group">
		          <label for="confirm_email">Confirm Email</label>
		          <input type="text" class="form-control" id="confirm_email" name="confirm_email">
		        </div>
		        <div class="form-group">		          
		          <label for="password">Password</label>
		          <input type="password" class="form-control" id="password" name="password">
		        </div>
		        <div class="form-group">		          
		          <label for="confirm_password">Confirm Password</label>
		          <input type="password" class="form-control" id="confirm_password" name="confirm_password">
		        </div>
		        <button type="submit" class="btn btn btn-primary">
		          Register
		        </button>
		      </form>
		    </div>
		  </div>
		</div>
	</div>


	
	<script type="text/javascript">
	$(document).ready(function(){
		var a=window.location.hash;
		if(a=="#register"){
			$('#my_login').hide();
		}else{
			$('#register').hide();
		}
		$('#phone_register').hide();
		//alert(a=="#register");
		$('#sign_up_link').click(function(){
			$('#my_login').fadeOut(400,function(){
				$('#register').fadeIn(500);
			});			
			return false;
		});
		$('#login_link').click(function(){
			$('#register').fadeOut(400,function(){
				$('#my_login').fadeIn(500);
			});			
			return false;
		});

		$('#registration_form').validate({
		rules:{
			email:{email:true},
			confirm_email:{email:true,equalTo:"#email"},
			password:{minlength:6},
			confirm_password:{minlength:6,equalTo:"#password"}
		},
		messages:{
			confirm_email:{equalTo:"Seems it different with your email"},
			confirm_password:{equalTo:"Seems it different with your password"},
		},
		tooltip_options:{
			email:{trigger:'focus',placement:'auto'},
			confirm_email:{trigger:'focus',placement:'auto'},
			password:{trigger:'focus',placement:'auto'},
			confirm_password:{trigger:'focus',placement:'auto'}	
		},
		submitHandler:function(form){
			$.ajax({
				url:form.action,
				type:form.method,
				data:$(form).serialize(),
				success:function(result){
					alert($(form).serialize())
					alert(result);
				}
			});
		}

		});
	});



	

	// $('#registration_form').submit(function(){

			
	// });
	</script>
</body>
</html>