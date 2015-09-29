<?php
	include_once"../database.php";
	$sp = find_allsub();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>Reports</h2>
<table class="table">
	<tr>
		<td>Agency</td>
		<td>Phone No.</td>
		<td>Email</td>
		<td>Subscription</td>
		<td>Amount</td>
	</tr>
	<?php
		foreach ($sp as $sub) {
	?>
	<tr>
		<td><?php echo $sub['agencyName'];?></td>
		<td><?php echo $sub['phoneNo'];?></td>
		<td><?php echo $sub['email'];?></td>
		<td><?php echo $sub['SPName'];?></td>
		<td><?php echo $sub['amount'];?></td>
	</tr>
	<?php
	}?>
	</table>
<hr>
</body>
</html>