<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>NIRD – Avis & retours d’expérience</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="site-header" id="siteHeader">
    <div class="header-inner">
        <a href="index.php#hero" class="brand">
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
                <li><a href="linux.php" class="nav-link">Émulateur Linux</a></li>
                <li><a href="avis.php" class="nav-link active">Avis</a></li>
                <li><a href="mentions.php" class="nav-link">Mentions légales</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <section class="section section-light">
        <div class="section-header" data-reveal>
            <h2>Avis & retours d’expérience</h2>
            <p>
                Partagez votre retour sur la démarche NIRD, l’émulateur Linux, le mini-jeu
                Snake ou l’utilisation du site. Ces avis pourront servir à améliorer
                l’outil et à convaincre d’autres établissements de rejoindre le village NIRD.
            </p>
        </div>

        <div class="community-layout">
            <!-- Colonne formulaire -->
            <div class="community-column" data-reveal>
                <h3>Laisser un avis</h3>
                <form id="avisForm" class="share-form" method="post">
                    <label>
                        Nom ou pseudonyme
                        <input type="text" name="nom" placeholder="Ex. Élève du lycée X" required>
                    </label>
                    <label>
                        Rôle
                        <select name="role" required>
                            <option value="">Sélectionner…</option>
                            <option>Élève / éco-délégué</option>
                            <option>Enseignant·e</option>
                            <option>Direction / personnel administratif</option>
                            <option>Technicien·ne / référent numérique</option>
                            <option>Collectivité / partenaire</option>
                            <option>Autre</option>
                        </select>
                    </label>
                    <label>
                        Votre avis
                        <textarea name="message" rows="4" placeholder="Partagez votre expérience, vos idées, vos remarques…" required></textarea>
                    </label>
                    <button type="submit" class="btn primary full-width">
                        Envoyer mon avis
                    </button>
                </form>
                <p id="avisFeedback" class="terminal-hint" style="margin-top:0.6rem;"></p>
            </div>

            <!-- Colonne liste d'avis -->
            <div class="community-column" style="grid-column: span 2;" data-reveal>
                <h3>Avis publiés</h3>
                <p class="terminal-hint" style="margin-bottom:0.5rem;">
                    Les avis les plus récents apparaissent en haut de la liste.
                </p>
                <ul id="avisList" class="initiative-list">
                    <!-- Avis chargés depuis l’API -->
                </ul>
            </div>
        </div>
    </section>
</main>

<footer class="site-footer">
    <div class="footer-inner">
        <p>Avis & retours d’expérience autour de la démarche NIRD – prototype pédagogique.</p>
        <p>Les avis sont stockés dans une base de données locale gérée par le serveur Node.</p>
    </div>
</footer>

<script src="script.js"></script>
</body>
</html>
