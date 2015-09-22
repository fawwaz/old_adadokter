            <div class="row">
              <div class="col-md-12">
                <a href="#x" class="thumbnail">
                  <img src="<?=$info_dokter['profile_pic']?>">
                  <!-- <img src="http://placehold.it/250x250&text=foto dokter" alt="Image" /> -->
                </a>
              </div>
            </div>
            <div class="row">
              <div class="panel panel-default">
                <div class="panel-heading">Personal Statement</div>
                <div class="panel-body"><?php echo $info_dokter['statement']?>
                <hr>
                
                <!-- <div class="row">
                  <div class="col-md-12">
                    <table>
                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Sl</th>
                                <th>Rb</th>
                                <th>Km</th>
                                <th>Ju</th>
                                <th>Sa</th>
                                <th>Mi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>07:00</td>
                                <td>07:00</td>
                                <td>07:00</td>
                                <td>07:00</td>
                                <td>07:00</td>
                                <td>07:00</td>
                                <td>07:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                                <td>15:00</td>
                                <td>15:00</td>
                                <td>15:00</td>
                                <td>15:00</td>
                                <td>15:00</td>
                                <td>15:00</td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                </div> -->

                <hr>
                


              </div>
              </div>
            </div>

            <div class="row">
              <div class="panel panel-default">
                <div class="panel-heading">Info praktek</div>
                <div class="panel-body">

                  <div class="row">
                    <div class="col-md-12">
                      <table class="table">
                          <tbody>
                              <tr>
                                  <td><span class="glyphicon glyphicon-map-marker"></span> </td>
                                  <td><?= $where_works['alamat_klinik'];?></td>
                              </tr>
                              <tr>
                                  <td><span class="glyphicon glyphicon-earphone"></span></td>
                                  <td>+622 - 34567899</td>
                              </tr>
                              <!-- <tr>
                                  <td><span class="glyphicon glyphicon-envelope"></span></td>
                                  <td>Email@email.com</td>
                              </tr> -->
                          </tbody>
                      </table>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="row">
              <div class="panel panel-default">
                <div class="panel-heading">Info praktek</div>
                <div class="panel-body">

                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-bordered normal-panel">
                            <tr>
                                <td><span class="glyphicon glyphicon-stats"></span> Served</td>
                                <td><span class="label label-success">3127</span></td>
                            </tr>
                            <tr>
                                <td><span class="glyphicon glyphicon-time"></span> Awaiting </td>
                                <td><span class="label label-info">25</span></td>
                            </tr>
                            <tr>
                                <td><span class="glyphicon glyphicon-heart"></span> Rating</td>
                                <td><span class="label label-warning">4.8</span></td>
                            </tr>
                          </tbody>
                      </table>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>