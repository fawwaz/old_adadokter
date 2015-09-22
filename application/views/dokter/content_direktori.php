  
              <div class="jumbotron">
                <div class="container">
                  <h1>Cari dokter favoritmu disini!</h1>
                  <p>Berikut ini dokter yang berafiliasi dengan adadokter.com</p>
                  <p>
                    <a class="btn btn-primary btn-large">Learn more</a>
                  </p>
                </div>
              </div>


              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="panel-title">
                    <div class="row">
                      <div class="col-xs-6 col-xs-offset-3">
                        <?=form_open('site/direktori_dokter', array('method'=>'post'));?>
                        <div class="input-group custom-search-form">
                          <!-- <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Dokter <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="#">Action</a></li>
                              <li><a href="#">Another action</a></li>
                              <li><a href="#">Something else here</a></li>
                              <li class="divider"></li>
                              <li><a href="#">Separated link</a></li>
                            </ul>
                          </div> -->
                          <span class="input-group-btn">
                            <select class="form-control"> 
                                <span class="caret"></span>
                                <option value="one">One</option>
                                <option value="two">Two</option>
                                <option value="three">Three</option>
                                <option value="four">Four</option>
                                <option value="five">Five</option>
                            </select>
                          </span>

                          <input type="text" class="form-control" name="keyword">

                          <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                            </button>
                          </span>

                       </div><!-- /input-group -->
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /panel heading -->

                <div class="panel-body">
                  <div class="col-md-8">
                    <?php foreach ($dokters as $d) { ?>
                    <div class="row">
                      <!-- <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x100"></div> -->
                      <div class="col-sm-3 col-md-3 col-xs-3 profile_img_direktori_wrapper">
                        <!-- <img class="img-responsive" src="<?=$d['profile_pic']?>"><p>Di krop biar ukuranya semuanya seragam crop css aja </p> -->
                        <div style="120px; background-image:url('http://placehold.it/200x200'); background-position:center center; background-repeat:no-repeat;" class="profile_img_direktori">
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <h4 class="product-name"><strong><a href="<?=base_url('dokter/'.$d['alias'])?>"><?=$d['nama_dokter']?></a></strong></h4>
                        <h4><small><?=$d['alamat_klinik']?></small></h4>
                      </div>
                      
                    </div>
                    <hr>
                    <?php }?>

                    
                    <!-- /left -->
                  </div>

                  <!-- <div class="col-md-4">
                    <div class="row">
                      <img src="http://placehold.it/300x500&text=peta+lokasi">
                    </div>
                  </div> -->

                  <!-- /right -->
                </div>

                <div class="panel-footer">
                  <div class="row">
                    <div class="col-xs-6 text-left">
                      <?=$links?>
                    </div>
                    
                  </div>
                </div>
                <!-- /panel body -->
              </div>
