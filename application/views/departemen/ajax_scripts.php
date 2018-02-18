<script>
  var save_method;
  var table;

  function tambah_departemen(){
    save_method = 'tambah';
    $('#form')[0].reset();
    $('.modal-title').text('Tambah departemen');
    $('#modalForm').modal('show');
  }

  function simpan_data(){
    var url;

    if(save_method =='tambah'){
      url = '<?php echo base_url() . 'departemen/tambah_departemen' ?>';
    } else{
      url = '<?php echo base_url() . 'departemen/update_departemen' ?>';
    }

    if($('#txt_departemen').val().length == 0)
    {
        alert('Tidak boleh kosong');
    }
    else {
      $.ajax({
        url: url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data){
          $('#modalForm').modal('hide');
          location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown){
          alert('Error menyimpan data');
        }
      });
    }
  }

  function ubah_departemen(id){
    save_method = 'update';
    $('#form')[0].reset();

    //load data ajax_scripts
    $.ajax({
      url: "<?php echo base_url() . 'departemen/ubah/';?>"+id,
      type: "GET",
      dataType: "JSON",
      success: function(data){      
        $('[name="txt_id"]').val(data.id_departemen);
        $('[name="txt_departemen"]').val(data.nama_departemen);

        $('#modalForm').modal('show');
        $('.modal-title').text('Ubah departemen');
      },
      error: function(jqXHR, textStatus, errorThrown){
        alert('Error get data from Ajax');
      }
    });
  }

  function hapus_departemen(id){
    if(confirm('Anda yakin akan menghapus data?')){
      $.ajax({
        url: "<?php echo base_url() . 'departemen/hapus_departemen/';?>"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
          location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown){
          alert('Error menghapus data');
        }
      })
    }
  }

</script>
