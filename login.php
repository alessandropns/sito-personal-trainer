<?php
session_start();
require "connessione.php";

$errore = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    $stmt = $conn->prepare("SELECT password_hash FROM pt_admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hash);

    if ($stmt->fetch() && password_verify($password, $hash)) {
        session_regenerate_id(true);
        $_SESSION["admin"] = true;
        header("Location: admin.php");
        exit;
    }
    $errore = "Credenziali non corrette.";
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accesso | Andrea Coaching</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Andrea Coaching</h1>
        <nav>
            <a href="index.html">Home</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>Accesso riservato</h2>
            <?php if ($errore !== ""): ?>
                <p class="conferma"><?php echo htmlspecialchars($errore); ?></p>
            <?php endif; ?>
            <form method="post" action="login.php">
                <label for="username">Utente</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Accedi</button>
            </form>
        </section>
    </main>
</body>
</html>