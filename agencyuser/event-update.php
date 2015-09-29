<?php
	include_once('database.php');
	if(isset($_POST['event-update']))
	{
		event_edit($_POST);
		header("Location:index.php?page=event");
	}
	$n = find_event($_GET['id']);
?>

<html>
<head><title>PH directory - Edit Event</title></head>
<body>
	<h2>Edit Event</h2>
	<form method="post" class="form-horizontal">
		<div class="form-group">
			<label id="form-label">Title</label>
			<input type="text" name="title" id="title" placeholder="Title" class="form-control" value="<?php echo $n['title']?>" required>

			<label id="form-label">Information</label>
			<textarea rows="4" name="info" placeholder="Enter Information here..." class="form-control" required><?php echo $n['info']?></textarea>
			<label id="form-label">Status</label>
			<select name="status" class="form-control">
				<?php
					$array=array("On Going","Cancel");
					foreach ($array as $value) {
						if($n["eventStatus"]==$value)
							echo'<option value="'.$value.'" selected>'.$value.'</option>';
						else
							echo'<option value="'.$value.'">'.$value.'</option>';
					}
				?>
			</select>
			<label id="form-label">Event Date</label>
			<input type="date" name="event-date" class="form-control" value="<?php echo $n['event_date'];?>">

			<input type="button" class="btn btn-primary" value="Submit" data-toggle="modal" data-target="#event-update">
			<button class="btn btn-default"><a href="index.php?page=event" style="color:#000;">back</a></button>
		</div>

		<!-- Modal -->
		<div id="event-update" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Edit</h4>
		      </div>
		      <div class="modal-body">
		        <p>Are you sure you want to edit this event?</p>
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" class="btn btn-primary" name="event-update">Edit</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		
		  </div>
		</div>	
	</form>
</body>
</html>