<div class="row" class="my_header">
  <header class="navbar navbar-default navbar-static-top yamm" role="banner">
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
           <a href="#">Topik & Artikel</a>
         </li>
         <li>
          <a href="<?=base_url('site/direktori_dokter')?>">Direktori</a>
         </li>
         <li>
           <a href="#">Tanya!</a>
         </li>
         <li>
           <a href="#">More .. (How it works) & Download Apps </a>
         </li>
       </ul>
       <!-- <div class="col-sm-3 col-md-5 pull-right">
        <form class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
       </div> -->
       <ul class="nav navbar-nav pull-right">
        <li>
          <a class="pull-right" data-placement="bottom" data-toggle="popover" data-title="Login/Register" data-container="body" type="button" data-html="true" id="login">Login</a>
        </li>
          <div id="popover-content" class="hide">
              <p>Simply you just need one click to sign in / register</p>
                <a href="<?php echo base_url().'user/twitter_login';?>" class="btn btn-sm btn-info btn-block"> Twitter</a>
              <hr>
          </div>
       </ul>
     </nav>
   </div>
 </header>
</div>
<div class="row">
  <div id="gmap_wrapper">
    <div id="gmap">
    </div>
  </div>
</div>