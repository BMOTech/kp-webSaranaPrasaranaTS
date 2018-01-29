<!DOCTYPE html>
<html>
<head>
	<title>Edit Password</title>
</head>
<body>
	<div class="container"  style="margin-top:100px;">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2><center>Edit Password</center></h2><br>
                    <?php echo form_open("member\My_info/update_pass"); ?>
                    <div class="form-group">
                        <?php
                            echo form_label('Password Baru','password');
                            echo form_error('password', '<div class="alert alert-danger">', '</div>');
                            echo form_password('password','','class="form-control" id="password" placeholder="Password Baru" required');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            echo form_label('Ketik Ulang Password Baru','repassword');
                            echo form_error('repassword', '<div class="alert alert-danger">', '</div>');
                            echo form_password('repassword','','class="form-control" id="password" placeholder="Ketik Ulang Password Baru" required');
                        ?>
                    </div>
                       	<?php echo form_submit('simpan', 'Simpan', 'class="btn btn-primary"') ?>
                        <?php echo form_close() ?>
            </div>
        <div class="col-md-4"></div>
      </div>
    </div>
</body>
</html>