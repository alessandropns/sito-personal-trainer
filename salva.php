<?php
require "connessione.php";

// Accetta solo richieste inviate dal form (POST)
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contatti.php");
    exit;
}

// Leggo i dati e tolgo gli spazi inutili
$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$telefono = trim($_POST["telefono"] ?? "");
$obiettivo = trim($_POST["obiettivo"] ?? "");
$messaggio = trim($_POST["messaggio"] ?? "");

// Controlli lato server
$obiettivi_validi = ["dimagrimento", "rinforzo", "massa", "non-so"];

if ($nome === "" || $email === "" || $messaggio === "") {
    die("Compila tutti i campi obbligatori.");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Indirizzo email non valido.");
}
if (!in_array($obiettivo, $obiettivi_validi)) {
    die("Obiettivo non valido.");
}

// Prepared statement: i dati NON finiscono mai dentro la query
$stmt = $conn->prepare(
    "INSERT INTO pt_messaggi (nome, email, telefono, obiettivo, messaggio)
     VALUES (?, ?, ?, ?, ?)"
);
$stmt->bind_param("sssss", $nome, $email, $telefono, $obiettivo, $messaggio);

if ($stmt->execute()) {
    header("Location: contatti.php?inviato=1");
} else {
    echo "Errore nel salvataggio. Riprova più tardi.";
}

$stmt->close();
$conn->close();