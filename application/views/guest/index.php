<!DOCTYPE html>
<html>
<head>
	<title>Guest</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap-theme.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/style.css')
     ?>">
     <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
</head>
<body>
	<nav class="navbar navbar-fixed" style="height: 5px; width: 100%;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="<?php echo base_url('') ?>"><img src="<?php echo site_url('assets/img/logone.png') ?>" style="width: 100px; height: 40px; margin-top: 10px;"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right" style="padding-top: 5px;"> 
            <li><a href="<?php echo base_url();?>" style="color: #333"><span class="glyphicon glyphicon-log-out" style="color: #555"></span> Halaman utama</a></li> 
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <br>
	<div id="header">
		<div class="navigasi">
			<ul class="nav">
				<li><a href="<?php echo site_url('guest\Barang\barang/ndeleng_barang');?>">Lihat Barang</a></li>
				<li><a href="<?php echo site_url('guest\Barang\barang/v_barang_masuk'); ?>">Lihat Barang Masuk</a></li>
				<li><a href="<?php echo site_url('guest\Barang\barang/ndeleng_barang_keluar'); ?>">Lihat Barang Keluar</a></li>
				<li><a href="<?php echo site_url('guest\Barang\barang/nginput_barang_pinjam')?>">Peminjaman</a></li>
				<li><a href="<?php echo site_url('guest\Barang\barang/ndeleng_barang_pinjam')?>">Lihat barang yang dipinjam</a></li>
				<li><a href="<?php echo site_url('guest\Barang\barang/kembali_barang')?>">Pengembalian</a></li>
				<li><a href="<?php echo site_url('guest\Barang\barang/ndeleng_data_pengembalian')?>">Lihat Data Pengembalian</a></li>
				<li><a href="<?php echo site_url('guest\Ruang\ruang/ndeleng_ruang');?>">Data Ruangan</a></li>
			</ul>
		</div>
	</div>
</body>
</html>