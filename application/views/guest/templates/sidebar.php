<br>
<br>
<div id="sidebar">
	<div class="navigasi">
		<ul class="nav" id="sidebare">
			<li><a href="<?php echo site_url('guest\Dashboard/ndeleng_barang');?>">Lihat Barang</a></li>
			<li><a href="<?php echo site_url('guest\Dashboard/ndeleng_barangMasuk'); ?>">Lihat Barang Masuk</a></li>
			<li><a href="<?php echo site_url('guest\Dashboard/ndeleng_barang_keluar'); ?>">Lihat Barang Keluar</a></li>
			<li><a href="<?php echo site_url('guest\Dashboard/nginput_barang_pinjam')?>">Peminjaman</a></li>
			<li><a href="<?php echo site_url('guest\Dashboard/ndeleng_barang_pinjam')?>">Lihat barang yang dipinjam</a></li>
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
	          	<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#subSidebar" data-parent="#sidebare">
	            <i class="fa fa-fw fa-wrench"></i>
	            <span class="nav-link-text">Pengembalian</span>
	          </a>
	          <ul class="nav collapse" id="subSidebar">
	            <li>
	              <a href="<?php echo site_url('guest\Dashboard/nginput_barang_pengembalian') ?>">Pengembalian Barang</a>
	            </li>
	            <li>
	              <a href="<?php echo site_url('guest\Dashboard/nginput_barang_pengembalianHilang') ?>">Pengembalian Barang Hilang</a>
	            </li>
	            <li>
	              <a href="<?php echo site_url('guest\Dashboard/nginput_barang_pengembalianRusak') ?>">Pengembalian Barang Rusak</a>
	            </li>
	          </ul>
	        </li>
	        <li><a href="<?php echo site_url('guest\Dashboard/ndeleng_data_pengembalian')?>">Lihat Data Pengembalian</a></li>
			<li><a href="<?php echo site_url('guest\Dashboard/ndeleng_ruang');?>">Data Ruangan</a></li>
		</ul>
	</div>
</div>