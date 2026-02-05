<?php
require_once "modele/commande.class.php";
require_once "modele/client.class.php";
require_once "modele/article.class.php";
require_once "vue/vue.class.php";
/*************************************
Classe chargée de l'affichage des vues
*************************************/
class ctlCommande {

  private $cmd; //Objet du modèle "commande"

  /*******************************************************
  Instancie l'objet cmd
    Entrée : 

    Sortie :
      $cmd [string] : objet modèle "cmd" utilisé dans cette class

    Retour : 
      
  *******************************************************/

  public function __construct() {
    $this->cmd = new Commande();
  }

  /*******************************************************
  Affichage de la liste des commandes dans la vue concernée
    Entrée : 
      
    Sortie :
  
    Retour : 
      
  *******************************************************/
  public function commandes() {
    $commandes = $this->cmd->getCommandes();        //Récupère la liste des commande

    $vue = new Vue("Commandes");                       //Instancie la vue appropriée
    $vue->afficher(array("commandes" => $commandes));   

  }


  public function commande($idComm) {
    $articles = $this->cmd->getArticlesCommande($idComm);
    if (!empty($articles)) {
        $objClient = new Client();
        $client = $objClient->getClient($this->cmd->getIdClientCommande($idComm));
        $total = $this->cmd->getTotalCommande($idComm);

        $vue = new Vue("Commande"); // Instancie la vue appropriée
        $vue->afficher(array("client" => $client, "total" => $total, "idComm" => $idComm, "articles" => $articles)); // Affiche la liste des commandes dans la vue
    }
    else
        throw new Exception("Echec de l'affichage de la commande N°$idComm");        //Récupère la liste des commande

  }
}