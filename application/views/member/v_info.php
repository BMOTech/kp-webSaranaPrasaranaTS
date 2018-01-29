<!DOCTYPE html>
<html>
<head>
	<title>Daftar User</title>
</head>
<body>
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<td><b class="myProfile">My Profile<b></td>
			</tr>
			<div class="msg">
				<?=$this->session->flashdata('notif')?>
			</div>
		</table>
		<table class="table table-bordered table-striped table-hover member-profile">
			<tbody>
				<?php
				foreach($t_user as $tuser)
				{?>
					<tr>
						<th>ID</th>
						<td><?php echo $tuser->id ?></td>
					</tr>
					<tr>
						<th>Username</th>
						<td><?php echo $tuser->username ?></td>
					</tr>
					<tr>
						<th>Fullname</th>
						<td><?php echo $tuser->fullname ?></td>
					</tr>
					<tr>
						<th>Email</th>
						<td><?php echo $tuser->email ?></td>
					</tr>
					<tr>
						<th>No Telephone</th>
						<td><?php echo $tuser->phone ?></td>
					</tr>
					<tr>
						<th>Deskripsi</th>
						<td><?php echo $tuser->deskripsi ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<table class="table table-bordered table-striped">
			<tr>
				<td><button class="btn btn-warning" onclick="ngedit_user(<?php echo $tuser->id;?>)">Edit Profile</button></td>
			</tr>
			<tr>
				<td><button class="btn btn-warning" onclick="ngedit_pass(<?php echo $tuser->id;?>)">Edit Password</button></td>
			</tr>
			<tr>
				<td><button style="float: right;" class="btn btn-danger" onclick="ngapus_user(<?php echo $tuser->id;?>)">Hapus Akun</button></td>
			</tr>
		</table>
	</div>
</body>

<!-- Bootstrap modal Edit and Add -->
	  <div class="modal fade" id="modal_form" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h3 class="modal-title">Update User</h3>
	      </div>
	      <div class="modal-body form">
	        <form action="#" id="form" class="form-horizontal">
	          <input type="hidden" value="" name="id"/>
	          <div class="form-body">
	            <div class="form-group">
	              <label class="control-label col-md-3">Username</label>
	              <div class="col-md-9">
	                <input name="username" placeholder="Username" class="form-control" type="text" required="true">
	              </div>
	            </div>
	            <div class="form-group">
					<label class="control-label col-md-3">Fullname</label>
					<div class="col-md-9">
						<input name="fullname" id="fullname" placeholder="Fullname" class="form-control" type="text" required="true">

					</div>
				</div>
	            <div class="form-group">
	              <label class="control-label col-md-3">Email</label>
	              <div class="col-md-9">
	                <input name="email" placeholder="Email" class="form-control" type="email" required="true">
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="control-label col-md-3">No Telephone</label>
	              <div class="col-md-9">
	                <input name="phone" placeholder="No Telephone" class="form-control" type="tel" required="true">
	              </div>
	            </div>
				<div class="form-group">
					<label class="control-label col-md-3">Deskripsi</label>
					<div class="col-md-9">
						<input name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control" type="text_area" required="true">

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
	    	var save_method; //for save method string
	    	var table;

	    	function ngedit_user(id)
	    	{
	      		save_method = 'update';
	      		$('#form')[0].reset(); // reset form on modals

		      	//Ajax Load data from ajax
		      	$.ajax({
			        url : "<?php echo base_url('member/my_info/edit_profile/')?>/" + id,
			        type: "GET",
			        dataType: "JSON",
			        success: function(data)
			        {
			        	$('[name="id"]').val(data.id);
			        	$('[name="username"]').val(data.username);	
			            $('[name="fullname"]').val(data.fullname);
			            $('[name="email"]').val(data.email);
			            $('[name="phone"]').val(data.phone);
			            $('[name="deskripsi"]').val(data.deskripsi);

			            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
			            $('.modal-title').text('Edit Profil'); // Set title to Bootstrap modal title

		        },
	
	    		});
	    	}

	    	function ngedit_pass(id)
		    {
		    	var url="<?php echo base_url();?>";
		    	window.location = url+"member/my_info/ngedit_pass/"+id;
		    }

	    	function ngapus_user(id)
		    {
		    	var url="<?php echo base_url();?>";
				if(confirm('Apakah anda yakin ingin menghapus akun anda?'))
				{
					if (true) 
					{
						window.location = url+"member/my_info/hapus/"+id;
					}
					else
					{
						return false;
					}
				}
		    }

		    function save()
		    {
		    	var url;
		      	if (save_method == 'update')
		      	{
		       		url = "<?php echo base_url('member/my_info/update_profil')?>";
		      	}
		      	else if (save_method == 'update_pass') 
		      	{
		      		url = "<?php echo base_url('member/my_info/update_password')?>";
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
		</script>

</html>

