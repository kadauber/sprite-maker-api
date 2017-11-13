<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/sprite.php';

$database = new Database();
$db = $database->getDatabaseConnection();

$sprite = new Sprite($db);

$stmt = $sprite->read();
$num = $stmt->rowCount();

if ($num > 0) {
    $sprites_arr = array();
    $sprites_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $sprite_item = array(
            "id" => $row['ID'],
            "name" => $row['Name'],
        );

        array_push($sprites_arr["records"], $sprite_item);
    }

    echo json_encode($sprites_arr);
} else {
    echo json_encode(
        array("message" => "No sprites found.")
    );
}
