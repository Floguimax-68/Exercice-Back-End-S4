<?php
/* Gabarit global : structure HTML enveloppante */
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($titre) ? $titre : 'Épiphanoff & Co.' ?></title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/headercss.css">
    <?php
    // Load auth.css when the current page is the authentication view.
    $loadAuthCss = false;
    if (isset($titre) && stripos($titre, 'Authentification') !== false) {
        $loadAuthCss = true;
    }
    // Also load when action query param explicitly requests auth/account pages
    if (isset($_GET['action']) && in_array($_GET['action'], ['connexion','inscription','mdp_oublie'])) {
        $loadAuthCss = true;
    }
    if ($loadAuthCss) : ?>
    <link rel="stylesheet" href="style/auth.css">
    <?php endif; ?>

    <?php
    $loadCompteCss = false;
    if ((isset($titre) && stripos($titre, 'Compte') !== false) || (isset($_GET['action']) && $_GET['action'] === 'compte')) {
        $loadCompteCss = true;
    }
    if ($loadCompteCss) : ?>
    <link rel="stylesheet" href="style/compte.css">
    <?php endif; ?>
</head>
<?php
$classesBody = [];
if (isset($titre) && stripos($titre, 'Authentification') !== false) {
    $classesBody[] = 'page-auth';
}
if (isset($titre) && stripos($titre, 'Compte') !== false) {
    $classesBody[] = 'page-compte';
}
?>
<body class="<?= implode(' ', $classesBody) ?>">
    <header class="header-boutique">
        <h1 class="header-boutique-titre"><a href="index.php?action=accueil" style="text-decoration:none;color:inherit;">Boutique Épiphanoff&Co</a></h1>

        <div class="header-boutique-conteneur">
            <div class="header-boutique-haut">
                <div class="header-boutique-logo">
                    <a href="index.php?action=accueil"><img src="src/svg/LogoEPIPHANOFFnCOFondBlanc.svg" alt="Logo Épiphanoff & Co."></a>
                </div>

                <div class="header-boutique-actions">
                    <div class="header-btn">
                        <div class="header-btn-icone">
                            <img src="src/svg/search-icon.svg" alt="Icône de recherche">
                        </div>
                        <div class="header-btn-texte">Rechercher</div>
                    </div>

                    <div class="header-btn">
                        <div class="header-btn-icone">
                            <img src="src/svg/cart-icon.svg" alt="Icône du panier">
                        </div>
                        <div class="header-btn-texte">Panier</div>
                    </div>

                    <div class="header-btn">
                        <div class="header-btn-icone">
                            <img src="src/svg/user-icon.svg" alt="Icône du compte">
                        </div>
                        <div class="header-btn-texte">
                            <?php if (!empty($_SESSION['utilisateur'])): ?>
                                <a href="index.php?action=compte" style="color:inherit;text-decoration:none;">Compte</a>
                            <?php else: ?>
                                <a href="index.php?action=authentification" style="color:inherit;text-decoration:none;">Se connecter</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-boutique-menu">
                <a class="header-boutique-menu-item" href="index.php?action=boutique">joalerie</a>
                <div class="header-boutique-menu-item">haute joalerie</div>
            </div>
        </div>
    </header>

    <main>
        <?= isset($contenu) ? $contenu : '' ?>
    </main>

    <footer class="footer-site">
        <div class="footer-site-conteneur">
            <div class="footer-site-marque">
                <a class="footer-site-logo" href="index.php?action=accueil" aria-label="Retour à l'accueil">
                    <img src="src/svg/LogoEPIPHANOFFnCOFondBlanc.svg" alt="Logo Épiphanoff & Co.">
                </a>
            </div>

            <div class="footer-site-colonnes">
                <section class="footer-site-colonne" aria-labelledby="footer-colonne-boutique">
                    <h2 id="footer-colonne-boutique" class="footer-site-titre-colonne">Boutique</h2>
                    <ul class="footer-site-liste">
                        <li>Collection femme</li>
                        <li>Collection homme</li>
                        <li>Pièces signature</li>
                        <li>Nouveautés</li>
                        <li>Best-sellers</li>
                    </ul>
                </section>

                <section class="footer-site-colonne" aria-labelledby="footer-colonne-services">
                    <h2 id="footer-colonne-services" class="footer-site-titre-colonne">Services</h2>
                    <ul class="footer-site-liste">
                        <li>Livraison</li>
                        <li>Retours</li>
                        <li>Entretien</li>
                        <li>Carte cadeau</li>
                        <li>Contact</li>
                    </ul>
                </section>

                <section class="footer-site-colonne footer-site-colonne-sociale" aria-labelledby="footer-colonne-suivez-nous">
                    <h2 id="footer-colonne-suivez-nous" class="footer-site-titre-colonne">Suivez-nous !</h2>
                    <ul class="footer-site-social">
                        <li><span class="footer-site-social-icone" aria-hidden="true"><img src="src/img/socials-icons/Facebook.svg" alt=""></span><span>Facebook</span></li>
                        <li><span class="footer-site-social-icone" aria-hidden="true"><img src="src/img/socials-icons/Instagram.svg" alt=""></span><span>Instagram</span></li>
                        <li><span class="footer-site-social-icone" aria-hidden="true"><img src="src/img/socials-icons/X.svg" alt=""></span><span>X</span></li>
                        <li><span class="footer-site-social-icone" aria-hidden="true"><img src="src/img/socials-icons/LinkedIn.svg" alt=""></span><span>LinkedIn</span></li>
                        <li><span class="footer-site-social-icone" aria-hidden="true"><img src="src/img/socials-icons/ic_baseline-tiktok.svg" alt=""></span><span>TikTok</span></li>
                    </ul>
                </section>
            </div>
        </div>

        <div class="footer-site-bas">
            <p class="footer-site-copyright">&copy; 2026 Épiphanoff & Co. Tous droits réservés.</p>
            <div class="footer-site-liens-legaux" aria-label="Informations légales">
                <span>Privacy Policy</span>
                <span>Terms of Service</span>
                <span>Cookies Settings</span>
            </div>
        </div>
    </footer>
</body>
</html>