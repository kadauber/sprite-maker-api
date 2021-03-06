<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/pixel.php';

$database = new Database();
$db = $database->getDatabaseConnection();

$pixel = new Pixel($db);

$data = json_decode(file_get_contents("php://input"));

$pixel->id = $data->id;
echo $data->id;
if ($pixel->delete()) {
    echo '{';
    echo '"message": "Pixel was deleted."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Unable to delete pixel."';
    echo '}';
}
