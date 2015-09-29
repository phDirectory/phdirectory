<?php
	include_once('database.php');
	if(isset($_POST['add_services']))
	{
		if(isset($_POST['servicename'])&&isset($_POST['servicetype'])&&isset($_POST['details']))
		{
			addservice($_POST);
			header("Location:index.php?page=services");
		}
		
	}
	$type = getallservicesType();
?>

<html>
<head><title>PH directory - Add Services</title></head>
<body>
	<h2>Add Service</h2>
	<form method="post" class="form-horizontal">
		<div class="form-group">
			<label id="form-label">Service Name</label>
			<input type="text" name="servicename" id="servicename" placeholder="Service Name" class="form-control" required>
			<label id="form-label">Service Type</label>
			<select name="servicetype" id="servicetype" class="form-control" required>
			<?php 
				foreach ($type as $t) {	
			?> 
				<option><?php echo $t['serviceTypeName']; ?></option>
			<?php } ?>
			</select>
			<label id="form-label">details</label>
			<textarea rows="4" cols="50" name="details" placeholder="Enter details here..." class="form-control" required></textarea>
			<input type="submit" class="btn btn-primary" name="add_services" value="Add Services">
		</div>	
	</form>
</body>
</html>