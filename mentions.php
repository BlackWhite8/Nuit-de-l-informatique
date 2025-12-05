<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>NIRD – Mentions légales & licence</title>
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
                <span class="brand-subtitle">Numérique Inclusif, Responsable et Durable</span>
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
                <li><a href="linux.php" class="nav-link">Émulateur Linux</a></li>
                <li><a href="avis.php" class="nav-link">Avis</a></li>
                <li><a href="mentions.php" class="nav-link active">Mentions légales</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <section class="section section-light">
        <div class="section-header" data-reveal>
            <h2>Mentions légales</h2>
            <p>
                Cette page fournit les informations légales et la licence de diffusion
                pour ce mini-site dédié à la démarche NIRD.
            </p>
        </div>

        <article class="legal-block" data-reveal>
            <h3>1. Éditeur du site</h3>
            <p>
                <strong>Éditeur :</strong> Les Enfants de la Nuit<br>
                <strong>Adresse :</strong> Lille<br>
                <strong>Contact :</strong> baptiste.martinolli@gmail.com
            </p>
        </article>

        <article class="legal-block" data-reveal>
            <h3>2. Hébergement</h3>
            <p>
                Le site est hébergé par : alwaysdata<br>
                GONZALEZ GOMEZ Hugo<br>
                gonzalez-gomez.alwaysdata.net
            </p>
        </article>

        <article class="legal-block" data-reveal>
            <h3>3. Propriété intellectuelle</h3>
            <p>
                Sauf mention contraire, les contenus textuels, visuels et le code source
                de ce site sont mis à disposition sous licence libre. Les logos et marques
                éventuellement cités demeurent la propriété de leurs titulaires respectifs.
            </p>
        </article>

        <article class="legal-block" data-reveal>
            <h3>4. Licence libre proposée</h3>
            <p>
                Vous pouvez par exemple choisir l’une des licences suivantes (à adapter) :
            </p>
            <ul class="legal-list">
                <li>Code source : <strong>MIT</strong> ou <strong>GPLv3</strong>.</li>
                <li>Contenus textuels : <strong>Creative Commons BY-SA 4.0</strong>.</li>
            </ul>
            <p>
                Remplacez cette section par la licence effectivement retenue, en fournissant
                un lien vers le texte complet de la licence.
            </p>
        </article>

        <article class="legal-block" data-reveal>
            <h3>5. Données personnelles</h3>
            <p>
                Ce mini-site n’enregistre pas de données personnelles nominatives en base
                de données. Les exemples de formulaires et de contributions sont de simples
                démonstrations pédagogiques utilisées dans le cadre de la Nuit de l’Info.
            </p>
        </article>

        <article class="legal-block" data-reveal>
            <h3>6. Responsabilité</h3>
            <p>
                L’application présentée ici est un prototype pédagogique visant à illustrer
                la démarche NIRD. Les informations fournies sont indicatives et ne
                sauraient se substituer aux décisions officielles des autorités
                académiques ou ministérielles.
            </p>
        </article>

        <div class="hero-actions" style="margin-top:1.6rem;" data-reveal>
            <a href="index.html#hero" class="btn primary">Retour à la page d’accueil</a>
            <a href="linux.html" class="btn ghost">Accéder à l’émulateur Linux</a>
        </div>
    </section>
</main>

<footer class="site-footer">
    <div class="footer-inner">
        <p>Mentions légales du mini-site NIRD – prototype pédagogique.</p>
        <p>Merci d’adapter ces informations à votre contexte réel avant mise en production.</p>
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