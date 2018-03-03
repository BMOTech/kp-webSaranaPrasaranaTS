<!DOCTYPE html>
<html>
<head>
	<title>Sarana dan Prasarana</title>
</head>
<body>
	<div class="container">
		<div class="kecilna" style="width: 95%">
			<h1 class="text-center">Barang Pinjamanku</h1>
			<div id="tmpModal"></div>
			<div class="table-responsive">
				<table id="table_id" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>ID Peminjaman</th>
							<th>ID Barang Keluar</th>
							<th>ID Barang</th>
							<th>Tanggal Peminjaman</th>
							<th>Tanggal Kembali</th>
							<th>Kondisi</th>
							<th>Jumlah</th>
							<th>Keterangan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($t_peminjaman as $tpinjam)
						{?>
							<tr>
								<td><?php echo $tpinjam->id_peminjaman ?></td>
								<td><?php echo $tpinjam->id_barang_keluar ?></td>
								<td><?php echo $tpinjam->id_barang ?></td>
								<td><?php echo $tpinjam->tgl_peminjaman ?></td>
								<td><?php echo $tpinjam->tgl_kembali ?></td>
								<td><?php echo $tpinjam->kondisi ?></td>
								<td><?php echo $tpinjam->jumlah ?></td>
								<td><?php echo $tpinjam->keterangan ?></td>
								<td>
									<button class="btn btn-info" onclick="detail_barang(&quot;<?php echo $tpinjam->id_peminjaman;?>&quot;)">Detail</button>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function detail_barang(id)
	    {
	      //Ajax Load data from ajax
	      $.post('nampil_detailPnjm/' + id, function(data)
        	{
        		$('#tmpModal').html(data);
        		$('#modal_detail').modal('show');
        	})
	    }
	</script>
</body>
</html>