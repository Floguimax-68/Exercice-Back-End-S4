<?php
$titre = "Boutique - Épiphanoff & Co.";

$articles = $articles ?? [];

function valeurHtmlBoutique($valeur) {
    return htmlspecialchars((string)$valeur, ENT_QUOTES, 'UTF-8');
}
?>

<div class="boutique-page">
    <h2 class="titre-boutique-page">Notre boutique</h2>
    <p class="texte-boutique-page">
        Découvrez nos collections de joaillerie, des pièces discrètes aux créations plus marquées.
    </p>

    <?php if (!empty($articles)): ?>
        <section class="boutique-page-grille" aria-label="Liste des articles">
            <?php foreach ($articles as $article): ?>
                <article class="boutique-article">
                    <div class="boutique-article__visuel" aria-hidden="true">
                        <div class="boutique-article__frame"></div>
                    </div>

                    <h3 class="boutique-article__nom"><?= valeurHtmlBoutique($article['nom'] ?? '') ?></h3>
                    <p class="boutique-article__categorie"><?= valeurHtmlBoutique($article['categorie'] ?? '') ?></p>

                    <div class="boutique-article__action">
                        <button type="button" class="boutique-article__bouton">Voir l'article</button>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    <?php else: ?>
        <section class="boutique-page-vide">
            <p>Aucun article n'est encore disponible.</p>
        </section>
    <?php endif; ?>
</div>