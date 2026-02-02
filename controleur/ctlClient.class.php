<?php
require_once "modele/client.class.php";
require_once "vue/vue.class.php";

/****************************************
Classe chargée de la gestion des clients
 ****************************************/
class CtlClient
{

  private $client; // Objet du modèle client

  /*******************************************************
  Instancie l'objet client
    Entrée : 
  
    Sortie : 
      $client [objet] : objet modele "client" utilise dans cette classe

    Retour : 
      
   *******************************************************/
  public function __construct()
  {
    $this->client = new Client();
  }



  /*******************************************************
  Affichage de la liste des clients dans la vue concernée
    Entrée : 
  
    Sortie : 

    Retour : 
      
   *******************************************************/
  public function clients()
  {
    $clients = $this->client->getClients(); // Récupère la liste des clients


    $vue = new Vue("Clients"); // Intancie la vue appropriée
    $vue->afficher(array("clients" => $clients)); // Affiche la liste des clients dans la vue 

  }
}
