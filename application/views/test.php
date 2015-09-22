<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sticky footer &middot; Twitter Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">   -->
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css">   -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" href="bootstrap3.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootswatch/3.0.0/readable/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="readable.css"> -->

    <link href='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/fullcalendar/fullcalendar.css' rel='stylesheet' />
    <link href='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <style type="text/css">

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      body {
      	margin-top:60px;
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        /*margin: 0 auto -60px;*/
        margin:0px;
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

      

    </style>
    <!-- Only applied to this pages -->
    <style type="text/css">
    	.jadwal{
    		background-color: #ddd;
    	}
      table.table tr td:first-child {
        width:15%;
      }
      table.table tr td{
        vertical-align: middle;
      }
    </style>

    <style type="text/css">
    /* Overriding */
    h3{
      margin-top: 0px;
      margin-bottom: 0px;
    }
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


    <!-- Wrap all page content here -->
    <div id="wrap">
    	<div class="container">
    		<!-- Sample ...  -->

    		<div class="container-fluid">
    			<!-- <div class="row-fluid">
    				<div class="col-md-12">
    					<div class="row-fluid">
    						<div class="col-md-3">
    							<div class="col-md-12 col-sm-12">
    							    <a href="#x" class="thumbnail"><img src="http://placehold.it/250x250&text=foto dokter" alt="Image" /></a>
    							</div>
    						</div>
    						<div class="col-md-9">
    							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    						</div>
    					</div>
    				</div>
    			</div> -->
          <div class="row-fluid">
            <div class="col-md-3">
              <div class="col-md-12 col-sm-12">
                <a href="#x" class="thumbnail"><img src="http://placehold.it/250x250&text=foto dokter" alt="Image" /></a>
              </div>
            </div>

              
            <div class="col-md-9">
              <table class="table">
                <tbody>
                  <!-- <tr>
                    <td><p>Awaiting patient request</p></td>
                    <td><p><h3><span class="label label-primary">17</span></p></h3></td>
                  </tr> -->
                  <tr>
                    <td><p>Solved Case</p></td>
                    <td><p><h3><span class="label label-success">300</span></p></h3></td>
                    <td>
                      <p>Awaiting Patient</p>
                    </td>
                    <td>
                      <p><h3><span class="label label-success">25</span></p></h3></td>
                    </td>
                  </tr>
                  <tr>
                    <td>Addres</td>
                    <td>Jl Ganesha Nomor 10</td>
                    <td>
                      <button type="button" class="btn btn-danger btn-lg">
                        Pesan dokter
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td><p>Lulusan</p></td>
                    <td>
                      <ul>
                        <li>S1 Fakultas Kedokteran Universitas Indonesia</li>
                        <li>S2 Medical blabla bla </li>
                      </ul>
                    </td>
                  </tr>
                </tbody>
              </table>              
              <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum. -->
            </div>
            <div class="clearfix"></div>
          </div>

          <di class="row-fluid">
            <div class="col-md-12">
              <h4>Personal Statement</h4>
              <p>Saya menangani pasien sejak tahun 1998. Spesialisasi saya ada pada bidang blabla bla 
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
              </p>
            </div>
          </div>

    			<div class="row-fluid" style="padding-bottom:50px; height:650px; padding-top:20px; ">
    				<div class="col-md-12">
              <div id="calendar"></div>    					
    				</div>
    			</div>

          <br>
          <div class="row">
            <!-- <div class="col-md-12"> -->
              <form class="form-inline" role="form">
                <div class="form-group col-lg-2">
                <p>Kunjungi dokter ini pada:</p>
                </div>
                <div class="form-group col-lg-8">
                  <input id="input_jadwal" type="text" class="form-control" placeholder="Jadwal" disabled>
                </div>
                <button type="submit" class="btn btn-default">Pesan Sekarang</button>
              </form>
            <!-- </div> -->
          </div>
          <br>
    			
          <!-- <div class="row-fluid" style="height:auto; margin-bottom:40px;">
						<div class="col-md-4">
              <h3>Twitter Feed</h3>
							<img src="http://0.tqn.com/d/webtrends/1/0/Z/7/-/-/TwitterWidgets-Search.jpg" style="width:100%">
						</div>
						<div class="col-md-2">
              <h3>Facebook </h3>
							<img src="http://www.facebook.com/badge.php?id=1764750960&bid=1152&key=1319916476&format=png&z=827909117" style="width:100%">
						</div>
						<div class="col-md-6">
              <h3>View on google map</h3>
							<img src="http://www.sdc.qld.edu.au/resources/images/find-us-map.jpg" style="width:100%"/>
						</div>
    			</div> -->
          
          <div class="row-fluid" style="height: auto; margin-bottom:400px;">
            <div class="col-md-6">
              <h3>View on google map</h3>
              <div id="gmap" style="width:100%; height:400px;"></div>
              <div id="control_map"></div>
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
    <!-- // <script src="bootstrap/js/jquery.min.js"></script> -->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <!-- // <script src="bootstrap/js/bootstrap.min.js"></script> -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>

    
    <!--<script src='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/lib/jquery.min.js'></script>-->
    <script src='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/lib/jquery-ui.custom.min.js'></script>
    <script src='<?php echo lib_url().'/res/'; ?>fullcalendar-1.6.4/fullcalendar/fullcalendar.min.js'></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.1.0/moment.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.1.0/langs.js"></script>

    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCo7WxuA7MpBsm_Jf-IkABTD0aSRpZxJoo&sensor=false&libraries=geometry&v=3.7"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.5/gmaps.js"></script>
    <script src='<?php echo lib_url(); ?>maplace/maplace.js'></script>

    
    <script type="text/javascript">

      $(document).ready(function() {
      
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,agendaDay'
          },
          minTime:'4:00',
          maxTime:'22:00',
          defaultView: 'agendaWeek',
          editable: true,
          height:600,
          //events: [{"title":"kunjungan","start":"20-12-28 07:30","end":"20-12-28 08:00","allDay":false}]
            
          //events: '<?php echo base_url()."test/teshelper"?>'
          events: function(starts,ends,call_ing){

            // $.get( "http://localhost/dokter/test/tele",{'start':starts,'end':ends},function( text ) {
            //   var input=array();

            //   // $.each(text,function(idx,val){
            //   //   var s         = val.split("#");
            //   //   var w         = s[1].split("-");
            //   //   var tanggal   = s[0];
            //   //   var awal_jam  = w[0];
            //   //   var akhir_jam = w[1];
            //   //   var t_in      = null;
            //   //   t_in          = divide_time(tanggal,awal_jam,akhir_jam,30);
            //   //   input.concat(t_in);
            //   //   //$('.halo').append("tanggal "+tanggal+"&nbsp; jam awal : "+awal_jam+"jam akhir"+akhir_jam+"<br>"); 
            //   // });
            //   // alert(JSON.stringify(input));
            //   callback(input);
            // });
            
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
                    console.log(JSON.stringify(data));

                    var input=[];

                    $.each(data,function(idx,val){
                      var s         = val.split("#");
                      var w         = s[1].split("-");
                      var tanggal   = s[0];
                      var awal_jam  = w[0];
                      var akhir_jam = w[1];
                      var t_in      = Array();
                      //console.log("tgl"+s[0]+"awal"+w[0]+"akhir"+w[1]);
                      t_in          = divide_time(tanggal,awal_jam,akhir_jam,30);
                      input = input.concat(t_in);
                      //console.log(JSON.stringify(input.concat(t_in)));
                      //console.log("====");
                      //input.concat(t_in);
                    });

                    console.log(JSON.stringify(input));
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
            //console.log(calEvent+"JS EVENT : "+jsEvent+" view " + view);
            console.log(JSON.stringify(calEvent));
          }
        });
       
      });
      
      
      function divide_time(tgl,start,end,interval){
        var output = new Array();
        var a = tgl+" "+start;
        var b = tgl+" "+end;
        var time = moment(a,'YYYY-MM-DD HH:mm');
        var end = moment(b,'YYYY-MM-DD HH:mm');
        // console.log("##TGL : "+tgl);
        // console.log("Tanggal :" +time.date()+" "+time.month()+" "+time.year()+" "+time.hour()+" "+time.minute());
        // console.log(">>Tanggal :" +end.date()+" "+end.month()+" "+end.year()+" "+end.hour()+" "+end.minute());
        // console.log("======");
         while(time<end){
          var time_starts=null;
          var ends=null;
          time_starts = moment(time);
          time_ends = moment(time_starts).add(interval,'minutes');
        
          if(time_ends>end){
            time_ends=moment(end);
          }

          var temp = new Object();
          temp.title = '';
          temp.start = time_starts.format('YYYY-MM-DD HH:mm');
          temp.end = time_ends.format('YYYY-MM-DD HH:mm');
          temp.allDay =false;

          output.push(temp);
          time =moment(time_ends);
        }
        return output;
     }
    </script>


    <script type="text/javascript">
    $(function(){
      new Maplace({
        map_div:'#google_map',
      }).Load();
    });
    var maplace = new Maplace(); 
    maplace.Load();   
    </script>

  </body>
</html>



