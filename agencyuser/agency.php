<?php
	include_once('database.php');
	if(!isset($_SESSION['userData']['agencyID']))
	{
		header('Location:../index.php');
	}
		$id = $_SESSION['userData']['agencyID'];
		$agency = getagency($id);
?>
<html>
	<body>
		<span>Agency details</span>
		<table class="table">
			<tr>
				<td>Agency Name:</td>
				<td><?php echo $agency['agencyName'];?></td>	
			</tr>
			<tr>
				<td>Agency Information:</td>
				<td><?php echo $agency['info'];?></td>	
			</tr>
			<tr>
				<td>Email:</td>
				<td><?php echo $agency['email'];?></td>	
			</tr>
			<tr>
				<td>Contact No.:</td>
				<td><?php echo $agency['phoneNo'];?></td>	
			</tr>
			<tr>
				<td>Address:</td>
				<td><?php echo $agency['houseNo']." ";
						  echo $agency['StreetAddress'].", ";
						  echo $agency['barangayAddress'].", ";
						  echo $agency['cityAddress'];?></td>	
			</tr>
		</table>
	</body>
</html>