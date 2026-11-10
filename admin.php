<?php
session_start();
if (empty($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}
require "connessione.php";

$risultato = $conn->query(
    "SELECT id, nome, email, telefono, obiettivo, messaggio, data_invio
     FROM pt_messaggi
     ORDER BY data_invio DESC"
);
$totale = $risultato->num_rows;
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area riservata | Andrea Coaching</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Andrea Coaching</h1>
           <button class="menu-toggle" aria-label="Apri il menu" aria-expanded="false">&#9776;</button>
        <nav>
            <a href="index.html">Home</a>
            <a href="chi-sono.html">Chi sono</a>
            <a href="servizi.html">Servizi</a>
            <a href="contatti.php">Contatti</a>
            <a href="logout.php">Esci</a>
        </nav>
    </header>

    <main>
        <section>
            <h2>Messaggi ricevuti (<?php echo $totale; ?>)</h2>

            <?php if ($totale === 0): ?>
                <p>Nessun messaggio ricevuto per ora.</p>
            <?php else: ?>
                <div class="tabella-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Obiettivo</th>
                                <th>Messaggio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($riga = $risultato->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo date("d/m/Y H:i", strtotime($riga["data_invio"])); ?></td>
                                    <td><?php echo htmlspecialchars($riga["nome"]); ?></td>
                                    <td><?php echo htmlspecialchars($riga["email"]); ?></td>
                                    <td><?php echo htmlspecialchars($riga["telefono"] ?? ""); ?></td>
                                    <td><?php echo htmlspecialchars($riga["obiettivo"]); ?></td>
                                    <td><?php echo nl2br(htmlspecialchars($riga["messaggio"])); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 Andrea Coaching</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
<?php $conn->close(); ?>