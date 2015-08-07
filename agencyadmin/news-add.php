<?php

?>

<html>
<head><title>PH directory - Add news</title></head>
<body>
	<h2>Add News</h2>
	<form method="post" class="form-horizontal">
		<div class="form-group">
			<label id="form-label">News Type</label>
			<input type="text" name="newstype" id="newstype" placeholder="Type of News" class="form-control">
			<label id="form-label">Title</label>
			<input type="text" name="title" id="title" placeholder="Title" class="form-control">
			<label id="form-label">Information</label>
			<textarea rows="4" cols="50" name="info" placeholder="Enter Information here..." class="form-control"></textarea>
			<label id="form-label">Website link</label>
			<input type="text" name="link" id="link" placeholder="website link" class="form-control">
			<input type="submit" class="btn btn-primary" name="add_news" value="Add News">
		</div>	
	</form>
</body>
</html>