<?php
	include_once('database.php');
	if(!isset($_SESSION['userData']['agencyID']))
	{
		header('Location:../index.php');
	}
		$id = $_SESSION['userData']['agencyID'];
		$agency = getagency($id);

	if(isset($_POST['submit']))
	{
		editagency($_POST);
		header("Location:index.php?page=agency");
	}
?>
<html>
	<body>
		<span>Agency Details</span>
		<form method='post'>
		<table class="table">
			<tr>
				<td>Agency Name:</td>
				<td><input type="text" name="agencyname" id="agencyname" placeholder="Agency Name" class="form-control" value="<?php echo $agency['agencyName'];?>" required></td>	
			</tr>
			<tr>
				<td>Agency Information:</td>
				<td><textarea name='info' placeholder='information' class="form-control" required><?php echo $agency['info'];?></textarea></td>	
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type='text' name='email' placeholder='Email' class="form-control" value="<?php echo $agency['email'];?>" required></td>	
			</tr>
			<tr>
				<td>Contact No.:</td>
				<td><input type='text' name='phone' placeholder='Phone no.' class="form-control" value="<?php echo $agency['phoneNo'];?>" required></td>	
			</tr>
			<tr>
				<td>Address:</td>
				<td><input type="text" name='house' placeholder='house number' class="form-control" value = "<?php echo $agency['houseNo'];?>" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="text" name='street' placeholder='Street' class="form-control" value = "<?php echo $agency['StreetAddress'];?>" required>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="text" name="barangay" placeholder='barangay' class="form-control" value="<?php echo $agency['barangayAddress'];?>" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="text" name="city" placeholder='City' class="form-control" value="<?php echo $agency['cityAddress'];?>" required></td>	
			</tr>
			<tr>
				<td></td>
				<td><input type="text" name="region" placeholder='Region' class="form-control" value="<?php echo $agency['region'];?>" required></td>
			</tr>
			<tr>
			<td></td>
			<td>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit</button>
				<button class="btn btn-default"><a href="index.php?page=agency" style="color:#000;">back</a></button>
			</td>
			</tr>
		</table>

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Edit</h4>
		      </div>
		      <div class="modal-body">
		        <p>Are you sure you want to change the agency details?</p>
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" class="btn btn-primary" name="submit">Edit</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		      </div>
		    </div>
		
		  </div>
		</div>
		</form>
	</body>
</html>