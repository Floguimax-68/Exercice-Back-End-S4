<?php
require_once "modele/article.class.php";
require_once "modele/client.class.php";
require_once "modele/commande.class.php";
require_once "vue/vue.class.php";

/*******************************************************
Affichage de la page d'accueil du site
  Entrée : 

  Retour : 
    
*******************************************************/
function accueil() {
  $vue = new Vue("Accueil"); // Instancie la vue appropriée
  $vue->afficher(array());
}

/*******************************************************
Affichage de la liste des clients dans la vue concernée
  Entrée : 

  Retour : 
    
*******************************************************/
function clients() {
  $objClient = new Client();
  $clients = $objClient->getClients();
  $vue = new Vue("Clients"); // Instancie la vue appropriée
  $vue->afficher(array("clients" => $clients)); // Affiche la liste des clients
}

/*******************************************************
Affichage de la liste des articles dans la vue concernée
  Entrée : 

  Retour : 
    
*******************************************************/
function articles() {
  $objArt = new Article();
  $articles = $objArt->getArticles();
  $vue = new Vue("Articles"); // Instancie la vue appropriée
  $vue->afficher(array("articles" => $articles)); 
}

/*******************************************************
Affichage de la liste des commandes dans la vue concernée
  Entrée : 

  Retour : 
    
*******************************************************/
function commandes() {
  $objCommande = new Commande();
  $commandes = $objCommande->getCommandes();
  $vue = new Vue("Commandes"); // Instancie la vue appropriée
  $vue->afficher(array("commandes" => $commandes)); 
  
}

/*******************************************************
Affichage des détails d'une commande et du client dans la vue concernée
  Entrée :
    idComm [int] : n° de la commande

  Retour : 
    
*******************************************************/
function commande($idComm) {
  $objCommande = new Commande();
  $articles = $objCommande->getArticlesCommande($idComm);
  if (!empty($articles)) {
    $objClient = new Client();
    $client = $objClient->getClient($objCommande->getIdClientCommande($idComm));
    $total = $objCommande->getTotalCommande($idComm);
    $vue = new Vue("Commande"); // Instancie la vue appropriée
    $vue->afficher(array("articles" => $articles,
                         "idComm" => $idComm,
                         "total" => $total,
                         "client" => $client
                        )); 
  }
  else
    throw new Exception("Echec de l'affichage de la commande N°$idComm");
}

/*******************************************************
Affichage d'une page d'erreur
  Entrée : 
    message [string] : message d'erreur

  Retour : 
    
*******************************************************/
function erreur($message) {
  $vue = new Vue("Erreur"); // Instancie la vue appropriée
  $vue->afficher(array("message" => $message)); 
}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement