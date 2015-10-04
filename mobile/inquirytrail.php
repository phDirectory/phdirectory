<?php 

include_once("../database.php");

$json = file_get_contents('php://input');
$request = json_decode($json, true);

$inquiryid = (isset($request["inquiryid"]))? $request["inquiryid"]: "";

echo json_encode(getInquiryTrail($inquiryid));
