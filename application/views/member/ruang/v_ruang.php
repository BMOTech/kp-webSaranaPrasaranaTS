<!DOCTYPE html>
<html>
<head>
	<title>Sarana dan Prasarana</title>
</head>
<body>
	<div class="container">
		<div class="kecilna" style="width: 95%">
			<h1 class="text-center">Data Ruangan</h1>
			<div id="tmpModal"></div>
			<div class="table-responsive">
				<table id="table_id" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>ID Ruang</th>
							<th>Nama Ruang</th>
							<th>Keterangan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($t_ruang as $truang)
						{?>
							<tr>
								<td><?php echo $truang->id_ruang ?></td>
								<td><?php echo $truang->nama_ruang ?></td>
								<td><?php echo $truang->keterangan ?></td>
								<td>
									<button class="btn btn-info" onclick="detail_barang(&quot;<?php echo $truang->id_ruang;?>&quot;)">Lihat Barang</button>
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
	      $.post('nampil_detailBrangRuang/' + id, function(data)
        	{
        		$('#tmpModal').html(data);
        		$('#modal_detail').modal('show');
        	})
	    }
	</script>

</body>
</html>