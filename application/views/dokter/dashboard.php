<!DOCTYPE HTML>
<html>
<head>
  <title></title>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
  <!-- Latest compiled and minified CSS -->
  <link href='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/fullcalendar/fullcalendar.css' rel='stylesheet' />
  <link href='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.0.1-p7/css/bootstrap.min.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
  <!-- Optional theme -->
  

  <!-- Latest compiled and minified JavaScript -->
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.min.js"></script>
  
  <script src='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/fullcalendar/fullcalendar.min.js'></script>
  <script src="<?php echo js_url().'jquery-validation-bootstrap.min.js';?>"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.5/gmaps.js"></script>
  <script src='<?php echo lib_url(); ?>maplace/maplace.js'></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.1.0/moment.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.1.0/langs.js"></script>
     <!-- CSS code from Bootply.com editor -->
        
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
        min-height: 100%;
        height: auto !important;
        height: 100%;
         Negative indent footer by it's height 
        /*margin: 0 auto -60px;*/
        margin:0px;
        position: relative;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #eee;
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
      
      .jumbotron {
        margin-top:-20px;
        padding: 0px;
      }
      #gmap_wrapper{
        margin-top: -20px;
        z-index: -9px;
        height: 100px;
      }
      #gmap{
        z-index: -9;
        top: 0px;
        height: 200px;
      }

    </style>
    </head>
<body> 
<div class="row" class="my_header">
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
           <a href="#">Edit</a>
         </li>
         <li>
           <a href="#">Visualize</a>
         </li>
         <li>
           <a href="#">Prototype</a>
         </li>
       </ul>
     </nav>
   </div>
 </header>
</div>    
<div id="gmap_wrapper">
  <!-- <div id="gmap">
  </div> -->
  <div id="gmap">
    <img src="http://placehold.it/1366x250&text=test+gambar">
  </div>
