<?php
require_once "modele/client.class.php";
require_once "vue/vue.class.php";
/*************************************
Classe chargée de l'affichage des vues
 *************************************/
class ctlClient
{

  private $client; //Objet du modèle "article"

  /*******************************************************
  Instancie l'objet article
    Entrée : 

    Sortie :
      $article [string] : objet modèle "article" utilisé dans cette class

    Retour : 
      
   *******************************************************/

  public function __construct()
  {
    $this->client = new Client();
  }

  /*******************************************************
  Affichage de la liste des articles dans la vue concernée
    Entrée : 
      
    Sortie :
  
    Retour : 
      
   *******************************************************/
  public function Clients()
  {
    $clients = $this->client->getClients();        //Récupère la liste des articles

    $vue = new Vue("Clients");                       //Instancie la vue appropriée
    $vue->afficher(array("clients" => $clients));
  }

  public function ajoutClient()
  {
    $vue = new Vue("AjoutClient");
    $vue->afficher(array());
  }
}
