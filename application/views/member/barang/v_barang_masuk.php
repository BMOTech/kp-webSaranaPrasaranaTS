<!DOCTYPE html>
<html>
<head>
	<title>Sarana dan Prasarana</title>
</head>
<body>
	<div class="container">
		<div class="kecilna" style="width: 95%">
			<h1 class="text-center">Data Barang Masuk</h1>
			<div id="tmpModal"></div>
			<div class="table-responsive">
				<table id="table_id" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>ID Barang</th>
							<th>ID Ruang</th>
							<th>Tanggal Masuk</th>
							<th>Jumlah</th>
							<th>Satuan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($t_barang_masuk as $tbrangmsuk)
						{?>
							<tr>
								<td><?php echo $tbrangmsuk->id_barang ?></td>
								<td><?php echo $tbrangmsuk->id_ruang ?></td>
								<td><?php echo $tbrangmsuk->tgl_masuk ?></td>
								<td><?php echo $tbrangmsuk->jumlah_masuk ?></td>
								<td><?php echo $tbrangmsuk->satuan ?></td>
								<td>
									<button class="btn btn-info" onclick="detail_barang(&quot;<?php echo $tbrangmsuk->id_barang_masuk;?>&quot;)">Detail</button>
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
	      $.post('nampil_detailMsk/' + id, function(data)
        	{
        		$('#tmpModal').html(data);
        		$('#modal_detail').modal('show');
        	})
	    }
	</script>
</body>
</html>