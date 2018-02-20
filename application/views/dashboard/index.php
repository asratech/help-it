<div class="content-wrapper">

<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
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
        <div class="box">
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
                 <table id="dataTable2" class="table table-bordered table-striped">
                   <thead>
                      <tr>
                          <th>NO</th>
                          <th>DARI</th>
                          <th>TANGGAL</th>
                          <th>DEPARTEMEN</th>
                          <th>CATATAN</th>
                          <th>STATUS</th>
                          <th>AKSI</th>
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


  <!-- /.row (main row) -->
  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper-->
