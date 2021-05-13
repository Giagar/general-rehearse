<?php 
require_once __DIR__  . "/data/disc-collection-php.php";

$data = $discCollection;

if(array_key_exists("genre", $_GET)){
    $selectedGenre = $_GET["genre"];
    
    if($selectedGenre !== "all" && $selectedGenre) {
        $data = [];
        foreach($discCollection as $disc) {
            if($disc["genre"] === $selectedGenre) {
                $data[] = $disc;
            }
        }
    }
}

header('Content-Type: application/json');
echo json_encode($data);
?>