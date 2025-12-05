<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>NIRD – Émulateur Linux & Snake</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="site-header" id="siteHeader">
    <div class="header-inner">
        <a href="index.html#hero" class="brand">
            <span class="brand-icon">🛡️</span>
            <span class="brand-text">
                <span class="brand-title">NIRD</span>
                <span class="brand-subtitle">Village des résistants numériques</span>
            </span>
        </a>

        <button class="nav-toggle" aria-label="Ouvrir le menu de navigation">
            <span class="nav-toggle-line"></span>
            <span class="nav-toggle-line"></span>
        </button>

        <nav class="nav-bar" id="navBar">
            <ul>
                <li><a href="index.php#hero" class="nav-link">Accueil</a></li>
                <li><a href="index.php#communaute" class="nav-link">Communauté</a></li>
                <li><a href="linux.php" class="nav-link active">Émulateur Linux</a></li>
                <li><a href="avis.php" class="nav-link">Avis</a></li>
                <li><a href="mentions.php" class="nav-link">Mentions légales</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>

    <section class="section section-light">
        <div class="section-header" data-reveal>
            <h2>Émulateur Linux pédagogique</h2>
            <p>
                Cet espace simule un petit terminal Linux pour montrer qu’un ordinateur « ancien »
                peut retrouver une seconde vie avec un système libre. Tapez quelques commandes pour
                explorer le « village NIRD »
            </p>
        </div>

        <!-- Bloc terminal + Snake -->
        <div class="terminal-wrapper" id="linuxTerminal" data-reveal>
            <div class="terminal-header">
                <div class="terminal-dots">
                    <span class="dot dot-red"></span>
                    <span class="dot dot-yellow"></span>
                    <span class="dot dot-green"></span>
                </div>
                <span class="terminal-title">nird@etablissement&nbsp;:~</span>
                <a href="index.html#hero" class="terminal-back-btn">← Retour à la page d’accueil</a>
            </div>

            <div class="terminal-window">
                <!-- Sortie texte du terminal -->
                <div class="terminal-output" id="terminalOutput" aria-live="polite">
                    <div class="line">Bienvenue dans le mini-terminal NIRD.</div>
                    <div class="line">
                        Essayez <span class="hl">help</span>, <span class="hl">ls</span>,
                        <span class="hl">cat guide.txt</span>, <span class="hl">nird</span>
                    </div>
                </div>

                <!-- Jeu de Snake -->
                <div id="snakeContainer" class="snake-container hidden" aria-hidden="true">
                    <div class="snake-header">
                        <span>🐍 Snake NIRD – Flèches pour se déplacer, Échap pour quitter</span>
                        <span class="snake-score-label">
                            Score : <span id="snakeScore">0</span>
                        </span>
                    </div>
                    <canvas id="snakeCanvas" width="400" height="260"></canvas>
                    <button id="snakeExitBtn" class="btn ghost snake-exit-btn">
                        Quitter Snake
                    </button>
                </div>

                <!-- Ligne de saisie -->
                <div class="terminal-input-row">
                    <span class="terminal-prompt" id="terminalPrompt">nird@etablissement:~$</span>
                    <input
                        type="text"
                        class="terminal-input"
                        id="terminalInput"
                        autocomplete="off"
                        spellcheck="false"
                        aria-label="Entrée de commande du terminal">
                </div>
            </div>
        </div>

        <p class="terminal-hint" data-reveal>
            Astuce&nbsp;: cet émulateur est entièrement simulé dans le navigateur. Aucune
            commande réelle n’est exécutée sur le système. Il s’agit d’un outil ludique
            pour découvrir la logique du terminal et illustrer l’esprit NIRD.
        </p>

        <div class="hero-actions" style="margin-top:1.4rem;" data-reveal>
            <a href="index.html#diagnostic" class="btn ghost">Revenir au diagnostic NIRD</a>
            <a href="index.html#communaute" class="btn primary">Découvrir la communauté</a>
        </div>
    </section>

</main>

<footer class="site-footer">
    <div class="footer-inner">
        <p>Interface d’émulation Linux & mini-jeu Snake pour la démarche NIRD – usage pédagogique.</p>
        <p>Code et contenus destinés à être publiés sous licence libre (à adapter à la licence retenue).</p>
    </div>
</footer>
<!-- WIDGET CHATBOT NIRD -->
<div class="chatbot-widget" id="chatbotWidget">
    <button class="chatbot-toggle" id="chatbotToggle" aria-label="Ouvrir le chat NIRD">
        💬
    </button>

    <div class="chatbot-panel" id="chatbotPanel" aria-hidden="true">
        <div class="chatbot-header">
            <div class="chatbot-title">
                <span class="chatbot-logo">🛡️
</span>
                <div>
                    <div class="chatbot-title-main">Village NIRD</div>
                    <div class="chatbot-title-sub">Assistant numérique responsable</div>
                </div>
            </div>
            <button class="chatbot-close" id="chatbotClose" aria-label="Fermer le chat">✕</button>
        </div>

        <div class="chatbot-messages" id="chatbotMessages">
            <div class="chatbot-message bot">
                <div class="bubble">
                    Bonjour ! Je peux vous aider à comprendre la démarche NIRD, le numérique responsable,
                    ou vous orienter sur le site. Posez votre question.
                </div>
            </div>
        </div>

        <form class="chatbot-input-row" id="chatbotForm">
            <input
                type="text"
                id="chatbotInput"
                class="chatbot-input"
                placeholder="Écrivez votre message…"
                autocomplete="off"
            >
            <button type="submit" class="chatbot-send">↩</button>
        </form>
    </div>
</div>
<!-- FIN WIDGET CHATBOT -->
<script src="script.js"></script>
</body>
</html>