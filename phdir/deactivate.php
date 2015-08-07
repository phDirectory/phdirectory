<?php
	include_once"../database.php";
	$id = $_GET['id'];
	status_deactivate($id);
	header("Location:index.php?page=agency");
?>