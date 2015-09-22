$(document).ready(function(){

	var dTable = $('#table_dokter').dataTable({
	    "sAjaxSource": "<?php echo base_url('mimin/dokter_datatables'); ?>",
	    'sPaginationType' : 'bs_full'
	});

	var pTable = $('#table_pasien').dataTable({
	    "sAjaxSource": "<?php echo base_url('mimin/pasien_datatables'); ?>",
	    'sPaginationType' : 'bs_full'
	});

	dTable.fnStateLoaded(function(){
		editor_dialog();
	});

	/*
	*
	*
	*
	*/
});
function editor_dialog(){
	$('.edit_button_dokter').click(function(){
		var id_string = $(this).attr('id');
		var id = id_string.slice(-1);

		bootbox.alert('clicked edit button with id'+id);
	});
}
