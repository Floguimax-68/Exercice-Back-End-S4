<?php
require_once "vue/vue.class.php";
require_once "modele/article.class.php";

class CtlPage {

    public function accueil(){
        $vue = new Vue("Accueil");
        $vue->afficher(array());
    }

    public function boutique(){
        $modeleArticle = new Article();
        $articles = $modeleArticle->getArticles();

        $vue = new Vue("Boutique");
        $vue->afficher(array("articles" => $articles));
    }

    public function administration(){
        if (empty($_SESSION['utilisateur']) || (int)($_SESSION['utilisateur']['status'] ?? 0) < 10) {
            header('Location: index.php?action=authentification');
            exit;
        }

        $vue = new Vue("Administration");
        $vue->afficher(array());
    }

    public function erreur($message){
        $vue = new Vue("Erreur");
        $vue->afficher(array("message" => $message));
    }
    

}