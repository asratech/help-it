<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header" style="padding-bottom: 30px;">
    <h1 class="pull-left">
      <i class="fa fa-wrench"></i>  Identifikasi Pekerjaan
    </h1>




  </section>

<!-- Main content -->
  <section class="content">

  <!-- Main row -->
    <div class="row">
      <div class="col-md-12">

        <div class="box box-primary">
        <!--
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div><! /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <table id="dataTable1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th>NO</th>
                         <th>TANGGAL</th>
                         <th>DARI</th>
                         <th>IDENTIFIKASI</th>
                         <th>STATUS</th>
                         <th>AKSI</th>
                     </tr>
                 </thead>
                 <tbody>
                   <?php
                      if($d_identifikasi){
                     foreach($d_identifikasi as $d) {?>
                     <tr>
                         <td><?php echo $d->id_identifikasi; ?></td>
                         <td><?php echo $d->tanggal; ?></td>
                         <td><?php echo $d->dari . ' [' . $d->departemen . ']'; ?></td>
                         <td><?php echo $d->identifikasi; ?></td>
                         <td>
                          <span class="label label-warning label" ><?php echo $d->status .' ('.$d->persentase.')'; ?></span>
                         </td>
                         <td>
                             <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'identifikasi/solusi/' . $d->id_identifikasi ?>" rel="tooltip" title="Selesaikan"><i class="fa fa-flag"></i></a>
                             <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'identifikasi/update/' . $d->id_identifikasi ?>" rel="tooltip" title="Update"><i class="fa fa-upload"></i></a>
                         </td>
                     </tr>
                     <?php }
                   }?>
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
