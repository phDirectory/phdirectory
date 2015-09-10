<?php
	include_once"../database.php";
	$agency = retrieve_agency();
	if(isset($_POST['search']))
	{
		$search = search_agency($_POST["search-box"]);
	}	
?>
<html>
	<head><title>PH directory - Agency</title></head>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	<body>
		<form method="post" class="form-inline">
		<div class="form-group">
			<input type="text" id="search-box" name="search-box" placeholder="search" class="form-control">
			<input type="submit" value="search" name="search" class="btn btn-primary form-control">
		</div>
		</form>

		<table class="table" id="agency-table">
			<thead>
				<tr>
					<td>Agency No.</td>
					<td>Agency Name</td>
					<td>Email</td>
					<td>Phone No.</td>
					<td>info</td>
					<td>Address</td>
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
					<td><?php echo $a['houseNo']." ".$a['StreetAddress']." ".$a['barangayAddress']." ".$a['cityAddress'];?></td>
					<td><?php echo $a['region'];?></td>
					<td><?php echo $a['status'];?></td>
					<td>
					<?php if($a['status']=='I'){?>
    					<a href="agency-activate.php?id=<?php echo $a['agencyID'];?>" onclick="return confirm('Are you sure you want to activate this agency?');">Activate</a>
    				<?php }
    				else {?>	
    					<a href="agency-deactivate.php?id=<?php echo $a['agencyID'];?>" onclick="return confirm('Are you sure you want to deactivate this agency?');">Deactivate</a>
    				<?php }?>
					</td>
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
					<td><?php echo $s['houseNo'].' '.$s['StreetAddress'].' '.$s['barangayAddress'].' '.$s['cityAddress'];?></td>
					<td><?php echo $s['region'];?></td>
					<td><?php echo $s['status'];?></td>
					<td>
					<?php if($s['status']=='I'){?>
    					<a href="agency-activate.php?id=<?php echo $s['agencyID'];?>" onclick="return confirm('Are you sure you want to activate this agency?');">Activate</a>
    				<?php }
    				else {?>	
    					<a href="agency-deactivate.php?id=<?php echo $s['agencyID'];?>" onclick="return confirm('Are you sure you want to deactivate this agency?');">Deactivate</a>
    				<?php }?>
					</td>
			</tr>
			<?php } ?>
		</table>
	</body>
</html>