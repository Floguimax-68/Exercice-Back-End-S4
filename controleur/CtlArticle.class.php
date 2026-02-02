<?php
require_once "modele/article.class.php";
require_once "vue/vue.class.php";

/****************************************
Classe chargée de la gestion des articles
 ****************************************/
class CtlArticle
{

  private $article; // Objet du modèle article

  /*******************************************************
  Instancie l'objet article
    Entrée : 
  
    Sortie : 
      $article [objet] : objet modele "article" utilise dans cette classe

    Retour : 
      
   *******************************************************/
  public function __construct()
  {
    $this->article = new Article();
  }



  /*******************************************************
  Affichage de la liste des articles dans la vue concernée
    Entrée : 
  
    Sortie : 

    Retour : 
      
   *******************************************************/
  public function articles()
  {
    $articles = $this->article->getArticles(); // Récupère la liste des articles


    $vue = new Vue("Articles"); // Intancie la vue appropriée
    $vue->afficher(array("articles" => $articles)); // Affiche la liste des articles dans la vue 

  }
}
