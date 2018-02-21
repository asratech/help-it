<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header" style="padding-bottom: 40px;">
    <h1 class="pull-left">
       ID Pekerjaan : <?php echo $id_identifikasi; ?>
    </h1>
    <div class="pull-right">
    <a onclick="history.go(-1)" href="#" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
  </section>

  <?php echo $this->session->flashdata('psn_sukses');?>
  <?php
    if($this->session->flashdata('psn_sukses')){
  ?>
    <div class="alert alert-success">
      <?php echo $this->session->flashdata('psn_sukses');?>
    </div>
  <?php
  }
  ?>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <!-- Permintaan Pekerjaan -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Permintaan</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
          <div class="box-body">

            <div class="form-group ">
                <label for="tgl" class="col-md-3 control-label">Tanggal</label>
                <div class="col-md-7 col-sm-12 required">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" value="<?php echo $tanggal_permintaan; ?>" name="txt_tanggal_permintaan" class="form-control pull-right" readonly>
                  </div>
                </div>
            </div>
            <!-- dari -->
            <div class="form-group ">
                <label for="dari" class="col-md-3 control-label">Dari</label>
                <div class="col-md-7 col-sm-12 required">
                  <input type="text" value="<?php echo $dari . ' [' . $departemen . ']'; ?>" class="form-control" name="txt_dari" readonly required>
                </div>
            </div>
            <!-- catatan -->
            <div class="form-group ">
                <label for="catatan" class="col-md-3 control-label">Catatan</label>
                <div class="col-md-7 col-sm-12 required">
                  <textarea style="resize:none;" rows="3" name="txt_catatan" class="form-control" required readonly><?php echo $catatan ?></textarea>
                </div>
            </div>
          </div>
          <!-- /.box-body -->
        </form>
      </div>
      <!-- /.box --> <!-- Permintaan Pekerjaan -->
    </div>
    <!-- /.col md6 permintaan -->

    <div class="col-md-6">
      <!-- Identifikasi Pekerjaan -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Identifikasi</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
          <div class="box-body">
            <!-- tgl identifikasi-->
            <div class="form-group ">
                <label for="tgl" class="col-md-3 control-label">Tanggal</label>
                <div class="col-md-7 col-sm-12 required">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" value="<?php echo $tanggal_identifikasi; ?>"  name="txt_tanggal_identifikasi" class="form-control pull-right" required readonly>
                  </div>
                </div>
            </div>
            <!-- identifikasi -->
            <div class="form-group ">
                <label for="catatan" class="col-md-3 control-label">Identifikasi</label>
                <div class="col-md-7 col-sm-12 required">
                  <textarea style="resize:none;" rows="3" name="txt_identifikasi" class="form-control" required readonly><?php echo $identifikasi ?></textarea>
                </div>
            </div>
            <!-- oleh -->
            <div class="form-group ">
                <label for="oleh" class="col-md-3 control-label">Oleh</label>
                <div class="col-md-7 col-sm-12 required">
                  <input type="text" value="<?php echo $identifikasi_oleh ?>" class="form-control" name="txt_oleh" readonly required>
                </div>
            </div>
          </div>
          <!-- /.box-body -->
        </form>
      </div>
      <!-- /.box --> <!-- /.box --> <!-- Permintaan Pekerjaan -->
    </div>
    <!-- /.col md6 identifikasi -->

    <div class="col-md-12">
      <!-- Solusi Pekerjaan -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Solusi</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="<?php echo base_url('identifikasi/simpan')?>" method="post" class="form-horizontal">
          <div class="box-body">
            <!-- id identifikasi -->
            <!-- kenapa dobel dan hidden? karena berada di form permintaan, yang cuma tampilan saja -->
            <!-- jadi ini buat lagi dummy id buat form action simpan -->

            <input type="hidden" value="<?php echo $id_identifikasi; ?>" class="form-control" name="txt_id" readonly required>
            <!-- tgl solusi-->
            <div class="form-group ">
                <label for="tgl" class="col-md-3 control-label">Tanggal Selesai</label>
                <div class="col-md-7 col-sm-12 required">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" value="<?php echo $tanggal_solusi ?>"  name="txt_tanggal_solusi" class="form-control pull-right"  readonly required>
                  </div>
                </div>
            </div>
            <!-- solusi -->
            <div class="form-group ">
                <label for="identifikasi" class="col-md-3 control-label">Solusi</label>
                <div class="col-md-7 col-sm-12 required">
                  <textarea style="resize:none;" rows="3" name="txt_solusi" class="form-control" readonly><?php echo $solusi ?></textarea>
                </div>
            </div>
            <!-- oleh -->
            <div class="form-group ">
                <label for="oleh" class="col-md-3 control-label">Oleh</label>
                <div class="col-md-7 col-sm-12 required">
                  <input type="text" value="<?php echo $solusi_oleh ?>" class="form-control" name="txt_solusi_oleh" readonly required>
                </div>
            </div>
            <div class="box-footer text-right">
              <button type="submit" name="btnCetak" class="btn bg-purple"><i class="fa fa-print"></i> Cetak</button>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
      <!-- /.box-body -->
      </div>
      <!-- /.box --> <!-- Solusi Pekerjaan -->

    </div>
    <!-- /.col md6 solusi -->
  </div><!-- row -->
</section>
<!-- /.section -->
</div>
<!-- /.content-wrapper-->
