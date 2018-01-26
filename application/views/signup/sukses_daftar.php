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
    <nav class="navbar navbar-fixed" style="height: 5px; width: 100%;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="<?php echo base_url('') ?>"><img src="<?php echo site_url('assets/img/logone.png') ?>" style="width: 100px; height: 40px; margin-top: 10px;"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav" style="padding-top: 5px; padding-left: 10px;">
            <li><a href="<?php echo site_url('utama'); ?>" style="color: #333">Home</a></li>
            <li><a href="#about" style="color: #333">About</a></li>
            <li><a href="#contact" style="color: #333">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right" style="padding-top: 5px;"> 
            <li><a href="#" type="button" data-toggle="modal" data-target="#myModal" style="color: #333"><span class="glyphicon glyphicon-log-in" style="color: #555"></span> Sign In</a></li> 
            <li><a href="<?php echo site_url("signUp\daftar");?>" style="color: #333"><span class="glyphicon glyphicon-user" style="color: #555"></span> Sign Up</a></li> 
          </ul>
        </div>
      </div>
    </nav>
    <div class="container"  style="margin-top:100px;">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2><center>Berhasil!</center></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <center><label class="suksesDaftar">Pendaftaran berhasil!, Silahkan login!</label></center><br>
                        <center><button class="buttonku"><a href="#" type="button" data-toggle="modal" data-target="#myModal">Login!</a></button></center>
                 </div>
                </div>
            </div>
        <div class="col-md-4"></div>
      </div>

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