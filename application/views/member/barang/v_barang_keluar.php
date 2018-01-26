<!DOCTYPE html>
<html>
<head>
	<title>Sarana dan Prasarana</title>
</head>
<body>
	<div class="container">
		<div class="kecilna" style="width: 95%">
			<h1 class="text-center">Data Barang Keluar</h1>
			<div id="tmpModal"></div>
			<div class="table-responsive">
			<table id="table_id" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>ID Barang Keluar</th>
						<th>ID Barang</th>
						<th>ID Ruang</th>
						<th>Tanggal Keluar</th>
						<th>Jumlah Keluar</th>
						<th>Keterangan</th>
						<th>Satuan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($t_barang_keluar as $tbrangkluar)
					{?>
						<tr>
							<td><?php echo $tbrangkluar->id_barang_keluar ?></td>
							<td><?php echo $tbrangkluar->id_barang ?></td>
							<td><?php echo $tbrangkluar->id_ruang ?></td>
							<td><?php echo $tbrangkluar->tgl_keluar ?></td>
							<td><?php echo $tbrangkluar->jumlah_keluar ?></td>
							<td><?php echo $tbrangkluar->keterangan ?></td>
							<td><?php echo $tbrangkluar->satuan ?></td>
							<td>
								<button class="btn btn-info" onclick="detail_barang(&quot;<?php echo $tbrangkluar->id_barang_keluar;?>&quot;)">Detail</button>
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
	      $.post('nampil_detailKlr/' + id, function(data)
        	{
        		$('#tmpModal').html(data);
        		$('#modal_detail').modal('show');
        	})
	    }
	</script>
</body>
</html>