<?php

include_once("../database.php");

header('Content-type: application/json');
//print_r(retrieve_agency());
echo json_encode(getServicesForMobile());

