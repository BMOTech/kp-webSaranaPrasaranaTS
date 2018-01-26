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
                <h2><center>Edit Data barang</center></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php foreach($t_barang as $tbrang){ ?>
                        <?php echo form_open("admin\Barang\barang/update_barang"); ?>
	                    <div class="form-group">
                            <label>ID Barang</label>
                            <input type="text" name="id_barang" id="id_barang" class="form-control" value="<?php echo $tbrang->id_barang ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?php echo $tbrang->nama_barang ?>">
                        </div>
                        <div class="form-group">
                            <label>Spesifikasi</label>
                            <input type="text" name="spesifikasi" id="spesifikasi" class="form-control" value="<?php echo $tbrang->spesifikasi ?>">
                        </div>
                        <div class="form-group">
                            <label>Merk</label>
                            <input type="text" name="merk" id="merk" class="form-control" value="<?php echo $tbrang->merk ?>">
                        </div>
                         <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" name="jumlah" id="jumlah" class="form-control" value="<?php echo $tbrang->jumlah ?>">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control" value="<?php echo $tbrang->harga ?>">
                        </div>
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" name="satuan" id="satuan" class="form-control" value="<?php echo $tbrang->satuan ?>">
                        </div>
                           	<?php echo form_submit('input', 'Input', 'class="btn btn-primary"') ?>
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