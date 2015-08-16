<?php
	include_once('database.php');
	if(isset($_POST['add_news']))
	{
		if(isset($_POST['newstype'])&&isset($_POST['title'])&&isset($_POST['info']))
		{
			addnews($_POST);
			header("Location:index.php?page=news");
		}
	}	
?>

<html>
<head><title>PH directory - Add news</title></head>
<body>
	<h2>Add News</h2>
	<form method="post" class="form-horizontal">
		<div class="form-group">
			<label id="form-label">Type</label>
			<select name="newstype" class="form-control" required>
				<option>News</option>
				<option>Job Posting</option>
				<option>Announcement</option>
			</select>
			<label id="form-label">Title</label>
			<input type="text" name="title" id="title" placeholder="Title" class="form-control" required>
			<label id="form-label">Information</label>
			<textarea rows="4" cols="50" name="info" placeholder="Enter Information here..." class="form-control" required></textarea>
			<label id="form-label">Website link</label>
			<input type="text" name="link" id="link" placeholder="website link" class="form-control">
			<input type="submit" class="btn btn-primary" name="add_news" value="Add News">
		</div>	
	</form>
</body>
</html>