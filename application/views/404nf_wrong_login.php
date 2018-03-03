<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>404 Not Found</title>

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

  <body id="page-top">



    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url('') ?>"><img src="<?php echo base_url('assets/img/logone.png') ?>" style="width: 100px; height: 40px;"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#hiw">Cara Kerja</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#" data-toggle="modal" data-target="#exampleModal">Masuk/Daftar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong style="font-size: 100px">404</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Username atau Kata Sandi salah!</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="<?php echo base_url(); ?>">Kembali</a>
          </div>
        </div>
      </div>
    </header>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Kontak Kami</h2>
            <hr class="my-4">
            <p class="mb-5">Kami sangat menghargai kritik dan saran dari anda. kontak kami bisa melalui:</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>+62 852-9118-5696</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:sarana.prasarana.ts.pwt@gmail.com">sarana.prasarana.ts.pwt@gmail.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>

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