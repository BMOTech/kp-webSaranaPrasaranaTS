<!DOCTYPE html>
<html>
<head>
	<title>Detail Barang</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap-theme.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/style.css') ?>">
    <script src="<?php echo base_url('assets/bstrp/js/jquery2.js') ?>"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/bstrp/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bstrp/js/jquery.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/bstrp/js/bootstrap.min.js') ?>"></script>
</head>
<body>
	<div class="container"  style="margin-top:100px;">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2><center>Input Data Detail Barang</center></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo form_open("admin\Barang\barang/input_detail_barang"); ?>
	                    <div class="form-group">
                            <label>ID Barang</label><br>
                            <select name="id_barang" id="id_barang" class="form-control">
                                <?php $idBarang = $this->modelku->select_idBrang() ?>
                                <?php foreach($idBarang->result() as $idBr){ ?>
                                    <option value="<?php echo $idBr->id_barang ?>"><?php echo $idBr->id_barang ?></option>
                                <?php } ?>
                            </select required>
                        </div>
                        <div class="form-group">
                            <label>No Inventaris</label>
                            <div id="container">
                                <input type="button" name="noInv" class="form-control" id="add_field" value="Klik untuk membuat text field baru"><br>
                                <script type="text/javascript">
                                var count = 0;
                                $(function(){
                                    $('#add_field').click(function(){
                                        count += 1;
                                        $('#container').append(
                                                '<strong>No Inv Barang Ke ' + count + '</strong><br />' 
                                                + '<input id="field_' + count + '" name="fields[]' + '" type="text" class="form-control" /><br>' );
                                    
                                    });
                                });
                                </script> 

                            </div>
                        </div>
                           	<?php echo form_submit('submit', 'Submit', 'class="btn btn-primary"') ?>
                            <?php echo form_close() ?>
	               </div>
                </div>
            </div>
        <div class="col-md-4"></div>
      </div>
    </div>
</body>
</html>