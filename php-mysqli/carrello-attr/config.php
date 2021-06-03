<?php 
$dbConnection = new mysqli("localhost", "root", "root", "carrello_experiments_db");
// se ci sono errori, esci
if($dbConnection->connect_error) {
    die("Connessione al database fallita.".$dbConnection->connect_error);
}
