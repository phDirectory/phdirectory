<?php 

include_once("../database.php");

$json = file_get_contents('php://input');
$request = json_decode($json, true);

$inquiryID = (isset($request["inquiryid"]))? $request["inquiryid"]: "";
$message = (isset($request["message"]))? $request["message"]: "";


sendInquiryTrail($inquiryID, $message);