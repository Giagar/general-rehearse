<?php 
require_once "../server.php";

header('Content-Type: application/json');
echo json_encode($productList);
