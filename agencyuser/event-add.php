<?php
	include_once('database.php');
	if(isset($_POST['add_event']))
	{
		if(isset($_POST['event-date'])&&isset($_POST['title'])&&isset($_POST['info']))
		{
			event_add($_POST);
			header("Location:index.php?page=event");
		}
	}	
?>

<html>
<head><title>PH directory - Add news</title></head>
<body>
	<h2>Add Event</h2>
	<form method="post" class="form-horizontal">
		<div class="form-group">
			<label id="form-label">Title</label>
			<input type="text" name="title" id="title" placeholder="Title" class="form-control" required>
			<label id="form-label">Information</label>
			<input type="text" name="info" id="info" placeholder="Information" class="form-control" required>
			<label id="form-label">Event Date</label>
			<input type="date" name="event-date" id="event-date" class="form-control" required>
			<input type="submit" class="btn btn-primary" name="add_event" value="Add Event">
			<button class="btn btn-default"><a href="index.php?page=event" style="color:#000;">back</a></button>
		</div>	
	</form>
</body>
</html>