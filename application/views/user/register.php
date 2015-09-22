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

	<div id="register" class="container">
		<div class="col-md-4 col-md-offset-4">
		  <div class="row">
		    <div class="main">
		      <!-- <h3>You can register here or <a id="login_link" href="#">login</a></h3> -->
		      <!-- <div class="col-md-offset-3"><img src="http://placehold.it/140x140&text=twitter+photo+profile" class="img-circle pagination-centered"></div> -->
		      <div class="alert alert-info alert-dismissable" id="warning_message" sytle="display:none;">
		      	<button type="button" class="close" onclick="$('.alert').hide();" aria-hidden="true">&times;</button>
		      	<p>Kami membutuhkan informasi tambahan lainya silahkan lengkapi form berikut untuk melengkapkan registrasi.
		      		Kami juga akan mengirimkan sms berisi kode 6 digit aktivasi untuk memverifikasi anda. Kami tidak akan
		      		menyebarkan nomor handphone anda. Silahkan baca Terms of service disini : <a href="#">TOS</a>
		      	</p>
		      </div>
		      <form id="registration_form" role="form" method="POST" action="do_register">
		      	<div class="form-group">
		          <label for="nama">Nama Lengkap</label>
		          <input type="text" class="form-control" id="nama" name="nama">
		        </div>
		        <div class="form-group">
		          <label for="email">Email</label>
		          <input type="text" class="form-control" id="email" name="email">
		        </div>
		        <div class="form-group">
		          <label for="no_hp">Nomor Handphone</label>
		          <div class="input-group">
		          <span class="input-group-addon">+62</span>
		          <input type="text" class="form-control" id="no_hp" name="no_hp">
		          </div>
		        </div>
		        <button type="submit" class="btn btn btn-primary">
		          Complete Registration
		        </button>
		      </form>
		    </div>
		  </div>
		</div>
	</div>


	<!-- <div id="phone_verification" class="container">
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
	</div> -->

	
	<!--
	<script type="text/javascript">
	$(document).ready(function(){
		
		jQuery.validator.addMethod(
			"exactlength", 
			function(value, element, param) {
		 		return this.optional(element) || value.length == param;
			}
			, jQuery.format("Please enter exactly {0} characters.")
		);

		var a=window.location.hash;
		if(a=="#phone_verification"){
			$('#register').hide();
			$('#phone_update').hide();
		}else if(a=="#register"){
			$('#phone_update').hide();
			$('#phone_verification').hide();
		}else if(a=="#phone_update"){
			$('#register').hide();
			$('#phone_verification').hide();
		}else{
			$('#phone_update').hide();
			$('#phone_verification').hide();
		}
		
		
		

		$('#registration_form').validate({
		rules:{
			email:{email:true,required:true},
			nama:{required:true},
			no_hp:{required:true,digits:true}
		},
		messages:{
			email:{required:"Email harus diisi"},
			nama:{required:"Nama harus diisi"},
			no_hp:{digits:"Harus berisi angka saja tanpa +62"}
		},
		tooltip_options:{
			email:{trigger:'focus',placement:'auto'},
			password:{trigger:'focus',placement:'auto'},
			no_hp:{trigger:'focus',placement:'auto'}
		},
		submitHandler:function(form){
			$.ajax({
				url:form.action,
				type:form.method,
				data:$(form).serialize(),
				success:function(result){
					console.log(result);
					if(result.status!='success'){
						console.log(JSON.stringify(result));
						$('#warning_message').show();
						$('#warning_message').removeClass("alert-info").addClass('alert-danger');
						$('#warning_message > p').text("something error happen, Contact the administrator");
					}else{
						$('#register').fadeOut(200,function(){
							$('#phone_verification').fadeIn(200);	
						});	
					}					
				}
			});
		}

		});

		$('#verification_form').validate({
			rules:{
				kode_verifikasi:{required:true,exactlength:6}
			},
			submitHandler:function(form){
				$.ajax({
					url:form.action,
					type:form.method,
					data:$(form).serialize(),
					success:function(result){
						console.log(result);
						if(result.status!='success'){
							$('#warning_message').removeClass("alert-info").addClass('alert-danger');
							$('#warning_message > p').text("something error happen, Contact the administrator");
							alert('kode verifikasi tak sesuai tambahkan error handling');
						}else{
							alert('handling untuk jika succes, location change to dashboard');
							
						}
					}
				});
			}
		});

		$('#phone_update_form').validate({
			rules:{
				no_hp_update:{required:true,digits:true}
			},
			submitHandler:function(form){
				$.ajax({
					url:form.action,
					type:'GET',
					data:$(form).serialize(),
					success:function(result){
						console.log(result);
						if(result.status!='success'){
							
						}else{
							$('#phone_update').fadeOut(200,function(){
								$('#phone_verification').fadeIn(200);
							});
						}

					}
				});
				console.log(JSON.stringify($(form).serialize()));

			}
		});
		
	});



	

	
	</script>-->
</body>
</html>