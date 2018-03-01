    <footer class="main-footer hidden-print">
      <div class="pull-right hidden-xs">
        <b>Version</b> v1.1.9 - build 3124 (master)
        <a target="_blank" class="btn btn-default btn-xs" href="http://zdienos.com" rel="noopener">User's Manual</a>
        <a target="_blank" class="btn btn-default btn-xs" href="https://zdienos.com/support" rel="noopener">Report a Bug</a>
      </div>
      <a target="_blank" href="http://zdienos.com" rel="noopener">Help-IT</a> is a personal
        project, made with <i class="fa fa-heart" style="color: #a94442; font-size: 10px"></i> by <a href="https://twitter.com/zdienos" rel="noopener">@zdienos</a>.
    </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- Bootstrap slider -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap-slider/bootstrap-slider.js"></script>

<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>


<!-- colorpicker -->
<script src='<?php echo base_url();?>assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js'></script>

<!-- notify -->
<script src="<?php echo base_url();?>assets/plugins/notify/notify.min.js"></script>


<!-- sweetAlert -->
<script src="<?php echo base_url();?>assets/plugins/sweetalert/sweetalert.min.js"></script>


<script>
  function isNumber(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
          alert("Harus berupa angka!");
          return false;
      }
      return true;
  }

  $('.select2').select2({width: '100%', dropdownParent: $('#modalForm')});
  $('#optDepartemen').select2({placeholder: "Pilh Departemen...", width: '100%'});
  $('#optDepartemen2').select2({placeholder: "Pilh Departemen...", width: '100%'});
  $('#optLokasi').select2({placeholder: "Pilh Lokasi...", width: '100%'});
  $('#optPersentase').select2({width: '100%'});
  $('#optTipe').select2({placeholder: "Pilh Tipe...", width: '100%'});
  $('#optPemakai').select2({placeholder: "Pilh Pengguna...", width: '100%'});

  //Date picker
  $('#datepicker').datepicker({
      autoclose: true,
      locale: 'no',
      format: 'yyyy-mm-dd',
    })
  $('#datepickerNow').datepicker({
      autoclose: true,
      locale: 'no',
      format: 'yyyy-mm-dd',
    })
  $('#datepickerNow').datepicker('setDate', 'today');

  //$('.tooltip').tooltip();
  $("[rel='tooltip']").tooltip();

  //dataTables
  $('#dataTable1').DataTable({"bAutoWidth": false})
  $('#dataTable2').DataTable()

</script>

<?php
  if($this->session->flashdata('psn_sukses')){
    $pesan = $this->session->flashdata('psn_sukses');
    echo '<script>';
    echo 'swal("'. $pesan .'", {icon: "success", button:false, timer:1500});';
    echo '</script>';
  }
?>
<?php
  if($this->session->flashdata('psn_error')){
    $pesan = $this->session->flashdata('psn_error');
    echo '<script>';
    echo 'swal("'. $pesan .'", {icon: "error", button:false, timer:1500});';
    echo '</script>';
  }
?>

<script>
     $('.hapus-data').on('click', function(e){
        e.preventDefault(); //cancel default action

        var href = $(this).attr('data-url');

        //pop up
        swal({
            title: "Anda yakin ingin menghapus data?",
            icon: "warning",
            buttons: ["Tidak", "Ya"],
            dangerMode: true,
        })
        .then((hapus) => {
          if (hapus) {
            //swal("Data sudah dihapus!", {
            //  icon: "success",
            //});
            window.location.href = href;
            //setTimeout(function(){ window.location.href = href; }, 500);
          }
          else {
          }
        });
    });

</script>
