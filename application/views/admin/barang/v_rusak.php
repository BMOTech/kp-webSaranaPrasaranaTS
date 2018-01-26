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
                <h2><center>Input Data Barang Rusak</center></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo form_open("admin\Barang\barang/input_barang_rusak"); ?>
	                    <div class="form-group">
                            <?php
                            echo form_label('ID Barang Keluar','id_barang_keluar');
                            echo form_input('id_barang_keluar','','class="form-control" id="id_barang_keluar" placeholder="ID Barang Keluar" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('ID Barang','id_barang');
                            echo form_input('id_barang','','class="form-control" id="id_barang" placeholder="ID Barang" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Tanggal Rusak','tgl_rusak');
                            echo form_input('tgl_rusak','','class="form-control" id="tgl_rusak" placeholder="Tanggal Rusak" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Jumlah Rusak','jml_rusak');
                            echo form_input('jml_rusak','','class="form-control" id="jml_rusak" placeholder="Jumlah Rusak" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Satuan','satuan');
                            echo form_input('satuan','','class="form-control" id="satuan" placeholder="Satuan" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('ID Ruang','id_ruang');
                            echo form_input('id_ruang','','class="form-control" id="id_ruang" placeholder="ID Ruang" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Penanggung Jawab','penanggung_jawab');
                            echo form_input('penanggung_jawab','','class="form-control" id="penanggung_jawab" placeholder="Penanggung Jawab" required')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Tindakan','tindakan');
                            echo form_input('tindakan','','class="form-control" id="tindakan" placeholder="Tindakan" required')
                            ?>
                        </div>
                           	<?php echo form_submit('submit', 'Submit', 'class="btn btn-primary"') ?>
                            <?php echo form_close() ?>
	                        <?php echo form_close(); ?>
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