  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <!-- search form -->
      <!-- /.search form -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA
        </li>
        <li>
          <a href="<?echo base_url() .'dashboard';?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
            <a href="<?echo base_url() .'permintaan';?>"><i class="fa fa-tasks"></i>
              <span>Permintaan Pekerjaan</span>
            </a>
        </li>
        <li>
            <a href="<?echo base_url() .'informasi';?>"><i class="fa fa-info"></i>
              <span>Informasi Terbaru</span>
            </a>
        </li>
        <li>
            <a href="<?echo base_url() .'identifikasi';?>"><i class="fa fa-wrench"></i>
              <span>Identifikasi Pekerjaan</span>
            </a>
        </li>
        <li>
            <a href="<?echo base_url() .'refill';?>"><i class="fa fa-tint"></i>
              <span>Refill Tinta Printer</span>
            </a>
        </li>
        <li>
            <a href="<?echo base_url() .'jadwal';?>"><i class="fa fa-calendar"></i>
              <span>Jadwal Kerja dan Event</span>
            </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i>
            <span>Pengaturan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?echo base_url() .'departemen';?>"><i class="fa fa-circle-o"></i> Departemen</a></li>
            <li><a href="<?echo base_url() .'profil';?>"><i class="fa fa-circle-o"></i> Profil User</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
