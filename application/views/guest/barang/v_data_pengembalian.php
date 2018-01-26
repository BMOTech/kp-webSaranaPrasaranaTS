<!DOCTYPE html>
<html>
<head>
	<title>Barang Hilang</title>
</head>
<body>
	<div class="container">
		<div class="kecilna" style="width: 95%">
			<h1 class="text-center">Data Pengembalian</h1><br>
			<div id="tmpModal"></div>
			<div class="table-responsive">
				<table id="table_id" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>ID Pengembalian</th>
							<th>ID Peminjaman</th>
							<th>ID Barang</th>
							<th>Tanggal Kembali</th>
							<th>Jumlah Kembali</th>
							<th>Penanggung Jawab</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($t_pengembalian as $tkmbli)
						{?>
							<tr>
								<td><?php echo $tkmbli->id_pengembalian ?></td>
								<td><?php echo $tkmbli->id_peminjaman ?></td>
								<td><?php echo $tkmbli->id_barang?></td>
								<td><?php echo $tkmbli->tgl_kembali ?></td>
								<td><?php echo $tkmbli->jumlah_kembali ?></td>
								<td><?php echo $tkmbli->penanggung_jawab ?></td>
								<td>
									<button class="btn btn-info" onclick="detail_barang(&quot;<?php echo $tkmbli->id_peminjaman;?>&quot;)">Detail</button>
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
	      $.post('nampil_detailPngmblian/' + id, function(data)
        	{
        		$('#tmpModal').html(data);
        		$('#modal_detail').modal('show');
        	})
	    }
	</script>
</body>
</html>