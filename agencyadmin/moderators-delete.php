<?php
	include_once('database.php');
	$id = $_GET['id'];
	deleteMod($id);
	header("Location:index.php?page=moderators");
?>