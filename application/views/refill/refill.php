<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header" style="padding-bottom: 40px;">
    <h1 class="pull-left">
      Refill Tinta
    </h1>
    <div class="pull-right">
    <a onclick="history.go(-1)" href="#" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
  </section>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
              <form action="<?php echo base_url('refill/refilling')?>" method="post" class="form-horizontal">
                  <!-- no -->
                  <div class="form-group ">
                      <label for="no" class="col-md-3 control-label">ID</label>
                      <div class="col-md-7 col-sm-12 required">
                        <input type="text" value="<?php echo $d_refill->id_refill; ?>" class="form-control" name="txt_id" readonly required>
                      </div>
                  </div>
                  <!-- printer -->
                  <div class="form-group ">
                      <label for="dari" class="col-md-3 control-label">Printer</label>
                      <div class="col-md-7 col-sm-12 required">
                        <input type="text" value="<?php echo $d_refill->printer; ?>" class="form-control" name="txt_printer" readonly required>
                      </div>
                  </div>
                  <!-- departemen -->
                  <div class="form-group ">
                      <label for="tipe" class="col-md-3 control-label">Departemen</label>
                      <div class="col-md-7 required">
                        <select class="form-control select2" style="min-width:350px;" required disabled="disabled" name="opt_departemen" id="optDepartemen">
                          <option></option>
                           <?php
                           if($d_departemen){
                             foreach($d_departemen as $d){
                               if($d_refill->departemen==$d->nama_departemen){echo "<option value='$d->nama_departemen' selected='selected'>$d->nama_departemen</option>";}
                               else
                               {
                               echo "<option value='$d->nama_departemen'>$d->nama_departemen</option>";
                              }
                            }
                          }
                          ?>
                        </select>
                      </div>
                  </div>
                  <!-- oleh -->
                  <div class="form-group ">
                      <label for="dari" class="col-md-3 control-label">oleh</label>
                      <div class="col-md-7 col-sm-12 required">
                        <input type="text" value="<?php echo $this->session->userdata['nama_lengkap'];?>" class="form-control" name="txt_oleh" required readonly>
                      </div>
                  </div>
                  <!-- tgl-->
                  <div class="form-group ">
                      <label for="tgl" class="col-md-3 control-label">Tanggal</label>
                      <div class="col-md-7 col-sm-12 required">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="txt_refill_terakhir" class="form-control pull-right" id="datepickerNow" data-date-format="dd/mm/yyyy" required>
                        </div>
                      </div>
                  </div>
                  <div class="box-footer text-right">
                    <a class="btn btn-default" href="<?php echo base_url('refill/refill/' .  $d_refill->id_refill)?>"><i class="fa fa-close"></i> Batal</a>
                    <button type="submit" name="btnSimpan" class="btn btn-success"><i class="fa fa-check icon-white"></i> Simpan</button>
                  </div>
                </form>
            </div>
        </div>
    </div> <!-- col -->
  </div><!-- row -->

</div>
<!-- /.content-wrapper-->
