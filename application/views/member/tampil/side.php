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
          <p><?php echo $this->session->userdata("fullname"); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div><br>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
          <a href="<?php echo base_url('member/member/ndeleng_barang') ?>">
            <i class="glyphicon glyphicon-list"></i> <span>Data Barang</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('member\member/ndeleng_barang_masuk') ?>">
            <i class="glyphicon glyphicon-list"></i> <span>Data barang masuk</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('member\member/ndeleng_barang_keluar') ?>">
            <i class="glyphicon glyphicon-list"></i> <span>Data barang keluar</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('member\member/ndeleng_barang_ilang') ?>">
            <i class="glyphicon glyphicon-list"></i> <span>Data Barang yang Hilang</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('member\member/ndeleng_barang_rusak') ?>">
            <i class="glyphicon glyphicon-list"></i> <span>Data Barang yang Rusak</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('member\member/nginput_barang_pinjam') ?>">
            <i class="glyphicon glyphicon-save"></i> <span>Pinjam Barang</span>
            <span class="glyphicon pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('member\member/ndeleng_barang_dipinjam') ?>">
            <i class="glyphicon glyphicon-briefcase"></i> <span>Barang Pinjamanku</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-open"></i>
            <span>Pengembalian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('member\member/nginput_barang_pengembalian') ?>"><i class="glyphicon glyphicon-arrow-up"></i> Pengembalian Barang</a></li>
            <li><a href="<?php echo base_url('member\member/nginput_barang_pengembalianHilang') ?>"><i class="glyphicon glyphicon-arrow-up"></i> Pengembalian Barang Hilang</a></li>
            <li><a href="<?php echo base_url('member\member/nginput_barang_pengembalianRusak') ?>"><i class="glyphicon glyphicon-arrow-up"></i> Pengembalian Barang Rusak</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url('member\member/ndeleng_ruang') ?>">
            <i class="glyphicon glyphicon-briefcase"></i> <span>Data Pengembalian</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('member/member/ndeleng_ganti_rugi') ?>">
            <i class="glyphicon glyphicon-refresh"></i> <span>Ganti Rugi</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>