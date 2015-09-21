<?

include_once("../database.php");

$json = file_get_contents('php://input');
$request = json_decode($json, true);

$username = (isset($request["username"]))? $request["username"]: "";
$password = (isset($request["password"]))? $request["password"]: "";

echo json_encode(loginForMobile($username,$password));