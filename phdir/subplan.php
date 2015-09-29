<?php
include_once"../database.php";

	$sub = sp();
?>

<html>
	<head><title>PH directory - subscription plan</title></head>
	<body>
	<button class="btn btn-primary"><a href="index.php?page=subplan-add">Add New Subscription Plan</a></button>
		<table class="table">
			<thead>
				<tr>
					<td>Subscription No.</td>
					<td>Subscription Name</td>
					<td>Description</td>
					<td>Amount</td>
					<td></td>
					<td></td>
				<tr>
			</thead>
			
			<?php 
				foreach ($sub as $a) 
				{
			?>
				<tr>
					<td><?php echo $a['SPID'];?></td>
					<td><?php echo $a['SPName'];?></td>
					<td><?php echo $a['description'];?></td>
					<td><?php echo $a['amount'];?></td>
					<td><a href="index.php?page=subplan-edit&id=<?php echo $a['SPID'] ?>">Edit</a></td>
					<td><a href="subplan-delete.php?id=<?php echo $a['SPID'];?>" onclick="return confirm('Are you sure you want to delete this subscription plan?')">Delete</a></td>
				</tr>
			<?php 
				} 
			?>


		</table>
	</body>
</html>