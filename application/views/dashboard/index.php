<div class="content-wrapper">

<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-dashboard"></i> Dashboard
    </h1>
  </section>

<!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>
              <?php
                if ($total_waiting) {
                    echo $total_waiting;
                } else {
                    echo "0";
                }
              ?>
            </h3>
            <p>Waiting</p>
          </div>
          <div class="icon">
            <i class="fa fa-flash"></i>
          </div>
          <a href="<?php echo base_url('permintaan')?>" class="small-box-footer">info... <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>
              <?php
                if ($total_progress) {
                    echo $total_progress;
                } else {
                    echo "0";
                }
              ?>
            </h3>

            <p>On Progress </p>
          </div>
          <div class="icon">
            <i class="fa fa-wrench"></i>
          </div>
          <a href="<?php echo base_url('identifikasi')?>" class="small-box-footer">info... <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <?php
              if ($total_pekerjaan) {
                $total_pekerjaan = $total_pekerjaan;
                $total_selesai = $total_finished;
                $persentase = $total_selesai/$total_pekerjaan*100;
                 ?>
                <h3><?php echo round($persentase,2); ?><sup style="font-size: 20px">%</sup></h3>
              <?php
            } else {
              ?>
                  <h3>0<sup style="font-size: 20px">%</sup></h3>
              <?php }
            //buat fungsi untuk menghitung persentase pekerjaan yang selesai dari total Pekerjaan
              ?>
            <p>Finished</p>
          </div>
          <div class="icon">
            <i class="fa fa-flag-checkered"></i>
          </div>
          <a href="<?php echo base_url('dashboard/finished')?>" class="small-box-footer">info... <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>

    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Permintaan Pekerjaan</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                 <table id="dataTable2" class="table table-bordered table-striped table-hover">
                   <thead>
                      <tr>
                          <th>No</th>
                          <th>Dari</th>
                          <th>Tanggal</th>
                          <th>Departemen</th>
                          <th>Catatan</th>
                          <th>Status</th>
                          <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($d_permintaan){
                         foreach($d_permintaan as $d) {?>
                      <tr>
                          <td><?php echo $d->id_permintaan; ?></td>
                          <td><?php echo $d->dari; ?></td>
                          <td><?php echo $d->tanggal; ?></td>
                          <td><?php echo $d->departemen; ?></td>
                          <td><?php echo $d->catatan; ?></td>
                          <td>
                          <?php if($d->status == "Waiting"){ ?>
                              <span class="label label-lg label-danger">Waiting</span>
                          <?php } elseif ($d->status == "On Progress"){ ?>
                              <span class="label label-warning">On Progress</span>
                          <?php } else { ?>
                              <span class="label label-success">Finished</span>
                          <?php } ?>
                          </td>
                          <td>
                          <?php if($d->status == "Waiting"){ ?>
                              <a class="btn btn-xs btn-info" href="<?php echo base_url() . 'permintaan/identifikasi/' . $d->id_permintaan ?>" rel="tooltip" title="Identifikasi"><i class="fa fa-wrench"></i></a>
                          <?php } elseif ($d->status == "On Progress"){ ?>
                              <a class="btn btn-xs btn-info" href="<?php echo base_url() . 'identifikasi/solusi/' . $d->id_permintaan ?>" rel="tooltip" title="Selesaikan"><i class="fa fa-flag"></i></a>
                              <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'identifikasi/update/' . $d->id_permintaan ?>" rel="tooltip" title="Update"><i class="fa fa-upload"></i></a>
                          <?php } else { ?>
                              <a class="btn btn-xs btn-info" href="<?php echo base_url() . 'dashboard/lihat/' . $d->id_permintaan ?>" rel="tooltip" title="Lihat"><i class="fa fa-eye"></i></a>
                          <?php } ?>
                          </td>
                      </tr>
                      <?php
                        }
                      } ?>
                    </tbody>
                  </table>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!--box body-->
          </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Second row -->
    <div class="row">
      <div class="col-md-6">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Data Refill Printer</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                 <table id="dataTable1" class="table table-bordered table-striped table-hover">
                   <thead>
                      <tr>
                          <th>Printer [Departemen]</th>
                          <th>Refill Terakhir</th>
                          <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($d_refill){
                         foreach($d_refill as $d) {?>
                      <tr>
                          <td><?php echo $d->printer . ' ['.$d->departemen.']'; ?></td>
                          <td>
                          <?php
                            $tgl_awal=$d->refill_terakhir;
                            $tgl_sekarang=mdate('%Y-%m-%d');
                            $range = date_range($tgl_awal, $tgl_sekarang);
                            $jumlah=0;
                            if($d->refill_terakhir){
                              foreach ($range as $z)
                              {
                                $jumlah=$jumlah+1;
                              }
                            }
                          	if($jumlah > 20){
                          				echo '<span class="label label-lg label-danger">'.$d->refill_terakhir.'</span>';
                          	 } elseif ($jumlah >10){
                          				echo '<span class="label label-warning">'.$d->refill_terakhir.'</span>';
                          	 } else {
                          				echo '<span class="label label-success">'.$d->refill_terakhir.'</span>';
                          	}
                            ?>
                          </td>
                          <td><a class="btn btn-info btn-xs" href="<?php echo base_url() . 'refill/refill/' . $d->id_refill ?>" rel="tooltip" title="Refill Tinta"><i class="fa fa-tint"></i></a></td>
                      </tr>
                      <?php
                        }
                      } ?>
                    </tbody>
                  </table>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!--box body-->
          </div><!-- /.box -->
        </div><!-- /.col -->

        <div class="col-md-6">
          <!-- Box Comment -->
          <div class="box box-info">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="<?php echo base_url('assets/dist/img/user1-128x128.jpg')?>" alt="User Image">
                <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                <span class="description">Shared publicly - 7:30 PM Today</span>
              </div>
              <!-- /.user-block -->

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
              <p>Far far away, behind the word mountains, far from the
                countries Vokalia and Consonantia, there live the blind
                texts. Separated they live in Bookmarksgrove right at</p>

              <p>the coast of the Semantics, a large language ocean.
                A small river named Duden flows by their place and supplies
                it with the necessary regelialia. It is a paradisematic
                country, in which roasted parts of sentences fly into
                your mouth.</p>

            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="<?php echo base_url('assets/dist/img/user3-128x128.jpg')?>" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        Maria Gonzales
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="<?php echo base_url('assets/dist/img/user5-128x128.jpg')?>" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        Nora Havisham
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                  The point of using Lorem Ipsum is that it has a more-or-less
                  normal distribution of letters, as opposed to using
                  'Content here, content here', making it look like readable English.
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <form action="#" method="post">
                <img class="img-responsive img-circle img-sm" src="<?php echo base_url('assets/dist/img/user4-128x128.jpg')?>" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                  <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                </div>
              </form>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
    </div><!-- /.row -->




  <!-- /.row (second row) -->
  </section>
<!-- /.content -->
</div>


<!-- /.content-wrapper-->
