<?php 
require_once __DIR__ . "/database.php";

// $data = $discCollection;

foreach($discCollection as $album) {
    if($album["genre"] === $_GET["genre"]) {
        $data[] = $album;
    }
}


header('Content-Type: application/json');
echo json_encode($data);
?>