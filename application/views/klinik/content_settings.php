              
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
                  <?php echo form_open_multipart('klinik/settings',array('class'=>'form-horizontal'));?>
                    <fieldset>
                        <!-- Form Name -->
                        <legend>Setting</legend>
                        <h2>Idealnya</h2>
                        <p>Idealnya disini ditambahin google map dan marker draggable kalau markernya berubah latitude sama longitudenya berubah</p>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nama_klinik">Nama Klinik</label>
                            <div class="col-md-6">
                                <input id="nama_klinik" name="nama_klinik" placeholder="Nama Lengkap" class="form-control input-md" type="text" value="<?php echo ($form_value['nama_klinik'] ? $form_value['nama_klinik'] : set_value('nama_klinik'))?>">
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="alias_klinik">Alias</label>
                            <div class="col-md-6">
                                <input id="alias" name="alias_klinik" placeholder="alias" class="form-control input-md" type="text" value="<?php echo ($form_value['alias_klinik'] ? $form_value['alias_klinik'] : set_value('alias_klinik'))?>"> 
                                <span class="help-block">alias digunakan untuk menunjukan halaman profil anda seperti username di twitter. Sehingga halaman anda bisa diakses dengan alamat http://adadokter.com/klinik/[alias]</span> 
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email_klinik">Email</label>
                            <div class="col-md-6">
                                <input id="email_klinik" name="email_klinik" placeholder="Email" class="form-control input-md" type="text" value="<?php echo ($form_value['email_klinik'] ? $form_value['email_klinik'] : set_value('email_klinik'))?>">
                            </div>
                        </div>
                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password_klinik">New Password</label>
                            <div class="col-md-6">
                                <input id="password_klinik" name="password_klinik" placeholder="New Password" class="form-control input-md" type="password"/>
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
                            <label class="col-md-4 control-label" for="alamat_klinik">Alamat</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="alamat_klinik" name="alamat_klinik" ><?php echo ($form_value['alamat_klinik'] ? $form_value['alamat_klinik'] : set_value('alamat_klinik'))?></textarea>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="latitude">Latitude</label>
                            <div class="col-md-6">
                                <input id="latitude" name="latitude" placeholder="Latitude" class="form-control input-md" type="text" value="<?php echo ($form_value['latitude'] ? $form_value['latitude'] : set_value('latitude'))?>">
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="longitude">Longitude</label>
                            <div class="col-md-6">
                                <input id="longitude" name="longitude" placeholder="longitude" class="form-control input-md" type="text" value="<?php echo ($form_value['longitude'] ? $form_value['longitude'] : set_value('longitude'))?>">
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