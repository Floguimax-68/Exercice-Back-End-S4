<?php
require_once "modele/database.class.php";

/************************************************************
Classe Utilisateur : Gestion des utilisateurs et authentification
************************************************************/
class Utilisateur extends Database {

    /************************************************************
    Note : la classe hérite de `Database` et utilise la méthode
    protégée `connexionBDD()` pour accéder à l'objet PDO.
    ************************************************************/

    /************************************************************
    Enregistre un nouvel utilisateur en BDD
    Crypte le mot de passe avec password_hash()
    
    Entrée :
        $donnees [array] : ['nom', 'prenom', 'mail', 'mot_de_passe', 'adresse', 'ville', 'code_postal', 'pays', 'tel']
    
    Retour : 
        true si succès, exception sinon
    ************************************************************/
    public function inscrire($donnees) {
        // Vérifier si l'email existe déjà
        $reqVerif = $this->connexionBDD()->prepare("SELECT id_user FROM users WHERE mail = ?");
        $reqVerif->execute([$donnees['mail']]);
        
        if ($reqVerif->rowCount() > 0) {
            throw new Exception("Cet email est déjà enregistré.");
        }

        // Crypter le mot de passe
        $motDePasseCrypte = password_hash($donnees['mot_de_passe'], PASSWORD_DEFAULT);

        $adresse = trim($donnees['adresse'] ?? '');
        $ville = trim($donnees['ville'] ?? '');
        $codePostal = trim($donnees['code_postal'] ?? '');
        $pays = trim($donnees['pays'] ?? '');

        $adresse = $adresse !== '' ? $adresse : null;
        $ville = $ville !== '' ? $ville : null;
        $codePostal = $codePostal !== '' ? $codePostal : null;
        $pays = $pays !== '' ? $pays : null;

        // Préparer l'insertion
        $sql = "INSERT INTO users (nom, prenom, mail, mot_de_passe, adresse, ville, code_postal, pays, tel) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $req = $this->connexionBDD()->prepare($sql);

        $resultat = $req->execute([
            $donnees['nom'],
            $donnees['prenom'],
            $donnees['mail'],
            $motDePasseCrypte,
            $adresse,
            $ville,
            $codePostal,
            $pays,
            $donnees['tel'] ?? null
        ]);

        return $resultat;
    }

    /************************************************************
    Authentifie un utilisateur
    Vérifie email + mot de passe avec password_verify()
    
    Entrée :
        $mail [string] : email de l'utilisateur
        $motDePasse [string] : mot de passe en clair
    
    Retour : 
        array utilisateur si authentification réussie, null sinon
    ************************************************************/
    public function authentifier($mail, $motDePasse) {
        $sql = "SELECT * FROM users WHERE mail = ?";

        $req = $this->connexionBDD()->prepare($sql);
        $req->execute([$mail]);

        if ($req->rowCount() === 0) {
            return null; // Utilisateur non trouvé
        }

        $utilisateur = $req->fetch(PDO::FETCH_ASSOC);

        // Vérifier le mot de passe avec password_verify()
        if (password_verify($motDePasse, $utilisateur['mot_de_passe'])) {
            // Retourner les infos sans le mot de passe
            unset($utilisateur['mot_de_passe']);
            return $utilisateur;
        }

        return null; // Mot de passe incorrect
    }

    /************************************************************
    Récupère les infos d'un utilisateur par ID
    
    Entrée :
        $idUser [int] : ID de l'utilisateur
    
    Retour : 
        array données utilisateur ou null
    ************************************************************/
    public function obtenirUtilisateur($idUser) {
        $sql = "SELECT * FROM users WHERE id_user = ?";

        $req = $this->connexionBDD()->prepare($sql);
        $req->execute([$idUser]);

        return $req->fetch(PDO::FETCH_ASSOC);
    }

    /************************************************************
    Met à jour les informations d'un utilisateur

    Entrée :
        $idUser [int] : ID de l'utilisateur
        $donnees [array] : champs modifiables

    Retour :
        bool succès de la mise à jour
    ************************************************************/
    public function mettreAJourUtilisateur($idUser, $donnees) {
        $champs = [
            'nom' => trim($donnees['nom'] ?? ''),
            'prenom' => trim($donnees['prenom'] ?? ''),
            'mail' => trim($donnees['mail'] ?? ''),
            'adresse' => trim($donnees['adresse'] ?? ''),
            'ville' => trim($donnees['ville'] ?? ''),
            'code_postal' => trim($donnees['code_postal'] ?? ''),
            'pays' => trim($donnees['pays'] ?? ''),
            'tel' => trim($donnees['tel'] ?? '')
        ];

        $motDePasse = trim($donnees['mot_de_passe'] ?? '');

        $sql = "UPDATE users SET nom = ?, prenom = ?, mail = ?, adresse = ?, ville = ?, code_postal = ?, pays = ?, tel = ?";
        $params = [
            $champs['nom'] !== '' ? $champs['nom'] : null,
            $champs['prenom'] !== '' ? $champs['prenom'] : null,
            $champs['mail'] !== '' ? $champs['mail'] : null,
            $champs['adresse'] !== '' ? $champs['adresse'] : null,
            $champs['ville'] !== '' ? $champs['ville'] : null,
            $champs['code_postal'] !== '' ? $champs['code_postal'] : null,
            $champs['pays'] !== '' ? $champs['pays'] : null,
            $champs['tel'] !== '' ? $champs['tel'] : null,
        ];

        if ($motDePasse !== '') {
            if (strlen($motDePasse) < 8) {
                throw new Exception("Le mot de passe doit contenir au moins 8 caractères.");
            }
            $sql .= ", mot_de_passe = ?";
            $params[] = password_hash($motDePasse, PASSWORD_DEFAULT);
        }

        $sql .= " WHERE id_user = ?";
        $params[] = (int)$idUser;

        $req = $this->connexionBDD()->prepare($sql);
        return $req->execute($params);
    }
}
