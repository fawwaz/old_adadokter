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

    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron">
          <h2>Selamat datang , <?=$nama_user;?></h2>
          <p>Berikut ini informasi mengenai perjanjian dengan dokter yang anda akan lakukan</p>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <!-- <span class="glyphicon glyphicon-ok-sign"></span>
            List Perjanjian Yang sudah dikonfirmasi oleh dokter -->

            <ul class="nav nav-pills">
              <li class="active"> <a href="#Confirmed" data-toggle="tab"> <span class="glyphicon glyphicon-user"></span>Dokter Favorit Anda</a></li>
              <li> <a href="#Confirmed" data-toggle="tab"> <span class="glyphicon glyphicon-ok-sign"></span>Sudah Dikonfirmasi</a></li>
              <li> <a href="#Confirmed" data-toggle="tab"> <span class="glyphicon glyphicon-remove"></span>Belum Dikonfirmasi</a></li>
              <li> <a href="#Confirmed" data-toggle="tab"> <span class="glyphicon glyphicon-envelope"></span>Pesan Pribadi</a></li>
            </ul>

            
          </div>
          <div class="panel-body">
            
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>Lokasi Klinik</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $i=0; foreach ($req_list as $key=>$value) { ?>
                    <tr>
                        <td><?=$i?>. </td>
                        <td><a href="<?=base_url().'dokter/'.$value['alias']?>"><?=$value['nama_dokter']?></a></td>
                        <td><?=$value['alamat_klinik']?></td>
                        <td><?=$value['tanggal_jam']?></td>
                        <?php if($value['status']!='confirmed') { ?>
                          <td><a href="cancel_request?id_request=<?=$value['id_request']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Batalkan</a></td>
                        <?php }else{ ?>
                        <td><a href="#" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Confirmed</a></td>
                        <?php }?>
                    </tr>

                  <?php $i++; }?>
                </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>