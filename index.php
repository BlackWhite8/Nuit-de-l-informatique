<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>NIRD – Village des résistants numériques</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="site-header" id="siteHeader">
    <div class="header-inner">
        <a href="#hero" class="brand">
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
                <li><a href="#hero" class="nav-link active">Accueil</a></li>
                <li><a href="#communaute" class="nav-link">Village</a></li>
                <li><a href="linux.php" class="nav-link">Émulateur Linux</a></li>
                <li><a href="avis.php" class="nav-link">Avis</a></li>
                <li><a href="mentions.php" class="nav-link">Mentions légales</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>

    <!-- SECTION HERO ------------------------------------------------------- -->
    <section id="hero" class="hero">
        <div class="hero-bg-orbit"></div>
        <div class="hero-bg-grid"></div>

        <div class="hero-inner">
            <div class="hero-text" data-reveal>
                <h1>Résister à l’empire numérique, <span>un établissement à la fois</span></h1>
                <p>
                    Windows 10 s’arrête, les licences explosent, le matériel devient « obsolète »…
                    NIRD propose une autre voie : un numérique libre, responsable et durable,
                    conçu par et pour les établissements.
                </p>
                <div class="hero-actions">
                    <a href="#comprendre" class="btn primary">Découvrir la démarche</a>
                    <a href="#diagnostic" class="btn ghost">Tester mon établissement</a>
                </div>
            </div>

            <div class="hero-bubbles" aria-hidden="true">
                <a href="#comprendre" class="bubble bubble-hero" data-reveal>
                    <span class="bubble-label">Durabilité</span>
                </a>
                <a href="#diagnostic" class="bubble bubble-hero bubble-2" data-reveal>
                    <span class="bubble-label">Inclusion</span>
                </a>
                <a href="#agir" class="bubble bubble-hero bubble-3" data-reveal>
                    <span class="bubble-label">Responsabilité</span>
                </a>
            </div>
        </div>

        <div class="hero-scroll-indicator">
            <span class="mouse"></span>
            <span class="arrow"></span>
            <span class="label">Faire défiler</span>
        </div>
    </section>

    <!-- SECTION COMPRENDRE ------------------------------------------------- -->
    <section id="comprendre" class="section section-light">
        <div class="section-header" data-reveal>
            <h2>1. Comprendre l’empire numérique</h2>
            <p>
                Licences, obsolescence programmée, données hors UE, écosystèmes fermés…
                cette section éclaire les mécanismes qui rendent les établissements captifs
                des Big Tech.
            </p>
        </div>

        <div class="cards-grid">
            <article class="card" data-reveal>
                <div class="card-badge">Big Tech</div>
                <h3>Obsolescence programmée</h3>
                <p>
                    Fin de support de Windows 10, matériel encore fonctionnel mais déclaré
                    « trop vieux ». Et si un système libre prolongeait la vie de ces machines ?
                </p>
                <button class="pill-btn" data-fact="Chaque ordinateur prolongé de 3 ans, c’est des kilos de CO₂ évités et un budget préservé pour l’établissement.">
                    En savoir plus
                </button>
            </article>

            <article class="card" data-reveal>
                <div class="card-badge">Données</div>
                <h3>Dépendance aux clouds fermés</h3>
                <p>
                    Sauvegardes, messagerie, ENT… Où sont réellement stockées les données
                    des élèves et des enseignants, et sous quelles lois ?
                </p>
                <button class="pill-btn" data-fact="En migrant vers des solutions libres hébergées en Europe, un établissement garde la main sur la confidentialité de ses données.">
                    En savoir plus
                </button>
            </article>

            <article class="card" data-reveal>
                <div class="card-badge">Budget</div>
                <h3>Licences & abonnements</h3>
                <p>
                    Un flux continu de licences à renouveler, d’abonnements à payer.
                    NIRD propose de transformer ces dépenses en investissement dans le libre.
                </p>
                <button class="pill-btn" data-fact="Une partie des budgets licences peut financer du reconditionnement, des formations et des projets pédagogiques locaux.">
                    En savoir plus
                </button>
            </article>
        </div>
    </section>

    <!-- SECTION DIAGNOSTIC ------------------------------------------------- -->
    <section id="diagnostic" class="section section-dark">
        <div class="section-header" data-reveal>
            <h2>2. Diagnostiquer son établissement</h2>
            <p>
                En quelques questions, estimez le niveau d’Inclusion, de Responsabilité
                et de Durabilité de votre établissement, et voyez comment rejoindre
                le village des résistants numériques.
            </p>
        </div>

        <div class="diagnostic-wrapper">
            <form class="diagnostic-form" id="diagnosticForm" data-reveal>
                <div class="question">
                    <label>Les ordinateurs « trop vieux » sont :</label>
                    <div class="options">
                        <label><input type="radio" name="q1" value="0"> Jetés ou stockés dans un placard</label>
                        <label><input type="radio" name="q1" value="1"> Parfois réutilisés</label>
                        <label><input type="radio" name="q1" value="2"> Régulièrement reconditionnés (ex : Linux)</label>
                    </div>
                </div>

                <div class="question">
                    <label>Les logiciels utilisés en classe sont :</label>
                    <div class="options">
                        <label><input type="radio" name="q2" value="0"> Principalement propriétaires</label>
                        <label><input type="radio" name="q2" value="1"> Un mélange de propriétaires et de libres</label>
                        <label><input type="radio" name="q2" value="2"> Majoritairement libres et ouverts</label>
                    </div>
                </div>

                <div class="question">
                    <label>La communauté éducative est informée des enjeux :</label>
                    <div class="options">
                        <label><input type="radio" name="q3" value="0"> Rarement</label>
                        <label><input type="radio" name="q3" value="1"> Ponctuellement</label>
                        <label><input type="radio" name="q3" value="2"> Régulièrement (ateliers, clubs, formations)</label>
                    </div>
                </div>

                <div class="question">
                    <label>Les données (travaux d’élèves, mails, documents) sont :</label>
                    <div class="options">
                        <label><input type="radio" name="q4" value="0"> Dispersées sur des services privés</label>
                        <label><input type="radio" name="q4" value="1"> Partiellement hébergées en Europe</label>
                        <label><input type="radio" name="q4" value="2"> Principalement sur des services publics / libres</label>
                    </div>
                </div>

                <button type="submit" class="btn primary full-width">
                    Calculer mon score NIRD
                </button>
            </form>

            <div class="diagnostic-result" id="diagnosticResult" data-reveal>
                <h3>Votre bouclier NIRD</h3>
                <div class="score-ring">
                    <span id="scoreValue">0</span>
                    <span class="score-max">/ 8</span>
                </div>
                <p id="scoreLabel">Répondez aux questions pour découvrir votre niveau.</p>

                <div class="progress-bars">
                    <div class="progress-item">
                        <span>Inclusion</span>
                        <div class="progress">
                            <div class="progress-bar" id="barInclusion"></div>
                        </div>
                    </div>
                    <div class="progress-item">
                        <span>Responsabilité</span>
                        <div class="progress">
                            <div class="progress-bar" id="barResponsabilite"></div>
                        </div>
                    </div>
                    <div class="progress-item">
                        <span>Durabilité</span>
                        <div class="progress">
                            <div class="progress-bar" id="barDurabilite"></div>
                        </div>
                    </div>
                </div>

                <p class="hint">Astuce : chaque point gagné correspond à une action concrète pour renforcer le village NIRD.</p>
            </div>
        </div>
    </section>

    <!-- SECTION AGIR ------------------------------------------------------- -->
    <section id="agir" class="section section-light">
        <div class="section-header" data-reveal>
            <h2>3. Agir selon son rôle</h2>
            <p>
                Élève, enseignant, direction, technicien, collectivité… chacun peut
                rejoindre la résistance numérique à son niveau. Choisissez votre rôle
                et relevez les défis proposés.
            </p>
        </div>

        <div class="role-tabs" data-reveal>
            <button class="role-tab active" data-role="eleve">Élève / éco-délégué</button>
            <button class="role-tab" data-role="enseignant">Enseignant·e</button>
            <button class="role-tab" data-role="direction">Direction / technique</button>
            <button class="role-tab" data-role="collectivite">Collectivité / partenaire</button>
        </div>

        <div class="role-panels">
            <div class="role-panel active" id="role-eleve" data-reveal>
                <ul class="challenge-list">
                    <li data-check>
                        Proposer au club ou à la vie scolaire de reconditionner un ancien ordinateur avec un système libre.
                    </li>
                    <li data-check>
                        Organiser dans la classe une « heure sans écran » et recueillir les ressentis des élèves.
                    </li>
                    <li data-check>
                        Créer une affiche sur la sobriété numérique à afficher dans le hall.
                    </li>
                </ul>
            </div>

            <div class="role-panel" id="role-enseignant" data-reveal>
                <ul class="challenge-list">
                    <li data-check>
                        Préparer une séquence pédagogique s’appuyant sur un logiciel libre ou un service libre.
                    </li>
                    <li data-check>
                        Expérimenter une évaluation sans écran et partager le retour d’expérience à l’équipe.
                    </li>
                    <li data-check>
                        Coanimer un atelier avec les élèves sur la vie privée et les données.
                    </li>
                </ul>
            </div>

            <div class="role-panel" id="role-direction" data-reveal>
                <ul class="challenge-list">
                    <li data-check>
                        Lancer un inventaire du parc informatique pour identifier le matériel reconditionnable.
                    </li>
                    <li data-check>
                        Inscrire l’établissement dans une démarche de migration progressive vers des logiciels libres.
                    </li>
                    <li data-check>
                        Créer un temps d’échange trimestriel autour du numérique responsable avec l’équipe éducative.
                    </li>
                </ul>
            </div>

            <div class="role-panel" id="role-collectivite" data-reveal>
                <ul class="challenge-list">
                    <li data-check>
                        Soutenir financièrement un atelier de reconditionnement avec un fablab ou une association locale.
                    </li>
                    <li data-check>
                        Prévoir une clause « logiciel libre » dans les futurs marchés publics liés au numérique éducatif.
                    </li>
                    <li data-check>
                        Valoriser les établissements engagés NIRD dans la communication du territoire.
                    </li>
                </ul>
            </div>
        </div>

        <div class="badge-counter" data-reveal>
            <div class="badge-icon">🏅</div>
            <div class="badge-text">
                <p>Défis validés :</p>
                <p class="badge-number"><span id="badgeCount">0</span> / 12</p>
            </div>
        </div>
    </section>

    <!-- SECTION COMMUNAUTE ------------------------------------------------- -->
    <section id="communaute" class="section section-dark">
        <div class="section-header" data-reveal>
            <h2>4. Le village NIRD</h2>
            <p>
                NIRD est porté par un collectif d’enseignants, de techniciens, de directions,
                d’élèves et de collectivités. Rejoignez la communauté et partagez vos initiatives.
            </p>
        </div>

        <div class="community-layout">
            <div class="community-column" data-reveal>
                <h3>Ressources libres</h3>
                <ul class="resource-list">
                    <li>Guides de migration vers des systèmes libres</li>
                    <li>Fiches pratiques pour le reconditionnement</li>
                    <li>Scénarios pédagogiques sans écran</li>
                    <li>Affiches et supports de sensibilisation</li>
                </ul>
            </div>

            <div class="community-column" data-reveal>
                <h3>Partager une initiative</h3>
                <form class="share-form" id="shareForm">
                    <label>
                        Nom de l’établissement
                        <input type="text" name="etab" placeholder="Lycée, collège, école…" required>
                    </label>
                    <label>
                        Type d’initiative
                        <select name="type" required>
                            <option value="">Sélectionner…</option>
                            <option>Reconditionnement</option>
                            <option>Migrations vers le libre</option>
                            <option>Projet pédagogique</option>
                            <option>Sobriété énergétique</option>
                            <option>Autre</option>
                        </select>
                    </label>
                    <label>
                        Description courte
                        <textarea name="desc" rows="3" placeholder="Expliquez en quelques phrases l’action menée…" required></textarea>
                    </label>
                    <button type="submit" class="btn primary full-width">
                        Ajouter au village (démo)
                    </button>
                </form>
            </div>

            <div class="community-column" data-reveal>
                <h3>Hall des initiatives</h3>
                <ul class="initiative-list" id="initiativeList">
                    <li>
                        <strong>Lycée Carnot</strong> – Migration progressive de postes vers Linux et ateliers menés par les élèves.
                    </li>
                    <li>
                        <strong>Collège des Horizons</strong> – Semaine « zéro smartphone » et création d’un espace de travail déconnecté.
                    </li>
                </ul>
            </div>
        </div>
    </section>

</main>

<footer class="site-footer">
    <div class="footer-inner">
        <p>Site inspiré de la démarche NIRD – Numérique Inclusif, Responsable et Durable.</p>
        <p>Code et contenus sous licence libre – Ressources libres de droit recommandées.</p>
    </div>
</footer>

<!-- MODALE POUR LES CARTES "EN SAVOIR PLUS" ------------------------------- -->
<div class="modal" id="factModal" aria-hidden="true">
    <div class="modal-backdrop" data-modal-close></div>
    <div class="modal-content">
        <button class="modal-close" data-modal-close>&times;</button>
        <h3>Le saviez-vous ?</h3>
        <p id="modalText"></p>
    </div>
</div>
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
