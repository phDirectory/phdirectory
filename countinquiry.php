<?php
include_once("../database.php");

$json = file_get_contents('php://input');
$request = json_decode($json, true);

$user_id = (isset($request["user_id"]))? $request["user_id"]: "";


echo json_encode(countInquiryForMobile($user_id));