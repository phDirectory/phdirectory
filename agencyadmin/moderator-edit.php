	<?php
	include_once('database.php');
	$id = $_GET['id'];
	if(isset($_POST['create-mod']))
	{
		$uname = $_POST['username'];
		$pass = $_POST['password'];
		$fname = $_POST['fullname'];
		$contact = $_POST['contactNo'];
		editmod($id,$uname, $pass, $fname, $contact);
		header("Location:index.php?page=moderators");
	}

	$n = getmod($id);	
?>


<h2>Add Moderator Account</h2>

<form method="post" class="form-horizontal">
		<div class="form-group">
		
		<label id="form-label">Username</label>
		<input type="text" name="username" id="username" placeholder="Username" class="form-control" value = "<?php echo $n['username']?>" required>

		<label id="form-label">Password</label>
		<input type="text" name="password" id="password" placeholder="Password" class="form-control" value = "<?php echo $n['password']?>" required>
		
		<label id="form-label">Full name</label>
		<input type="text" name="fullname" id="fullname" placeholder="Full name" class="form-control" value = "<?php echo $n['fullname']?>" required>
		
		<label id="form-label">Contact Number</label>
		<input type="text" name="contactNo" id="contactNo" placeholder="Contact Number" class="form-control" value = "<?php echo $n['contactNo']?>" required>
		
		<input type="submit" class="btn btn-primary" name="create-mod" value="Edit">
		
		</div>
</form>