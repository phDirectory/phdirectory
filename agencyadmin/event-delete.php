<?php
	include_once('database.php');
	$id = $_GET['id'];
	event_delete($id);
	header("Location:index.php?page=event");
?>