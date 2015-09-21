<?php 

include_once("../database.php");

$json = file_get_contents('php://input');
$request = json_decode($json, true);

$subplanid = (isset($request["subplanid"]))? $request["subplanid"]: "";
$userid = (isset($request["userid"]))? $request["userid"]: "";

addSubscriptionForMobile($subplanid,$userid);
