<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dara Pekerjaan Selesai
    </h1>
  </section>

<!-- Main content -->
  <section class="content">

    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
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
