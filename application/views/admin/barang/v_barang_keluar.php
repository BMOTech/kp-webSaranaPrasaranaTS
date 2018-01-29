<!DOCTYPE html>
<html>
<head>
	<title>Sarana dan Prasarana</title>
</head>
<body>
	<h1 class="text-center">Data Barang Keluar</h1><br>
	<div id="tmpModal"></div>
	<?=$this->session->flashdata('notif')?>
	<div class="table-responsive">
	<table id="table_id" class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>ID Barang Keluar</th>
				<th>ID Barang</th>
				<th>Tanggal Keluar</th>
				<th>Jumlah Keluar</th>
				<th>Keterangan</th>
				<th>Satuan</th>
				<th>ID Ruang</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($t_barang_keluar as $tbrangkluar)
			{?>
				<tr>
					<td><?php echo $tbrangkluar->id_barang_keluar ?></td>
					<td><?php echo $tbrangkluar->id_barang ?></td>
					<td><?php echo $tbrangkluar->tgl_keluar ?></td>
					<td><?php echo $tbrangkluar->jumlah_keluar ?></td>
					<td><?php echo $tbrangkluar->keterangan ?></td>
					<td><?php echo $tbrangkluar->satuan ?></td>
					<td><?php echo $tbrangkluar->id_ruang ?></td>
					<td>
						<button class="btn btn-warning" onclick="ngedit_barang(<?php echo $tbrangkluar->id;?>)">Edit</button>
						<button class="btn btn-info" onclick="detail_barang(&quot;<?php echo $tbrangkluar->id_barang_keluar;?>&quot;)">Detail</button>
						<button class="btn btn-danger" onclick="ngapus_barang(&quot;<?php echo $tbrangkluar->id_barang_keluar;?>&quot;)">Hapus</button>
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
	        <h3 class="modal-title">Barang</h3>
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
                        <?php $idBarang = $this->modelku->select_idBrang() ?>
                        <?php foreach($idBarang->result() as $idBr){ ?>
                            <option value="<?php echo $idBr->id_barang ?>"><?php echo $idBr->id_barang ?></option>
                        <?php } ?>
                    </select required>
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Tanggal Keluar</label>
	              <div class="col-md-9">
	                <input name="tgl_keluar" placeholder="Tanggal Keluar" class="form-control" type="date">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Jumlah Keluar</label>
	              <div class="col-md-9">
					<input type="number" min="1" name="jumlah_keluar" id="jumlah_keluar" class="form-control" placeholder="Jumlah Keluar">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Keterangan</label>
	              <div class="col-md-9">
					<input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Satuan</label>
	              <div class="col-md-9">
					<input type="text" name="satuan" id="satuan" class="form-control" placeholder="Satuan">
	              </div>
	            </div>
				<div class="form-group">
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
	            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
	            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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

	    function ngedit_barang(id)
	    {
	      save_method = 'update';
	      $('#form')[0].reset(); // reset form on modals

	      //Ajax Load data from ajax
	      $.ajax({
	        url : "<?php echo site_url('admin/Barang/barang/ajax_edit_barangKlr/')?>/" + id,
	        type: "GET",
	        dataType: "JSON",
	        success: function(data)
	        {
	        	$('[name="id"]').val(data.id);
	            $('[name="id_barang_keluar"]').val(data.id_barang_keluar);
	            $('[name="id_barang"]').val(data.id_barang);
	            $('[name="tgl_keluar"]').val(data.tgl_keluar);
	            $('[name="jumlah_keluar"]').val(data.jumlah_keluar);
	            $('[name="keterangan"]').val(data.keterangan);
	            $('[name="satuan"]').val(data.satuan);
	            $('[name="id_ruang"]').val(data.id_ruang);


	            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
	            $('.modal-title').text('Edit Barang'); // Set title to Bootstrap modal title

	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error pada saat mengambil data!');
	        }
	    });
	    }

	    function detail_barang(id)
	    {
	      $('#form')[0].reset(); // reset form on modals

	      //Ajax Load data from ajax
	      $.post('nampil_detailKlr/' + id, function(data)
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
	       		url = "<?php echo base_url('admin/Barang/barang/update_barang_keluar')?>";
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
	      if(confirm('Anda yakin akan menghapus semua barang dengan id tersebut? '))
	      {
	        // ajax delete data from database
	          $.ajax({
	            url : "<?php echo site_url('admin/Barang/barang/ngapus_barang_keluar')?>/"+id,
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

	    function reset()
	    {
	    	location.reload();
	    	$('#form')[0].reset();
	    }

	  </script>
</body>
</html>