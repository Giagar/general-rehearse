<?php 

require("database.php");

header("Content-type: appliocation/json");
$json = json_encode($data);

echo $json;
?>