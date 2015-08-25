<?php
	include_once('database.php');
	$id = $_GET['id'];
	service_delete($id);
	header("Location:index.php?page=services");
?>