<?php
	include_once('database.php');
	$id = $_GET['id'];
	$n = find_service($id);
	if(isset($_POST['edit']))
	{
		service_edit($_POST);
		header('Location:index.php?page=services');
	}
?>

<html>
<head><title>PH directory - Add news</title></head>
<body>
	<h2>Edit Service</h2>
	<form method="post" class="form-horizontal">
		<div class="form-group">
			<label id="form-label">Service Name</label>
			<input type="text" name="servicename" placeholder="Title" class="form-control" value="<?php echo $n['serviceName']?>" required>

			<label id="form-label">Service Type</label>
			<input type="text" name="servicetype" placeholder="website link" class="form-control" value="<?php echo $n['serviceType']?>">

			<label id="form-label">Details</label>
			<textarea rows="4" name="details" placeholder="Enter Information here..." class="form-control" required><?php echo $n['details']?></textarea>

			<input type="submit" class="btn btn-primary" name='edit' id="edit" value="Submit">
		</div>	
	</form>
	<script src="../assets/jquery.min.js"></script>
</body>
</html>