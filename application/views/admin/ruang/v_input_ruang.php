<!DOCTYPE html>
<html>
<head>
	<title>Ruang</title>
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
                <h2><center>Input Data Ruang</center></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo form_open("admin\Ruang\Ruang/input_ruang"); ?>
	                    <div class="form-group">
                            <?php
                            echo form_label('ID Ruang','id_ruang');
                            echo form_input('id_ruang','','class="form-control" id="id_ruang" placeholder="ID Ruang" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Nama Ruang','nama_ruang');
                            echo form_input('nama_ruang','','class="form-control" id="nama_ruang" placeholder="Nama Ruang" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Keterangan','keterangan');
                            echo form_input('keterangan','','class="form-control" id="keterangan" placeholder="Keterangan" required')
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