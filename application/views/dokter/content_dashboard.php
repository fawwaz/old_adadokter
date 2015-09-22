
              <div class="tab-content">
                
                <div class="tab-pane active" id="dashboard">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <ul class="nav nav-pills">
                          <li class="active"><a href="#info" data-toggle="tab">Pasien Saat ini</a>
                          </li>
                          <li><a href="#review" data-toggle="tab">List Pasien Hari ini</a>
                          </li>
                      </ul>
                    </div>
                    <div class="panel-body">
                      <h5>Silahkan konfirmasi</h5>
                      <p></p>
                      <div class="tab-content">

                        <div class="tab-pane active" id="info">
                          <table class="table table-bordered">
                            <tr>
                                <td>Nama Pasien</td>
                                <td>Pasien</td>
                            </tr>
                            <tr>
                                <td>No Handphone</td>
                                <td>+62123567890</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center"><a href="#" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-play"></span> Pasien Selanjutnya</a></td>
                            </tr>
                          </table>
                        </div>

                        <div class="tab-pane" id="review">
                          
                          <div class="alert alert-warning">
                            <p>Berikut ini informasi mengenai pasien yang akan anda layani hari ini.</p>
                          </div>
                          <!-- PatientRequest -->
                          <!-- <div class="col-md-12"> -->

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pasien</th>
                                        <th>Nomor Hp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $i=1; foreach($today_antrian as $t){?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$t['nama_pasien']?></td>
                                        <td><?=$t['no_hp']?></td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                          <!--/Today Patient-->
                      </div>
                    </div>
                  </div>
                  
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>Incoming Patient Request</h4>
                    </div>
                    <div class="panel-body">
                      <div class="alert alert-success">
                        <p>Berikut ini Request pasien yang meminta layanan anda, untuk mengkonfirmasi anda bersedia melayani mereka silahkan tekan tombol konfirmasi</p>
                        <strong>Jangan lupa harus ada yang ditambahin hidden dan divalidasi diupdate menggunakan jquery setiap interval sekian menit misal id </strong>
                      </div>
                      <h2>Antrian</h2><hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Nomor Hp</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Terima</th>
                                    <th>Tolak</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $i=1; foreach($unconfirmed as $u){?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$u['nama_pasien']?></td>
                                    <td><?=$u['no_hp']?></td>
                                    <td><?=$u['waktu_pemesanan']?></td>
                                    <td><a href="confirm_antrian?id_antrian<?=$u['id_antrian']?>" id="terima_antrian" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-ok"></span> Terima</a></td>
                                    <td><a href="delete_antrian?id_antrian<?=$u['id_antrian']?>" id="tolak_antrian" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> Terima</a></td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                      <!-- /PatientRequest -->
                      <h2>Permintaan Khusus</h2>
                      <hr>   
                      

                      <div class="list-group">
                        <h3>Permintaan khusus
                        <div class="btn-group pull-right">
                          <button id="tambah_request" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Manual</button>
                          <button id="terima_request" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-ok"></span> Terima</button>
                          <button id="tolak_request" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> Tolak</button>
                        </div>
                        </h3>
                      </div>
                      
                      <form method="post" id="request_form_confirmation">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Nomor Hp</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $i=1; foreach($req_list as $r){?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$r['nama_pasien']?> </td>
                                    <td><?=$r['no_hp']?></td>
                                    <td><?=$r['tanggal_jam']?></td>
                                    <td><div class="checkbox"><input type="checkbox" value="<?=$r['id_request']?>" style="text-align:center"></div></td>
                                    <!-- <td><a href="confirm_request?id_request<?=$r['id_request']?>" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-ok"></span> Terima</a></td> -->
                                    <!-- <td><a href="delete_request?id_request<?=$r['id_request']?>" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> Tolak</a></td> -->
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                      </form>

                    </div>
                  </div>
                </div>

                
                <div class="tab-pane" id="settings">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      Setting
                    </div>
                    <div class="panel-body">
                      SETTING DIGANTI JADI PINDAH KE SETTINGS
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="scheduling">
                  <div class="panel panel-default">
                    <div class="panel panel-heading">
                    </div>
                    <div class="panel panel-body">
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="usulkan">
                  usulan
                </div> 
                
                <div class="list-group">
                  <!-- <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">List group item heading</h4>
                    <p class="list-group-item-text">Content goes here</p>
                  </a>
                  <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">List group item heading</h4>
                    <p class="list-group-item-text">Content goes here</p>
                  </a> -->
                  <div class="list-group">
                    <h3>Permintaan khusus
                    <div class="btn-group pull-right">
                      <button type="button" class="btn btn-default">Left</button>
                      <button type="button" class="btn btn-default">Middle</button>
                      <button type="button" class="btn btn-default">Right</button>
                    </div>
                    </h3>
                  </div>

                </div>
                
                <script type="text/javascript">
                $(document).ready(function(){
                  
                });
                </script>
                