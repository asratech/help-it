<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header" style="padding-bottom: 30px;">
    <h1 class="pull-left">
      <i class="fa fa-tint"></i> Refill Tinta Printer
    </h1>


  <div class="pull-right">
    <a href="<?php echo base_url('refill/tambah')?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Data</a>
  </div>

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
                         <th>PRINTER</th>
                         <th>DEPARTEMEN</th>
                         <th>REFILL TERAKHIR</th>
                         <th>OLEH</th>
                         <th>AKSI</th>
                     </tr>
                 </thead>
                 <tbody>
                   <?php if ($d_refill) {
                      foreach($d_refill as $d) {?>
                     <tr>
                         <td><?php echo $d->id_refill; ?></td>
                         <td><?php echo $d->printer; ?></td>
                         <td><?php echo $d->departemen; ?></td>
                         <td><?php echo $d->refill_terakhir; ?></td>
                         <td><?php echo $d->oleh; ?></td>
                         <td>
                             <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'refill/refill/' . $d->id_refill ?>" rel="tooltip" title="Refill Tinta"><i class="fa fa-tint"></i></a>
                             <a class="btn btn-warning btn-xs" href="<?php echo base_url() . 'refill/ubah/' . $d->id_refill ?>" rel="tooltip" title="Ubah"><i class="fa fa-pencil " ></i></a>
                             <a class="btn btn-danger btn-xs hapus-data" href="#" data-url="<?php echo base_url() . 'refill/hapus/' . $d->id_refill ?>"  rel="tooltip" title="Hapus"><i class="fa fa-trash-o "></i></a>
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
