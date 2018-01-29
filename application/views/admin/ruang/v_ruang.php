<!DOCTYPE html>
<html>
<head>
	<title>Sarana dan Prasarana</title>
</head>
<body>
	<h1 class="text-center">Data Ruangan</h1><br>
	<div id="tmpModal"></div>
	<?=$this->session->flashdata('notif')?>
	<button class="btn btn-success" onclick="tambah_ruang()"><i class="glyphicon glyphicon-plus"></i> Tambah Ruangan</button>
	<br />
	<br />
	<div class="table-responsive">
	<table id="table_id" class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>ID Ruang</th>
				<th>Nama Ruang</th>
				<th>Keterangan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($t_ruang as $truang)
			{?>
				<tr>
					<td><?php echo $truang->id_ruang ?></td>
					<td><?php echo $truang->nama_ruang ?></td>
					<td><?php echo $truang->keterangan ?></td>
					<td>
						<button class="btn btn-warning" onclick="ngedit_ruang(<?php echo $truang->id;?>)">Edit</button>
						<button class="btn btn-info" onclick="detail_barang(&quot;<?php echo $truang->id_ruang;?>&quot;)">Lihat Barang</button>
						<button class="btn btn-danger" onclick="ngapus_ruang(&quot;<?php echo $truang->id_ruang;?>&quot;)">Hapus</button>
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
	        <h3 class="modal-title">Update Ruang</h3>
	      </div>
	      <div class="modal-body form">
	        <form action="#" id="form" class="form-horizontal">
	          <input type="hidden" value="" name="id"/>
	          <div class="form-body">
	          	<div class="form-group">
	              <label class="control-label col-md-3">ID Ruang</label>
	              <div class="col-md-9">
	                <input name="id_ruang" placeholder="ID Ruang" class="form-control" type="text">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Nama Ruang</label>
	              <div class="col-md-9">
	                <input name="nama_ruang" placeholder="Nama Ruang" class="form-control" type="text">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Keterangan</label>
	              <div class="col-md-9">
	                <input name="keterangan" placeholder="Keterangan" class="form-control" type="text">
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


		    function tambah_ruang()
		    {
		      save_method = 'add';
		      $('#form')[0].reset(); // reset form on modals
		      $('#modal_form').modal('show'); // show bootstrap modal
		      $('.modal-title').text('Tambah Ruang'); // Set Title to Bootstrap modal title
		    }

		    function ngedit_ruang(id)
		    {
		      save_method = 'update';
		      $('#form')[0].reset(); // reset form on modals

		      //Ajax Load data from ajax
		      $.ajax({
		        url : "<?php echo site_url('admin/Ruang/ruang/ajax_edit_ruang/')?>/" + id,
		        type: "GET",
		        dataType: "JSON",
		        success: function(data)
		        {
		        	$('[name="id"]').val(data.id);
		            $('[name="id_ruang"]').val(data.id_ruang);
		            $('[name="nama_ruang"]').val(data.nama_ruang);
		            $('[name="keterangan"]').val(data.keterangan);


		            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
		            $('.modal-title').text('Edit Ruang'); // Set title to Bootstrap modal title

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
		      $.post('nampil_detailBrangRuang/' + id, function(data)
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
		          url = "<?php echo site_url('admin/Ruang/ruang/input_ruang')?>";
		      }
		      else
		      {
		        url = "<?php echo base_url('admin/Ruang/ruang/update_ruang')?>";
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

		    function ngapus_ruang(id)
		    {
		      if(confirm('Anda yakin akan menghapus ruangan ' + id + '?'))
		      {
		        // ajax delete data from database
		          $.ajax({
		            url : "<?php echo site_url('admin/Ruang/ruang/ngapus_ruang')?>/"+id,
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