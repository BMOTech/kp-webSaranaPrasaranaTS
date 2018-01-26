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
						<th>Email</th>
						<td><?php echo $tuser->email ?></td>
					</tr>
					<tr>
						<th>Fullname</th>
						<td><?php echo $tuser->fullname ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<table class="table table-bordered table-striped">
			<tr>
				<td><center><?php echo anchor('member\My_info/ngedit_akun/'.$tuser->id, 'Edit Profile'); ?></center></td>
			</tr>
			<tr>
				<td><center><?php echo anchor('member\My_info/ngedit_pass/'.$tuser->id, 'Edit Password'); ?></center></td>
			</tr>
			<tr>
				<td><center><?php echo anchor('member\My_info/ngedit_akun/'.$tuser->id, 'Hapus Akun'); ?></center></td>
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

