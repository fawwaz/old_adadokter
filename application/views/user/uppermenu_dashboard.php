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
        <a href="<?=base_url();?>" class="navbar-brand">Ada<strong>Dokter</strong></a>
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
            <a href="#"> supporting sys</a>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">          
          <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Register / Sign In </a></li>
          <li><a href="#"><img src="<?=$foto_user;?>" id="foto_user_kecil"></a></li>
          <li>
            <div class="btn-group navbar-btn">
              <button class="btn btn-danger"><?=$nama_user;?></button>
              <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle"><span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="<?=base_url().'user/dashboard'?>">Dashboard</a></li>
                <li><a href="<?=base_url().'user/settings'?>">Settings</a></li>
                <!-- <li><a href="<?=base_url().'user/logout'?>">Help Support</a></li> -->
                <!-- <li><a href="#">Usulkan Fitur</a></li> -->
                <li class="divider"></li>
                <li><a href="<?=base_url().'user/logout';?>">Logout</a></li>
                <!-- li>
                  <div class="btn-group navbar-btn">
                    <a href="#" class="btn btn-info"><span class="glyphicon glyphicon-envelope"></span> Register / Sign In </a>
                    <button class="btn btn-info"><span class="glyphicon glyphicon-envelope"></span> Login / Register</button>
                  </div>
                </li> -->
              </ul>
            </div>
          </li>
        </ul>

      </nav>
    </div>
  </header>
</div>