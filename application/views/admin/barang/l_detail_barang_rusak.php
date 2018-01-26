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
					<th>ID Barang Keluar</th>
					<th>ID Peminjaman</th>
					<th>No Inventaris</th>
					<th>Kondisi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($detail_barang as $detil)
				{?>
					<tr>
						<td><?php echo $detil->id_barang_keluar ?></td>
						<td><?php echo $detil->id_peminjaman ?></td>
						<td><?php echo $detil->no_inv ?></td>
						<td><?php echo $detil->kondisi ?></td>
						<td>
							<?php echo anchor('admin\Barang\barang/ngedit_detail_barangRsk/'.$detil->no_inv, 'Edit'); ?>
							<span>|</span>
							<?php echo anchor('admin\Barang\barang/ngapus_detail_barangRsk/'.$detil->no_inv, 'Hapus'); ?>
						</td>
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