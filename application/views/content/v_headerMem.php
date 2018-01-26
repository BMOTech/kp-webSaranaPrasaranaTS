<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap-theme.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/style.css')
     ?>">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/dataTables.bootstrap.css') ?>">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/dataTables.bootstrap.css') ?>">
     <script src="<?php echo base_url('assets/bstrp/js/jquery2.js') ?>"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/bstrp/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bstrp/js/jquery.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/bstrp/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bstrp/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bstrp/js/dataTables.bootstrap.js') ?>"></script>
    <script src="<?php echo base_url('assets/bstrp/js/randomID.js') ?>"></script>
     <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
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
          <ul class="nav navbar-nav navbar-right" style="padding-top: 5px;"> 
            <li><a href="<?php echo site_url('member\My_info/ndeleng_akun'); ?>" type="button" style="color: #333"><span class="glyphicon glyphicon-user" style="color: #555"></span> My Account</a></li> 
            <li><a href="<?php echo site_url("member/member/logout");?>" style="color: #333"><span class="glyphicon glyphicon-log-out" style="color: #555"></span> Logout</a></li> 
          </ul>
        </div>
      </div>
    </nav>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
    </script>
</body>
</html>