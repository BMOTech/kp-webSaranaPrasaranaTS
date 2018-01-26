<!DOCTYPE html>
<html>
<head>
	<title>Sarana dan Prasarana</title>
</head>
<body>
	<div class="container">
		<div class="kecilna" style="width: 95%">
			<h1 class="text-center">Data Barang</h1>
			<div id="tmpModal"></div>
			<?=$this->session->flashdata('notif')?>
			<button class="btn btn-success" onclick="tambah_barang()"><i class="glyphicon glyphicon-plus"></i> Input data barang</button>
			<br />
    		<br />
			<div class="table-responsive">
				<table id="table_id" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
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
									<button class="btn btn-warning" onclick="ngedit_barang(<?php echo $tbrang->id;?>)">Edit</button>
									<button class="btn btn-info" onclick="detail_barang(&quot;<?php echo $tbrang->id_barang;?>&quot;)">Detail</button>
									<button class="btn btn-danger" onclick="ngapus_barang(&quot;<?php echo $tbrang->id_barang;?>&quot;)">Hapus</button>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
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
	                <input name="nama_barang" placeholder="Nama Barang" class="form-control" type="text" required="true">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Spesifikasi</label>
	              <div class="col-md-9">
	                <input name="spesifikasi" placeholder="Spesifikasi" class="form-control" type="text" required="true">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Merk</label>
	              <div class="col-md-9">
					<input name="merk" placeholder="Merk" class="form-control" type="text" required="true">
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
						<input name="satuan" placeholder="Satuan" class="form-control" type="text" required="true">
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

		    document.getElementById("harga").onblur =function (){this.value = parseFloat(this.value.replace(/,/g, ""))
                    .toFixed(2)
                    .toString()
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }

            

            $('.btnModal').on('click',function(){
			   var id = $(this).attr('data-id');
			  	alert(id);
			});

		    function tambah_barang()
		    {
		      save_method = 'add';
		      $('#form')[0].reset(); // reset form on modals
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
		      		if($('#idbarang').val()=="" || $('#idbarang').val()==null)
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

	  </script>
</body>
</html>