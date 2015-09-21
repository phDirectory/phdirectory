<?php 

include_once("../database.php");

$json = file_get_contents('php://input');
$request = json_decode($json, true);

$userid = (isset($request["userid"]))? $request["userid"]: "";
$username = (isset($request["username"]))? $request["username"]: "";
$oldpassword = (isset($request["old_password"]))? $request["old_password"]: "";
$newpassword = (isset($request["new_password"]))? $request["new_password"]: "";
$email = (isset($request["email"]))? $request["email"]: "";
$fullname = (isset($request["fullname"]))? $request["fullname"]: "";
$phoneNo = (isset($request["phoneNo"]))? $request["phoneNo"]: "";


echo json_encode(updateUserProfile($userid,$username,$oldpassword,$newpassword,$email,$fullname,$phoneNo));
