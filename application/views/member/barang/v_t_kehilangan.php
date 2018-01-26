<!DOCTYPE html>
<html>
<head>
	<title>Barang Hilang</title>
</head>
<body>
	<div class="container">
		<div class="kecilna" style="width: 95%">
			<h1 class="text-center">Data Barang Hilang</h1>
			<div id="tmpModal"></div>
			<div class="table-responsive">
				<table id="table_id" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>ID Barang Keluar</th>
							<th>ID Barang</th>
							<th>Tanggal Hilang</th>
							<th>Alasan Hilang</th>
							<th>Penanggung Jawab</th>
							<th>Solusi</th>
							<th>Jumlah Hilang</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($t_kehilangan as $tilang)
						{?>
							<tr>
								<td><?php echo $tilang->id_barang_keluar ?></td>
								<td><?php echo $tilang->id_barang ?></td>
								<td><?php echo $tilang->tgl_hilang ?></td>
								<td><?php echo $tilang->alasan_hilang ?></td>
								<td><?php echo $tilang->penanggung_jawab ?></td>
								<td><?php echo $tilang->solusi ?></td>
								<td><?php echo $tilang->jumlah_hilang ?></td>
								<td>
									<button class="btn btn-info" onclick="detail_barang(&quot;<?php echo $tilang->id_barang_keluar;?>&quot;)">Detail</button>
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
	      $.post('nampil_detailHlng/' + id, function(data)
        	{
        		$('#tmpModal').html(data);
        		$('#modal_detail').modal('show');
        	})
	    }
	</script>
</body>
</html>