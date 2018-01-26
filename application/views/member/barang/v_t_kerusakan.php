<!DOCTYPE html>
<html>
<head>
	<title>Barang Hilang</title>
</head>
<body>
	<div class="container">
		<div class="kecilna" style="width: 95%">
			<h1 class="text-center">Data Barang Rusak</h1>
			<div id="tmpModal"></div>
			<div class="table-responsive">
				<table id="table_id" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>ID Barang Keluar</th>
							<th>ID Barang</th>
							<th>Tanggal Rusak</th>
							<th>Jumlah Rusak</th>
							<th>Penanggung Jawab</th>
							<th>Tindakan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($t_kerusakan as $trusak)
						{?>
							<tr>
								<td><?php echo $trusak->id_barang_keluar ?></td>
								<td><?php echo $trusak->id_barang ?></td>
								<td><?php echo $trusak->tgl_rusak?></td>
								<td><?php echo $trusak->jml_rusak ?></td>
								<td><?php echo $trusak->penanggung_jawab ?></td>
								<td><?php echo $trusak->tindakan ?></td>
								<td>
									<button class="btn btn-info" onclick="detail_barang(&quot;<?php echo $trusak->id_barang_keluar;?>&quot;)">Detail</button>
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
	      $.post('nampil_detailRsk/' + id, function(data)
        	{
        		$('#tmpModal').html(data);
        		$('#modal_detail').modal('show');
        	})
	    }
	</script>
</body>
</html>