<?php
/* Vue d'authentification : formulaires de connexion et inscription
   Intègre le design 'carte' qui glisse entre la moitié gauche et droite.
*/

$titre = "Authentification - Épiphanoff & Co.";
?>

<?php if (isset($message) && !empty($message)): ?>
    <div class="message-authentification">
        <?= $message ?>
    </div>
<?php endif; ?>

<div class="authentification" id="auth">
    <!-- Background halves -->
    <div class="image-half image-left" aria-hidden="true">
        <img src="src/img/image-connexion.png" alt="" class="image-connexion__img">
    </div>
    <div class="image-half image-right" aria-hidden="true">
        <img src="src/img/image-connexion.png" alt="" class="image-connexion__img">
    </div>

    <!-- Form card -->
    <div class="formulaire-connexion">
        <div class="form-frame">
            <div class="form-card" role="region" aria-label="Formulaire d'authentification">
                <div id="login-fields" class="fields visible">
                    <h3 class="titre-formulaire-authentification">Se connecter</h3>
                    <p class="sous-titre-authentification">Connectez-vous et continuez votre expérience.</p>
                    <form id="form-login" method="POST" action="index.php?action=connexion">
                        <div class="champ-formulaire-authentification">
                            <label for="mail_conn" class="etiquette-authentification">Email :</label>
                            <input id="mail_conn" type="email" name="mail_conn" required class="champ-saisie-authentification" placeholder="Adresse Mail">
                        </div>
                        <div class="champ-formulaire-authentification">
                            <label for="mdp_conn" class="etiquette-authentification">Mot de passe :</label>
                            <input id="mdp_conn" type="password" name="mdp_conn" required class="champ-saisie-authentification" placeholder="Mot de passe">
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="connecter" value="1" class="bouton-soumission-authentification">Se connecter</button>
                        </div>
                    </form>
                    <div class="lien-aide">
                        <div><a href="index.php?action=mdp_oublie">Mot de passe oublié?</a></div>
                        <div style="margin-top:6px;">Vous n'avez pas de compte ? <a href="#" class="toggle-signup" onclick="if(window.showSignup){window.showSignup(event);}return false;">S'inscrire</a></div>
                    </div>
                </div>

                <div id="signup-fields" class="fields hidden">
                    <h3 class="titre-formulaire-authentification">S'inscrire</h3>
                    <p class="sous-titre-authentification">Créez votre compte.</p>
                    <form id="form-signup" method="POST" action="index.php?action=inscription">
                        <div class="champ-formulaire-authentification">
                            <label for="prenom" class="etiquette-authentification">Prénom :</label>
                            <input id="prenom" type="text" name="prenom" required class="champ-saisie-authentification" placeholder="Prénom">
                        </div>
                        <div class="champ-formulaire-authentification">
                            <label for="nom" class="etiquette-authentification">Nom :</label>
                            <input id="nom" type="text" name="nom" required class="champ-saisie-authentification" placeholder="Nom">
                        </div>
                        <div class="champ-formulaire-authentification">
                            <label for="mail_inscr" class="etiquette-authentification">Email :</label>
                            <input id="mail_inscr" type="email" name="mail_inscr" required class="champ-saisie-authentification" placeholder="Adresse Mail">
                        </div>
                        <div class="champ-formulaire-authentification">
                            <label for="tel" class="etiquette-authentification">Téléphone (optionnel) :</label>
                            <input id="tel" type="tel" name="tel" class="champ-saisie-authentification" placeholder="Téléphone">
                        </div>
                        <div class="champ-formulaire-authentification">
                            <label for="mdp_inscr" class="etiquette-authentification">Mot de passe (min. 8 caractères) :</label>
                            <input id="mdp_inscr" type="password" name="mdp_inscr" required minlength="8" class="champ-saisie-authentification" placeholder="Mot de passe">
                        </div>
                        <div class="champ-formulaire-authentification">
                            <label for="mdp_inscr_conf" class="etiquette-authentification">Confirmer le mot de passe :</label>
                            <input id="mdp_inscr_conf" type="password" name="mdp_inscr_conf" required minlength="8" class="champ-saisie-authentification" placeholder="Confirmation du mot de passe">
                        </div>

                        <details class="bloc-adresse-authentification">
                            <summary class="en-tete-adresse-authentification">
                                <span class="titre-adresse-authentification">Ajouter une adresse</span>
                                <span class="aide-adresse-authentification">Facultatif, cliquer pour remplir</span>
                            </summary>

                            <div class="contenu-adresse-authentification">
                                <div class="champ-formulaire-authentification">
                                    <label for="adresse" class="etiquette-authentification">Adresse (optionnel) :</label>
                                    <input id="adresse" type="text" name="adresse" class="champ-saisie-authentification" placeholder="Adresse">
                                </div>

                                <div class="champ-formulaire-authentification">
                                    <label for="ville" class="etiquette-authentification">Ville (optionnel) :</label>
                                    <input id="ville" type="text" name="ville" class="champ-saisie-authentification" placeholder="Ville">
                                </div>

                                <div class="champ-formulaire-authentification">
                                    <label for="code_postal" class="etiquette-authentification">Code postal (optionnel) :</label>
                                    <input id="code_postal" type="text" name="code_postal" class="champ-saisie-authentification" placeholder="Code postal">
                                </div>

                                <div class="champ-formulaire-authentification">
                                    <label for="pays" class="etiquette-authentification">Pays (optionnel) :</label>
                                    <input id="pays" type="text" name="pays" class="champ-saisie-authentification" placeholder="Pays">
                                </div>
                            </div>
                        </details>

                        <div class="form-actions">
                            <button type="submit" name="inscription" value="1" class="bouton-soumission-authentification">S'inscrire</button>
                        </div>
                    </form>
                    <div class="lien-aide">
                        <div>Vous avez déjà un compte ? <a href="#" class="toggle-login">Se connecter</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function(){
        var root = document.getElementById('auth');
        var loginFields = document.getElementById('login-fields');
        var signupFields = document.getElementById('signup-fields');
        function showSignup(e){
            if(e) e.preventDefault();
            root.classList.add('is-signup');
            // cross-fade fields
            loginFields.classList.remove('visible'); loginFields.classList.add('hidden');
            signupFields.classList.remove('hidden'); signupFields.classList.add('visible');
            setTimeout(function(){
                var f = signupFields.querySelector('input'); if(f) f.focus();
            }, 560);
        }
        function showLogin(e){
            if(e) e.preventDefault();
            root.classList.remove('is-signup');
            signupFields.classList.remove('visible'); signupFields.classList.add('hidden');
            loginFields.classList.remove('hidden'); loginFields.classList.add('visible');
            setTimeout(function(){
                var f = loginFields.querySelector('input'); if(f) f.focus();
            }, 560);
        }

        document.querySelectorAll('.toggle-signup').forEach(function(el){ el.addEventListener('click', showSignup); });
        document.querySelectorAll('.toggle-login').forEach(function(el){ el.addEventListener('click', showLogin); });
    });
    </script>
<?php
