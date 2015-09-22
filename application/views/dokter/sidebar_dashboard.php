
            <div class="row">
              <div class="col-md-12">
                <a href="#x" class="thumbnail"><img src="http://placehold.it/250x250&text=foto dokter" alt="Image" /></a>
                <!-- <a href="#x" class="thumbnail"><img src="<?=$info_dokter['profile_pic']?>" alt="Image" /></a> -->
              </div>
            </div>
            <div class="row">
              <div class="panel panel-default">
                <div class="panel-heading">Menu</div>
                <div class="panel-body">
                  <ul class="nav nav-pills nav-stacked"> 
                    <li class="<?php echo ($active=='dashboard' ? 'active' : '');?>"><a href="<?=base_url().'dokter/dashboard'?>" ><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
                    <li class="<?php echo ($active=='settings' ? 'active' : '');?>"><a href="<?=base_url().'dokter/update'?>"><span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
                    <!-- <li><a href="#setting" >Settings</a></li> -->
                    <li class="<?php echo ($active=='schedule' ? 'active' : '');?>"><a href="<?=base_url().'dokter/update_jadwal'?>" > <span class="glyphicon glyphicon-list"></span> Penjadwalan</a></li>
                    <!-- <li class="<?php echo ($active=='usulkan' ? 'active' : '');?>"><a href="#usulkan" >Usulkan Fitur</a></li> -->
                    <li class="<?php echo ($active=='schedule' ? 'active' : '');?>"><a href="<?=base_url().'dokter/logout'?>" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                  </ul>
                </div>

              </div>
            </div>