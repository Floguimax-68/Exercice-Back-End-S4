<?php
// require_once "modele/article.class.php";
require_once "controleur/ctlArticle.class.php";
// require_once "modele/client.class.php";
require_once "controleur/ctlClient.class.php";
// require_once "modele/commande.class.php";
require_once "controleur/ctlCommande.class.php";
// require_once "vue/vue.class.php";
require_once "controleur/ctlPage.class.php";

/*******************************************************
Affichage de la page d'accueil du site
  Entrée : 

  Retour : 
    
 *******************************************************/
function accueil()
{
  // $vue = new Vue("Accueil"); // Instancie la vue appropriée
  // $vue->afficher(array()); // Affiche la liste des clients dans la vue

  $ctlPage = new CtlPage(); // Intancie le controleur approprié
  $ctlPage->accueil(); // Affiche la page d'accueil
}

/*******************************************************
Affichage de la liste des clients dans la vue concernée
  Entrée : 

  Retour : 
    
 *******************************************************/
function clients()
{
  // $objClient = new Client();
  // $clients = $objClient->getClients();
  // $vue = new Vue("Clients"); // Instancie la vue appropriée
  // $vue->afficher(array("clients" => $clients)); // Affiche la liste des clients dans la vue

  $ctlClient = new CtlClient(); // Intancie le controleur approprié
  $ctlClient->clients(); // Affiche la liste des articles
}

/*******************************************************
Affichage de la liste des articles dans la vue concernée
  Entrée : 

  Retour : 
    
 *******************************************************/
function articles()
{
  // $objArt = new Article();
  // $articles = $objArt->getArticles();
  // $vue = new Vue("Articles"); // Instancie la vue appropriée
  // $vue->afficher(array("articles" => $articles)); // Affiche la liste des clients dans la vue

  $ctlArticle = new CtlArticle(); // Intancie le controleur approprié
  $ctlArticle->articles(); // Affiche la liste des articles 
}

/*******************************************************
Affichage de la liste des commandes dans la vue concernée
  Entrée : 

  Retour : 
    
 *******************************************************/
function commandes()
{
  // $objCommande = new Commande();
  // $commandes = $objCommande->getCommandes();
  // $vue = new Vue("Commandes"); // Instancie la vue appropriée
  // $vue->afficher(array("commandes" => $commandes)); // Affiche la liste des clients dans la vue

  $ctlCmd = new CtlCommande(); // Intancie le controleur approprié
  $ctlCmd->commandes(); // Affiche la liste des commandes 
}

/*******************************************************
Affichage des détails d'une commande et du client dans la vue concernée
  Entrée :
    idComm [int] : n° de la commande

  Retour : 
    
 *******************************************************/
function commande($idComm)
{
  // $objCommande = new Commande();
  // $articles = $objCommande->getArticlesCommande($idComm);
  // if (!empty($articles)) {
  //   $objClient = new Client();
  //   $client = $objClient->getClient($objCommande->getIdClientCommande($idComm));
  //   $total = $objCommande->getTotalCommande($idComm);
  //   $vue = new Vue("commande"); // Instancie la vue appropriée
  //   $vue->afficher(array("client" => $client, "articles" => $articles, "total" => $total, "idComm" => $idComm)); // Affiche la liste des clients dans la vue
  // } else
  //   throw new Exception("Echec de l'affichage de la commande N°$idComm");

  $ctlCmd = new CtlCommande(); // Intancie le controleur approprié
  $ctlCmd->commande($idComm); // Affiche lles détails de la commande
}

/*******************************************************
Affichage d'une page d'erreur
  Entrée : 
    message [string] : message d'erreur

  Retour : 
    
 *******************************************************/
function erreur($message)
{
  // $vue = new Vue("Erreur"); // Instancie la vue appropriée
  // $vue->afficher(array("message" => $message)); // Affiche la liste des clients dans la vue

  $ctlPage = new CtlPage(); // Intancie le controleur approprié
  $ctlPage->erreur($message); // Affiche la page d'accueil
}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement