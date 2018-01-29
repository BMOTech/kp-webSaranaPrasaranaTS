<!DOCTYPE html>
<html>
<head>
	<title>Daftar User</title>
</head>
<body>
	<h1 class="text-center">Data User</h1><br>
	<?=$this->session->flashdata('notif')?>
	<div class="table-responsive">
	<table id="table_id" class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nama Lengkap</th>
				<th>Username</th>
				<th>Email</th>
				<th>No HP/Telepon</th>
				<th>Tentangnya</th>
				<th>Level</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($t_user as $tuser)
			{?>
				<tr>
					<td><?php echo $tuser->id ?></td>
					<td><?php echo $tuser->fullname ?></td>
					<td><?php echo $tuser->username ?></td>
					<td><?php echo $tuser->email ?></td>
					<td><?php echo $tuser->phone ?></td>
					<td><?php echo $tuser->deskripsi ?></td>
					<td><?php echo $tuser->level ?></td>
					<td>
						<button class="btn btn-danger" onclick="ngapus_user(<?php echo $tuser->id;?>)">Hapus</button>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

	<script type="text/javascript">
		function ngapus_user(id)
	    {
	      if(confirm('Anda yakin akan menghapus user dengan id ' + id + '?'))
	      {
	        // ajax delete data from database
	          $.ajax({
	            url : "<?php echo site_url('admin/User/user/ngapus_user')?>/"+id,
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