</div>
<div id="wrap">
    
     <!-- Begin Body -->
     <div class="container">
       <div class="row">
         
         <!--Sidebar-->
         <div class="col-md-3" id="leftCol">
            <div class="row">
              <div class="col-md-12">
                <!-- <a href="#x" class="thumbnail"><img src="http://placehold.it/250x250&text=foto dokter" alt="Image" /></a> -->
                <a href="#x" class="thumbnail"><img src="<?=$info_dokter['profile_pic']?>" alt="Image" /></a>
              </div>
            </div>
            <div class="row">
              <div class="panel panel-default">
                <div class="panel-heading">Menu</div>
                <div class="panel-body">
                  <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
                    <li><a href="<?=base_url().'dokter/update'?>">Settings</a></li>
                    <!-- <li><a href="#setting" data-toggle="tab">Settings</a></li> -->
                    <li><a href="#bantuan" data-toggle="tab">Penjadwalan</a></li>
                    <li><a href="#usulkan" data-toggle="tab">Usulkan Fitur</a></li>
                  </ul>
                </div>

              </div>
            </div>
                 
           

        <!--Main-->
         </div>  
           <div class="col-md-9">
              <div class="tab-content">
                
                <div class="tab-pane active" id="dashboard">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <ul class="nav nav-pills">
                          <li class="active"><a href="#info" data-toggle="tab">Pasien Saat ini</a>
                          </li>
                          <li><a href="#review" data-toggle="tab">List Pasien Hari ini</a>
                          </li>
                      </ul>
                    </div>
                    <div class="panel-body">
                      <h5>Silahkan konfirmasi</h5>
                      <p></p>
                      <div class="tab-content">

                        <div class="tab-pane active" id="info">
                          <table class="table table-bordered">
                            <tr>
                                <td>Nama Pasien</td>
                                <td>Pasien</td>
                            </tr>
                            <tr>
                                <td>No Handphone</td>
                                <td>+62123567890</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center"><a href="#" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-play"></span> Pasien Selanjutnya</a></td>
                            </tr>
                          </table>
                        </div>

                        <div class="tab-pane" id="review">
                          
                          <div class="alert alert-warning">
                            <p>Berikut ini informasi mengenai pasien yang akan anda layani hari ini.</p>
                          </div>
                          <!-- PatientRequest -->
                          <!-- <div class="col-md-12"> -->

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pasien</th>
                                        <th>Nomor Hp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $i=1; foreach($today_antrian as $t){?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$t['nama_pasien']?></td>
                                        <td><?=$t['no_hp']?></td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                          <!--/Today Patient-->
                      </div>
                    </div>
                  </div>
                  
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>Incoming Patient Request</h4>
                    </div>
                    <div class="panel-body">
                      <div class="alert alert-success">
                        <p>Berikut ini Request pasien yang meminta layanan anda, untuk mengkonfirmasi anda bersedia melayani mereka silahkan tekan tombol konfirmasi</p>
                        <strong>Jangan lupa harus ada yang ditambahin hidden dan divalidasi diupdate menggunakan jquery setiap interval sekian menit misal id </strong>
                      </div>
                      <h2>Antrian</h2><hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Nomor Hp</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Terima</th>
                                    <th>Tolak</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $i=1; foreach($unconfirmed as $u){?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$u['nama_pasien']?></td>
                                    <td><?=$u['no_hp']?></td>
                                    <td><?=$u['waktu_pemesanan']?></td>
                                    <td><a href="confirm_antrian?id_antrian<?=$u['id_antrian']?>" id="terima_antrian" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-ok"></span> Terima</a></td>
                                    <td><a href="delete_antrian?id_antrian<?=$u['id_antrian']?>" id="tolak_antrian" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> Terima</a></td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                      <!-- /PatientRequest -->
                      <h2>Permintaan Khusus</h2>
                      <hr>   
                      <table class="table">
                        <tr>
                          <td>
                            <h3>Permintaan Khusus
                            <div class="pull-right">
                            <div class="btn-group">
                              <button id="terima_request" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-ok"></span> Terima</button>
                              <button id="tolak_request" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> Tolak</button>
                            </div>
                            </div>
                            </h3>
                          </td>
                        </tr>
                      </table>
                      <form method="post" id="request_form_confirmation">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Nomor Hp</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $i=1; foreach($req_list as $r){?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$r['nama_pasien']?> </td>
                                    <td><?=$r['no_hp']?></td>
                                    <td><?=$r['tanggal_jam']?></td>
                                    <td><div class="checkbox"><input type="checkbox" value="<?=$r['id_request']?>" style="text-align:center"></div></td>
                                    <!-- <td><a href="confirm_request?id_request<?=$r['id_request']?>" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-ok"></span> Terima</a></td> -->
                                    <!-- <td><a href="delete_request?id_request<?=$r['id_request']?>" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> Tolak</a></td> -->
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                      </form>

                    </div>
                  </div>
                </div>


                <div class="tab-pane" id="settings">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      Setting
                    </div>
                    <div class="panel-body">
                      SETTING DIGANTI JADI PINDAH KE SETTINGS
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="scheduling">
                  <div class="panel panel-default">
                    <div class="panel panel-heading">
                    </div>
                    <div class="panel panel-body">
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="usulkan">
                  usulan
                </div>

            </div>
           </div> 
         </div>
        <!--/Main-->

     </div>
        


      <div class="push"></div>
</div>

<div id="footer">
  <div class="container">
    <p class="muted credit">This is a sticky footer</p>
  </div>
</div> 
  <!-- <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
 <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.0.1-p7/js/bootstrap.min.js"></script>
 <script type='text/javascript' src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
 <!-- JavaScript jQuery code from Bootply.com editor -->  
 <script type='text/javascript'>
   $(document).ready(function() {
    //$('#calendar').fullcalendar()
   });
 </script>
 <script type="text/javascript">
 $('#terima_request').click(function(){
  var id_requests = $('#request_form_confirmation input:checkbox:checked').map(function(){ return $(this).val();}).get();
  // pupulate the data dfirst

  $.ajax({
     url: 'http://localhost/dokter/test/confirm_request',
     data: {
      id_dokter : <?=$info_dokter['id_dokter'];?>,
      action : 'terima',
      request_ids : id_requests
     },
     cache: false,
     error: function (jqXHR, textStatus, errorThrown) {
              console.log("Aya error");
              console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);
     },
     success: function (data) {
        alert(data);
     },
      
  });
 });
 $('#tolak_request').click(function(){

 });
 </script>

 <script type="text/javascript"> 
 var map = new GMaps({
    el: '#gmap2',
    lat: 51.5073346,
    lng: -0.1276831,
    zoom: 12,
    zoomControl : true,
    zoomControlOpt: {
        style : 'SMALL',
        position: 'TOP_LEFT'
    },
    panControl : true,
  });
 $(document).ready(function(){
  var gmap_wrap   = $('#gmap_wrapper');
  var gmap        = $('#gmap');
  var gmap_wrap_h = gmap_wrap.height();
  var gmap_h      = gmap.height();
  // $('#on_map_button').click(function(){
  //   gmap_wrap.animate({height:gmap_wrap_h+400},200);
  //   gmap.animate({height:gmap_h+400},200);
  // });

 // $('#on_map_button').click(function(){
 //    if(gmap.hasClass('large_height')){
 //      gmap_wrap.animate({height:gmap_wrap_h+400},200,function(){
 //        gmap_wrap.removeClass('large_height');
 //      });
 //      gmap.animate({height:gmap_h+400},200,function(){
 //        gmap.removeClass('large_height');
 //      });
 //    }else{
 //      gmap_wrap.animate({height:gmap_wrap_h},200,function(){
 //        gmap_wrap.addClass('large_height');
 //      });
 //      gmap.animate({height:gmap_h},200,function(){
 //        gmap.addClass('large_height');
 //      });
 //    }
 //  });
 });

 </script>




 <script type="text/javascript">

      $(document).ready(function() {
      
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            right: 'month,basicWeek,agendaDay'
          },
          minTime:'4:00',
          maxTime:'22:00',
          defaultView: 'agendaWeek',
          editable: false,
          height:600,
          events: function(starts,ends,call_ing){
            
            $.ajax({
                url: 'http://localhost/dokter/test/tele',
                data: {
                    start: Math.round(starts.getTime() / 1000),
                    end: Math.round(ends.getTime() / 1000)
                },
                cache: false,

                beforeSend: function () {
                    console.log("Loading");
                },

                error: function (jqXHR, textStatus, errorThrown) {
                    console.log("Aya error");
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                },

                success: function (data) {
                    console.log('Success');
                    //console.log(JSON.stringify(data));

                    var input=[];
                    
                    $.each(data,function(idx,val){
                      var s         = val.split("#");
                      var w         = s[1].split("-");
                      var tanggal   = s[0];
                      var awal_jam  = w[0];
                      var akhir_jam = w[1];
                      // var t_in      = Array();
                      //console.log("tgl"+s[0]+"awal"+w[0]+"akhir"+w[1]);
                      t_in          = divide_time(tanggal,awal_jam,akhir_jam,30);
                      input = input.concat(t_in);
                      // console.log(JSON.stringify(input.concat(t_in)));
                      //console.log("====");
                      //input.concat(t_in);
                    });

                    //console.log(JSON.stringify(input));
                    call_ing(input);
                },

                complete: function () {
                    console.log('Finished all tasks');
                }
            });

          },
          eventClick:function(calEvent,jsEvent,view){
            var jdwl= calEvent.start;
            var b = moment(calEvent.start);
            b.lang('id');

            $('#input_jadwal').val(b.format('LLLL'));
            $('#req_jdwl').val(moment(calEvent.start).format('YYYY-MM-DD HH:mm:ss'));
            //console.log(calEvent+"JS EVENT : "+jsEvent+" view " + view);
            //console.log(JSON.stringify(calEvent));
          }
        });
        


         function divide_time(tgl,start,end,interval){
           var output = new Array();
           var a = tgl+" "+start;
           var b = tgl+" "+end;
           var time = moment(a,'YYYY-MM-DD HH:mm');
           var end = moment(b,'YYYY-MM-DD HH:mm');
           
           while(time<end){
             var time_starts=null;
             var ends=null;
             time_starts = moment(time);
             time_ends = moment(time_starts).add(interval,'minutes');
           
             if(time_ends>end){
               time_ends=moment(end);
             }

             var temp = new Object();
             temp.title = 'Open';
             temp.start = time_starts.format('YYYY-MM-DD HH:mm');
             temp.end = time_ends.format('YYYY-MM-DD HH:mm');
             temp.allDay =false;

             output.push(temp);
             time =moment(time_ends);
           }
           return output;
        }



      });
      
    </script>
</body>
</html>
