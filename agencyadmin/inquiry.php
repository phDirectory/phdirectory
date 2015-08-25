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
			</div>
	</div>
	<?php 
		}
	?>
</body>
</html>