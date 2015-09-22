<?php //$boot_url = asset_url()."libs/bootstrap";?>
<?php //$jquery_url = asset_url()."libs/jquery";?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Sticky footer &middot; Twitter Bootstrap</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
<!-- Latest compiled and minified CSS -->
<!-- <link href='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' /> -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

<!-- Optional theme -->


<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.min.js"></script>

<!--<script src='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/fullcalendar/fullcalendar.min.js'></script>
<script src="<?php echo js_url().'jquery-validation-bootstrap.min.js';?>"></script>-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.5/gmaps.js"></script>
<!--<script src='<?php echo lib_url(); ?>maplace/maplace.js'></script>-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.1.0/moment.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.1.0/langs.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.0.0/bootbox.min.js"></script>
<style type="text/css">

  /* Sticky footer styles
  -------------------------------------------------- */

  
  html,
  body {
    height: 100%;
    /* The html and body elements cannot have any padding or margin. */
  }

  /* Wrapper for page content to push down footer */
  #wrap {
    position: relative;
    min-height: 100%;
    height: auto;
    /* Negative indent footer by its height */
    margin: 0 auto -60px;
    /* Pad bottom by footer height */
    padding: 0 0 60px;
  }

  /* Set the fixed height of the footer here */
  #footer {
    height: 60px;
    background-color: #f5f5f5;
  }

  /* Lastly, apply responsive CSS fixes as necessary */
  @media (max-width: 767px) {
    #footer {
      margin-left: -20px;
      margin-right: -20px;
      padding-left: 20px;
      padding-right: 20px;
    }
  }

  /* Custom page CSS
  -------------------------------------------------- */
  /* Not required for template or sticky footer method. */

  .container {
    width: auto;
    max-width: 960px;
    
  }
  .container .credit {
    margin: 20px 0;
  }
  #leftCol .panel-body{
    font-size: 8pt;
  }
  #gmap_wrapper{
    /*position: relative;*/
    margin-top: -20px;
    z-index: -9px;
    height: 100px;
  }
  #gmap{
    /*position: relative;*/
    /*z-index: -9;*/
    top: 0px;
    height: 200px;
  }

  .normal-panel{
    font-size: 12pt;
  }
  #foto_user_kecil{
    height: 24px;
    width: 24px;
  }

</style>
<!-- Only applied to this pages -->
<style type="text/css">
	/*.jadwal{
    margin: 20px 0px 20px 0px;
		background-color: #ddd;
    -webkit-box-shadow: 10px 0px 10px  #fd2;
    -moz-box-shadow: 10px 0px 10px  #fd2;
    box-shadow: 0 9px 0px 0px #ddd, 0 -9px 0px 0px #ddd, 12px 0 15px -4px rgba(31, 73, 125, 0.8), -12px 0 15px -4px rgba(31, 73, 125, 0.8);
	}*/
</style>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="../assets/js/html5shiv.js"></script>
<![endif]-->

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                               <link rel="shortcut icon" href="../assets/ico/favicon.png">
</head>

<body>
<!-- header -->
<div class="row">
  <header class="navbar navbar-default navbar-static-top" role="banner">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="/" class="navbar-brand">Bootply</a>
      </div>
      <nav class="collapse navbar-collapse" role="navigation">
        <ul class="nav navbar-nav">
          <li>
            <a href="#">Get Started</a>
          </li>
          <li>
            <a href="#">Tanya Jawab</a>
          </li>
          <li>
            <a href="#">Jelajahi</a>
          </li>
          <li>
            <a href="#"> supporting sytem syalallaa</a>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">          
          <li><a href="#"> Logout</a> </li>
          <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Register / Sign In </a></li>
          <li><a href="#"><img src="<?=$foto_user;?>" id="foto_user_kecil"> </a></li>
          <li>
            <div class="btn-group navbar-btn">
              <button class="btn btn-danger"><?=$nama_user;?></button>
              <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle"><span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Help Support</a></li>
                <li class="divider"></li>
                <li><a href="<?=base_url().'user/logout';?>">Logout</a></li>
                <li>
                  <div class="btn-group navbar-btn">
                    <a href="#" class="btn btn-info"><span class="glyphicon glyphicon-envelope"></span> Register / Sign In </a>
                    <!-- <button class="btn btn-info"><span class="glyphicon glyphicon-envelope"></span> Login / Register</button> -->
                  </div>
                </li>
              </ul>
            </div>
          </li>
        </ul>

      </nav>
    </div>
  </header>
</div>
<!-- /header -->

<!-- Wrap all page content here -->
<div id="wrap">
	<div class="container">
		<!-- Sample ...  -->


    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Settings

            
          </div>
          <div class="panel-body">

            <form class="form-horizontal" action="<?=base_url().'user/do_update_profil'?>">
                <fieldset>
                    <!-- Form Name -->
                    <legend>Settings</legend>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nama_pasien">Nama Lengkap</label>
                        <div class="col-md-6">
                            <input id="nama_pasien" name="nama_pasien" placeholder="Nama" class="form-control input-md" required="" type="text">
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="email">Email</label>
                        <div class="col-md-6">
                            <input id="email" name="email" placeholder="Email" class="form-control input-md" required="" type="text">
                        </div>
                    </div>
                    <!-- Prepended text-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="no_hp">Nomor Handphone</label>
                        <div class="col-md-6">
                            <div class="input-group"> <span class="input-group-addon">+62</span>

                                <input id="no_hp" name="no_hp" class="form-control" placeholder="NoHP" type="text">
                            </div>
                            <p class="help-block">Cukup tuliskan angka.</p>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="submit">Submit</label>
                        <div class="col-md-4">
                            <button id="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>

          </div>
        </div>
      </div>
    </div>

    
    

    
    



	<div class="push"></div>
</div>
</div>
   
<div id="footer">
      <div class="container">
        <p class="muted credit">This is a sticky footer</p>
      </div>
</div>



<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="<?= $jquery_url?>/jquery.js"></script>-->
<!-- Latest compiled and minified JavaScript -->
<!--<script src="<?= $boot_url?>/js/bootstrap.min.js"></script>-->



</body>
</html>



