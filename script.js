// ===== MENU SU TELEFONO =====
const bottone = document.querySelector(".menu-toggle");
const menu = document.querySelector("nav");

if (bottone && menu) {
    bottone.addEventListener("click", () => {
        const aperto = menu.classList.toggle("aperto");
        bottone.setAttribute("aria-expanded", aperto);
    });
}

// ===== CONTROLLO FORM CONTATTI =====
const form = document.querySelector("form[action='salva.php']");

if (form) {
    const boxErrori = document.getElementById("errori");

    form.addEventListener("submit", (evento) => {
        const errori = [];

        const nome = form.nome.value.trim();
        const email = form.email.value.trim();
        const messaggio = form.messaggio.value.trim();

        if (nome.length < 2) {
            errori.push("Il nome deve avere almeno 2 caratteri.");
        }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            errori.push("Inserisci un indirizzo email valido.");
        }
        if (messaggio.length < 10) {
            errori.push("Il messaggio deve avere almeno 10 caratteri.");
        }

        if (errori.length > 0) {
            evento.preventDefault();
            boxErrori.innerHTML = "";
            errori.forEach((testo) => {
                const p = document.createElement("p");
                p.textContent = testo;
                boxErrori.appendChild(p);
            });
            boxErrori.hidden = false;
            boxErrori.scrollIntoView({ behavior: "smooth", block: "center" });
        }
    });
}