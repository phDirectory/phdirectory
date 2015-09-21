<?php 

include_once("../database.php");

$json = file_get_contents('php://input');
$request = json_decode($json, true);

$userid = (isset($request["userid"]))? $request["userid"]: "";
$agencyid = (isset($request["agencyid"]))? $request["agencyid"]: "";
$title = (isset($request["title"]))? $request["title"]: "";
$message = (isset($request["message"]))? $request["message"]: "";

sendInquiryForMobile($userid, $agencyid, $title, $message);