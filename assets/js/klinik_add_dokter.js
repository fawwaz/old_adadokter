$('#tambah_dokter').click(function(){

	 var isi = '<form class="form-horizontal" action="manajemen_dokter" method="get">'
				+'<fieldset>'
				+'<p>Masukan alias dokter, alias dokter adalah nama yang digunakan sebagai identitas dokter di adadokter.com. '
				+'Ada di bagian belakang alamat halaman dokter : http:\/\/adadokter.com/dokter/[alias]</p>'
				+'<div class="form-group">'
				+'  <label class="col-md-4 control-label" for="Alias">Alias</label>  '
				+'  <div class="col-md-4">'
				+'  <input id="Alias" name="alias" placeholder="" class="form-control input-md" type="text">'
				+'  <input name="action" placeholder="" class="form-control input-md" type="hidden" value="add">'
				+'  </div>'
				+'</div>'
				+'<div class="form-group">'
				+'  <label class="col-md-4 control-label" for="Submit"></label>'
				+'  <div class="col-md-4">'
				+'    <button id="Submit" name="Submit" class="btn btn-primary">Tambah</button>'
				+'  </div>'
				+'</div>'
				+'</fieldset>'
				+'</form>';

	bootbox.dialog({
		message : isi,
		title : 'Tambah dokter',
		buttons :{
			cancel:{
				label : 'Cancel',
				className : 'btn-danger',
				callback : function(){
					
				}
			}
		}

	})

});