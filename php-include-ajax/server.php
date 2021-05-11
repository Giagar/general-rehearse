<?php 

require_once __DIR__ . "/data/disc-collection-php.php";

// create backup copy of db
$data = $discCollection;

$selectedGenre = $_GET["genre"];
$result = [];

if($selectedGenre && !$selectedGenre!== "all" ) {
    foreach($data as $album) {
        if($album["genre"] === $selectedGenre) {
            $result[] = $album;
        }
    }
}



header('Content-Type: application/json');
echo json_encode($result ? $result : $data);
// echo json_encode($data);


?>