<?php $boot_url = lib_url()."bootstrap";?>
<?php $jquery_url = lib_url()."jquery/jquery.js"?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Doctor app</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="doctor booking">
    <meta name="author" content="fawwaz muhammad">
    <!-- CSS -->
    <link href="<?php echo $boot_url;?>/css/bootstrap.readable.min.css" rel="stylesheet">
    <link href="<?php echo $boot_url;?>/css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo $boot_url;?>/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $boot_url;?>/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $boot_url;?>/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $boot_url;?>/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="<?php echo $boot_url;?>/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="<?php echo $boot_url;?>/ico/favicon.png">
    <?= $_styles ?>
  </head>

  <body>
    <?= $header ?>
    <?= $content ?>
    <?= $sidebar ?>
    <?= $footer ?>

    <!-- Part 1: Wrap all page content here -->
    <div id="wrap">

      <!-- Begin page content -->
      <div class="container">
        

        <div class="page-header">
          <h1>Ceritanya aplikasi dokter ... </h1>
        </div>
        <p class="lead">Pokoknya ini cuma dummy text doang lumayan bagus lah buat preview awal dari website ....</p>
        <p>Use <a href="./sticky-footer-navbar.html">websitenya</a> rapih kan ? mudah-mudahan berkah dibikin pas iedul adha :D.</p>
      
      </div>
      <div id="push"></div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="muted credit">Example courtesy <a href="http://martinbean.co.uk">Martin Bean</a> and <a href="http://ryanfait.com/sticky-footer/">Ryan Fait</a>.</p>
      </div>
    </div>



    <!-- Javascript javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $jquery_url;?>"></script>
    <script src="<?php echo $boot_url;?>/js/bootstrap.min.js"></script>
    <?= $_scripts ?>
  </body>
</html>
