<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/sprite.php';

$database = new Database();
$db = $database->getDatabaseConnection();

$sprite = new Sprite($db);

$data = json_decode(file_get_contents("php://input"));

$sprite->name = $data->name;

if ($sprite->create()) {
    echo '{';
	echo '"message": "Sprite was created."';
    echo '}';
} else {
    echo '{';
	echo '"message": "Unable to create sprite."';
    echo '}';
}
?>
