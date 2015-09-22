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
<?php if(validation_errors()!=false){?>
<div class="alert alert-danger alert-dismissable alert-fixed-top">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <?=validation_errors();?>
</div>
<?php } ?>

<?php if(isset($error)){?>
<div class="alert alert-warning alert-dismissable alert-fixed-top">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <?=$error;?>
</div>
<?php } ?>

<?php if(isset($message)){?>
<div class="alert alert-success alert-dismissable alert-fixed-top">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <?=$message;?>
</div>
<?php } ?>

<div id="wrap">
    
     <!-- Begin Body -->
     <div class="container">
       <div class="row">
         
         <!--Sidebar-->
         <div class="col-md-3" id="leftCol">
            <div class="row">
              <div class="col-md-12">
                <a href="#x" class="thumbnail"><img src="http://placehold.it/250x250&text=foto dokter" alt="Image" /></a>
              </div>
            </div>
            <div class="row">
              <div class="panel panel-default">
                <div class="panel-heading">Menu</div>
                <div class="panel-body">
                  <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                    <li><a href="#bantuan" data-toggle="tab">Penjadwalan</a></li>
                    <li><a href="#usulkan" data-toggle="tab">Usulkan Fitur</a></li>
                  </ul>
                </div>

              </div>
            </div>
                 
           

        <!--Main-->
         </div>  
           <div class="col-md-9">
              
              <div class="panel panel-default">
                <div class="panel-heading">
                  <ul class="nav nav-pills">
                      <li class="active"><a href="#info" data-toggle="tab">Settings</a>
                      </li>
                      <li><a href="#review" data-toggle="tab">Atur penjadwalan</a>
                      </li>
                  </ul>
                </div>
                <div class="panel-body">
                  <?php echo form_open_multipart('dokter/update',array('class'=>'form-horizontal'));?>
                    <fieldset>
                        <!-- Form Name -->
                        <legend>Setting</legend>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nama_dokter">Nama Lengkap</label>
                            <div class="col-md-6">
                                <input id="nama_dokter" name="nama_dokter" placeholder="Nama Lengkap" class="form-control input-md" type="text" value="<?php echo ($form_value['nama_dokter'] ? $form_value['nama_dokter'] : set_value('nama_dokter'))?>">
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email_dokter">Email</label>
                            <div class="col-md-6">
                                <input id="email_dokter" name="email_dokter" placeholder="Email" class="form-control input-md" type="text" value="<?php echo ($form_value['email_dokter'] ? $form_value['email_dokter'] : set_value('email_dokter'))?>">
                            </div>
                        </div>
                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password_dokter">New Password</label>
                            <div class="col-md-6">
                                <input id="password_dokter" name="password_dokter" placeholder="New Password" class="form-control input-md" type="password"/>
                                <span class="help-block">Masukan password baru jika ingin mengganti password lama, jika tidak ingin, biarkan kosong.</span>
                            </div>
                        </div>
                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="confirm_password">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="form-control input-md" type="password"/>
                                <span class="help-block">Masukan kembali password baru.</span>
                            </div>
                        </div>
                        <!-- Textarea -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="statement">Personal Statement</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="statement" name="statement" ><?php echo ($form_value['statement'] ? $form_value['statement'] : set_value('statement'))?></textarea>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="alias">Alias</label>
                            <div class="col-md-6">
                                <input id="alias" name="alias" placeholder="alias" class="form-control input-md" type="text" value="<?php echo ($form_value['alias'] ? $form_value['alias'] : set_value('alias'))?>"> 
                                <span class="help-block">alias digunakan untuk menunjukan halaman profil anda seperti username di twitter. Sehingga halaman anda bisa diakses dengan alamat http://adadokter.com/dokter/[alias]</span> 
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="profile_pic">Profile Picture</label>
                            <div class="col-md-6">

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                    <!-- <img data-src="holder.js/100%x100%" alt="200px X 200px"> -->
                                    <img src="<?php echo ($form_value['profile_pic'] ? $form_value['profile_pic'] : set_value('profile_pic'))?>" alt="200px X 200px">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 300px;"></div>
                                  <div>
                                    <span class="btn btn-default btn-file">
                                      <span class="fileinput-new">Select image</span>
                                      <span class="fileinput-exists">Change</span>
                                      <input type="file" name="profile_pic">
                                    </span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>
                                </div>

                                <!-- <input id="profile_pic" name="profile_pic" placeholder="Profile picture" type="file"/> -->
                                <span class="help-block">Profile picture berukuran maksimal 200x200 pixel. Isi dengan file profile picture untuk mengganti profile picture yang sudah ada atau biarkan kosong jika tidak ingin mengganti profile picture.</span>
                            </div>
                        </div>
                        <!-- COBA FORM -->
                        <!-- <div class="form-group">
                          <label class="col-md-4">Coba</label>
                          <div class="col-md-6">
                            <input type="file" name="profile_pic"/>
                          </div>
                        </div> -->
                        <!-- Multiple Radios -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="metode">Metode Urutan</label>
                            <div class="col-md-6">
                                <div class="radio">
                                    <label for="metode-0">
                                        <input name="metode" id="metode-0" value="request" type="radio" <?php echo ($form_value['metode_antrian'] == 'request' ? 'checked="checked"' : set_radio('metode','request',true))?>>Request</label>
                                </div>
                                <div class="radio">
                                    <label for="metode-1">
                                        <input name="metode" id="metode-1" value="antrian" type="radio" <?php echo ($form_value['metode_antrian'] == 'antrian' ? 'checked="checked"' : set_radio('metode','antrian'))?>>Antrian</label>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="submit"></label>
                          <div class="col-md-4">
                            <button id="submit" name="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                    </fieldset>
                  <?php echo form_close();?>
                  </div>
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
