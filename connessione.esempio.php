<?php
$host = "localhost";
$utente = "IL_TUO_UTENTE";
$password = "LA_TUA_PASSWORD";
$database = "NOME_DATABASE";

$conn = new mysqli($host, $utente, $password, $database);

if ($conn->connect_error) {
    die("Errore di connessione al database.");
}

$conn->set_charset("utf8mb4");