<!DOCTYPE html>
<html>
<head>
	<title>Sarana dan Prasarana</title>
</head>
<body>
	<div class="container">
		<div class="kecilna" style="width: 95%">
			<h1 class="text-center">Data Barang</h1><br>
			<div id="tmpModal"></div>
			<div class="table-responsive">
				<table id="table_id" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nama Barang</th>
							<th>Spesifikasi</th>
							<th>Merk</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Satuan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($t_barang as $tbrang)
						{?>
							<tr>
								<td><?php echo $tbrang->id_barang ?></td>
								<td><?php echo $tbrang->nama_barang ?></td>
								<td><?php echo $tbrang->spesifikasi ?></td>
								<td><?php echo $tbrang->merk ?></td>
								<td><?php echo $tbrang->jumlah ?></td>
								<td><?php echo $tbrang->harga ?></td>
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
      $.post('nampil_detail/' + id, function(data)
    	{
    		$('#tmpModal').html(data);
    		$('#modal_detail').modal('show');
    	})
    }
</script>
</html>