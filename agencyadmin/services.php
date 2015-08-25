<?php
	include_once('database.php');
	$services = getallservices();
?>

<html>
	<head><title>PH directory - News Management</title></head>
	<body>
		<button class="btn btn-primary"><a href="index.php?page=service-add">Add Services</a></button>

		<table class="table">
			<thead>
				<tr>
					<td>Services No.</td>
					<td>Service Name</td>
					<td>Service Type</td>
					<td>details</td>
				<tr>
			</thead>
			
			<?php 
				foreach ($services as $a) 
				{
					if($a['status']=='A')
					{
			?>
						<tr>
							<td><?php echo $a['serviceID'];?></td>
							<td><?php echo $a['serviceName'];?></td>
							<td><?php echo $a['serviceType'];?></td>
							<td><?php echo $a['details'];?></td>
		
							<td><a href="index.php?page=service-edit&id=<?php echo $a['serviceID']?>">Edit</a></td>
							<td><a href="service-delete.php?id=<?php echo $a['serviceID']?>">Delete</a></td>
						</tr>
			<?php 
					}
				} 
			?>


		</table>
	</body>
</html>