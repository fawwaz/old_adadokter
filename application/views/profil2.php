<!DOCTYPE HTML>
<html>
<head>
  <title></title>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
  <!-- Latest compiled and minified CSS -->
  <link href='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/fullcalendar/fullcalendar.css' rel='stylesheet' />
  <link href='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
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
      #leftCol .panel-body{
        font-size: 8pt;
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
  <div id="gmap">
  </div>
</div>
<div id="wrap">
    
     <!-- Begin Body -->
     <div class="container">
       <div class="row">
         
         <div class="col-md-3" id="leftCol">
            <div class="row">
              <div class="col-md-12">
                <a href="#x" class="thumbnail"><img src="http://placehold.it/250x250&text=foto dokter" alt="Image" /></a>
              </div>
            </div>
            <div class="row">
              <div class="panel panel-default">
                <div class="panel-heading">Personal Statement</div>
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <table>
                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Sl</th>
                                <th>Rb</th>
                                <th>Km</th>
                                <th>Ju</th>
                                <th>Sa</th>
                                <th>Mi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>07:00</td>
                                <td>07:00</td>
                                <td>07:00</td>
                                <td>07:00</td>
                                <td>07:00</td>
                                <td>07:00</td>
                                <td>07:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                                <td>15:00</td>
                                <td>15:00</td>
                                <td>15:00</td>
                                <td>15:00</td>
                                <td>15:00</td>
                                <td>15:00</td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                </div>

                <hr>
                


              </div>
              </div>
            </div>
            <div class="row">
              <div class="panel panel-default">
                <div class="panel-heading">Info praktek</div>
                <div class="panel-body">

                  <div class="row">
                    <div class="col-md-12">
                      <table class="table">
                          <tbody>
                              <tr>
                                  <td><span class="glyphicon glyphicon-map-marker"></span> </td>
                                  <td>Jalan tamansari bawah nomor 123 kecamatan blabla</td>
                              </tr>
                              <tr>
                                  <td><span class="glyphicon glyphicon-earphone"></span></td>
                                  <td>+622 - 34567899</td>
                              </tr>
                              <tr>
                                  <td><span class="glyphicon glyphicon-envelope"></span></td>
                                  <td>cell is row 2, column 1</td>
                              </tr>
                          </tbody>
                      </table>
                    </div>
                  </div>

                </div>
              </div>
            </div>     
           <!-- div class="well"> 
                 <ul class="nav nav-stacked" id="sidebar">
                   <li><a href="#sec1">Section 1</a></li>
                   <li><a href="#sec2">Section 2</a></li>
                   <li><a href="#sec3">Section 3</a></li>
                   <li><a href="#sec4">Section 4</a></li>
                 </ul>
           </div> -->

         </div>  
           <div class="col-md-9">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h2>Contoh profil dengan mode pemesanan 2</h2>
                </div>
                <div class="panel-body">
                  <div class="alert alert-info">
                    <p>Dokter ini menerapkan sistem nomor antrian,i>bukan menggunakan sistem penjadwalan</i>.Pelajari lebih lanjut di mode antrian di <strong><a href="#">Sini</a></strong></p>
                  </div>

                  <div class="col-md-8 col-md-offset-2">
                    <div class="well text-center">
                      <h3>Saat ini nomor antrianya adalah</h3>
                      <h1 class="text-center">57</h1>
                      <h3><a href="#" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok"></span> Antrikan Saya !</a></h3>
                    </div>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <ul class="nav nav-pills">
                      <li class="active"><a href="#info" data-toggle="tab">Informasi</a>
                      </li>
                      <li><a href="#review" data-toggle="tab">Review</a>
                      </li>
                  </ul>
                </div>
                <div class="panel-body">
                  <div class="tab-content">

                    <div class="tab-pane active" id="info">
                      <p>info lainya taruh disini</p>
                    </div>

                    <div class="tab-pane" id="review">
                      <p>Review taruh disini</p>
                    </div>

                  </div>
                </div>
              </div>

                 
                 
                 
           </div> 
         </div>
     </div>
        


      <div class="push"></div>
</div>

<div id="footer">
  <div class="container">
    <p class="muted credit">This is a sticky footer</p>
  </div>
</div> 
  <!-- <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
 <script type='text/javascript' src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
 <!-- JavaScript jQuery code from Bootply.com editor -->  
 <script type='text/javascript'>
   $(document).ready(function() {
    //$('#calendar').fullcalendar()
   });
 </script>
 <script type="text/javascript"> 
 var map = new GMaps({
    el: '#gmap',
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
