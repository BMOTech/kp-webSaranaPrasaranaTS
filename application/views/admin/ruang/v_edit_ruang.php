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
                <h2><center>Edit Data Ruang</center></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php foreach ($t_ruang as $truang) {?>
                        <?php echo form_open("admin\Ruang\Ruang/update_ruang"); ?>
	                    <div class="form-group">
                            <label>ID Ruang</label>
                            <input type="text" name="id_ruang" id="id_ruang" class="form-control" value="<?php echo $truang->id_ruang ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Ruang</label>
                            <input type="text" name="nama_ruang" id="nama_ruang" class="form-control" value="<?php echo $truang->nama_ruang ?>">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?php echo $truang->keterangan ?>">
                        </div>
                           	<?php echo form_submit('update', 'Update', 'class="btn btn-primary"') ?>
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