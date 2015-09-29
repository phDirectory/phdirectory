<?php
	include_once('database.php');
	$id = $_GET['id'];
	$n = find_service($id);
	if(isset($_POST['edit']))
	{
		service_edit($_POST);
		header('Location:index.php?page=services');
	}
	$type = getallservicesType();
?>

<html>
<head><title>PH directory</title></head>
<body>
	<h2>Edit Service</h2>
	<form method="post" class="form-horizontal">
		<div class="form-group">
			<label id="form-label">Service Name</label>
			<input type="text" name="servicename" placeholder="Title" class="form-control" value="<?php echo $n['serviceName']?>" required>

			<label id="form-label">Service Type</label>
						<select name="servicetype" id="servicetype" class="form-control" required>
			<?php 
				foreach ($type as $t) {	
			?> 
				<option><?php echo $t['serviceTypeName']; ?></option>
			<?php } ?>
			</select>
			<label id="form-label">Details</label>
			<textarea rows="4" name="details" placeholder="Enter details here..." class="form-control" required><?php echo $n['details']?></textarea>

			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#service-edit">Edit</button>
			<button class="btn btn-default"><a href="index.php?page=services" style="color:#000;">back</a></button>
		</div>


		<!-- Modal -->
		<div id="service-edit" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Edit</h4>
		      </div>
		      <div class="modal-body">
		        <p>Are you sure you want to edit this services?</p>
		      </div>
		      <div class="modal-footer">
		      	
		      	<button type="submit" class="btn btn-primary" name='edit'>Edit</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		
		  </div>
		</div>	
	</form>


	<script src="../assets/jquery.min.js"></script>
</body>
</html>