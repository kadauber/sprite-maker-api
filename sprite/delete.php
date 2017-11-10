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

$sprite->id = $data->id;
echo $data->id;
if ($sprite->delete()) {
    echo '{';
	echo '"message": "sprite was deleted."';
    echo '}';
} else {
    echo '{';
	echo '"message": "Unable to delete sprite."';
    echo '}';
}
?>
