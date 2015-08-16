<?php
	include_once('database.php');
	if(isset($_POST['event-update']))
	{
		event_edit($_POST);
		header("Location:index.php?page=event");
	}
	$n = find_event();
?>

<html>
<head><title>PH directory - Add news</title></head>
<body>
	<h2>Edit News</h2>
	<form method="post" class="form-horizontal">
		<div class="form-group">
			<label id="form-label">Title</label>
			<input type="text" name="title" id="title" placeholder="Title" class="form-control" value="<?php echo $n['title']?>" required>

			<label id="form-label">Information</label>
			<textarea rows="4" name="info" placeholder="Enter Information here..." class="form-control" required><?php echo $n['info']?></textarea>

			<label id="form-label">Event Date</label>
			<input type="date" name="event-date" class="form-control" value="<?php echo $n['event_date']?>">

			<input type="submit" class="btn btn-primary" name="event-update" value="Submit">
		</div>	
	</form>
</body>
</html>