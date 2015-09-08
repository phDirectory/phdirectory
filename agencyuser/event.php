<?php
	include_once('database.php');
	$event = get_event();
?>
<html>
	<head><title>PH directory - News Management</title></head>
	<body>
		<button class="btn btn-primary"><a href="index.php?page=event-add">Add Event</a></button>

		<table class="table">
			<thead>
				<tr>
					<td>Event No.</td>
					<td>Title</td>
					<td>Information</td>
					<td>Event Date</td>
					<td>Event status</td>
					<td>Date Posted</td>
					<td>Date Edited</td>
				<tr>
			</thead>
			
			<?php 
				foreach ($event as $e) 
				{
					if($e['status']=='A')
					{
			?>
						<tr>
							<td><?php echo $e['eventID'];?></td>
							<td><?php echo $e['title'];?></td>
							<td><?php echo $e['info'];?></td>
							<td><?php echo $e['event_date'];?></td>
							<td><?php echo $e['eventStatus'];?></td>
							<td><?php echo $e['datePosted'];?></td>
							<td><?php echo $e['dateEdited'];?></td>
							<td><a href="index.php?page=event-update&id=<?php echo $e['eventID'];?>">Edit</a></td>
						</tr>
			<?php 
					}
				}
			
			?>
		</table>

		<!-- Modal -->
		<div id="event" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Delete</h4>
		      </div>
		      <div class="modal-body">
		        <p>Are you sure you want to delete this event?</p>
		      </div>
		      <div class="modal-footer">
		      	<button class="btn btn-primary"><a href="event-delete.php?id=<?php echo $e['eventID'] ?>">Delete</a></button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		
		  </div>
		</div>
	</body>
</html>