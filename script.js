// ----------------- NAVIGATION & HEADER ----------------------
const API_AVIS_URL = 'avis_bdd.php';
const header = document.getElementById('siteHeader');
const navBar = document.getElementById('navBar');
const navToggle = document.querySelector('.nav-toggle');
const navLinks = document.querySelectorAll('.nav-link');

if (navToggle && navBar) {
    navToggle.addEventListener('click', () => {
        navToggle.classList.toggle('open');
        navBar.classList.toggle('open');
    });
}

// Fermer le menu mobile après clic sur un lien
navLinks.forEach(link => {
    link.addEventListener('click', () => {
        navToggle && navToggle.classList.remove('open');
        navBar && navBar.classList.remove('open');
    });
});

// Réduire le header au scroll
if (header) {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 40) {
            header.classList.add('shrink');
        } else {
            header.classList.remove('shrink');
        }
    });
}

// Mise en évidence de la section active dans la nav (sur index.php)
const sections = document.querySelectorAll('main section[id]');
const observerSpy = new IntersectionObserver(
    (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.id;
                navLinks.forEach(link => {
                    link.classList.toggle(
                        'active',
                        link.getAttribute('href') === `#${id}`
                    );
                });
            }
        });
    },
    { root: null, threshold: 0.4 }
);

sections.forEach(section => observerSpy.observe(section));

// ----------------- REVEAL AU SCROLL -------------------------

const revealEls = document.querySelectorAll('[data-reveal]');
const revealObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                revealObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.2 }
);

revealEls.forEach(el => revealObserver.observe(el));

// ----------------- MODALE "EN SAVOIR PLUS" ------------------

const factModal = document.getElementById('factModal');
const modalText = document.getElementById('modalText');
const modalCloseEls = document.querySelectorAll('[data-modal-close]');
const factButtons = document.querySelectorAll('.pill-btn');

function openModal(text) {
    if (!factModal) return;
    modalText.textContent = text;
    factModal.classList.add('open');
    factModal.setAttribute('aria-hidden', 'false');
}

function closeModal() {
    if (!factModal) return;
    factModal.classList.remove('open');
    factModal.setAttribute('aria-hidden', 'true');
}

factButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        const fact = btn.getAttribute('data-fact') || '';
        openModal(fact);
    });
});

modalCloseEls.forEach(el => el.addEventListener('click', closeModal));

if (factModal) {
    factModal.addEventListener('click', (event) => {
        if (event.target === factModal) {
            closeModal();
        }
    });
}

// ----------------- DIAGNOSTIC NIRD --------------------------

const diagnosticForm = document.getElementById('diagnosticForm');
const scoreValueEl = document.getElementById('scoreValue');
const scoreLabelEl = document.getElementById('scoreLabel');
const barInclusion = document.getElementById('barInclusion');
const barResponsabilite = document.getElementById('barResponsabilite');
const barDurabilite = document.getElementById('barDurabilite');

if (diagnosticForm) {
    diagnosticForm.addEventListener('submit', (event) => {
        event.preventDefault();

        const formData = new FormData(diagnosticForm);
        let total = 0;

        for (let [, value] of formData.entries()) {
            total += Number(value);
        }

        animateNumber(scoreValueEl, total);
        updateScoreLabel(total);
        updateBars(total);
    });
}

function animateNumber(el, target) {
    if (!el) return;
    const start = Number(el.textContent) || 0;
    const duration = 500;
    const startTime = performance.now();

    function step(now) {
        const progress = Math.min((now - startTime) / duration, 1);
        const value = Math.round(start + (target - start) * progress);
        el.textContent = value.toString();
        if (progress < 1) {
            requestAnimationFrame(step);
        }
    }

    requestAnimationFrame(step);
}

