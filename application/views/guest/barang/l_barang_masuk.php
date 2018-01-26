<!DOCTYPE html>
<html>
<head>
	<title>Sarana dan Prasarana</title>
</head>
<body>
	<div class="container">
		<div class="kecila" style="width: 95%">
			<h1 class="text-center">Data Barang Masuk</h1><br>
			<div id="tmpModal"></div>
			<div class="table-responsive">
				<table id="table_id" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>ID Barang Masuk</th>
							<th>ID Barang</th>
							<th>Tanggal Masuk</th>
							<th>Jumlah Masuk</th>
							<th>ID Ruang</th>
							<th>Satuan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($t_barang_masuk as $tbrang)
						{?>
							<tr>
								<td><?php echo $tbrang->id_barang_masuk ?></td>
								<td><?php echo $tbrang->id_barang ?></td>
								<td><?php echo $tbrang->tgl_masuk ?></td>
								<td><?php echo $tbrang->jumlah_masuk ?></td>
								<td><?php echo $tbrang->id_ruang ?></td>
								<td><?php echo $tbrang->satuan ?></td>
								<td>
									<button class="btn btn-info" onclick="detail_barang(&quot;<?php echo $tbrang->id_barang;?>&quot;)">Detail</button>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
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
</html>