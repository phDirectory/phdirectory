<?php 

include_once("../database.php");

$json = file_get_contents('php://input');
$request = json_decode($json, true);

$date = (isset($request["event_date"]))? $request["event_date"]: "";

echo json_encode(getEventsForDate($date));
