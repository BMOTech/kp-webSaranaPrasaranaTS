<html>
    <head>
        <title>
            Daftar | Barang
        </title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap-theme.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/style.css') ?>">
        <script src="<?php echo base_url('assets/bstrp/js/main.js') ?>"></script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="margin-top: 80px">
                <h2><center>Daftar!</center></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="the-msg">
                            <?=$this->session->flashdata('succesDaftar')?>
                            <?php echo validation_errors('<div class="alert alert-danger">', '</div>')?>
                        </div>
                        <?php echo form_open("signUp\daftar/ndaftar",  array("id" => "formDaftar" )); ?>
	                    <div class="form-group">
                            <?php
                            echo form_label('Nama Lengkap','nama');
                            echo form_error('nama', '<div class="text-danger">', '</div>');
                            echo form_input('nama', set_value('nama'),'class="form-control" id="nama" placeholder="Nama Lengkap" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Username','username');
                            echo form_error('username', '<div class="text-danger">', '</div>');
                            echo form_input('username', set_value('username'),'class="form-control" id="username" placeholder="Username" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Email','email');
                            echo form_error('email', '<div class="text-danger">', '</div>');
                            ?>
                            <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email" required/>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Nomor HP/Telepon','phone');
                            echo form_error('phone', '<div class="text-danger">', '</div>');
                            ?>
                            <input type="tel" name="phone" value="<?php echo set_value('phone'); ?>" class="form-control" placeholder="Nomor HP/Telepon" required/>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Kata Sandi','password');
                            echo form_error('password', '<div class="text-danger">', '</div>');
                            echo form_password('password','','class="form-control" id="password" placeholder="Kata Sandi" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Konfirmasi kata sandi','confirmPass');
                            echo form_error('confirmPass', '<div class="text-danger">', '</div>');
                            echo form_password('confirmPass','','class="form-control" id="confirmPass" placeholder="Ketik ulang sandi" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Lain-lain','lain-lain');
                            echo form_error('lain-lain', '<div class="text-danger">', '</div>');
                            echo form_textarea('lain-lain', set_value('lain-lain'),'class="form-control" id="lain-lain" placeholder="Contoh: Pelajar/Guru XII RPL 1 dll." required')
                            ?>
                        </div>
                           	<?php echo form_submit('daftar', 'Daftar', 'class="btn btn-primary"') ?>
                            <?php echo form_close() ?>
	                        <?php echo form_close(); ?>
	               </div>
                </div>
            </div>
        <div class="col-md-4"></div>
      </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/bstrp/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bstrp/js/jquery.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/bstrp/js/bootstrap.min.js') ?>"></script>
    </body>
</html>