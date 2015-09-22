                
                
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>Manajemen dokter</h4>
                    </div>
                    <div class="panel-body">
                      <div class="alert alert-success">
                        <p>Berikut ini dokter yang bekerja pada klinik ini</p>
                      </div>
                      
                      

                      <!-- <div class="list-group">
                        <h3> List Dokter
                        <div class="btn-group pull-right">
                          <button id="tambah_dokter" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Dokter</button>
                        </div>
                        </h3>
                      </div> -->


                      
                      <form method="post" id="request_form_confirmation">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Dokter</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                              <?php $i=1; foreach($dokters as $d){?>
                                <tr>
                                    <td>
                                      <div class="col-xs-2"><img src="<?=$d['profile_pic']?>" height="50px"></div> <?=$d['nama_dokter']?> 
                                      <div class="pull-right">
                                        <a href="#" class="btn btn-sm btn-success">Kunjungi <span class="glyphicon glyphicon-chevron-right"></span></a>
                                      </div>
                                    </td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                      </form>


                      <div class="row"> 
                        <div class="col-md-12">
                          <div id="links">
                              <a href="images/banana.jpg" title="Banana" data-gallery>
                                  <img src="<?=$info_klinik['foto_1']?>" alt="Banana">
                              </a>
                              <a href="images/apple.jpg" title="Apple" data-gallery>
                                  <img src="<?=$info_klinik['foto_2']?>" alt="Apple">
                              </a>
                              <a href="images/orange.jpg" title="Orange" data-gallery>
                                  <img src="<?=$info_klinik['foto_3']?>" alt="Orange">
                              </a>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>


                  <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
                  <div id="blueimp-gallery" class="blueimp-gallery">
                      <!-- The container for the modal slides -->
                      <div class="slides"></div>
                      <!-- Controls for the borderless lightbox -->
                      <h3 class="title"></h3>
                      <a class="prev">‹</a>
                      <a class="next">›</a>
                      <a class="close">×</a>
                      <a class="play-pause"></a>
                      <ol class="indicator"></ol>
                      <!-- The modal dialog, which will be used to wrap the lightbox content -->
                      <div class="modal fade">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" aria-hidden="true">&times;</button>
                                      <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body next"></div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-default pull-left prev">
                                          <i class="glyphicon glyphicon-chevron-left"></i>
                                          Previous
                                      </button>
                                      <button type="button" class="btn btn-primary next">
                                          Next
                                          <i class="glyphicon glyphicon-chevron-right"></i>
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                

                
            
            