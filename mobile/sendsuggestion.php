<?php 

include_once("../database.php");

$json = file_get_contents('php://input');
$request = json_decode($json, true);

$agencyid = (isset($request["agencyid"]))? $request["agencyid"]: "";
$message = (isset($request["message"]))? $request["message"]: "";

sendSuggestionForMobile($agencyid, $message);