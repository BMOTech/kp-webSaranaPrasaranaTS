<!DOCTYPE html>
<html>
<head>
	<title>Njajal</title>
	 <script src="<?php echo base_url('assets/bstrp/js/jquery2.js') ?>"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/bstrp/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bstrp/js/jquery.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/bstrp/js/bootstrap.min.js') ?>"></script>
</head>
<body>
<select name="company">
    <option "1">Microsoft</option>
    <option "2">Microsoft</option>
    <option "3">Microsoft</option>
    <option "4">Microsoft</option>
    <option "5">Apple</option>
    <option "6">Apple</option>
    <option "7">Google</option>
</select>
<select name="company">
    <option "1">Microsoft</option>
    <option "2">Microsoft</option>
    <option "3">Microsoft</option>
    <option "4">Microsoft</option>
    <option "5">Apple</option>
    <option "6">Apple</option>
    <option "7">Google</option>
</select>
</body>
<script type="text/javascript">
	var usedNames = {};
	$("select[name='fields[]'] > option").each(function () {
	    if(usedNames[this.text]) {
	        $(this).remove();
	    } else {
	        usedNames[this.text] = this.value;
	    }
	});
</script>
</html>