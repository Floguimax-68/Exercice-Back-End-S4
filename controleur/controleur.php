<?php
require_once "controleur/CtrlArticle.class.php";
require_once "controleur/CtrlClient.class.php";
require_once "controleur/CtrlCommande.class.php";
require_once "controleur/CtrlPage.class.php";

/*******************************************************
Affichage de la page d'accueil du site
  Entrée : 

  Retour : 
    
*******************************************************/
function accueil() {
  $ctlPage  = new CtlPage();
  $ctlPage->accueil();
}

/*******************************************************
Affichage de la liste des clients dans la vue concernée
  Entrée : 

  Retour : 
    
*******************************************************/
function clients() {
  $ctlClient = new ctlClient();   //Instancie le controleur approprié
  $ctlClient->clients();          // Affiche la liste des articles
}

/*******************************************************
Affichage de la liste des articles dans la vue concernée
  Entrée : 

  Retour : 
    
*******************************************************/
function articles() {
  $ctlArticle = new ctlArticle();   //Instancie le controleur approprié
  $ctlArticle->articles();          // Affiche la liste des articles
}

/*******************************************************
Affichage de la liste des commandes dans la vue concernée
  Entrée : 

  Retour : 
    
*******************************************************/
function commandes() {
  $ctlCmd = new ctlCommande();   //Instancie le controleur approprié
  $ctlCmd->commandes();
}

/*******************************************************
Affichage des détails d'une commande et du client dans la vue concernée
  Entrée :
    idComm [int] : n° de la commande

  Retour : 
    
*******************************************************/
function commande($idComm) {
  $ctlCmd = new ctlCommande();   //Instancie le controleur approprié
  $ctlCmd->commande($idComm);
}

/*******************************************************
Affichage d'une page d'erreur
  Entrée : 
    message [string] : message d'erreur

  Retour : 
    
*******************************************************/
function erreur($message) {
  $ctlPage = new CtlPage();
  $ctlPage->erreur($message);
}   