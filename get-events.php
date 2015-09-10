<?php
include_once('database.php');
	
$json = get_events();
$arr = array();
foreach ($json as $value) {
	$arr[] = array(
		'title'=>$value['title'],
		'start'=>$value['event_date']
		);
}

echo json_encode($arr);