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
<head><title>PH directory - Add Event</title></head>
<body>
	<h2>Add Event</h2>
	<form method="post" class="form-horizontal">
		<div class="form-group">
			<label id="form-label">Title</label>
			<input type="text" name="title" id="title" placeholder="Title" class="form-control" required>
			<label id="form-label">Information</label>
			<textarea rows="4" name="info" id="info" placeholder="Enter Information here..." class="form-control" required></textarea>
			<label id="form-label">Event Date</label>
			<input type="date" name="event-date" id="event-date" class="form-control" required>
			<input type="submit" class="btn btn-primary" name="add_event" value="Add Event">
		</div>	
	</form>
</body>
</html>