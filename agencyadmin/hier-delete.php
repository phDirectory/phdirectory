<?php
	include_once('database.php');
	$id = $_GET['id'];
	remove_hierarchy($id);
	header("Location:index.php?page=cascade");
	echo "removed";
?>