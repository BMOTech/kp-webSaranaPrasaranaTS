<nav class="navbar navbar-fixed" style="height: 65px; width: 100%; position: fixed; z-index: 3;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#"><img src="assets/img/logone.png" style="width: 100px; height: 40px; margin-top: 10px;"></a>
          <!-- <a class="navbar-brand" href="#" style="color: #333">Barang</a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav" style="padding-top: 5px; padding-left: 10px;">
            <li><a href="<?php echo site_url('utama'); ?>" style="color: #FFF" class="umah">Home</a></li>
            <li><a href="#about" style="color: #FFF" class="tentang">About</a></li>
            <li><a href="#contact" style="color: #FFF" class="contacte">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right" style="padding-top: 5px;"> 
            <li><a href="#" type="button" data-toggle="modal" data-target="#myModal" style="color: #FFF" class="logine"><span class="glyphicon glyphicon-log-in" style="color: #FFF"></span> Sign In</a></li> 
            <li><a href="<?php echo site_url("signUp\daftar");?>" style="color: #FFF" class="daftare"><span class="glyphicon glyphicon-user" style="color: #FFF"></span> Sign Up</a></li> 
          </ul>
        </div>
      </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2><center>Silahkan Login!</center></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="the-msg">
                            <?=$this->session->flashdata('loginFail')?>
                        </div>
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
                 </div>
                </div>
            </div>
            </div>
          </div>
        </div>
        <!-- Modal -->