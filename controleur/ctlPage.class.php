<?php 
require_once "vue/vue.class.php";

class ctlPage{

  /*******************************************************
  Affichage de la liste des commandes dans la vue concernée
    Entrée : 

    Sortie : 

    Retour : 
      
     *******************************************************/
public function accueil(){
    $vue = new Vue("Accueil");
    $vue->afficher(array()); // Affiche la liste des articles dans la vue 
}

  /*******************************************************
  Affichage de la liste des commandes dans la vue concernée
    Entrée : 
  message [string] : message d'erreur

    Sortie : 

    Retour : 
      
     *******************************************************/
public function erreur($message){
    $vue = new Vue("Erreur");
    $vue->afficher(array("message" => $message)); // Affiche la liste des articles dans la vue 
}
}