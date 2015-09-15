<?php 

include_once("../database.php");

$json = file_get_contents('php://input');
$request = json_decode($json, true);

$username = (isset($request["username"]))? $request["username"]: "";
$password = (isset($request["password"]))? $request["password"]: "";
$email = (isset($request["email"]))? $request["email"]: "";
$fullname = (isset($request["fullname"]))? $request["fullname"]: "";
$phoneNo = (isset($request["phoneNo"]))? $request["phoneNo"]: "";

echo json_encode(registerForMobile($username,$password,$email,$fullname,$phoneNo));
