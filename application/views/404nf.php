<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
            .error-template {padding: 40px 15px;text-align: center;}
            .error-actions {margin-top:15px;margin-bottom:15px;}
            .error-actions .btn { margin-right:10px; }
    </style>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap-theme.css') ?>">
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Kesalahan terjadi.
                </div>
                <div class="error-actions">
                    <a href="<?php echo base_url('admin/admin') ?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Kembali ke dashboard </a><a href="http://www.jquery2dotnet.com" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>