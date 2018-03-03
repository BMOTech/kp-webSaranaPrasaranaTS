<html>
    <head>
        <title>
            Daftar | Sarana dan Prasarana
        </title>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('assets/home/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="<?php echo base_url('assets/home/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets/fonts/SEGOEUI.TTF') ?>">
        <link href="<?php echo base_url('assets/fonts/SEGOEUI.TTF') ?>" rel='stylesheet' type='text/css'>

        <!-- Plugin CSS -->
        <link href="<?php echo base_url('assets/home/vendor/magnific-popup/magnific-popup.css') ?>" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url('assets/home/css/creative.min.css') ?>" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
          <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/img/logone.png') ?>" style="width: 100px; height: 40px;"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger text-dark" href="<?php echo base_url('#about') ?>">Tentang</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger text-dark" href="<?php echo base_url('#hiw') ?>">Cara Kerja</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger text-dark" href="<?php echo base_url('#contact') ?>">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger text-dark" href="#" data-toggle="modal" data-target="#exampleModal">Masuk/Daftar</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4" style="margin-left: 10px;"></div>
            <div class="col-md-4" style="margin-top: 80px">
                <h2><center>Daftar!</center></h2><br>
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
    </div>
    <br>
    <br>

      <footer class="page-footer center-on-small-only">
          <!--Copyright-->
          <div class="footer-copyright">
              <div class="container-fluid" style="width: 100%; height: 50px; background-color: #212529;">
                  <p class="text-center text-white" style="padding-top: 15px; margin-bottom: 0px;">© 2018 Copyright: KP Kelompok 7</p>
              </div>
          </div>
          <!--/.Copyright-->
        </footer>

      <!-- Bootstrap core JavaScript -->
        <script src="<?php echo base_url('assets/home/vendor/jquery/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

        <!-- Plugin JavaScript -->
        <script src="<?php echo base_url('assets/home/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/home/vendor/scrollreveal/scrollreveal.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/home/vendor/magnific-popup/jquery.magnific-popup.min.js') ?>"></script>

        <!-- Custom scripts for this template -->
        <script src="<?php echo base_url('assets/home/js/creative.min.js') ?>"></script>

    </body>
</html>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-top: 50px;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('utama/login_process') ?>" method="post">
              <div class="form-group">
                <label for="username" class="form-control-label">Username:</label>
                <input type="text" name="username" class="form-control" id="username">
              </div>
              <div class="form-group">
                <label for="password" class="form-control-label">Password:</label>
                <input type="password" name="password" class="form-control" id="password">
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
            </form>
          </div>
          <div class="modal-footer">
            <span class="text-left">
              <p class="text-left">Belum punya akun? <a href="<?php echo base_url('signUp/daftar') ?>">Daftar </a></p>
            </span>
          </div>
        </div>
      </div>
  </div>