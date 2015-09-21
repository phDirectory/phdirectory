<?php
	include_once('database.php');
	if(isset($_POST['create-mod']))
	{
		addMod($_POST);
		header("Location:index.php?page=moderators");
	}	
?>


<h2>Add Moderator Account</h2>

<form method="post" class="form-horizontal">
		<div class="form-group">
		
		<label id="form-label">Username</label>
		<input type="text" name="username" id="username" placeholder="Username" class="form-control" required>

		<label id="form-label">Password</label>
		<input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
		
		<label id="form-label">Full name</label>
		<input type="text" name="fullname" id="fullname" placeholder="Full name" class="form-control" required>
		
		<label id="form-label">Contact Number</label>
		<input type="text" name="contactNo" id="contactNo" placeholder="Contact Number" class="form-control" required>
		
		<input type="submit" class="btn btn-primary" name="create-mod" value="Create">
		
		</div>
</form>