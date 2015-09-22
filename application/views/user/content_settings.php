
        <div class="panel panel-default">
          <div class="panel-heading">
            Settings

            
          </div>
          <div class="panel-body">
            <?php if($err = $this->session->flashdata('error')){?>
                <div class="alert alert-danger alert-dismissable ">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?=$err?>
                </div>
            <?php } ?>
            <?php if($succ = $this->session->flashdata('success')) {?>
                <div class="alert alert-success alert-dismissable ">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?=$succ?>
                </div>
            <?php } ?>
            <form class="form-horizontal" action="<?=base_url('user/do_update_profile')?>" method="post">
                <fieldset>
                    <!-- Form Name -->
                    <legend>Settings</legend>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nama_pasien">Nama Lengkap</label>
                        <div class="col-md-6">
                            <input id="nama_pasien" name="nama_pasien" placeholder="Nama" class="form-control input-md" type="text" value="<?php echo ($nama_user ? $nama_user : set_value('nama_pasien'))?>">
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="email_pasien">Email</label>
                        <div class="col-md-6">
                            <input id="email_pasien" name="email_pasien" placeholder="Email" class="form-control input-md" type="text" value="<?php echo ($email_pasien ? $email_pasien : set_value('email_pasien'))?>">
                        </div>
                    </div>
                    <!-- Prepended text-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="no_hp">Nomor Handphone</label>
                        <div class="col-md-6">
                            <div class="input-group"> <span class="input-group-addon">+62</span>

                                <input id="no_hp" name="no_hp" class="form-control" placeholder="NoHP" type="text" value="<?php echo ($no_hp ? substr($no_hp,3,strlen($no_hp)) : set_value('no_hp'))?>">
                            </div>
                            <p class="help-block">Cukup tuliskan angka.</p>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="submit">Submit</label>
                        <div class="col-md-4">
                            <button id="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>

          </div>
        </div>