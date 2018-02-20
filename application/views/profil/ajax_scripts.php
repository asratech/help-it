<script>

  function simpan_data(){
    var url;

    url = '<?php echo base_url('profil/update_password') ?>';

    if($('#txt_pass1').val().length == 0){
      alert('Password tidak boleh kosong');
    }
    else {
      if($('#txt_pass2').val().length == 0){
          alert('Konfirmasi password tidak boleh kosong');
      }
      else {
        if($('#txt_pass1').val() == $('#txt_pass2').val())
        {
          $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data){

              $('#modalForm').modal('hide');
              $('#modalForm').on("hidden.bs.modal", function () {
                  window.location = "<?php echo base_url('admin/logout')?>";
                  });
              //parent.window.location("www.detik.com");

            },
            error: function(jqXHR, textStatus, errorThrown){
              alert('Error menyimpan data');
            }
          });
        }
        else{
            alert('Password dan konfirmasi harus sama!');
        }
      }
    }
  }

  function tampil_modal(){
    $('#form')[0].reset();
    $('#modalForm').modal('show');
    $('.modal-title').text('Ubah password');
  }

  /*
  $(function () {

    // We can attach the `fileselect` event to all file inputs on the page
    $(document).on('change', ':file', function() {
      var input = $(this),
          numFiles = input.get(0).files ? input.get(0).files.length : 1,
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [numFiles, label]);
    });

    // We can watch for our custom `fileselect` event like this
    $(document).ready( function() {
        $(':file').on('fileselect', function(event, numFiles, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }

        });
    });

  });
*/

$('#file').change(function() {
  $('#target').submit();
});
</script>
