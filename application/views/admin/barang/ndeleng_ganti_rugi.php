<!DOCTYPE html>
<html>
<head>
	<title>Sarana dan Prasarana</title>
</head>
<body>
	<?=$this->session->flashdata('notif')?>
	<h1 class="text-center">Data Ganti Rugi</h1>
	<div id="tmpModal"></div>
	<br />
	<br />
	<div class="table-responsive">
		<form action="<?php echo base_url('admin/barang/barang/hapusSelected') ?>" method="post" id="delete">
		<table id="table_id" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th><input type="checkbox" name="ckall" id="ckall"></th>
					<th>Pengganti Rugi</th>
					<th>Mengganti Barang</th>
					<th>ID Barang Keluar</th>
					<th>ID Barang</th>
					<th>Jumlah</th>
					<th>Tanggal Ganti Rugi</th>
					<th>Total Harga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($t_barang as $tbrang)
				{
					$harga = number_format($tbrang->total_harga, 0, ",", ".");
				?>
					<tr>
						<td><input class="uk-checkbox" type="checkbox" name="ckbdelete[]" value="<?php echo $tbrang->id; ?>"></td>
						<td><?php echo $tbrang->pengganti_rugi ?></td>
						<td><?php echo $tbrang->mengganti_barang ?></td>
						<td><?php echo $tbrang->id_barang_keluar ?></td>
						<td><?php echo $tbrang->id_barang ?></td>
						<td><?php echo $tbrang->jumlah ?></td>
						<td><?php echo $tbrang->tgl_ganti_rugi ?></td>
						<td>Rp. <?php echo $harga ?></td>
						<td>
							<button type="button" class="btn btn-danger" onclick="ngapus_barang(&quot;<?php echo $tbrang->id;?>&quot;)"><i class="glyphicon glyphicon-trash"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		</form>
		<button class="btn btn-danger" onclick="ngapusper_barang()">Hapus</button>
		<br>
		<br>
	</div>
	  <script type="text/javascript">
		  $(document).ready( function () {
		      $('#table_id').DataTable();
		  } );
		    var save_method; //for save method string
		    var table;

            $('.btnModal').on('click',function(){
			   var id = $(this).attr('data-id');
			  	alert(id);
			});

		    function ngapus_barang(id)
		    {
		      if(confirm('Anda yakin akan menghapusnya ?'))
		      {
		        // ajax delete data from database
		          $.ajax({
		            url : "<?php echo site_url('admin/Barang/barang/ngapus_ganti_rugi')?>/"+id,
		            type: "POST",
		            dataType: "JSON",
		            success: function(data)
		            {
		               location.reload();
		            },
		            error: function (jqXHR, textStatus, errorThrown)
		            {
		                alert('Error pada saat menghapus data!');
		            }
		        });

		      }
		    }

		    function ngapusper_barang(id)
		    {

		      if(confirm('Anda yakin akan menghapusnya ?'))
		      {
		      	$('#delete').submit();
		      }
		    }

		    $("#ckall").click(function(){
			    $('input:checkbox').not(this).prop('checked', this.checked);
			});
	  </script>
</body>
</html>