function updateScoreLabel(score) {
    if (!scoreLabelEl) return;

    let message;
    if (score <= 2) {
        message = "Votre village démarre la résistance. Quelques actions simples peuvent déjà changer beaucoup de choses.";
    } else if (score <= 5) {
        message = "Votre village est en chemin : des briques NIRD sont déjà en place, poursuivez l’effort collectif.";
    } else {
        message = "Votre village est bien armé : partagez vos pratiques et aidez d’autres établissements à rejoindre NIRD.";
    }
    scoreLabelEl.textContent = message;
}

function updateBars(score) {
    const maxScore = 8;
    const ratio = score / maxScore;

    if (barInclusion) barInclusion.style.width = Math.min(100, ratio * 120) + "%";
    if (barResponsabilite) barResponsabilite.style.width = Math.min(100, ratio * 100) + "%";
    if (barDurabilite) barDurabilite.style.width = Math.min(100, ratio * 140) + "%";
}

// ----------------- AGIR : TABS & DEFIS ----------------------

const roleTabs = document.querySelectorAll('.role-tab');
const rolePanels = document.querySelectorAll('.role-panel');
const badgeCountEl = document.getElementById('badgeCount');
const challengeItems = document.querySelectorAll('[data-check]');
let badgeCount = 0;

roleTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        const role = tab.getAttribute('data-role');

        roleTabs.forEach(t => t.classList.toggle('active', t === tab));
        rolePanels.forEach(panel => {
            panel.classList.toggle('active', panel.id === `role-${role}`);
        });
    });
});

challengeItems.forEach(item => {
    item.addEventListener('click', () => {
        const already = item.classList.toggle('completed');
        badgeCount += already ? 1 : -1;
        if (badgeCount < 0) badgeCount = 0;
        if (badgeCount > challengeItems.length) badgeCount = challengeItems.length;
        if (badgeCountEl) badgeCountEl.textContent = badgeCount.toString();
    });
});

// ----------------- COMMUNAUTE : FORMULAIRE ------------------

const shareForm = document.getElementById('shareForm');
const initiativeList = document.getElementById('initiativeList');

if (shareForm && initiativeList) {
    shareForm.addEventListener('submit', (event) => {
        event.preventDefault();

        const formData = new FormData(shareForm);
        const etab = formData.get('etab');
        const type = formData.get('type');
        const desc = formData.get('desc');

        const li = document.createElement('li');
        li.innerHTML = `<strong>${escapeHtml(etab)}</strong> – [${escapeHtml(type)}] ${escapeHtml(desc)}`;

        initiativeList.prepend(li);
        shareForm.reset();
    });
}

