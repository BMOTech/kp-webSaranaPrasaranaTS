<!DOCTYPE html>
<html>
<head>
	<title>Barang Hilang</title>
</head>
<body>
	<h1 class="text-center">Data Barang Hilang</h1>
	<div id="tmpModal"></div>
	<?=$this->session->flashdata('notif')?>
	<button class="btn btn-success" onclick="tambah_barang()"><i class="glyphicon glyphicon-plus"></i> Input data barang hilang</button>
	<br />
	<br />
	<div class="table-responsive">
	<table id="table_id" class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>ID Barang Keluar</th>
				<th>ID Barang</th>
				<th>Tanggal Hilang</th>
				<th>Alasan Hilang</th>
				<th>Penanggung Jawab</th>
				<th>Solusi</th>
				<th>Jumlah Hilang</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($t_kehilangan as $tilang)
			{?>
				<tr>
					<td><?php echo $tilang->id_barang_keluar ?></td>
					<td><?php echo $tilang->id_barang ?></td>
					<td><?php echo $tilang->tgl_hilang ?></td>
					<td><?php echo $tilang->alasan_hilang ?></td>
					<td><?php echo $tilang->penanggung_jawab ?></td>
					<td><?php echo $tilang->solusi ?></td>
					<td><?php echo $tilang->jumlah_hilang ?></td>
					<td>
						<button class="btn btn-warning" onclick="ngedit_barang(<?php echo $tilang->id;?>)">Edit</button>
						<button class="btn btn-info" onclick="detail_barang(&quot;<?php echo $tilang->id_barang_keluar;?>&quot;)">Detail</button>
						<button class="btn btn-danger" onclick="ngapus_barang(&quot;<?php echo $tilang->id_barang_keluar;?>&quot;)">Hapus</button>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
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
	                <input name="id_barang_keluar" placeholder="ID Barang Keluar" class="form-control" type="text">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">ID Barang</label>
	              <div class="col-md-9">
	                <select name="id_barang" id="id_barang" class="form-control">
                        <?php $idBrang = $this->modelku->select_idBrang() ?>
                        <?php foreach($idBrang->result() as $idBr){ ?>
                            <option value="<?php echo $idBr->id_barang?>"><?php echo $idBr->id_barang?></option>
                        <?php } ?>
                    </select required>
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Tanggal Hilang</label>
	              <div class="col-md-9">
	                <input name="tgl_hilang" placeholder="Tanggal Hilang" class="form-control" type="date">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Alasan Hilang</label>
	              <div class="col-md-9">
					<input name="alasan_hilang" placeholder="Alasan Hilang" class="form-control" type="text">
	              </div>
	            </div>
				<div class="form-group">
					<label class="control-label col-md-3">Penanggung Jawab</label>
					<div class="col-md-9">
						<input name="penanggung_jawab" placeholder="Penanggung Jawab" class="form-control" type="text">

					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Solusi</label>
					<div class="col-md-9">
						<input name="solusi" placeholder="Solusi" class="form-control" type="text">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Jumlah Hilang</label>
					<div class="col-md-9">
						<input name="jumlah_hilang" placeholder="Jumlah Hilang" class="form-control" type="number" min="1">
					</div>
				</div>
				<div class="form-group" id="satuan">
					<label class="control-label col-md-3">Satuan</label>
					<div class="col-md-9">
						<input name="satuan" placeholder="Satuan" class="form-control" type="text">
					</div>
				</div>
				<div class="form-group" id="id_ruang">
					<label class="control-label col-md-3">ID Ruang</label>
					<div class="col-md-9">
						<select name="id_ruang" id="id_ruang" class="form-control">
                            <?php $idRuang = $this->modelku->select_idR() ?>
                            <?php foreach($idRuang->result() as $idRu){ ?>
                                <option value="<?php echo $idRu->id_ruang ?>"><?php echo $idRu->id_ruang ?></option>
                            <?php } ?>
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
		      $('.modal-title').text('Tambah Barang Hilang'); // Set Title to Bootstrap modal title
		      $("#satuan").show();
		      $("#id_ruang").show();
		    }

		    function ngedit_barang(id)
		    {
		      save_method = 'update';
		      $('#form')[0].reset(); // reset form on modals

		      //Ajax Load data from ajax
		      $.ajax({
		        url : "<?php echo site_url('admin/Barang/barang/ajax_edit_kehilangan/')?>/" + id,
		        type: "GET",
		        dataType: "JSON",
		        success: function(data)
		        {
		        	$('[name="id"]').val(data.id);
		        	$('[name="id_barang_keluar"]').val(data.id_barang_keluar);
		            $('[name="id_barang"]').val(data.id_barang);
		            $('[name="tgl_hilang"]').val(data.tgl_hilang);
		            $('[name="alasan_hilang"]').val(data.alasan_hilang);
		            $('[name="penanggung_jawab"]').val(data.penanggung_jawab);
		            $('[name="solusi"]').val(data.solusi);
		            $('[name="jumlah_hilang"]').val(data.jumlah_hilang);


		            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
		            $('.modal-title').text('Edit Barang'); // Set title to Bootstrap modal title

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
		      $.post('nampil_detailIlng/' + id, function(data)
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
		      		url = "<?php echo site_url('admin/Barang/barang/input_barang_hilang')?>";
		      	}
		      	else
		    	{
		      		url = "<?php echo base_url('admin/Barang/barang/update_barang_ilang')?>";
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
		            url : "<?php echo site_url('admin/Barang/barang/ngapus_barang_ilang')?>/"+id,
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

	  </script>

</body>
</html>