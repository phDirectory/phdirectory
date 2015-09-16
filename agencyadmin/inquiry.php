<?php
	include_once('database.php');
	$inquiry = get_inquiry();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inquiry</title>
</head>
<body>
	<h2>Inquiry</h2>
	<?php 
		foreach ($inquiry as $i) 
		{ 
	?>
	<div id="inquiry-content">
			<div id="inquiry-title">
				<?php echo $i["title"];?>
				<span class="pull-right"><?php echo $i["date_inquire"];?></span>
			</div>
			<div id="mess">
				<?php echo $i['message']?>
				<span class="pull-right">
				<a href="index.php?page=inq-reply&id=<?php echo $i['mobileID']; ?>" class="btn-reply">reply</a>
				</span>
			</div>
	</div>
	<?php 
		}
	?>

</body>
</html>