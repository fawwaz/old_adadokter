
              
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
                      <div class="col-md-3 col-sm-12">
                        <input name="kerja_from[]" placeholder="Dari pukul" class="form-control input-md" type="text" data-format="HH:mm">
                      </div>
                      <div class="col-md-3 col-sm-12">
                        <input name="kerja_to[]" placeholder="Hingga pukul" class="form-control input-md" type="text" data-format="HH:mm">
                      </div>
                      <div class="col-md-3 col-sm-12">
                        <a href="#" id="remove_kerja_1" class="btn btn-danger remove_button"><span class="glyphicon glyphicon-minus"></span> Remove</a>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8 col-md-offset-3">
                          <a id="add_button" href="#" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah bagian</a>
                        <button id="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
                      </div>
                    </div>
                    
                    

                    </fieldset>
                  </form>

                  <div idx="jdwl_"></div>
                </div>
              </div>