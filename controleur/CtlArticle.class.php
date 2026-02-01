<?php
class CtlArticle {
  function articles() {
    $objArt = new Article();
    $articles = $objArt->getArticles();
    $vue = new Vue("Articles"); // Instancie la vue appropriée
    $vue->afficher(array("articles" => $articles)); 
  }
}