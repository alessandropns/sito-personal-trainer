<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatti | Andrea Coaching</title>
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
        </nav>
    </header>

    <main>
        <section>
            <h2>Contattami</h2>
            <p>Scrivimi per un colloquio iniziale gratuito. Ti rispondo entro 24 ore.</p>
        </section>

        <section>
            <h2>Compila il modulo</h2>
               <?php if (isset($_GET["inviato"])): ?>
       <p class="conferma">Grazie! Il tuo messaggio è stato inviato.</p>
   <?php endif; ?>

            <form action="salva.php" method="post">
                <div id="errori" class="errore" hidden></div>
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="telefono">Telefono (facoltativo)</label>
                <input type="tel" id="telefono" name="telefono">

                <label for="obiettivo">Il tuo obiettivo</label>
                <select id="obiettivo" name="obiettivo" required>
                    <option value="">Scegli un percorso</option>
                    <option value="dimagrimento">Dimagrimento</option>
                    <option value="rinforzo">Rinforzo muscolare</option>
                    <option value="massa">Massa</option>
                    <option value="non-so">Non lo so ancora</option>
                </select>

                <label for="messaggio">Messaggio</label>
                <textarea id="messaggio" name="messaggio" rows="5" required></textarea>

                <button type="submit">Invia messaggio</button>

            </form>
        </section>

        <section>
            <h2>Dove trovarmi</h2>
            <p>Email: info@andreacoaching.example</p>
            <p>Telefono: 333 000 0000</p>
            <p>Orari: lun-ven 9:00-19:00</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 Andrea Coaching</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>