<!DOCTYPE html>
<html>
<head>
	<title>Barang Pinjam</title>
</head>
<body>
	<?=$this->session->flashdata('notif')?>
	<h1 class="text-center">Data Barang yang Dipinjam</h1><br>
	<div id="tmpModal"></div>
	<div class="table-responsive">
	<form action="<?php echo base_url('admin/barang/barang/hapusDataPnjm') ?>" method="post" id="delete">
	<table id="table_id" class="table table-bordered table-striped table-hover" >
		<thead>
			<tr>
				<th><input type="checkbox" name="ckall" id="ckall"></th>
				<th>ID Peminjaman</th>
				<th>ID Barang Keluar</th>
				<th>ID Barang</th>
				<th>Tanggal Peminjaman</th>
				<th>Tanggal Kembali</th>
				<th>Peminjam</th>
				<th>Kondisi</th>
				<th>Jumlah</th>
				<th>Keterangan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($t_peminjaman as $tpinjam)
			{?>
				<tr>
					<td><input type="checkbox" name="ckbdelete[]" value="<?php echo $tpinjam->id_barang_keluar; ?>"></td>
					<td><?php echo $tpinjam->id_peminjaman?></td>
					<td><?php echo $tpinjam->id_barang_keluar?></td>
					<td><?php echo $tpinjam->id_barang?></td>
					<td><?php echo $tpinjam->tgl_peminjaman ?></td>
					<td><?php echo $tpinjam->tgl_kembali ?></td>
					<td><?php echo $tpinjam->peminjam ?></td>
					<td><?php echo $tpinjam->kondisi ?></td>
					<td><?php echo $tpinjam->jumlah ?></td>
					<td><?php echo $tpinjam->keterangan ?></td> 
					<td>
						<button type="button" class="btn btn-warning" onclick="ngedit_barang(<?php echo $tpinjam->id;?>)"><i class="glyphicon glyphicon-edit"></i></button>
						<button type="button" class="btn btn-info" onclick="detail_barang(&quot;<?php echo $tpinjam->id_peminjaman;?>&quot;)"><i class="glyphicon glyphicon-info-sign"></i></button>
						<button type="button" class="btn btn-danger" onclick="ngapus_barang(&quot;<?php echo $tpinjam->id_peminjaman;?>&quot;)"><i class="glyphicon glyphicon-trash"></i></button>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<button type="button" class="btn btn-danger" onclick="ngapusper_barang()">Hapus</button><br><br>
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
	          	<div class="form-group" id="id_barang">
	              <label class="control-label col-md-3">ID Peminjaman</label>
	              <div class="col-md-9">
	                <input type="text" class="id_peminjaman" name="id_peminjaman" id="id_peminjamane">
                    <input type="button" id="btn_id_peminjaman" value="Get" onclick="GetRandomID('id_peminjamane');">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">ID Barang Keluar</label>
	              <div class="col-md-9">
	                <input type="text" class="id_barang_keluar" name="id_barang_keluar" id="id_barang_keluare">
                    <input type="button" id="btn_id_barang_keluar" value="Get" onclick="GetRandomID('id_barang_keluare');">
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
	              <label class="control-label col-md-3">Tanggal Peminjaman</label>
	              <div class="col-md-9">
	                <input name="tgl_peminjaman" placeholder="Tanggal Peminjaman" class="form-control" type="date" required="true">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Tanggal Kembali</label>
	              <div class="col-md-9">
	                <input name="tgl_kembali" placeholder="Tanggal Kembali" class="form-control" type="date" required="true">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Peminjam</label>
	              <div class="col-md-9">
					<input name="peminjam" placeholder="Peminjam" class="form-control" type="text" required="true">
	              </div>
	            </div>
				<div class="form-group">
					<label class="control-label col-md-3">Kondisi</label>
					<div class="col-md-9">
						<input name="kondisi" id="kondisi" placeholder="Kondisi" class="form-control" type="text" required="true">

					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Jumlah</label>
					<div class="col-md-9">
						<input name="jumlah" placeholder="Jumlah" class="form-control" type="number" min="1" required="true">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Keterangan</label>
					<div class="col-md-9">
						<input name="keterangan" placeholder="Keterangan" class="form-control" type="text" required="true">
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


	  <!-- Bootstrap modal Detail -->
	  <div class="modal fade" id="modal_detail">
		<div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		          <h3 class="modal-title">Detail Barang</h3>
		        </div>
		        <div class="modal-body">
		          <table class="table table-striped" id="tblGrid">
		            <thead id="tblHead">
		              <tr>
		                <th>ID Peminjaman</th>
		                <th>No Inv</th>
		                <th>Kondisi</th>
		              </tr>
		            </thead>
		            <tbody>
		              <?php
						foreach($detail_barang as $detil)
						{?>
							<tr>
								<td><?php echo $detil->id_peminjaman ?></td>
								<td><?php echo $detil->no_inv ?></td>
								<td><?php echo $detil->kondisi ?></td>
							</tr>
						<?php } ?>
		            </tbody>
		          </table>
				</div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
		        </div>
						
		      </div><!-- /.modal-content -->
		    </div><!-- /.modal-dialog -->
		  </div><!-- /.modal -->
	  <!-- End Bootstrap modal -->


	  <script type="text/javascript">
		  $(document).ready( function () {
		      $('#table_id').DataTable({
		      	responsive: true
		      });
		  } );
		    var save_method; //for save method string
		    var table;

		    function ngedit_barang(id)
		    {
		      save_method = 'update';
		      $('#form')[0].reset(); // reset form on modals

		      //Ajax Load data from ajax
		      $.ajax({
		        url : "<?php echo base_url('admin/Barang/barang/ajax_edit_pinjam/')?>/" + id,
		        type: "GET",
		        dataType: "JSON",
		        success: function(data)
		        {
		        	$('[name="id"]').val(data.id);
		        	$('[name="id_peminjaman"]').val(data.id_peminjaman);
		        	$('[name="id_barang_keluar"]').val(data.id_barang_keluar);
		        	$('[name="id_barang"]').val(data.id_barang);	
		            $('[name="tgl_peminjaman"]').val(data.tgl_peminjaman);
		            $('[name="tgl_kembali"]').val(data.tgl_kembali);
		            $('[name="peminjam"]').val(data.peminjam);
		            $('[name="kondisi"]').val(data.kondisi);
		            $('[name="jumlah"]').val(data.jumlah);
		            $('[name="keterangan"]').val(data.keterangan);

		            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
		            $('.modal-title').text('Edit Barang'); // Set title to Bootstrap modal title

		        },
		
		    });
		    }

		    function detail_barang(id)
		    {
		      $('#form')[0].reset(); // reset form on modals

		      //Ajax Load data from ajax
		      $.post('nampil_detailPnjm/' + id, function(data)
            	{
            		$('#tmpModal').html(data);
            		$('#modal_detail').modal('show');
            	})
		    }



		    function save()
		    {
		    	var url;
		      	if (save_method == 'update')
		      	{
		       		url = "<?php echo base_url('admin/Barang/barang/update_barang_peminjamanPnjm')?>";
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
		            url : "<?php echo site_url('admin/Barang/barang/ngapus_barang_pinjaman')?>/"+id,
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