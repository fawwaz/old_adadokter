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

 $('#tambah_request').click(function(){
  bootbox.dialog({
    'message' : '<form><legend>Form title</legend><div class="form-group"><label for="">label</label><input type="text" class="form-control" id="" placeholder="Input field"></div><button type="submit" class="btn btn-primary">Submit</button></form>',
    'title' : 'Silahkan tambah jadwal'
  });  
});


 