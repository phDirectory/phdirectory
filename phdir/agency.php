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
					<td width="110px">
					<?php if($a['status']==0){?>
    					<a href="active.php?id=<?php echo $a['agencyID'];?>">Activate</a>
    				<?php }
    				else {?>	
    					<a href="deactivate.php?id=<?php echo $a['agencyID'];?>">Deactivate</a>
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
					<td><?php echo $s['organization'];?></td>
					<td><?php echo $s['houseNo'];?></td>
					<td><?php echo $s['StreetAddress'];?></td>
					<td><?php echo $s['barangayAddress'];?></td>
					<td><?php echo $s['cityAddress'];?></td>
					<td><?php echo $s['region'];?></td>
					<td><?php echo $s['status'];?></td>
					<td width="110px">
						<div class="dropdown">
  							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    						<span class="caret"></span>
  							</button>
  							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    							<li><a href="active.php?id=<?php echo $a['agencyID'];?>">Activate</a></li>
    							<li><a href="deactivate.php?id=<?php echo $a['agencyID'];?>">Deactivate</a></li>
  							</ul>
						</div>
					</td>
			</tr>
			<?php } ?>

		</table>

	</body>
</html>