<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Help-IT | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/ionicons/ionicons.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-datepicker/bootstrap-datepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/select2/select2.min.css">
  <style>
  .select2-close-mask{
    z-index: 9998;
}
.select2-dropdown{
    z-index: 9999;
}
  </style>
  <!-- datatables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/datatables.net-bs/dataTables.bootstrap.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/adminlte/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b>IT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Help</b> - IT</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flash"></i>
              <span class="label label-danger"><?php echo $total_waiting; ?></span>
            </a>
            <ul class="dropdown-menu">
              <?php if($d_permintaan){ //ada data permintaan
              ?>
              <li class="header">Ada <?php echo $total_waiting; ?> Permintaan Pekerjaan</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php
                    foreach($d_permintaan as $d) {
                  ?>
                  <li><!-- Task item -->
                    <a  href="<?php echo base_url() . 'permintaan/identifikasi/' . $d->id_permintaan ?>">
                      <h3>
                        <?php echo $d->dari; ?>
                        <small class="pull-right"><i class="fa fa-calendar-o"></i> <?php echo $d->tanggal; ?></small>
                      </h3>
                      <p style="margin:0;"><?php echo word_limiter($d->catatan,6); ?>
                      </p>
                    </a>
                  </li>
                  <!-- end task item -->
                  <?php
                    }
                  ?>
                  <!-- foreach -->
                </ul>
              </li>
              <li class="footer">
                <a href="<?php echo base_url('permintaan') ?>">Lihat Semua </a>
              </li>
              <?php
              }
              else { //data kosong
              ?>
              <li class="header">Tidak Ada Permintaan Pekerjaan Baru</li>
              <li class="footer">
                <a href="<?php echo base_url('permintaan') ?>">Lihat Semua </a>
              </li>
              <?php
              }
              ?>
            </ul>
          </li>

          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-wrench"></i>
              <span class="label label-warning"><?php echo $total_progress; ?></span>
            </a>
            <ul class="dropdown-menu">
              <?php
              if($d_progress){
              ?>
              <li class="header">Ada <?php echo $total_progress; ?> pekerjaan masih <i>On Progress</i></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php
                    foreach($d_progress as $d) {
                  ?>
                  <li><!-- Task item -->
                    <a href="<?php echo base_url('identifikasi/update/' . $d->id_permintaan) ?>">
                      <h3>
                        <?php echo $d->catatan; ?>
                        <small class="pull-right"><?php echo $d->persentase; ?></small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-warning" <?php echo ("style='width:$d->persentase ;'");?> role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only"><?php echo $d->persentase ?>Selesai</span>
                        </div>
                      </div>

                    </a>
                  </li>
                  <!-- end task item -->
                  <?php
                  }
                  ?>
                </ul>
              </li>
              <li class="footer">
                <a href="<?php echo base_url('identifikasi') ?>">Lihat semua</a>
              </li>
              <?php
              } else{
              ?>
              <li class="header">Tidak ada pekerjaan <i>On Progress</i></li>

              <li class="footer">
                <a href="<?php echo base_url('identifikasi') ?>">Lihat semua</a>
              </li>
              <?php
              }
              ?>
            </ul>
          </li>


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url($this->session->userdata('avatar'));?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama_lengkap'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url($this->session->userdata('avatar'));?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nama_lengkap'); ?>
                  <small>[ <?php echo $this->session->userdata('nama_user');?> ]</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url('admin/logout'); ?>" class="btn btn-default btn-flat">Keluar</a>
                </div>
                <div class="pull-left">
                  <a href="<?php echo base_url('profil'); ?>" class="btn btn-default btn-flat">Profil</a>
                </div>
              </li>
            </ul>
          </li>
        <?php

        ?>
        </ul>
      </div>
    </nav>
  </header>

  <!-- LeftSide -->
