<!DOCTYPE html>
<?php
	include_once('database.php');
	$mod = moderatorlog();
?>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Reports</h2>
	<table class="table">
		<tr>
			<td>fullname</td>
			<td>contact No</td>
			<td>News Type</td>
			<td>Title</td>
			<td>Information</td>
			<td>Date Posted</td>
		</tr>
	<?php foreach ($mod as $modmod) {
	?>
	<tr>
		<td><?php echo $modmod['fullname']; ?></td>
		<td><?php echo $modmod['contactNo']; ?></td>
		<td><?php echo $modmod['newsType']; ?></td>
		<td><?php echo $modmod['title']; ?></td>
		<td><?php echo $modmod['info']; ?></td>
		<td><?php echo $modmod['datePosted']; ?></td>
	</tr>
	<?php } ?>
	</table>

</body>
</html>