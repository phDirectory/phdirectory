<?php
include_once('../database.php');
	
$json = finds_event();
$arr = array();
foreach ($json as $value) {
	$arr[] = array(
		'id'=>$value['eventID'],
		'title'=>$value['title'],
		'start'=>$value['event_date']
		);
}

echo json_encode($arr);