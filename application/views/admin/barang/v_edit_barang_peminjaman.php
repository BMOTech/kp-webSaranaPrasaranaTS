<!DOCTYPE html>
<html>
<head>
	<title>Barang</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap-theme.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/style.css') ?>">
</head>
<body>
	<div class="container"  style="margin-top:100px;">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2><center>Edit Data barang Peminjaman</center></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php foreach ($t_peminjaman as $tpinjam) {?>
                        <?php echo form_open("admin\Barang\barang/update_barang_ilang"); ?>
                        <div class="form-group">
                            <label>ID Peminjaman</label>
                            <input type="text" name="id_peminjaman" id="id_peminjaman" class="form-control" value="<?php echo $tpinjam->id_peminjaman ?>">
                        </div>
                        <div class="form-group">
                            <label>ID Barang Keluar</label>
                            <input type="text" name="id_barang_keluar" id="id_barang_keluar" class="form-control" value="<?php echo $tpinjam->id_barang_keluar ?>">
                        </div>
                        <div class="form-group">
                            <label>ID Barang</label>
                            <input type="text" name="id_barang" id="id_barang" class="form-control" value="<?php echo $tpinjam->id_barang ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Peminjaman</label>
                            <input type="date" name="tgl_peminjaman" id="tgl_peminjaman" class="form-control" value="<?php echo $tpinjam->tgl_peminjaman ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" value="<?php echo $tpinjam->tgl_kembali ?>">
                        </div>
                        <div class="form-group">
                            <label>Peminjam</label>
                            <input type="text" name="peminjam" id="peminjam" class="form-control" value="<?php echo $tpinjam->peminjam ?>">
                        </div>
                        <div class="form-group">
                            <label>Kondisi</label>
                            <input type="text" name="kondisi" id="kondisi" class="form-control" value="<?php echo $tpinjam->kondisi ?>">
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" name="jumlah" id="jumlah" class="form-control" value="<?php echo $tpinjam->jumlah ?>">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?php echo $tpinjam->keterangan ?>">
                        </div>
                           	<?php echo form_submit('edit', 'Edit', 'class="btn btn-primary"') ?>
                            <?php echo form_close() ?>
	                        <?php echo form_close(); ?>

                            <?php } ?>
	               </div>
                </div>
            </div>
        <div class="col-md-4"></div>
      </div>
    </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url('assets/bstrp/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bstrp/js/jquery.js') ?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('assets/bstrp/js/bootstrap.min.js') ?>"></script>
</body>
</html>