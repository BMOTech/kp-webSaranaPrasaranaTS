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
                <h2><center>Edit Info</center></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo form_open("admin\My_info/update_akun"); ?>
	                    <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?php $this->modelku->select_adm_username(); ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php $this->modelku->select_adm_email(); ?>">
                        </div>
                        <div class="form-group">
                            <label>Fullname</label>
                            <input type="text" name="fullname" id="fullname" class="form-control" value="<?php $this->modelku->select_adm_fullname(); ?>">
                        </div>
                           	<?php echo form_submit('edit', 'Edit', 'class="btn btn-primary"') ?>
                            <?php echo form_close() ?>
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