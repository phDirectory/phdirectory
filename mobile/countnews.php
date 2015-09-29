<?php
include_once("../database.php");

$json = file_get_contents('php://input');
$request = json_decode($json, true);

$agency_id = (isset($request["agency_id"]))? $request["agency_id"]: "";


echo json_encode(countNewsForMobile($agency_id));