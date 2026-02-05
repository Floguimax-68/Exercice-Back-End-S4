<?php
require_once "modele/article.class.php";
require_once "vue/vue.class.php";
/*************************************
Classe chargée de l'affichage des vues
*************************************/
class ctlArticle {

  private $article; //Objet du modèle "article"

  /*******************************************************
  Instancie l'objet article
    Entrée : 

    Sortie :
      $article [string] : objet modèle "article" utilisé dans cette class

    Retour : 
      
  *******************************************************/

  public function __construct() {
    $this->article = new Article();
  }

  /*******************************************************
  Affichage de la liste des articles dans la vue concernée
    Entrée : 
      
    Sortie :
  
    Retour : 
      
  *******************************************************/
  public function articles() {
    $articles = $this->article->getArticles();        //Récupère la liste des articles

    $vue = new Vue("Articles");                       //Instancie la vue appropriée
    $vue->afficher(array("articles" => $articles));   

  }
}