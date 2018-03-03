<!DOCTYPE html>
<html>
<head>
	<title>Barang Hilang</title>
</head>
<body>
	<?=$this->session->flashdata('notif')?>
	<h1 class="text-center">Data Barang Rusak</h1>
	<div id="tmpModal"></div>
	<button class="btn btn-success" onclick="tambah_barang()"><i class="glyphicon glyphicon-plus"></i> Input data barang rusak</button>
	<br />
	<br />
		<div class="table-responsive">
		<form action="<?php echo base_url('admin/barang/barang/hapusIdBarangRsk') ?>" method="post" id="delete">
		<table id="table_id" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th><input type="checkbox" name="ckall" id="ckall"></th>
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
						<td><input type="checkbox" name="ckbdelete[]" value="<?php echo $trusak->id_barang_keluar; ?>"></td>
						<td><?php echo $trusak->id_barang_keluar ?></td>
						<td><?php echo $trusak->id_barang ?></td>
						<td><?php echo $trusak->tgl_rusak?></td>
						<td><?php echo $trusak->jml_rusak ?></td>
						<td><?php echo $trusak->penanggung_jawab ?></td>
						<td><?php echo $trusak->tindakan ?></td>
						<td>
							<button type="button" class="btn btn-warning" onclick="ngedit_barang(<?php echo $trusak->id;?>)"><i class="glyphicon glyphicon-edit"></i></button>
							<button type="button" class="btn btn-info" onclick="detail_barang(&quot;<?php echo $trusak->id_barang_keluar;?>&quot;)"><i class="glyphicon glyphicon-info-sign"></i></button>
							<button type="button" class="btn btn-danger" onclick="ngapus_barang(&quot;<?php echo $trusak->id_barang_keluar;?>&quot;)"><i class="glyphicon glyphicon-trash"></i></button>
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
	        <h3 class="modal-title">Update Barang Hilang</h3>
	      </div>
	      <div class="modal-body form">
	        <form action="#" id="form" class="form-horizontal">
	          <input type="hidden" value="" name="id"/>
	          <div class="form-body">
	          	<div class="form-group">
	              <label class="control-label col-md-3">ID Barang Keluar</label>
	              <div class="col-md-9">
	                <input name="id_barang_keluar" id="id_barang_keluar" placeholder="ID Barang Keluar" class="form-control" type="text">
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
	              <label class="control-label col-md-3">Tanggal Rusak</label>
	              <div class="col-md-9">
	                <input name="tgl_rusak" placeholder="Tanggal Rusak" class="form-control" type="date">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Jumlah Rusak</label>
	              <div class="col-md-9">
					<input name="jml_rusak" placeholder="Jumlah Rusak" class="form-control" type="number" min="0">
	              </div>
	            </div>
				<div class="form-group">
					<label class="control-label col-md-3">Penanggung Jawab</label>
					<div class="col-md-9">
						<input name="penanggung_jawab" placeholder="Penanggung Jawab" class="form-control" type="text">

					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Tindakan</label>
					<div class="col-md-9">
						<input name="tindakan" placeholder="Tindakan" class="form-control" type="text">
					</div>
				</div>
				<div class="form-group" id="satuan">
					<label class="control-label col-md-3">Satuan</label>
					<div class="col-md-9">
						<select name="satuan" placeholder="Satuan" class="form-control">
							<option value="Unit">Unit</option>
							<option value="Buah">Buah</option>
						</select>
					</div>
				</div>
				<div class="form-group" id="id_ruang">
					<label class="control-label col-md-3">ID Ruang</label>
					<div class="col-md-9">
						<select name="id_ruang" class="form-control">
                            <?php 
	                            foreach($idruang as $ruang)
	                            { 
	                              echo '<option value="'.$ruang->id_ruang.'">'.$ruang->id_ruang.'</option>';
	                            }
	                        ?>
                        </select required>
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
		                <th>ID Barang</th>
		                <th>No Inv</th>
		                <th class="text-right">Kondisi</th>
		              </tr>
		            </thead>
		            <tbody>
		              <?php
						foreach($detail_barang as $detil)
						{?>
							<tr>
								<td><?php echo $detil->id_barang ?></td>
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
		      $('#table_id').DataTable();
		  } );
		    var save_method; //for save method string
		    var table;


		    function tambah_barang()
		    {
		      save_method = 'add';
		      $('#form')[0].reset(); // reset form on modals
		      $('#modal_form').modal('show'); // show bootstrap modal
		      $('.modal-title').text('Tambah Barang Rusak'); // Set Title to Bootstrap modal title
		      $("#satuan").show();
		      $("#id_ruang").show();
		    }

		    function ngedit_barang(id)
		    {
		      save_method = 'update';
		      $('#form')[0].reset(); // reset form on modals

		      //Ajax Load data from ajax
		      $.ajax({
		        url : "<?php echo site_url('admin/Barang/barang/ajax_edit_rusak/')?>/" + id,
		        type: "GET",
		        dataType: "JSON",
		        success: function(data)
		        {
		        	$('[name="id"]').val(data.id);
		            $('[name="id_barang_keluar"]').val(data.id_barang_keluar);
		            $('[name="id_barang"]').val(data.id_barang);
		            $('[name="tgl_rusak"]').val(data.tgl_rusak);
		            $('[name="jml_rusak"]').val(data.jml_rusak);
		            $('[name="penanggung_jawab"]').val(data.penanggung_jawab);
		            $('[name="tindakan"]').val(data.tindakan);


		            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
		            $('.modal-title').text('Edit Barang Rusak'); // Set title to Bootstrap modal title

		        },
		        error: function (jqXHR, textStatus, errorThrown)
		        {
		            alert('Error pada saat mengambil data!');
		        }
		    });
		      $("#satuan").hide();
		      $("#id_ruang").hide();
		    }

		    function detail_barang(id)
		    {
		      $('#form')[0].reset(); // reset form on modals

		      //Ajax Load data from ajax
		      $.post('nampil_detailRsk/' + id, function(data)
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
		          url = "<?php echo site_url('admin/Barang/barang/input_barang_rusak')?>";
		      }
		      else
		      {
		        url = "<?php echo base_url('admin/Barang/barang/update_barang_rusak')?>";
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
		            url : "<?php echo site_url('admin/Barang/barang/ngapus_barang_rusak')?>/"+id,
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