                
                
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
                          <button id="tambah_dokter" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Dokter</button>
                        </div>
                        </h3>
                      </div>
                      
                      <form method="post" id="request_form_confirmation">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Dokter</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $i=1; foreach($dokters as $d){?>
                                <tr>
                                    <td><div class="col-xs-2"><img src="<?=$d['profile_pic']?>" height="50px"></div> <?=$d['nama_dokter']?> </td>
                                    <td><a href="manajemen_dokter?action=delete&id_dokter=<?=$d['id_dokter']?>" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> Hapus</a></td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                      </form>
                    </div>
                  </div>
                

                
            
            