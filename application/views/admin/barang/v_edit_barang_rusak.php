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
                <h2><center>Edit Data barang rusak</center></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php foreach ($t_kerusakan as $trusak) {?>
                        <?php echo form_open("admin\Barang\barang/update_barang_rusak"); ?>
                        <div class="form-group">
                            <label>ID Barang Keluar</label>
                            <input type="text" name="id_barang_keluar" id="id_barang_keluar" class="form-control" value="<?php echo $trusak->id_barang_keluar ?>">
                        </div>
                        <div class="form-group">
                            <label>ID Barang</label>
                            <input type="text" name="id_barang" id="id_barang" class="form-control" value="<?php echo $trusak->id_barang ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Rusak</label>
                            <input type="date" name="tgl_rusak" id="tgl_rusak" class="form-control" value="<?php echo $trusak->tgl_rusak ?>">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Rusak</label>
                            <input type="text" name="jml_rusak" id="jml_rusak" class="form-control" value="<?php echo $trusak->jml_rusak ?>">
                        </div>
                        <div class="form-group">
                            <label>Tindakan</label>
                            <input type="text" name="tindakan" id="tindakan" class="form-control" value="<?php echo $trusak->tindakan ?>">
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