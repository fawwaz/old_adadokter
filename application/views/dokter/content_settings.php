              
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
                  <?php echo form_open_multipart('dokter/update',array('class'=>'form-horizontal'));?>
                    <fieldset>
                        <!-- Form Name -->
                        <legend>Setting</legend>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nama_dokter">Nama Lengkap</label>
                            <div class="col-md-6">
                                <input id="nama_dokter" name="nama_dokter" placeholder="Nama Lengkap" class="form-control input-md" type="text" value="<?php echo ($form_value['nama_dokter'] ? $form_value['nama_dokter'] : set_value('nama_dokter'))?>">
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email_dokter">Email</label>
                            <div class="col-md-6">
                                <input id="email_dokter" name="email_dokter" placeholder="Email" class="form-control input-md" type="text" value="<?php echo ($form_value['email_dokter'] ? $form_value['email_dokter'] : set_value('email_dokter'))?>">
                            </div>
                        </div>
                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password_dokter">New Password</label>
                            <div class="col-md-6">
                                <input id="password_dokter" name="password_dokter" placeholder="New Password" class="form-control input-md" type="password"/>
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
                            <label class="col-md-4 control-label" for="statement">Personal Statement</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="statement" name="statement" ><?php echo ($form_value['statement'] ? $form_value['statement'] : set_value('statement'))?></textarea>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="alias">Alias</label>
                            <div class="col-md-6">
                                <input id="alias" name="alias" placeholder="alias" class="form-control input-md" type="text" value="<?php echo ($form_value['alias'] ? $form_value['alias'] : set_value('alias'))?>"> 
                                <span class="help-block">alias digunakan untuk menunjukan halaman profil anda seperti username di twitter. Sehingga halaman anda bisa diakses dengan alamat http://adadokter.com/dokter/[alias]</span> 
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="profile_pic">Profile Picture</label>
                            <div class="col-md-6">

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                    <!-- <img data-src="holder.js/100%x100%" alt="200px X 200px"> -->
                                    <img src="<?php echo ($form_value['profile_pic'] ? $form_value['profile_pic'] : set_value('profile_pic'))?>" alt="200px X 200px">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 300px;"></div>
                                  <div>
                                    <span class="btn btn-default btn-file">
                                      <span class="fileinput-new">Select image</span>
                                      <span class="fileinput-exists">Change</span>
                                      <input type="file" name="profile_pic">
                                    </span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>
                                </div>

                                <!-- <input id="profile_pic" name="profile_pic" placeholder="Profile picture" type="file"/> -->
                                <span class="help-block">Profile picture berukuran maksimal 200x200 pixel. Isi dengan file profile picture untuk mengganti profile picture yang sudah ada atau biarkan kosong jika tidak ingin mengganti profile picture.</span>
                            </div>
                        </div>
                        <!-- COBA FORM -->
                        <!-- <div class="form-group">
                          <label class="col-md-4">Coba</label>
                          <div class="col-md-6">
                            <input type="file" name="profile_pic"/>
                          </div>
                        </div> -->
                        <!-- Multiple Radios -->
                        <!-- <div class="form-group">
                            <label class="col-md-4 control-label" for="metode">Metode Urutan</label>
                            <div class="col-md-6">
                                <div class="radio">
                                    <label for="metode-0">
                                        <input name="metode" id="metode-0" value="request" type="radio" <?php echo ($form_value['metode_antrian'] == 'request' ? 'checked="checked"' : set_radio('metode','request',true))?>>Request</label>
                                </div>
                                <div class="radio">
                                    <label for="metode-1">
                                        <input name="metode" id="metode-1" value="antrian" type="radio" <?php echo ($form_value['metode_antrian'] == 'antrian' ? 'checked="checked"' : set_radio('metode','antrian'))?>>Antrian</label>
                                </div>
                            </div>
                        </div> -->

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