<!DOCTYPE html>
<html>
<head>
	<title>Edit Detail Barang</title>
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
                <h2><center>Edit Detail barang</center></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php foreach($detail_barang as $detil){ ?>
                        <?php echo form_open("admin\Barang\barang/update_detail_barang"); ?>
	                    <div class="form-group">
                            <label>ID Barang</label>
                            <input type="text" name="id_barang" id="id_barang" class="form-control" value="<?php echo $detil->id_barang ?>">
                        </div>
                        <div class="form-group">
                            <label>No Inventaris</label>
                            <input type="text" name="no_inv" id="no_inv" class="form-control" value="<?php echo $detil->no_inv ?>">
                        </div>`
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