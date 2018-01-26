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
                <h2><center>Input Data Barang</center></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo form_open("admin\Barang\barang/input_barang"); ?>
	                    <div class="form-group">
                            <?php
                            echo form_label('ID Barang','id_barang');
                            echo form_input('id_barang','','class="form-control" id="id_barang" placeholder="ID Barang" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Nama Barang','nama_barang');
                            echo form_input('nama_barang','','class="form-control" id="nama_barang" placeholder="Nama Barang" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Spesifikasi','spesifikasi');
                            echo form_input('spesifikasi','','class="form-control" id="spesifikasi" placeholder="Spesifikasi" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Merk','merk');
                            echo form_input('merk','','class="form-control" id="merk" placeholder="Merk" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Harga','harga');
                            echo form_input('harga','','class="form-control" id="harga" placeholder="Harga" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Satuan','satuan');
                            echo form_input('satuan','','class="form-control" id="satuan" placeholder="Satuan" required')
                            ?>
                        </div>
                           	<?php echo form_submit('input', 'Input', 'class="btn btn-primary"') ?>
                            <?php echo form_close() ?>
	                        <?php echo form_close(); ?>
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