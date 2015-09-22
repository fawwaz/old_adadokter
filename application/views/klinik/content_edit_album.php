              
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
                  Edit Album
                </div>
                <div class="panel-body">
                  <?php echo form_open_multipart('klinik/edit_album',array('class'=>'form-horizontal'));?>
                    <fieldset>
                        <!-- Form Name -->
                        <legend>Edit Album</legend>
                        <p>Profile picture berukuran maksimal 200x200 pixel. Isi dengan file profile picture untuk mengganti profile picture yang sudah ada atau biarkan kosong jika tidak ingin mengganti profile picture.</p>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="foto_1">Foto 1</label>
                            <div class="col-md-6">

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                    <!-- <img data-src="http://placehold.it/100x100" alt="200px X 200px">  -->
                                    <img src="<?php echo ($info_klinik['foto_1'] ? $info_klinik['foto_1'] : set_value('foto_1'))?>" alt="200px X 200px">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 300px;"></div>
                                  <div>
                                    <span class="btn btn-default btn-file">
                                      <span class="fileinput-new">Select image</span>
                                      <span class="fileinput-exists">Change</span>
                                      <input type="file" name="foto_1">
                                    </span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="foto_2">Foto 2</label>
                            <div class="col-md-6">

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                    <!-- <img data-src="http://placehold.it/100x100" alt="200px X 200px">  -->
                                    <img src="<?php echo ($info_klinik['foto_2'] ? $info_klinik['foto_2'] : set_value('foto_2'))?>" alt="200px X 200px">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 300px;"></div>
                                  <div>
                                    <span class="btn btn-default btn-file">
                                      <span class="fileinput-new">Select image</span>
                                      <span class="fileinput-exists">Change</span>
                                      <input type="file" name="foto_2">
                                    </span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="foto_3">Foto 3</label>
                            <div class="col-md-6">

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                    <!-- <img data-src="http://placehold.it/100x100" alt="200px X 200px">  -->
                                    <img src="<?php echo ($info_klinik['foto_3'] ? $info_klinik['foto_3'] : set_value('foto_3'))?>" alt="200px X 200px">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 300px;"></div>
                                  <div>
                                    <span class="btn btn-default btn-file">
                                      <span class="fileinput-new">Select image</span>
                                      <span class="fileinput-exists">Change</span>
                                      <input type="file" name="foto_3">
                                    </span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="foto_4">Foto 4</label>
                            <div class="col-md-6">

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                    <!-- <img data-src="http://placehold.it/100x100" alt="200px X 200px">  -->
                                    <img src="<?php echo ($info_klinik['foto_4'] ? $info_klinik['foto_4'] : set_value('foto_4'))?>" alt="200px X 200px">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 300px;"></div>
                                  <div>
                                    <span class="btn btn-default btn-file">
                                      <span class="fileinput-new">Select image</span>
                                      <span class="fileinput-exists">Change</span>
                                      <input type="file" name="foto_4">
                                    </span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="foto_5">Foto 5</label>
                            <div class="col-md-6">

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                    <!-- <img data-src="http://placehold.it/100x100" alt="200px X 200px">  -->
                                    <img src="<?php echo ($info_klinik['foto_5'] ? $info_klinik['foto_5'] : set_value('foto_5'))?>" alt="200px X 200px">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 300px;"></div>
                                  <div>
                                    <span class="btn btn-default btn-file">
                                      <span class="fileinput-new">Select image</span>
                                      <span class="fileinput-exists">Change</span>
                                      <input type="file" name="foto_5">
                                    </span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>
                                </div>
                                
                            </div>
                        </div>


                        <!-- Button -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="submit"></label>
                          <div class="col-md-4">
                            <button id="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                    </fieldset>
                  <?php echo form_close();?>
                  </div>
                </div>
              </div>