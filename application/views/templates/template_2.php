<!DOCTYPE HTML>
<html>
<head>
  <title>AdaDokter</title>
    <!-- Latest compiled and minified CSS -->
    <link href='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/fullcalendar/fullcalendar.css' rel='stylesheet' />
    <link href='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.0.1-p7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <?= $_styles ?>

    </head>
<body> 
<?=$uppermenu?>
<div id="wrap">    
     <!-- Begin Body -->
     <div class="container">
       <!-- <div class="row"> -->
          
            <?=$content?>

         <!-- </div> -->
      </div>      

      <div class="push"></div>
</div>
<div class="row">
  <div id="footer">
    <div class="container">
      <p class="muted credit">About Us | Anda dokter ? | Blog | Sitemap | Help | Privacy Policy | Terms of Use | Site Map | Careers | Contact Us | Advertise With Us</p>
      <!-- <p class="muted credit">This is a sticky footer</p> -->
    </div>
  </div> 
</div>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.0.1-p7/js/bootstrap.min.js"></script>
  <!-- // <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script> -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.min.js"></script>
  <script src='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/fullcalendar/fullcalendar.min.js'></script>
  <script src="<?php echo js_url().'jquery-validation-bootstrap.min.js';?>"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.5/gmaps.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.1.0/moment.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.1.0/langs.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.0.0/bootbox.min.js"></script>
  <!-- <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->  
  <!-- JavaScript jQuery code from Bootply.com editor -->  
  <?= $_scripts ?>
    
 
</body>

</html>
