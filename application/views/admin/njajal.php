<?php
$count = 0;
?>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Facebook Like Header Notification in PHP</title>
	<link rel="stylesheet" href="notification-demo-style.css" type="text/css">
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">

	function myFunction() {
		$.ajax({
			url: "<?php echo base_url('admin/admin/view_notif')?>",
			type: "POST",
			processData:false,
			success: function(data){
				$("#notification-count").remove();					
				$("#notification-latest").show();$("#notification-latest").html(data);
			},
			error: function(){}           
		});
	 }
	 
	 $(document).ready(function() {
		$('body').click(function(e){
			if ( e.target.id != 'notification-icon'){
				$("#notification-latest").hide();
			}
		});
	});
		 
	</script>
	</head>
	<body>
	<div class="demo-content">
		<div id="notification-header">
			   <div style="position:relative">
			   <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"><?php if($count>0) { echo $count; } ?></span><img src="notification-icon.png" /></button>
				 <div id="notification-latest"></div>
				</div>			
		</div>
	<?php if(isset($message)) { ?> <div class="error"><?php echo $message; ?></div> <?php } ?>


	<?php if(isset($success)) { ?> <div class="success"><?php echo $success;?></div> <?php } ?>

		<form name="frmNotification" id="frmNotification" action="<?php echo base_url('admin/admin/njajale'); ?>" method="post" >
			<div id="form-header" class="form-row">Add New Message</div>
			<div class="form-row">
				<div class="form-label">Subject:</div><div class="error" id="subject"></div>
				<div class="form-element">
					<input type="text"  name="subject" id="subject" required>
					
				</div>
			</div>
			<div class="form-row">
				<div class="form-label">Comment:</div><div class="error" id="comment"></div>
				<div class="form-element">
					<textarea rows="4" cols="30" name="comment" id="comment"></textarea>
				</div>
			</div>
			<div class="form-row">
				<div class="form-element">
					<input type="submit" name="add" id="btn-send" value="Submit">
				</div>
			</div>
		</form>
		</div>
	</body>
</html>