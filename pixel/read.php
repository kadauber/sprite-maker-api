<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/pixel.php';

$database = new Database();
$db = $database->getDatabaseConnection();

$pixel = new Pixel($db);

$stmt = $pixel->read();
$num = $stmt->rowCount();

if ($num > 0) {
    $pixels_arr = array();
    $pixels_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $pixel_item = array(
	    "id" => $row['ID'],
        "spriteId" => $row['SpriteID'],
        "position" => $row['Position'],
        "color" => $row['Color']
	);

	array_push($pixels_arr["records"], $pixel_item);
    }

    echo json_encode($pixels_arr);
} else {
    echo json_encode(
	array("message" => "No productions found.")
    );
}
?>
