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


$('#file').change(function() {
  $('#target').submit();
});
</script>
