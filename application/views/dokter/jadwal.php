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
  <link rel="stylesheet" type="text/css" href="<?php echo lib_url().'timepicker/css/bootstrap-datetimepicker.min.css';?>">

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.min.js"></script>  
  <script src='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/fullcalendar/fullcalendar.min.js'></script>
  <script src="<?php echo js_url().'jquery-validation-bootstrap.min.js';?>"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.5/gmaps.js"></script>
  <script src='<?php echo lib_url(); ?>maplace/maplace.js'></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.0/moment-with-langs.min.js"></script>

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
                  <!-- PASTE BIN http://pastebin.com/ZQXHqkeE -->

                  <form  id="jadwals" class="form-horizontal" method="post" action="<?php echo base_url()?>dokter/update_jadwal">
                    <fieldset>

                    <!-- Form Name -->
                    <legend>Form Name</legend>
                    <p>Silahkan isi form dibawah ini untuk mengganti jadwal yang sudah pernah anda buat sebelumnya. Jika tidak ingin menggantinya biarkan kosong saja.
                    Silahkan isi waktu kerja dengan waktu kerja bersih tanpa waktu istirahat, Gunakan tombol tambah untuk menambah bagian waktu kerja anda. </p>
                    <p>Sebagai contoh jika anda bekerja dari pukul 07:00 pagi hingga pukul 17:00 sore, dan anda beristirahat
                    pada pukul 12:00 selama 1 jam. Maka anda dianggap memiliki 2 bagian waktu kerja, yaitu pukul 07:00 hingga pukul 12:00 dan pukul 13:00 hingga pukul 17:00.</p>
                    <p>Sehingga dalam kasus ini, anda harus menekan tombol tambah yang akan menghasilkan baris baru.
                    Kemudian mengisikan pukul 07:00 untuk kolom input "Dari pukul" pada baris pertama dan mengisikan pukul 12:00 untuk kolom input "Hingga pukul" di baris pertama.
                    Serta mengisikan pukul 13:00 pada kolom "Dari pukul" pada baris kedua, dan mengisikan pukul 17:00 pada kolom "Hingga pukul" pada baris kedua. 
                    Jika anda masih belum mengerti silahkan hubungi customer service kami. </p>
                    
                    <!-- Text input-->
                    <div id="entry1" class="form-group clonable">
                      <label class="col-md-3 control-label" for="kerja_from_1">Waktu Kerja 1</label>  
                      <div class="col-md-3">
                        <input name="kerja_from[]" placeholder="Dari pukul" class="form-control input-md" type="text" data-format="HH:mm">
                        <!-- <input id="istirahat_from_1" name="istirahat_from_1" placeholder="Dari pukul" class="form-control input-md" type="text"> -->
                      </div>
                      <div class="col-md-3">
                        <input name="kerja_to[]" placeholder="Hingga pukul" class="form-control input-md" type="text" data-format="HH:mm">
                        <!-- <input id="istirahat_to_1" name="waktu_istirahat_to_1" placeholder="Hingga pukul" class="form-control input-md" type="text"> -->
                      </div>
                      <a href="#" id="remove_kerja_1"class="btn btn-danger remove_button"><span class="glyphicon glyphicon-minus"></span> Remove</a>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8 col-md-offset-3">
                          <a id="add_button" href="#" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah bagian</a>
                      <!-- </div>
                      <div class="col-md-3 col-md-offset-3"> -->
                        <button id="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
                      </div>
                    </div>
                    
                    

                    </fieldset>
                  </form>

                  <div idx="jdwl_"></div>
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
    <!--  <script type="text/javascript" src="<?php echo lib_url().'timepicker/js/bootstrap-datetimepicker.min.js';?>"></script> -->
    <script type="text/javascript" src="<?php echo lib_url().'sheepit/sheepit.min.js';?>"></script>
    <script type="text/javascript" src="<?php echo lib_url().'bootstrap_timepicker/bootstrap_timepicker.js';?>"></script>
    <script type="text/javascript" src="<?php echo lib_url().'bootstrap_timepicker/bootstrap_timepicker.css';?>"></script>
 <!-- CLONING FORM HELPER CUSTOM FAWWAZ -->
 

<script type="text/javascript">
 $(document).ready(function() {
  // $('#waktu_kerja_from').datetimepicker({pickDate:false});
  // $('#waktu_kerja_to').datetimepicker({pickDate:false});
  var old = $('#entry1');
  // old.find("input[name='kerja_from_1']").datetimepicker({pickDate:false});
  // old.find("input[name='kerja_to_1']").datetimepicker({pickDate:false});

  old.find('input[name="kerja_from[]"]').datetimepicker({pickDate:false, minuteStepping: 5});
  old.find('input[name="kerja_to[]"]').datetimepicker({pickDate:false, minuteStepping: 5});
  $('#add_button').click(function(){
    var num = $('.clonable').length,
        newNum = new Number(num+1);
        newElem = $('#entry'+num).clone().attr('id','entry'+newNum).fadeIn('slow');
        
        newElem.find('label').html('waktu kerja '+newNum);
        // newElem.find("input[name='kerja_from_1']").attr('name','kerja_from_'+newNum).val('').datetimepicker({pickDate:false});
        // newElem.find("input[name='kerja_to_1']").attr('name','kerja_to_'+newNum).val('').datetimepicker({pickDate:false});

        newElem.find("input[name='kerja_from[]']").attr('name','kerja_from[]').val('').datetimepicker({pickDate:false, minuteStepping: 5});
        newElem.find("input[name='kerja_to[]']").attr('name','kerja_to[]').val('').datetimepicker({pickDate:false, minuteStepping: 5});
        newElem.find("a[id='remove_kerja_1']").attr('id','remove_kerja_'+newNum).val('');


        $('#entry'+num).after(newElem);
        // newElem.find("input[name='istirahat_from_"+newNum+"]").focus();
        // newElem.find("input[name='waktu_istirahat_from_1']").attr('for','waktu_istirahat_from_'+newNum).val('');

        $('.remove_button').click(function(){
          var temp_id = $(this).attr('id');
          var id = temp_id.substring(temp_id.length-1,temp_id.length);
          console.log("idnya adalah " + id);
          if(id!=1){
            $(this).parent().remove();
          }
        });
        // alert('harusnya yang id pertama jangan sampe ada tombol removenya karena minimal satu kali istirahat');
  });

  
 });
</script>









 <!-- JavaScript jQuery code from Bootply.com editor -->  
 <script type='text/javascript'>
   $(document).ready(function() {
    //$('#calendar').fullcalendar()
   });
 </script>
 <script type="text/javascript"> 
 // var map = new GMaps({
 //    el: '#gmap2',
 //    lat: 51.5073346,
 //    lng: -0.1276831,
 //    zoom: 12,
 //    zoomControl : true,
 //    zoomControlOpt: {
 //        style : 'SMALL',
 //        position: 'TOP_LEFT'
 //    },
 //    panControl : true,
 //  });
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
    <script type="text/javascript">
      // $(function() {
      //   $('#datetimepicker3').datetimepicker({
      //     pickDate: false
      //   });
      // });
    </script>
</body>
</html>
