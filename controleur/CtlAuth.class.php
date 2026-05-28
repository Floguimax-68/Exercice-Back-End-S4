<?php

require_once "modele/utilisateur.class.php";
require_once "vue/vue.class.php";

/************************************************************
Contrôleur CtlAuth : Gestion de l'authentification (connexion/inscription)
************************************************************/
class CtlAuth {

    private $utilisateur;

    /************************************************************
    Constructeur : instancie le modèle Utilisateur
    ************************************************************/
    public function __construct() {
        $this->utilisateur = new Utilisateur();
    }

    /************************************************************
    Affiche la page d'authentification (connexion/inscription vides)
    ************************************************************/
    public function afficherAuth() {
        $vue = new Vue("Auth");
        $vue->afficher([]);
    }

    /************************************************************
    Traite l'inscription d'un nouvel utilisateur
    Vérifie les données et crée le compte
    ************************************************************/
    public function pousserInscription() {
        $message = "";
        $succes = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inscrire'])) {
            try {
                // Récupérer et nettoyer les données
                $donnees = [
                    'nom' => trim($_POST['nom'] ?? ''),
                    'prenom' => trim($_POST['prenom'] ?? ''),
                    'mail' => trim($_POST['mail_inscr'] ?? ''),
                    'mot_de_passe' => $_POST['mdp_inscr'] ?? '',
                    'mot_de_passe_conf' => $_POST['mdp_inscr_conf'] ?? '',
                    'adresse' => trim($_POST['adresse'] ?? ''),
                    'ville' => trim($_POST['ville'] ?? ''),
                    'code_postal' => trim($_POST['code_postal'] ?? ''),
                    'pays' => trim($_POST['pays'] ?? ''),
                    'tel' => trim($_POST['tel'] ?? '')
                ];

                // Validations
                if (empty($donnees['nom'])) throw new Exception("Le nom est requis.");
                if (empty($donnees['prenom'])) throw new Exception("Le prénom est requis.");
                if (empty($donnees['mail'])) throw new Exception("L'email est requis.");
                if (!filter_var($donnees['mail'], FILTER_VALIDATE_EMAIL)) throw new Exception("L'email est invalide.");
                if (empty($donnees['mot_de_passe'])) throw new Exception("Le mot de passe est requis.");
                if (strlen($donnees['mot_de_passe']) < 6) throw new Exception("Le mot de passe doit contenir au moins 6 caractères.");
                if ($donnees['mot_de_passe'] !== $donnees['mot_de_passe_conf']) throw new Exception("Les mots de passe ne correspondent pas.");

                // Enregistrer l'utilisateur
                $this->utilisateur->inscrire($donnees);
                $message = "✓ Inscription réussie ! Vous pouvez maintenant vous connecter.";
                $succes = true;

            } catch (Exception $e) {
                $message = "✗ Erreur : " . $e->getMessage();
            }
        }

        $vue = new Vue("Auth");
        $vue->afficher(['message' => $message, 'succes' => $succes, 'action' => 'inscription']);
    }

    /************************************************************
    Traite la connexion d'un utilisateur
    Vérifie email + mot de passe
    ************************************************************/
    public function pousserConnexion() {
        $message = "";
        $succes = false;
        $utilisateur = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['connecter'])) {
            try {
                $mail = trim($_POST['mail_conn'] ?? '');
                $motDePasse = $_POST['mdp_conn'] ?? '';

                // Validations
                if (empty($mail)) throw new Exception("L'email est requis.");
                if (empty($motDePasse)) throw new Exception("Le mot de passe est requis.");

                // Authentifier
                $utilisateur = $this->utilisateur->authentifier($mail, $motDePasse);

                if ($utilisateur === null) {
                    $message = "✗ Email ou mot de passe incorrect.";
                } else {
                    $message = "✓ Connexion réussie ! Bienvenue, " . htmlspecialchars($utilisateur['prenom']) . ".";
                    $succes = true;
                }

            } catch (Exception $e) {
                $message = "✗ Erreur : " . $e->getMessage();
            }
        }

        // Si connexion réussie : enregistrer la session et rediriger vers l'accueil
        if ($succes && $utilisateur) {
            // Initialiser la session utilisateur
            $_SESSION['utilisateur'] = $utilisateur;
            // Rediriger vers la page d'accueil
            header('Location: index.php?action=accueil');
            exit;
        }

        $vue = new Vue("Auth");
        $vue->afficher(['message' => $message, 'succes' => $succes, 'utilisateur' => $utilisateur, 'action' => 'connexion']);
    }

    /**
     * Affiche la page Compte pour l'utilisateur connecté
     */
    public function afficherCompte() {
        // Si pas connecté : rediriger vers auth
        if (empty($_SESSION['utilisateur']['id_user'])) {
            header('Location: index.php?action=authentification');
            exit;
        }
        $idUser = (int)$_SESSION['utilisateur']['id_user'];
        $infosUtilisateur = $this->utilisateur->obtenirUtilisateur($idUser);

        if (!$infosUtilisateur) {
            header('Location: index.php?action=deconnexion');
            exit;
        }

        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enregistrer_compte'])) {
            try {
                $donnees = [
                    'nom' => $_POST['nom'] ?? '',
                    'prenom' => $_POST['prenom'] ?? '',
                    'mail' => $_POST['mail'] ?? '',
                    'adresse' => $_POST['adresse'] ?? '',
                    'ville' => $_POST['ville'] ?? '',
                    'code_postal' => $_POST['code_postal'] ?? '',
                    'pays' => $_POST['pays'] ?? '',
                    'tel' => $_POST['tel'] ?? '',
                    'mot_de_passe' => $_POST['mot_de_passe'] ?? ''
                ];

                if (trim($donnees['mail']) !== '' && !filter_var(trim($donnees['mail']), FILTER_VALIDATE_EMAIL)) {
                    throw new Exception("L'adresse email est invalide.");
                }

                // Un mot de passe vide ne doit pas être considéré comme une mise à jour.
                if (trim($donnees['mot_de_passe']) === '') {
                    unset($donnees['mot_de_passe']);
                }

                $this->utilisateur->mettreAJourUtilisateur($idUser, $donnees);
                $infosUtilisateur = $this->utilisateur->obtenirUtilisateur($idUser);
                $_SESSION['utilisateur'] = array_merge($_SESSION['utilisateur'], $infosUtilisateur);
                $message = "✓ Modifications enregistrées.";
            } catch (Exception $e) {
                $message = "✗ Erreur : " . $e->getMessage();
            }
        }

        $vue = new Vue("Compte");
        $vue->afficher([
            'utilisateur' => $infosUtilisateur,
            'message' => $message
        ]);
    }

    /**
     * Déconnecte l'utilisateur
     */
    public function deconnexion() {
        // Supprimer la session
        unset($_SESSION['utilisateur']);
        session_regenerate_id(true);
        header('Location: index.php?action=accueil');
        exit;
    }
}
