			<?php if($error=$this->session->flashdata('error')){
	      		?>
	      		<div class="alert alert-danger alert-fixed-top alert-dismissable">
	      			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	      			<?php echo $error;?>
	      		</div>
      		<?php
	      	}?>
			<div id="register" class="container">
				<div class="col-md-6 col-md-offset-3">
				  <div class="row">
				    <div class="main">
				      <h3>You can register here or <a id="login_link" href="#">login</a></h3>
				      <!-- <form id="registration_form" role="form" method="POST" action="<?=base_url().'dokter/'?>register"> -->
				      <?= form_open('dokter/register',array('role'=>'form','method'=>'post'))?>
				      	<p>Kami akan menghubungi anda dalam waktu dekat, silahkan tinggalkan kontak informasi anda, kami tidak akan menyebarkan informasi pribadi anda sebagaimana dalam Terms of Service</p>
				      	<div class="form-group">
				          <label for="nama_calon">Nama </label>
				          <input type="text" class="form-control" id="nama_calon" name="nama_calon">
				        </div>
				        <div class="form-group">
				          <label for="email_calon">Email</label>
				          <input type="text" class="form-control" id="email_calon" name="email_calon">
				        </div>
				        <div class="form-group">
				          <label for="alamat_calon">Alamat yang bisa didatangi</label>
				          <textarea class="form-control" id="alamat_calon" name="alamat_calon"></textarea>
				          <!-- <input type="text" > -->
				        </div>
				        <div class="form-group">		          
				          <label for="no_hp_calon">Nomor Handphone</label>
				          <input type="text" class="form-control" id="no_hp_calon" name="no_hp_calon">
				        </div>
				        <div class="form-group">		          
				          <label for="no_hp_calon">Masukan kode Recaptcha berikut</label>
				          <?=$recaptcha_html?>
				        </div>
				        <button type="submit" class="btn btn btn-primary">
				          Register
				        </button>
				      </form>
				    </div>
				  </div>
				</div>
			</div>