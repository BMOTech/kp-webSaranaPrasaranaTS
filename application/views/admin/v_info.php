<!DOCTYPE html>
<html>
<head>
	<title>Daftar User</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/bootstrap-theme.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bstrp/css/style.css') ?>">
</head>
<body>
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<td><b class="myProfile">My Profile<b></td>
			</tr>
		</table>
		<table class="table table-bordered table-striped table-hover member-profile">
			<tbody>
				<?php
				foreach($t_admin as $tadmin)
				{?>
					<tr>
						<th>ID</th>
						<td><?php echo $tadmin->id ?></td>
					</tr>
					<tr>
						<th>Username</th>
						<td><?php echo $tadmin->username ?></td>
					</tr>
					<tr>
						<th>Email</th>
						<td><?php echo $tadmin->email ?></td>
					</tr>
					<tr>
						<th>Fullname</th>
						<td><?php echo $tadmin->fullname ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<table class="table table-bordered table-striped">
			<tr>
				<td><center><?php echo anchor('admin\My_info/ngedit_akun/'.$tadmin->id, 'Edit Profile'); ?></center></td>
			</tr>
			<tr>
				<td><center><?php echo anchor('admin\My_info/ngedit_pass/'.$tadmin->id, 'Edit Password'); ?></center></td>
			</tr>
			<tr>
				<td><center><?php echo anchor('admin\My_info/ngedit_akun/'.$tadmin->id, 'Hapus Akun'); ?></center></td>
			</tr>
		</table>
	</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url('assets/bstrp/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bstrp/js/jquery.js') ?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('assets/bstrp/js/bootstrap.min.js') ?>"></script>
</body>
</html>

