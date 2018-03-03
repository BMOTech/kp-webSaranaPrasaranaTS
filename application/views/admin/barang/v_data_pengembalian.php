<!DOCTYPE html>
<html>
<head>
	<title>Barang Hilang</title>
</head>
<body>
	<?=$this->session->flashdata('notif')?>
	<h1 class="text-center">Data Pengembalian</h1><br>
	<div id="tmpModal"></div>
	<div class="table-responsive">
	<form action="<?php echo base_url('admin/barang/barang/hapusDataKmbli') ?>" method="post" id="delete">
	<table id="table_id" class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th><input type="checkbox" name="ckall" id="ckall"></th>
				<th>ID Peminjaman</th>
				<th>ID Barang</th>
				<th>Tanggal Kembali</th>
				<th>Jumlah Kembali</th>
				<th>ID Penanggung Jawab</th>
				<th>Atas Nama</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($t_pengembalian as $tkmbli)
			{?>
				<tr>
					<td><input type="checkbox" name="ckbdelete[]" value="<?php echo $tkmbli->id_peminjaman; ?>"></td>
					<td><?php echo $tkmbli->id_peminjaman ?></td>
					<td><?php echo $tkmbli->id_barang?></td>
					<td><?php echo $tkmbli->tgl_kembali ?></td>
					<td><?php echo $tkmbli->jumlah_kembali ?></td>
					<td><?php echo $tkmbli->penanggung_jawab_id ?></td>
					<td><?php echo $tkmbli->penanggung_jawab_nama ?></td>
					<td>
						<button type="button" class="btn btn-warning" onclick="ngedit_barang(<?php echo $tkmbli->id_pengembalian;?>)"><i class="glyphicon glyphicon-edit"></i></button>
						<button type="button" class="btn btn-info" onclick="detail_barang(&quot;<?php echo $tkmbli->id_peminjaman;?>&quot;)"><i class="glyphicon glyphicon-info-sign"></i></button>
						<button type="button" class="btn btn-danger" onclick="ngapus_barang(&quot;<?php echo $tkmbli->id_peminjaman;?>&quot;)"><i class="glyphicon glyphicon-trash"></i></button>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<table class="table table-bordered table-striped">
		<tr>
			<button class="btn btn-danger" onclick="ngapusper_barang()">Hapus</button>
		</tr>
	</table>
</form>
</div>

	<!-- Bootstrap modal Edit and Add -->
	  <div class="modal fade" id="modal_form" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h3 class="modal-title">Barang</h3>
	      </div>
	      <div class="modal-body form">
	        <form action="#" id="form" class="form-horizontal">
	          <input type="hidden" value="" name="id_pengembalian"/>
	          <div class="form-body">
	          	<div class="form-group" id="id_barang">
	              <label class="control-label col-md-3">ID Peminjaman</label>
	              <div class="col-md-9">
	                <input name="id_peminjaman" placeholder="ID Peminjaman" class="form-control" type="text" required="true">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">ID Barang</label>
	              <div class="col-md-9">
	                <select name="id_barang" id="id_barang" class="form-control">
                        <?php 
                            foreach($idbarang as $barang)
                            { 
                              echo '<option value="'.$barang->id_barang.'">'.$barang->id_barang.'</option>';
                            }
                        ?>
                    </select required>
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Tanggal Kembali</label>
	              <div class="col-md-9">
	                <input name="tgl_kembali" placeholder="Tanggal Kembali" class="form-control" type="date" required="true">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Jumlah Kembali</label>
	              <div class="col-md-9">
					<input name="jumlah_kembali" placeholder="Jumlah Kembali" class="form-control" type="number" required="true" min="1">
	              </div>
	            </div>
				<div class="form-group">
					<label class="control-label col-md-3">Penanggung Jawab</label>
					<div class="col-md-9">
						<input name="penanggung_jawab" placeholder="Penanggung Jawab" class="form-control" type="text" required="true">

					</div>
				</div>
	          </div>
	        </form>
	          </div>
	          <div class="modal-footer">
	            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Simpan</button>
	            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	          </div>
	        </div><!-- /.modal-content -->
	      </div><!-- /.modal-dialog -->
	    </div><!-- /.modal -->
	  <!-- End Bootstrap modal -->

	<script type="text/javascript">

		function ngedit_barang(id)
	    {
	      save_method = 'update';
	      $('#form')[0].reset(); // reset form on modals

	      //Ajax Load data from ajax
	      $.ajax({
	        url : "<?php echo base_url('admin/Barang/barang/ajax_edit_pengembalian/')?>/" + id,
	        type: "GET",
	        dataType: "JSON",
	        success: function(data)
	        {
	        	$('[name="id_pengembalian"]').val(data.id_pengembalian);
	        	$('[name="id_peminjaman"]').val(data.id_peminjaman);	
	            $('[name="id_barang"]').val(data.id_barang);
	            $('[name="tgl_kembali"]').val(data.tgl_kembali);
	            $('[name="jumlah_kembali"]').val(data.jumlah_kembali);
	            $('[name="penanggung_jawab"]').val(data.penanggung_jawab);

	            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
	            $('.modal-title').text('Edit Barang'); // Set title to Bootstrap modal title

	        },
	
	    });
	    }

	    function detail_barang(id)
	    {
	      $('#form')[0].reset(); // reset form on modals

	      //Ajax Load data from ajax
	      $.post('nampil_detailPngmblian/' + id, function(data)
        	{
        		$('#tmpModal').html(data);
        		$('#modal_detail').modal('show');
        	})
	    }



	    function save()
	    {
	    	var url;
	      	if(save_method == 'update')
	      	{
	       		url = "<?php echo base_url('admin/Barang/barang/update_barang_pengembalian')?>";
	      	}

	       // ajax adding data to database
	          $.ajax({
	            url : url,
	            type: "POST",
	            data: $('#form').serialize(),
	            dataType: "JSON",
	            success: function(data)
	            {
	               //if success close modal and reload ajax table
	               $('#modal_form').modal('hide');
	              location.reload();// for reload a page
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Terjadi kesalahan!');
	            }
	        });
	    }

	    function ngapus_barang(id)
	    {
	      if(confirm('Anda yakin akan menghapus data dengan id ' + id + '?'))
	      {
	        // ajax delete data from database
	          $.ajax({
	            url : "<?php echo site_url('admin/Barang/barang/ngapus_barang_kembali')?>/"+id,
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

	function ngapus_semua_barang()
	    {
	      if(confirm('Anda yakin akan menghapus semua histori peminjaman?'))
	      {
	        // ajax delete data from database
	          $.ajax({
	            url : "<?php echo site_url('admin/Barang/barang/ngapus_semua_pengembalian')?>",
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

	    function ngapusper_barang()
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