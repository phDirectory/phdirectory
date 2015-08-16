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
				<td><input type='text' name='info' palceholder='information' class="form-control" value="<?php echo $agency['info'];?>"></td>	
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type='text' name='email' palceholder='Email' class="form-control" value="<?php echo $agency['email'];?>"></td>	
			</tr>
			<tr>
				<td>Contact No.:</td>
				<td><input type='text' name='phone' palceholder='Phone no.' class="form-control" value="<?php echo $agency['phoneNo'];?>"></td>	
			</tr>
			<tr>
				<td>Address:</td>
				<td><input type="text" name='house' class="form-control" value = "<?php echo $agency['houseNo'];?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="text" name='street' class="form-control" value = "<?php echo $agency['StreetAddress'];?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="text" name="barangay" class="form-control" value="<?php echo $agency['barangayAddress'];?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="text" name="city" class="form-control" value="<?php echo $agency['cityAddress'];?>"></td>	
			</tr>
			<tr>
			<td></td>
			<td><input type="submit" class="btn btn-primary" name="submit"></td>
			</tr>
		</table>
		</form>
	</body>
</html>