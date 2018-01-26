<!DOCTYPE html>
<html>
<head>
	<title>Daftar Berhasil!</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap-theme.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/style.css') ?>">
</head>
<body>
	<p>Pendaftaran berhasil!, Silahkan <a href="#" type="button" data-toggle="modal" data-target="#myModal">login!</a><
	<!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2><center>Silahkan Login!</center></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                      <?php echo form_open("utama/login_process"); ?>
                      <div class="form-group">
                            <?php
                            echo form_label('Username','username');
                            echo form_input('username','','class="form-control" id="username" placeholder="Nama Pengguna" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Password','password');
                            echo form_password('password','','class="form-control" id="password" placeholder="Kata Sandi" required')
                            ?>
                        </div>
                            <?php echo form_submit('utama', 'Login', 'class="btn btn-primary"') ?>
                            <?php echo form_close() ?>
                         <?php echo form_close(); ?>
                 </div>
                </div>
            </div>
            </div>
          </div>
        </div>
            <!-- Modal -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="<?php echo base_url('assets/bstrp/js/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/bstrp/js/jquery.js') ?>"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo base_url('assets/bstrp/js/bootstrap.min.js') ?>"></script>
</body>
</html>