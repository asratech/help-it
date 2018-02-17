<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header" style="padding-bottom: 40px;">
    <h1 class="pull-left">
      Identifikasi Pekerjaan
    </h1>
    <div class="pull-right">
    <a href="<?php echo base_url('identifikasi')?>" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
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

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
              <form action="<?php echo base_url('identifikasi/simpan_update')?>" method="post" class="form-horizontal">
                  <!-- no -->
                  <div class="form-group ">
                      <label for="no" class="col-md-3 control-label">ID</label>
                      <div class="col-md-7 col-sm-12 required">
                        <input type="text" value="<?php echo $id_permintaan; ?>" class="form-control" name="txt_id" readonly required>
                      </div>
                  </div>
                  <!-- dari -->
                  <div class="form-group ">
                      <label for="dari" class="col-md-3 control-label">Dari</label>
                      <div class="col-md-7 col-sm-12 required">
                        <input type="text" value="<?php echo $dari; ?>" class="form-control" name="txt_dari" readonly required>
                      </div>
                  </div>
                  <!-- departemen -->
                  <div class="form-group ">
                      <label for="departemen" class="col-md-3 control-label">Departemen</label>
                      <div class="col-md-7 col-sm-12 required">
                        <input type="text" value="<?php echo $departemen; ?>" class="form-control" name="txt_departemen" readonly required>
                      </div>
                  </div>
                  <!-- catatan -->
                  <div class="form-group ">
                      <label for="catatan" class="col-md-3 control-label">Catatan</label>
                      <div class="col-md-7 col-sm-12 required">
                        <textarea style="resize:none;" rows="3" name="txt_catatan" class="form-control" required readonly><?php echo $catatan ?></textarea>
                      </div>
                  </div>
                  <!-- tgl identifikasi-->
                  <div class="form-group ">
                      <label for="tgl" class="col-md-3 control-label">Tanggal</label>
                      <div class="col-md-7 col-sm-12 required">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" value="<?php echo $tanggal_identifikasi; ?>"  name="txt_tanggal_identifikasi" id="datepickerNow" class="form-control pull-right" required>
                        </div>
                      </div>
                  </div>
                  <!-- persentase -->
                  <div class="form-group">
                    <input type="hidden" value="<?php echo $persentase; ?>"  name="txt_persentase" required>
                    <label for="tgl" class="col-md-3 control-label" style="padding:0 15px;">Persentase</label>
                    <div class="col-md-7 col-sm-12 required" style="height:20px;">
                      <div class="progress" style="">
                        <div class="progress-bar progress-bar-warning" role="progressbar" <?php echo "style='width:$persentase ;'" ?> aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $persentase ?></div>
                      </div>
                    </div>

                  </div>
                  <!-- identifikasi -->
                  <div class="form-group ">
                      <label for="catatan" class="col-md-3 control-label">Update Identifikasi</label>
                      <div class="col-md-7 col-sm-12 required">
                        <textarea style="resize:none;" rows="3" name="txt_identifikasi" class="form-control" required><?php echo $identifikasi ?></textarea>
                      </div>
                  </div>

                  <div class="box-footer text-right">
                    <a class="btn btn-default" href="<?php echo base_url('identifikasi/update/'. $id_permintaan )?>"><i class="fa fa-close"></i> Batal</a>
                    <button type="submit" name="btnSimpan" class="btn btn-success"><i class="fa fa-check icon-white"></i> Update</button>
                  </div>
                </form>
            </div>
        </div>
    </div> <!-- col -->
  </div><!-- row -->

</div>
<!-- /.content-wrapper-->
