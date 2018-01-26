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
                <h2><center>Edit Data Barang Keluar</center></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php foreach ($t_barang_keluar as $tbrangkluar) { ?>
                        <?php echo form_open("admin\Barang\barang/update_barang_keluar"); ?>
                        <div class="form-group">
                            <label>ID Barang Keluar</label>
                            <input type="text" name="id_barang_keluar" id="id_barang_keluar" class="form-control" value="<?php echo $tbrangkluar->id_barang_keluar ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Keluar</label>
                            <input type="date" name="tgl_keluar" id="tgl_keluar" class="form-control" value="<?php echo $tbrangkluar->tgl_keluar ?>">
                        </div>
                        <div class="form-group">
                            <label>ID Barang</label>
                            <input type="text" name="id_barang" id="id_barang" class="form-control" value="<?php echo $tbrangkluar->id_barang ?>">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Keluar</label>
                            <input type="text" name="jumlah_keluar" id="jumlah_keluar" class="form-control" value="<?php echo $tbrangkluar->jumlah_keluar ?>">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?php echo $tbrangkluar->keterangan ?>">
                        </div>
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" name="satuan" id="satuan" class="form-control" value="<?php echo $tbrangkluar->satuan ?>">
                        </div>
                        <div class="form-group">
                            <label>ID Ruang</label>
                            <input type="text" name="id_ruang" id="id_ruang" class="form-control" value="<?php echo $tbrangkluar->id_ruang ?>">
                        </div>
                            <?php echo form_submit('edit', 'Edit', 'class="btn btn-primary"') ?>
                            <?php echo form_close() ?>

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