function escapeHtml(value) {
    if (typeof value !== 'string') return '';
    return value
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

// ----------------- EMULATEUR LINUX + SNAKE -----------------

const linuxTerminal = document.getElementById('linuxTerminal');

if (linuxTerminal) {
    const output = document.getElementById('terminalOutput');
    const input = document.getElementById('terminalInput');
    const prompt = document.getElementById('terminalPrompt');
    const inputRow = linuxTerminal.querySelector('.terminal-input-row');

    const snakeContainer = document.getElementById('snakeContainer');
    const snakeCanvas = document.getElementById('snakeCanvas');
    const snakeExitBtn = document.getElementById('snakeExitBtn');
    const snakeScoreEl = document.getElementById('snakeScore');

    const state = {
        cwd: "~",
        history: [],
        historyIndex: -1
    };

    const files = {
        "guide.txt": "NIRD propose de prolonger la vie des ordinateurs avec des systèmes libres.\nRéparer plutôt que jeter, partager plutôt qu’acheter.",
        "village.txt": "Le village NIRD réunit élèves, enseignants, directions, techniciens et collectivités autour d’un numérique sobre et autonome.",
        "commandes.txt": "Commandes disponibles : help, ls, pwd, cat <fichier>, clear, nird, echo <texte>",
        "snake.txt" : "Tapez snake dans votre invite de commandes pour lancer le jeu !"
    };

    // ---------- affichage texte terminal ----------
    function printLine(text = "", className = "") {
        const div = document.createElement('div');
        div.className = "line" + (className ? " " + className : "");
        div.textContent = text;
        output.appendChild(div);
        linuxTerminal.querySelector('.terminal-window').scrollTop = output.scrollHeight;
    }

    // ---------- logique Snake ----------
    const snakeState = {
        running: false,
        size: 14,
        cols: 0,
        rows: 0,
        cells: [],
        dir: "right",
        nextDir: "right",
        food: null,
        loopId: null,
        speed: 130,
        score: 0
    };

    let snakeCtx = null;

    function initSnake() {
        if (!snakeCanvas) return;
        snakeCtx = snakeCanvas.getContext('2d');

        snakeState.cols = Math.floor(snakeCanvas.width / snakeState.size);
        snakeState.rows = Math.floor(snakeCanvas.height / snakeState.size);

        snakeState.cells = [
            { x: 4, y: 4 },
            { x: 3, y: 4 },
            { x: 2, y: 4 }
        ];
        snakeState.dir = "right";
        snakeState.nextDir = "right";
        snakeState.score = 0;
        snakeState.speed = 130;

        placeFood();
        updateSnakeScore(0);

        if (snakeState.loopId) {
            clearInterval(snakeState.loopId);
        }
        snakeState.loopId = setInterval(stepSnake, snakeState.speed);
        drawSnake();
    }

    function updateSnakeScore(delta) {
        snakeState.score += delta;
        if (snakeScoreEl) snakeScoreEl.textContent = String(snakeState.score);
    }

    function placeFood() {
        let food;
        do {
            food = {
                x: Math.floor(Math.random() * snakeState.cols),
                y: Math.floor(Math.random() * snakeState.rows)
            };
        } while (snakeState.cells.some(c => c.x === food.x && c.y === food.y));
        snakeState.food = food;
    }

    function drawSnake() {
        if (!snakeCtx) return;

        const w = snakeCanvas.width;
        const h = snakeCanvas.height;
        const s = snakeState.size;

        snakeCtx.clearRect(0, 0, w, h);

        // fond
        snakeCtx.fillStyle = "#020617";
        snakeCtx.fillRect(0, 0, w, h);

        // grille légère
        snakeCtx.strokeStyle = "rgba(30, 64, 175, 0.20)";
        snakeCtx.lineWidth = 1;
        for (let x = 0; x <= w; x += s) {
            snakeCtx.beginPath();
            snakeCtx.moveTo(x + 0.5, 0);
            snakeCtx.lineTo(x + 0.5, h);
            snakeCtx.stroke();
        }
        for (let y = 0; y <= h; y += s) {
            snakeCtx.beginPath();
            snakeCtx.moveTo(0, y + 0.5);
            snakeCtx.lineTo(w, y + 0.5);
            snakeCtx.stroke();
        }

        // nourriture
        if (snakeState.food) {
            snakeCtx.fillStyle = "#f97316";
            snakeCtx.beginPath();
            snakeCtx.roundRect(
                snakeState.food.x * s + 2,
                snakeState.food.y * s + 2,
                s - 4,
                s - 4,
                3
            );
            snakeCtx.fill();
        }

        // serpent
        snakeState.cells.forEach((cell, index) => {
            const x = cell.x * s;
            const y = cell.y * s;

            if (index === 0) {
                const gradient = snakeCtx.createLinearGradient(x, y, x + s, y + s);
                gradient.addColorStop(0, "#38bdf8");
                gradient.addColorStop(1, "#22c55e");
                snakeCtx.fillStyle = gradient;
            } else {
                snakeCtx.fillStyle = "#0ea5e9";
            }

            snakeCtx.beginPath();
            snakeCtx.roundRect(x + 1.5, y + 1.5, s - 3, s - 3, 3);
            snakeCtx.fill();
        });
    }

    function stepSnake() {
        const dir = snakeState.nextDir;
        snakeState.dir = dir;

        const head = snakeState.cells[0];
        let newHead = { x: head.x, y: head.y };

        if (dir === "up") newHead.y -= 1;
        if (dir === "down") newHead.y += 1;
        if (dir === "left") newHead.x -= 1;
        if (dir === "right") newHead.x += 1;

        // murs
        if (
            newHead.x < 0 ||
            newHead.y < 0 ||
            newHead.x >= snakeState.cols ||
            newHead.y >= snakeState.rows
        ) {
            gameOverSnake("Collision avec le bord de l’écran.");
            return;
        }

        // auto-collision
        if (snakeState.cells.some(c => c.x === newHead.x && c.y === newHead.y)) {
            gameOverSnake("Le serpent s’est mordu lui-même.");
            return;
        }

        snakeState.cells.unshift(newHead);

        // nourriture ?
        if (snakeState.food && newHead.x === snakeState.food.x && newHead.y === snakeState.food.y) {
            updateSnakeScore(1);
            placeFood();
        } else {
            snakeState.cells.pop();
        }

        drawSnake();
    }

    function gameOverSnake(reason) {
        clearInterval(snakeState.loopId);
        snakeState.loopId = null;
        snakeState.running = false;

        output.style.display = "";
        printLine("");
        printLine("[Snake] Fin de partie : " + reason);
        printLine("[Snake] Score final : " + snakeState.score + " – tapez snake pour rejouer.");

        stopSnakeGame();
    }

    function startSnakeGame() {
        if (!snakeContainer || !snakeCanvas) return;
        if (snakeState.running) {
            printLine("[Snake] Le jeu est déjà en cours. Utilisez Échap ou le bouton « Quitter Snake ».");
            return;
        }

        snakeState.running = true;
        snakeContainer.classList.remove('hidden');
        snakeContainer.setAttribute('aria-hidden', 'false');
        output.style.display = "none";

        initSnake();
    }

    function stopSnakeGame() {
        if (!snakeContainer) return;
        snakeContainer.classList.add('hidden');
        snakeContainer.setAttribute('aria-hidden', 'true');
        output.style.display = "";
        snakeState.running = false;
        if (snakeState.loopId) {
            clearInterval(snakeState.loopId);
            snakeState.loopId = null;
        }
    }

    if (snakeExitBtn) {
        snakeExitBtn.addEventListener('click', () => {
            stopSnakeGame();
        });
    }

    // ---------- commandes du terminal ----------
    function handleCommand(raw) {
        const command = raw.trim();
        if (!command) return;

        printLine(`${prompt.textContent} ${command}`);

        const [cmd, ...args] = command.split(/\s+/);

        switch (cmd) {
            case "help":
                printLine("Commandes disponibles :");
                printLine("  help             - liste les commandes");
                printLine("  ls               - liste les fichiers du village NIRD");
                printLine("  pwd              - répertoire actuel");
                printLine("  cat <fichier>    - affiche le contenu d’un fichier");
                printLine("  clear            - efface l’écran");
                printLine("  nird             - résume la démarche NIRD");
                printLine("  echo <texte>     - répète le texte saisi");
                printLine("  snake            - lance le mini-jeu Snake NIRD");
                break;

            case "ls":
                printLine("Fichiers disponibles :");
                Object.keys(files).forEach(name => printLine("  " + name));
                break;

            case "pwd":
                printLine("/home/nird/" + state.cwd.replace("~", ""));
                break;

            case "cat":
                if (args.length === 0) {
                    printLine("cat : veuillez préciser un fichier (ex : cat guide.txt)");
                } else {
                    const name = args[0];
                    if (files[name]) {
                        files[name].split("\n").forEach(l => printLine(l));
                    } else {
                        printLine(`cat : fichier introuvable : ${name}`);
                    }
                }
                break;

            case "clear":
                output.innerHTML = "";
                break;

            case "nird":
                printLine("NIRD : Numérique Inclusif, Responsable et Durable.");
                printLine("Objectif : réduire la dépendance aux Big Tech, reconditionner le matériel,");
                printLine("promouvoir les logiciels libres et construire une autonomie numérique éducative.");
                break;

            case "echo":
                printLine(args.join(" "));
                break;

            case "snake":
                printLine("[Snake] Lancement du mini-jeu. Flèches pour se déplacer, Échap pour quitter.");
                startSnakeGame();
                break;

            default:
                printLine(`Commande inconnue : ${cmd}. Utilisez "help" pour la liste.`);
        }
    }

    // ---------- gestion clavier terminal ----------
    if (input) {
        input.focus();

        input.addEventListener('keydown', (event) => {
            // si Snake tourne, le mouvement est géré par le handler global ci-dessous
            if (snakeState.running) {
                // on ne traite ici que Enter pour éviter d'envoyer des commandes pendant le jeu
                if (event.key === 'Enter') {
                    event.preventDefault();
                    return;
                }
            }

            // Terminal classique
            if (event.key === 'Enter') {
                const value = input.value;
                handleCommand(value);

                if (value.trim()) {
                    state.history.unshift(value);
                    state.historyIndex = -1;
                }

                input.value = "";
            } else if (event.key === 'ArrowUp') {
                event.preventDefault();
                if (!snakeState.running) {
                    if (state.history.length > 0 && state.historyIndex < state.history.length - 1) {
                        state.historyIndex++;
                        input.value = state.history[state.historyIndex];
                    }
                }
            } else if (event.key === 'ArrowDown') {
                event.preventDefault();
                if (!snakeState.running) {
                    if (state.historyIndex > 0) {
                        state.historyIndex--;
                        input.value = state.history[state.historyIndex];
                    } else {
                        state.historyIndex = -1;
                        input.value = "";
                    }
                }
            }
        });
    }

    // ---------- écoute globale pour les touches de Snake ----------
    window.addEventListener('keydown', (event) => {
        if (!snakeState.running) return;

        if (["ArrowUp", "ArrowDown", "ArrowLeft", "ArrowRight", "Escape"].includes(event.key)) {
            event.preventDefault();

            if (event.key === "ArrowUp" && snakeState.dir !== "down") {
                snakeState.nextDir = "up";
            } else if (event.key === "ArrowDown" && snakeState.dir !== "up") {
                snakeState.nextDir = "down";
            } else if (event.key === "ArrowLeft" && snakeState.dir !== "right") {
                snakeState.nextDir = "left";
            } else if (event.key === "ArrowRight" && snakeState.dir !== "left") {
                snakeState.nextDir = "right";
            } else if (event.key === "Escape") {
                stopSnakeGame();
            }
        }
    });
}
// ----------------- CHATBOT FRONT NIRD ----------------------

const chatbotWidget = document.getElementById('chatbotWidget');
const chatbotPanel = document.getElementById('chatbotPanel');
const chatbotToggle = document.getElementById('chatbotToggle');
const chatbotClose = document.getElementById('chatbotClose');
const chatbotMessages = document.getElementById('chatbotMessages');
const chatbotForm = document.getElementById('chatbotForm');
const chatbotInput = document.getElementById('chatbotInput');

function appendChatMessage(text, sender = 'bot') {
    if (!chatbotMessages) return;
    const wrapper = document.createElement('div');
    wrapper.className = `chatbot-message ${sender}`;
    const bubble = document.createElement('div');
    bubble.className = 'bubble';
    bubble.textContent = text;
    wrapper.appendChild(bubble);
    chatbotMessages.appendChild(wrapper);
    chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
}

function setChatbotOpen(open) {
    if (!chatbotPanel) return;
    if (open) {
        chatbotPanel.classList.add('open');
        chatbotPanel.setAttribute('aria-hidden', 'false');
        setTimeout(() => {
            chatbotInput && chatbotInput.focus();
        }, 150);
    } else {
        chatbotPanel.classList.remove('open');
        chatbotPanel.setAttribute('aria-hidden', 'true');
    }
}

if (chatbotToggle) {
    chatbotToggle.addEventListener('click', () => {
        const isOpen = chatbotPanel && chatbotPanel.classList.contains('open');
        setChatbotOpen(!isOpen);
    });
}

if (chatbotClose) {
    chatbotClose.addEventListener('click', () => {
        setChatbotOpen(false);
    });
}

if (chatbotForm && chatbotInput) {
    chatbotForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        const text = chatbotInput.value.trim();
        if (!text) return;

        appendChatMessage(text, 'user');
        chatbotInput.value = "";

        // message de "saisie"
        const typingId = `typing-${Date.now()}`;
        const typingWrapper = document.createElement('div');
        typingWrapper.className = 'chatbot-message bot';
        typingWrapper.id = typingId;
        const typingBubble = document.createElement('div');
        typingBubble.className = 'bubble';
        typingBubble.textContent = "…";
        typingWrapper.appendChild(typingBubble);
        chatbotMessages.appendChild(typingWrapper);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;

        try {
            const response = await fetch(API_AVIS_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ message: text })
            });

            let reply = "Je n’ai pas pu obtenir de réponse pour le moment.";
            if (response.ok) {
                const data = await response.json();
                if (data && typeof data.reply === 'string') {
                    reply = data.reply;
                }
            } else {
                reply = "Le service de chat n’est pas disponible pour l’instant.";
            }

            const typingEl = document.getElementById(typingId);
            if (typingEl) typingEl.remove();
            appendChatMessage(reply, 'bot');
        } catch (e) {
            const typingEl = document.getElementById(typingId);
            if (typingEl) typingEl.remove();
            appendChatMessage("Erreur de connexion à l’API de chat.", 'bot');
        }
    });
}

