<!DOCTYPE html>
<html>
<head>
	<title>Sarana dan Prasarana</title>
</head>
<body>
	<?=$this->session->flashdata('notif')?>
	<h1 class="text-center">Data Barang</h1>
	<div id="tmpModal"></div>
	<button class="btn btn-success" onclick="tambah_barang()"><i class="glyphicon glyphicon-plus"></i> Input data barang</button>
	<br />
	<br />
	<div class="table-responsive">
		<form action="<?php echo base_url('admin/barang/barang/hapusIdBarang') ?>" method="post" id="delete">
		<table id="table_id" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th><input type="checkbox" name="ckall" id="ckall"></th>
					<th>ID Barang</th>
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
				{
					$harga = number_format($tbrang->harga, 0, ",", ".");
				?>
					<tr>
						<td><input type="checkbox" name="ckbdelete[]" value="<?php echo $tbrang->id_barang; ?>"></td>
						<td><?php echo $tbrang->id_barang ?></td>
						<td><?php echo $tbrang->nama_barang ?></td>
						<td><?php echo $tbrang->spesifikasi ?></td>
						<td><?php echo $tbrang->merk ?></td>
						<td><?php echo $tbrang->jumlah ?></td>
						<td>Rp. <?php echo $harga ?></td>
						<td><?php echo $tbrang->satuan ?></td>
						<td>
							<button type="button" class="btn btn-warning" onclick="ngedit_barang(<?php echo $tbrang->id;?>)"><i class="glyphicon glyphicon-edit"></i></button>
							<button type="button" class="btn btn-info" onclick="detail_barang(&quot;<?php echo $tbrang->id_barang;?>&quot;)"><i class="glyphicon glyphicon-info-sign"></i></button>
							<button type="button" class="btn btn-danger" onclick="ngapus_barang(&quot;<?php echo $tbrang->id_barang;?>&quot;)"><i class="glyphicon glyphicon-trash"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<button type="button" class="btn btn-danger" onclick="ngapusper_barang()">Hapus</button><br><br>
		<p><i><b>Catatan:</b> Data ini adalah data barang yang saat ini tersedia di SMK TELKOM. Untuk menambah jumlah maka harus ada barang masuk terlebih dahulu. Silahkan klik Input Data Barang Masuk jika ada barang yang masuk untuk menambah data.</i></p>
	</form>
	</div>


	<!-- Bootstrap modal Edit and Add -->
	  <div class="modal fade" id="modal_form" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h3 class="modal-title">Update Barang</h3>
	      </div>
	      <div class="modal-body form">
	        <form action="#" id="form" class="form-horizontal">
	          <input type="hidden" value="" name="id"/>
	          <div class="form-body">
	          	<div class="form-group" id="id">
	              <label class="control-label col-md-3">ID Barang</label>
	              <div class="col-md-9">
	                <input name="id_barang" id="idbarang" placeholder="ID Barang" class="form-control" type="text" required="true">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Nama Barang</label>
	              <div class="col-md-9">
	                <input name="nama_barang" id="nama_barang" placeholder="Nama Barang" class="form-control" type="text" required="true">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Spesifikasi</label>
	              <div class="col-md-9">
	                <input name="spesifikasi" id="spesifikasi" placeholder="Spesifikasi" class="form-control" type="text" required="true">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Merk</label>
	              <div class="col-md-9">
					<input name="merk" id="merk" placeholder="Merk" class="form-control" type="text" required="true">
	              </div>
	            </div>
	            <div class="form-group jml">
	              <label class="control-label col-md-3">Jumlah</label>
	              <div class="col-md-9">
					<input name="jumlah" id="jumlah" placeholder="Jumlah" class="form-control" type="number" required="true">
	              </div>
	            </div>
				<div class="form-group">
					<label class="control-label col-md-3">Harga</label>
					<div class="col-md-9">
						<input name="harga" id="harga" placeholder="Harga" class="form-control" type="text" required="true">

					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Satuan</label>
					<div class="col-md-9">
						<select name="satuan" id="satuan" placeholder="Satuan" class="form-control" required="true">
							<option value="Unit">Unit</option>
							<option value="Buah">Buah</option>
						</select>
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
		  $(document).ready( function () {
		      $('#table_id').DataTable();
		  } );
		    var save_method; //for save method string
		    var table;

            $('.btnModal').on('click',function(){
			   var id = $(this).attr('data-id');
			  	alert(id);
			});

		    function tambah_barang()
		    {
		      save_method = 'add';
		      $('#form')[0].reset(); // reset form on modals
		      $('.jml').hide();
		      $('#modal_form').modal('show'); // show bootstrap modal
		      $('.modal-title').text('Tambah Barang'); // Set Title to Bootstrap modal title
		    }

		    function ngedit_barang(id)
		    {
		      save_method = 'update';
		      $('#form')[0].reset(); // reset form on modals

		      //Ajax Load data from ajax
		      $.ajax({
		        url : "<?php echo base_url('admin/Barang/barang/ajax_edit_barang/')?>/" + id,
		        type: "GET",
		        dataType: "JSON",
		        success: function(data)
		        {
		        	$('[name="id"]').val(data.id);
		        	$('[name="id_barang"]').val(data.id_barang);	
		            $('[name="nama_barang"]').val(data.nama_barang);
		            $('[name="spesifikasi"]').val(data.spesifikasi);
		            $('[name="merk"]').val(data.merk);
		            $('[name="jumlah"]').val(data.jumlah);
		            $('[name="harga"]').val(data.harga);
		            $('[name="satuan"]').val(data.satuan);

		            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
		            $('.modal-title').text('Edit Barang'); // Set title to Bootstrap modal title

		        },
		
		    });
		    }

		    function detail_barang(id)
		    {
		      $('#form')[0].reset(); // reset form on modals

		      //Ajax Load data from ajax
		      $.post('nampil_detail/' + id, function(data)
            	{
            		$('#tmpModal').html(data);
            		$('#modal_detail').modal('show');
            	})
		    }

		    function save()
		    {
		    	var url;
		    	if(save_method == 'add')
		      	{
		      		if($('#idbarang').val()=="" || $('#idbarang').val()==null || $('#nama_barang').val()=="" || $('#nama_barang').val()==null || $('#spesifikasi').val()=="" || $('#spesifikasi').val()==null || $('#merk').val()=="" || $('#merk').val()==null || $('#harga').val()=="" || $('#harga').val()==null || $('#satuan').val()=="" || $('#satuan').val()==null)
			      	{
			        	alert("Gagal")
			      	}
			      	else
			      	{
			      		url = "<?php echo site_url('admin/Barang/barang/input_barang')?>";
			      	}
		      	}
		      	else
		      	{
		       		url = "<?php echo base_url('admin/Barang/barang/update_barang')?>";
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
		      if(confirm('Anda yakin akan menghapus semua barang dengan id ' + id + '?'))
		      {
		        // ajax delete data from database
		          $.ajax({
		            url : "<?php echo site_url('admin/Barang/barang/ngapus_barang')?>/"+id,
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