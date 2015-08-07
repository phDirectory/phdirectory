<?php
	include_once"../database.php";
	$id = $_GET['id'];
	status_activate($id);
	header("Location:index.php?page=sub");
?>