
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h2><b>Pilih jadwal</b> <?php echo $info_dokter['nama_dokter']?>
                  <div class="btn-group pull-right">
                    <button class="btn btn-danger btn-large" id="on_map_button"><span class="glyphicon glyphicon-map-marker"></span>Map View</button>
                  </div>
                  </h2>
                  
                </div>
                <!-- /panel heading -->
                <div class="panel-body">
                  <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>Silahkan pilih salah satu jadwal yang sudah dialokasikan oleh dokter pada menu di bawah, kemudian klik tombol pesan
                    </p>
                  </div>

                  <div class="row">                      
                    <div class="col-md-12">
                      <div class="well">
                        <form class="form-inline" role="form" action='<?php echo base_url().'dokter/do_request';?>' method="post">
                          <div class="form-group col-lg-3">
                          <p>Kunjungi dokter ini pada:</p>
                          </div>
                          <div class="form-group col-lg-7">
                            <input type="hidden" name="alias" value="dokter/<?= $info_dokter['alias'];?>">
                            <input type="hidden" name="id_dokter" value="<?= $info_dokter['id_dokter'];?>">
                            <input type="hidden" name="id_klinik" value="<?= $where_works['id_klinik']?>">
                            <input type="hidden" name="req_jadwal" id="req_jdwl" value="">
                            <input name="jadwal" id="input_jadwal" type="text" class="form-control" placeholder="Pilih Jadwal Dibawah">
                          </div>
                          <button type="submit" class="btn btn-success">Pesan !</button>
                        </form>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div id="calendar">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /panel body -->
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <ul class="nav nav-pills">
                      <li class="active"><a href="#info" data-toggle="tab">Informasi</a>
                      </li>
                      <li><a href="#review" data-toggle="tab">Review</a>
                      </li>
                  </ul>
                </div>
                <div class="panel-body">
                  <div class="tab-content">

                    <div class="tab-pane active" id="info">
                      <p>info lainya taruh disini</p>
                    </div>

                    <div class="tab-pane" id="review">
                      <p>Review taruh disini</p>
                    </div>

                  </div>
                </div>
              </div>
