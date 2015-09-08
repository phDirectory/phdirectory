	<?php
	include_once('database.php');
	$id = $_GET['id'];
	if(isset($_POST['edit-mod']))
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
		
		<input type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" value="Edit">
		
		</div>

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Delete</h4>
		      </div>
		      <div class="modal-body">
		        <p>Are you sure you want to edit this moderator account?</p>
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" class="btn btn-primary" name="edit-mod">Edit</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		      </div>
		    </div>
		
		  </div>
		</div>
</form>

