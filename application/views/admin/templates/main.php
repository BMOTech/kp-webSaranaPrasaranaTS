<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome</title>

	<style type="text/css">
		#sidebar
		{
			width: 17%;
			height: 100%;
			float: left;
		}

		/*#footer
		{
			width: 100%;
			height: 100px;
			background: #ff0;
		}*/

		#content
		{
			width: 0px;
			height: 100%;
			float: left;
		}

		.clear
		{
			clear: both;
		}
	</style>
</head>
<body>

	<?php if ($header) {
		echo $header;
	} ?>

	<?php if ($sidebar) {
		echo $sidebar;
	} ?>

	<div id="content"><?php if ($content) {
		echo $content;
	} ?></div>

	<div class="clear">
		
	</div>

	<!-- <?php if ($footer) {
		//echo$footer;
	} ?> -->

	
</body>
</html>