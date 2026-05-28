<?php
$titre = "Mon Compte - Épiphanoff & Co.";

$utilisateur = $utilisateur ?? [];

function valeurCompte($tableau, $cle) {
    $valeur = $tableau[$cle] ?? null;
    return ($valeur === null || trim((string)$valeur) === '') ? 'pas encore renseigné' : $valeur;
}

function valeurHtmlCompte($tableau, $cle) {
    $valeur = $tableau[$cle] ?? null;
    return ($valeur === null || trim((string)$valeur) === '') ? '' : htmlspecialchars($valeur);
}

function placeholderCompte($tableau, $cle, $libelle) {
    $valeur = $tableau[$cle] ?? null;
    return ($valeur === null || trim((string)$valeur) === '') ? 'pas encore renseigné' : $libelle;
}
?>

<div class="compte-page">
    <h2 class="titre-compte-page">MON COMPTE</h2>

    <?php if (!empty($message)): ?>
        <div class="message-compte-page"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST" action="index.php?action=compte" class="formulaire-compte-page" id="form-compte">
        <section class="bloc-compte-page">
            <h3>Informations personnelles</h3>
            <div class="grille-compte-page">
                <div class="champ-compte-page">
                    <label for="nom" class="champ-compte-page__label">Nom</label>
                    <input type="text" name="nom" id="nom" class="champ-compte-page__input" value="<?= valeurHtmlCompte($utilisateur, 'nom') ?>" data-initial="<?= valeurHtmlCompte($utilisateur, 'nom') ?>" placeholder="<?= placeholderCompte($utilisateur, 'nom', 'Nom') ?>">
                </div>
                <div class="champ-compte-page">
                    <label for="prenom" class="champ-compte-page__label">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="champ-compte-page__input" value="<?= valeurHtmlCompte($utilisateur, 'prenom') ?>" data-initial="<?= valeurHtmlCompte($utilisateur, 'prenom') ?>" placeholder="<?= placeholderCompte($utilisateur, 'prenom', 'Prénom') ?>">
                </div>
                <div class="champ-compte-page">
                    <label for="mot_de_passe" class="champ-compte-page__label">Mot de passe</label>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" class="champ-compte-page__input champ-compte-page__input--password" value="••••••••" data-initial="••••••••" disabled aria-disabled="true" autocomplete="off">
                </div>
            </div>
        </section>

        <section class="bloc-compte-page">
            <h3>Adresse</h3>
            <div class="grille-compte-page">
                <div class="champ-compte-page">
                    <label for="adresse" class="champ-compte-page__label">Adresse</label>
                    <input type="text" name="adresse" id="adresse" class="champ-compte-page__input" value="<?= valeurHtmlCompte($utilisateur, 'adresse') ?>" data-initial="<?= valeurHtmlCompte($utilisateur, 'adresse') ?>" placeholder="<?= placeholderCompte($utilisateur, 'adresse', 'Adresse') ?>">
                </div>
                <div class="champ-compte-page">
                    <label for="ville" class="champ-compte-page__label">Ville</label>
                    <input type="text" name="ville" id="ville" class="champ-compte-page__input" value="<?= valeurHtmlCompte($utilisateur, 'ville') ?>" data-initial="<?= valeurHtmlCompte($utilisateur, 'ville') ?>" placeholder="<?= placeholderCompte($utilisateur, 'ville', 'Ville') ?>">
                </div>
                <div class="champ-compte-page">
                    <label for="code_postal" class="champ-compte-page__label">Code postal</label>
                    <input type="text" name="code_postal" id="code_postal" class="champ-compte-page__input" value="<?= valeurHtmlCompte($utilisateur, 'code_postal') ?>" data-initial="<?= valeurHtmlCompte($utilisateur, 'code_postal') ?>" placeholder="<?= placeholderCompte($utilisateur, 'code_postal', 'Code postal') ?>">
                </div>
            </div>
        </section>

        <section class="bloc-compte-page">
            <h3>Contact</h3>
            <div class="grille-compte-page">
                <div class="champ-compte-page">
                    <label for="mail" class="champ-compte-page__label">Adresse e-mail</label>
                    <input type="email" name="mail" id="mail" class="champ-compte-page__input" value="<?= valeurHtmlCompte($utilisateur, 'mail') ?>" data-initial="<?= valeurHtmlCompte($utilisateur, 'mail') ?>" placeholder="<?= placeholderCompte($utilisateur, 'mail', 'Adresse e-mail') ?>">
                </div>
                <div class="champ-compte-page">
                    <label for="tel" class="champ-compte-page__label">Numéro de téléphone</label>
                    <input type="tel" name="tel" id="tel" class="champ-compte-page__input" value="<?= valeurHtmlCompte($utilisateur, 'tel') ?>" data-initial="<?= valeurHtmlCompte($utilisateur, 'tel') ?>" placeholder="<?= placeholderCompte($utilisateur, 'tel', 'Numéro de téléphone') ?>">
                </div>
                <div class="champ-compte-page">
                    <label for="pays" class="champ-compte-page__label">Pays</label>
                    <input type="text" name="pays" id="pays" class="champ-compte-page__input" value="<?= valeurHtmlCompte($utilisateur, 'pays') ?>" data-initial="<?= valeurHtmlCompte($utilisateur, 'pays') ?>" placeholder="<?= placeholderCompte($utilisateur, 'pays', 'Pays') ?>">
                </div>
            </div>
        </section>

        <div class="actions-compte-page">
            <button type="submit" name="enregistrer_compte" value="1" id="bouton-enregistrer-compte" class="bouton-enregistrer-compte" disabled>Enregistrer les modifications</button>
            <button type="submit" formaction="index.php?action=deconnexion" formmethod="POST" class="bouton-deconnexion-compte">Se déconnecter</button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var formulaire = document.getElementById('form-compte');
    var bouton = document.getElementById('bouton-enregistrer-compte');
    if (!formulaire || !bouton) return;

    var champs = formulaire.querySelectorAll('.champ-compte-page__input');

    function normaliser(valeur) {
        return (valeur || '').toString().trim();
    }

    function estVide(valeur) {
        return normaliser(valeur) === '';
    }

    function verifierModification() {
        var modifie = false;
        champs.forEach(function (champ) {
            var initial = normaliser(champ.dataset.initial);
            var courant = normaliser(champ.value);

            if (champ.id === 'mot_de_passe') {
                // Le mot de passe n'est pas modifiable pour l'instant.
                return;
            }

            if (courant !== initial) {
                modifie = true;
            }
        });

        bouton.disabled = !modifie;
        bouton.classList.toggle('is-actif', modifie);
    }

    champs.forEach(function (champ) {
        champ.addEventListener('input', verifierModification);
        champ.addEventListener('change', verifierModification);
    });

    verifierModification();
});
</script>
