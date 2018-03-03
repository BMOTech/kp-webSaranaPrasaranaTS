<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/img/man.png') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Guest</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu"><br>
        <li>
          <a href="<?php echo site_url('guest\Dashboard/ndeleng_barang');?>">
            <i class="glyphicon glyphicon-list"></i> <span>Data Barang</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('guest\Dashboard/ndeleng_barangMasuk'); ?>">
            <i class="glyphicon glyphicon-list"></i> <span>Data barang masuk</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('guest\Dashboard/ndeleng_ruang');?>">
            <i class="glyphicon glyphicon-tent"></i> <span>Data Ruangan</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>