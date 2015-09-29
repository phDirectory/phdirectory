<?php
	include_once('database.php');
	$news = getallnews();
?>
<html>
	<head><title>PH directory - News Management</title></head>
	<body>
		<button class="btn btn-primary"><a href="index.php?page=news-add">Add News</a></button>

		<table class="table">
			<thead>
				<tr>
					<td>News Type</td>
					<td>Title</td>
					<td>Information</td>
					<td>Website</td>
				<tr>
			</thead>
			
			<?php 
				foreach ($news as $a) 
				{
			?>
				<tr>
					<td><?php echo $a['newsType'];?></td>
					<td><?php echo $a['title'];?></td>
					<td><?php echo $a['info'];?></td>
					<td><?php echo $a['link'];?></td>
					<td><a href="index.php?page=news-edit&id=<?php echo $a['newsID'];?>">Edit</a></td>
				</tr>
			<?php 
				} 
			?>


		</table>
	</body>
</html>