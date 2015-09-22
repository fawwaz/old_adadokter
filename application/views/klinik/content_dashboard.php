                
                
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>Manajemen dokter</h4>
                    </div>
                    <div class="panel-body">
                      <div class="alert alert-success">
                        <p>Berikut ini dokter yang bekerja pada klinik anda</p>
                      </div>
                      
                      

                      <div class="list-group">
                        <h3> List Dokter
                        <div class="btn-group pull-right">
                          <button id="tambah_request" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Request</button>
                        </div>
                        </h3>
                      </div>
                      
                      <form method="post" id="request_form_confirmation">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Request</th>
                                    <th>Dokter</th>
                                    <th>Informasi Pasien</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $i=1; foreach($req_list as $r){?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$r['tanggal_jam']?></td>
                                    <td><a href="<?=base_url('dokter/'.$r['alias'])?>"><?=$r['nama_dokter']?></td>
                                    <td><?=$r['nama_pasien']?> (<?=$r['no_hp']?>)</td>
                                    <td>
                                      <?php 
                                       if($r['status']=='confirmed'){
                                        echo '<a href="#" class="btn btn-success"> <span class="glyphicon glyphicon-ok"></span></a>';
                                       }else if($r['status']=='req'){
                                        echo '<a href="#" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span></a>';
                                       }
                                      ?>
                                    </td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                      </form>
                      <?=$the_pagination?>
                    </div>
                  </div>
                

                
            
            