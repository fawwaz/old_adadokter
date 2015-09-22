	<div id="my_login" class="container">
		<div class="col-md-4 col-md-offset-4">
		  <div class="row">
		    <div class="main">
		      <h3>Please Log In, or <a id="sign_up_link" href="#">Sign Up</a></h3>
		     <?php echo form_open('klinik/login',array('role'=>'form'));?> 
		     	<div class="row">
		      	<?php if($error=$this->session->flashdata('error')){
		      		?>
		      		<div class="alert alert-danger alert-fixed-top alert-dismissable">
		      			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      			<?php echo $error;?>
		      		</div>
		      		<?php
		      	}?>
		      	<?php if($error){
		      		?>
		      		<div class="alert alert-danger alert-fixed-top alert-dismissable">
		      			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      			<?php echo $error;?>
		      		</div>
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