<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-calendar"></i> Jadwal Kerja dan Event
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h4 class="box-title">Pilih Item</h4>
          </div>
          <div class="box-body">
            <!-- the events -->
            <div id="external-events">
              <div class='external-event' style="background-color:#091B37; border-color:#091B37; color:rgb(255,255,255);" data-color="#091B37">Off</div>
              <div class='external-event' style="background-color:#2F9550; border-color:#2F9550; color:rgb(255,255,255);" data-color="#2F9550">PH/Cuti</div>
              <div class='external-event' style="background-color:#45aad1; border-color:#45aad1; color:rgb(255,255,255);" data-color="#45aad1">Event</div>
              <div class='external-event' style="background-color:#dd4b39; border-color:#dd4b39; color:rgb(255,255,255);" data-color="#dd4b39">Libur Nasional</div>
             </div>
          </div>
          <div class="box-footer">
            <div class="checkbox">
              <label for="drop-remove">
                <input type="checkbox" id="drop-remove">
                Enable Edit
              </label>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /. box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="box box-primary">
          <div class="box-body no-padding">
            <!-- THE CALENDAR -->
            <div id="calendar"></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /. box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<div class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="error"></div>
                <form class="form-horizontal" id="crud-form">
                <input type="hidden" id="start">
                <input type="hidden" id="end">
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="title">Judul</label>
                        <div class="col-md-4">
                            <input id="title" name="title" type="text" class="form-control input-md" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Keterangan</label>
                        <div class="col-md-4">
                            <textarea class="form-control" id="description" name="description" style="resize:none;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="color">Pilih Warna</label>
                        <div class="col-md-4">
                          <input id="color" name="color" style="background:#00c0ef;color:#fff;" type="text" class="form-control input-md" readonly="readonly" />
                          <!--span class="help-block">Klik untuk memilih warna</span-->
                          <ul class="fc-color-picker" id="color-chooser">
                            <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                            <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                          </ul>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
