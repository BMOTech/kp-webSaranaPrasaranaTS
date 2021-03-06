<!DOCTYPE html>
<html>
<head>
	<title>Detail Barang Masuk</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap-theme.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/style.css') ?>">
</head>
<body>
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>ID Barang Masuk</th>
					<th>No Inventaris</th>
					<th>Kondisi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($detail_barang as $detil)
				{?>
					<tr>
						<td><?php echo $detil->id_barang_masuk ?></td>
						<td><?php echo $detil->no_inv ?></td>
						<td><?php echo $detil->kondisi ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url('assets/bstrp/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bstrp/js/jquery.js') ?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('assets/bstrp/js/bootstrap.min.js') ?>"></script>
</body>
</html>