// ----------------- PAGE AVIS : FORMULAIRE & LISTE ----------

const avisForm = document.getElementById('avisForm');
const avisList = document.getElementById('avisList');
const avisFeedback = document.getElementById('avisFeedback');

async function loadAvis() {
    if (!avisList) return;
    try {
        const res = await fetch(API_AVIS_URL);
        if (!res.ok) {
            avisList.innerHTML = "<li>Impossible de charger les avis pour le moment.</li>";
            return;
        }
        const data = await res.json();
        avisList.innerHTML = "";

        if (!Array.isArray(data) || data.length === 0) {
            avisList.innerHTML = "<li>Aucun avis pour le moment. Soyez le premier à témoigner !</li>";
            return;
        }

        data.forEach(avis => {
            const li = document.createElement('li');
            const nom = avis.nom || "Anonyme";
            const role = avis.role || "Rôle non précisé";
            const message = avis.message || "";
            const date = avis.created_at
                ? new Date(avis.created_at).toLocaleString('fr-FR')
                : "";

            li.innerHTML = `
                <strong>${escapeHtml(nom)}</strong>
                <span style="font-size:0.75rem; color:#9ca3af;"> – ${escapeHtml(role)}</span><br>
                <span>${escapeHtml(message)}</span>
                ${date ? `<br><span style="font-size:0.7rem; color:#6b7280;">${escapeHtml(date)}</span>` : ""}
            `;
            avisList.appendChild(li);
        });
    } catch (e) {
        avisList.innerHTML = "<li>Erreur de connexion au serveur d’avis.</li>";
    }
}

// Chargement initial des avis si on est sur la page avis
if (avisList) {
    loadAvis();
}

if (avisForm && avisFeedback) {
    avisForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        const formData = new FormData(avisForm);
        const payload = {
            nom: formData.get('nom'),
            role: formData.get('role'),
            message: formData.get('message')
        };

        avisFeedback.textContent = "Envoi de votre avis…";

        try {
            const res = await fetch(API_AVIS_URL, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });

            console.log(res);

            if (!res.ok) {
                avisFeedback.textContent = "Impossible d’enregistrer votre avis pour le moment.";
                return;
            }

            avisForm.reset();
            avisFeedback.textContent = "Merci ! Votre avis a été enregistré.";
            loadAvis();
        } catch (e) {
            avisFeedback.textContent = "Erreur de connexion au serveur d’avis.";
        }
    });
}

