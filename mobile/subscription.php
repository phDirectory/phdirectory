<?php

include_once("../database.php");

$json = file_get_contents('php://input');
$request = json_decode($json, true);

$userid = (isset($request["userid"]))? $request["userid"]: "";

echo json_encode(getSubsription($userid));
