<!DOCTYPE html>
<?php
	include_once('database.php');
	if(isset($_POST['add_entry']))
	{
		add_serviceType($_POST);
	}
?>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" class="form-horizontal">
	<div class="form-group">
		<label id="form-label">Service Type</label>
		<input type="text" name="servicetype" id="servicetype" placeholder="Service Type" class="form-control" required>
		<input type="submit" class="btn btn-primary" name="add_entry" value="Add Entry">
	</div>
	</form>
</body>
</html>