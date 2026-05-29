<?php
require_once "modele/database.class.php";

/**************************************************************
Classe Article : gestion des articles de la boutique
***************************************************************/
class Article extends Database {

    /**************************************************************
    Retourne la liste des articles affichables dans la boutique

    Retour :
        [array] : liste des articles ordonnés par identifiant
    ***************************************************************/
    public function getArticles() {
        $req = 'SELECT id_article, nom, categorie FROM article ORDER BY id_article ASC;';
        return $this->execReq($req);
    }
}