<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header" style="padding-bottom: 30px;">
    <h1 class="pull-left">
      Departemen
    </h1>
    <div class="pull-right">
    <button class="btn btn-primary pull-right" name="button" onclick="tambah_departemen()" rel="tooltip" data-original-title="Tambah data departemen"><i class="fa fa-plus"></i> Tambah Data</button>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="box">
          <!--div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div-->
          <div class="box-body">
                <!--table class="table table-hover" id="dataTable"-->
                <table id="dataTable1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Departemen</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                      if($d_departemen){
                        foreach($d_departemen as $d){
                    ?>
                    <tr>
                      <td><?php echo $d->id_departemen; ?></td>
                      <td><?php echo $d->nama_departemen; ?></td>
                      <td>
                        <nobr>
                          <a onclick="ubah_departemen(<?php echo $d->id_departemen; ?>)" class="btn btn-xs btn-warning" rel="tooltip" data-tooltip="true" title="" data-original-title="Ubah"><i class="fa fa-pencil"></i></a>&nbsp;
                          <a class="btn btn-danger btn-xs hapus-data" href="#" data-url="<?php echo base_url() . 'departemen/hapus/' . $d->id_departemen ?>"  rel="tooltip" title="Hapus"><i class="fa fa-trash-o "></i></a>
                       </nobr>
                      </td>
                    </tr>
                    <?php
                        }
                      }
                    ?>
                  </tbody>
                </table>
          </div><!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- ./col-md6 -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content Main Content-->
</div>
<!-- /.content-wrapper-->
<div id="modalForm" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Belum Ada Judul</h4>
      </div>
      <div class="box-body">
        <form id="form" action="#" method="post" class="form-horizontal">
            <input type="hidden" name="txt_id">
            <div class="form-group ">
                <label for="kategori" class="col-md-3 control-label">Nama departemen</label>
                <div class="col-md-7 col-sm-12 required">
                  <input id="txt_departemen" type="text" name="txt_departemen" class="form-control" required placeholder="Nama departemen...">
                </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close icon-white"></i> Batal</button>
        <button type="submit" onclick="simpan_data()" class="btn btn-success"><i class="fa fa-check icon-white"></i> Simpan</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
