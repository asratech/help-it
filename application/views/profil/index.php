<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Profil Pengguna
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url() . $this->session->userdata('avatar');?>" alt="User profile picture">
            <h3 class="profile-username text-center"><?php echo $this->session->userdata('nama_lengkap'); ?></h3>
            <p class="text-muted text-center"><?php echo $this->session->userdata('nama_user');?></p>
            <?php
            echo form_open_multipart(base_url('profil/upload_gambar'), 'id="target"');
            ?>
            <label class="btn btn-sm btn-block btn-primary">
                Pilih Foto <input type="file" id="file" style="display: none;" name="gambar">
            </label>
            <!-- ndak usah pake tombol submit, karena otomatis submit mi
            button type="submit" class="btn btn-sm btn-block btn-primary">Update Foto</button-->
            <?php
            echo form_close();
            ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">

            <!-- disable dulu
            rencana buat aktifitas harian
            li class="active"><a href="#timelinez" data-toggle="tab">Aktifitas</a></li-->
            <li class="active"><a href="#settings" data-toggle="tab">Edit</a></li>
            <!--li><a href="#avatar" data-toggle="tab">Foto</a></li-->
          </ul>
          <div class="tab-content">

            <div class="tab-pane" id="timelinez">
              <!-- The timeline -->
              <ul class="timeline timeline-inverse">
                <!-- timeline time label -->
                <li class="time-label">
                      <span class="bg-red">
                        10 Feb. 2014
                      </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-envelope bg-blue"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                    <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-primary btn-xs">Read more</a>
                      <a class="btn btn-danger btn-xs">Delete</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-user bg-aqua"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                    </h3>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-comments bg-yellow"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                    <div class="timeline-body">
                      Take me to your leader!
                      Switzerland is small and neutral!
                      We are more like Germany, ambitious and misunderstood!
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <li class="time-label">
                      <span class="bg-green">
                        3 Jan. 2014
                      </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-camera bg-purple"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                    <div class="timeline-body">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
            </div>
            <!-- /.tab-pane -->

            <div class="active tab-pane" id="settings">
              <form class="form-horizontal" action="<?php echo base_url() . 'profil/update_profil/' . $this->session->userdata('id_user'); ?>" method="post">
                <input type="hidden" name="txt_id" value="<?php echo $this->session->userdata('id_user');?>" class="form-control" placeholder="Nama login..." required>
                <div class="form-group">
                  <label for="namaLogin" class="col-sm-2 control-label">Nama Login</label>
                  <div class="col-sm-7">
                    <input type="text" name="txt_username" value="<?php echo $this->session->userdata('nama_user');?>" class="form-control" placeholder="Nama login..." required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="namaLengkap" class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-7">
                    <input type="text" name="txt_name" value="<?php echo $this->session->userdata('nama_lengkap');?>" class="form-control"  placeholder="Nama lengkap..." required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" onclick="tampil_modal()" class="btn btn-danger">Ubah Password</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="avatar">
              <h4>Ganti foto profil</h4>

              <?php
              echo form_open_multipart(base_url('profil/upload_gambar'));
              ?>
              <div class="form-group">

                <label class="btn btn-block btn-primary">
                    Upload Foto <input onchange="document.getElementById('file').click();" type="file" id="file" style="display: none;" name="gambar">
                </label>
                  <button type="submit" class="btn btn-primary">Update Foto</button>

              </div>

              <?php
              echo form_close();
              ?>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>

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
                <label for="password1" class="col-md-4 control-label">Password Baru</label>
                <div class="col-md-6 col-sm-12 required">
                  <input type="password" name="txt_pass1" id="txt_pass1" class="form-control" required placeholder="Password baru...">
                </div>
            </div>
            <div class="form-group ">
                <label  for="password2" class="col-md-4 control-label">Konfirmasi Password</label>
                <div class="col-md-6 col-sm-12 required">
                  <input type="password" name="txt_pass2" id="txt_pass2" class="form-control" required placeholder="Konfirmasi password...">
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
