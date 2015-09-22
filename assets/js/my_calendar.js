
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
                url: '<?=base_url("ajax/jadwal")?>',
                data: {
                    start: Math.round(starts.getTime() / 1000),
                    end: Math.round(ends.getTime() / 1000),
                    id_dokter : <?php echo $info_dokter['id_dokter']?>,
                    interval : 30
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

                success: function (response) {
                    console.log('Success');
                    console.log(response);
                    var data = response.alvailable;
                    var reserved= response.reserved;
                    var input=[];
                    
                    $.each(data,function(idx,val){
                      var s         = val.split("#");
                      var w         = s[1].split("-");
                      var tanggal   = s[0];
                      var awal_jam  = w[0];
                      var akhir_jam = w[1];
                      // var t_in      = Array();
                      //console.log("tgl"+s[0]+"awal"+w[0]+"akhir"+w[1]);
                      t_in  = divide_time(tanggal,awal_jam,akhir_jam,30);
                      input = input.concat(t_in);
                      // console.log(JSON.stringify(input.concat(t_in)));
                      //console.log("====");
                      //input.concat(t_in);
                    });

                    // Filter the reserved time 
                    // delete_reserved(input,reserved);
                    console.log(reserved);
                    
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

        function delete_reserved(arrayOfObjects,listToDelete){
          for(var i = 0; i < arrayOfObjects.length; i++) {
              var obj = arrayOfObjects[i];

              if(listToDelete.indexOf(obj.start) !== -1) {
                  arrayOfObjects.splice(i, 1);
                  i--;
              }
          }
        }

      });
      


      if(<?php if($message = $this->session->flashdata('after_message')){ echo "true"; }else{ echo "false"; }?>){
        bootbox.dialog({
          message: '<div class="alert alert-warning"><?=$message;?></div>',
          title: 'Ups terjadi kesalahan',
          buttons:{
            add:{
              label: "Tambah",
              className: "btn-primary",
              callback:function(){
                alert("tambah di klik");
              }
            },
            cancel:{
              label: "Cancel",
              className: "btn-danger",
              callback:function(){
                alert("cancel di klik");
              }
            }
          }
        })
      }