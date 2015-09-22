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