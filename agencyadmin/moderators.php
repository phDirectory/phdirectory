<?php
	include_once('database.php');
	$mods = getModAccounts();
?>
	<button class="btn btn-primary"><a href="index.php?page=moderators-add">Add Moderator Account</a></button>
	<table class="table">
			<thead>
				<tr>
					<td>Fullname</td>
					<td>Username</td>
					<td>Contact Number</td>
					<td>Status</td>
					
				<tr>
			</thead>
			
			<?php 
				foreach ($mods as $a) 
				{
			?>
				<tr>
					<td><?php echo $a['fullname'];?></td>
					<td><?php echo $a['username'];?></td>
					<td><?php echo $a['contactNo'];?></td>
					<td><?php echo $a['status'];?></td>
					<td><a href="index.php?page=moderator-edit&id=<?php echo $a['agencyUserID'] ?>">Edit</a></td>
					<td><a href="moderators-delete.php?id=<?php echo $a['agencyUserID'] ?>" onclick="return confirm('Are you sure you want to delete this moderator?');">Delete</a></td>
				</tr>
			<?php 
				} 
			?>

		</table>