<?php
	include_once"../database.php";
	$agency = retrieve_agency();
	if(isset($_POST['search']))
	{
		$search = search_agency($_POST["search-box"]);
	}	
		
?>
<html>
	<head><title>PH directory - Subscriber</title></head>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	<body>
		<form method="post" class="form-inline">
		<div class="form-group">
			<input type="text" id="search-box" name="search-box" placeholder="search" class="form-control">
			<input type="submit" value="search" name="search" class="btn btn-primary">
		</div>
		</form>

		<table class="table">
			<thead>
				<tr>
					<td>Agency No.</td>
					<td>Agency Name</td>
					<td>Email</td>
					<td>Phone No.</td>
					<td>info</td>
					<td>Organization</td>
					<td colspan="4">Address</td>
					<td>Region</td>
					<td>Status</td>
					<td></td>
				<tr>
			</thead>
			
			<?php 
			if(!isset($_POST['search']))
			{
				foreach ($agency as $a) 
				{
			?>
				<tr>
					<td><?php echo $a['agencyID'];?></td>
					<td><?php echo $a['agencyName'];?></td>
					<td><?php echo $a['email'];?></td>
					<td><?php echo $a['phoneNo'];?></td>
					<td><?php echo $a['info'];?></td>
					<td><?php echo $a['organization'];?></td>
					<td><?php echo $a['houseNo'];?></td>
					<td><?php echo $a['StreetAddress'];?></td>
					<td><?php echo $a['barangayAddress'];?></td>
					<td><?php echo $a['cityAddress'];?></td>
					<td><?php echo $a['region'];?></td>
					<td><?php echo $a['status'];?></td>
					<td><a href="active.php?id=<?php echo $a['agencyID'];?>">Activate</a></td>
				</tr>
			<?php 
				} 
			}
			else
				foreach ($search as $s) 
				{
			?>
			<tr>
					<td><?php echo $s['agencyID'];?></td>
					<td><?php echo $s['agencyName'];?></td>
					<td><?php echo $s['email'];?></td>
					<td><?php echo $s['phoneNo'];?></td>
					<td><?php echo $s['info'];?></td>
					<td><?php echo $s['organization'];?></td>
					<td><?php echo $s['houseNo'];?></td>
					<td><?php echo $s['StreetAddress'];?></td>
					<td><?php echo $s['barangayAddress'];?></td>
					<td><?php echo $s['cityAddress'];?></td>
					<td><?php echo $s['region'];?></td>
					<td><?php echo $s['status'];?></td>
					<td><a href="active.php?id=<?php echo $s['agencyID'];?>">Activate</a></td>
				</tr>
			<?php } ?>

		</table>

	</body>
</html>