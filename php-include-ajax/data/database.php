<?php 
$database = [
    [
    'name' => 'nome1',
    'last_name' => 'cognome1'
    ],
    [
    'name' => 'nome2',
    'last_name' => 'cognome2'
    ],
    ];

    header("Content-Type: application/json");

    echo json_encode($database);
?>