<?php
	include_once('database.php');
	$id = $_GET['id'];
	deletenews($id);
	header("Location:index.php?page=news");
?>