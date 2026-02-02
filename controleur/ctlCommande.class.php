<?php
require_once "modele/commande.class.php";
require_once "modele/client.class.php";
require_once "vue/vue.class.php";

/****************************************
Classe chargée de la gestion des commandes
 ****************************************/
class CtlCommande
{

    private $cmd; // Objet du modèle commande

    /*******************************************************
  Instancie l'objet cmd
    Entrée : 
  
    Sortie : 
      $cmd [objet] : objet modele "cmd" utilise dans cette classe

    Retour : 
      
     *******************************************************/
    public function __construct()
    {
        $this->cmd = new Commande();
    }



    /*******************************************************
  Affichage de la liste des commandes dans la vue concernée
    Entrée : 
  
    Sortie : 

    Retour : 
      
     *******************************************************/
    public function commandes()
    {
        $commandes = $this->cmd->getCommandes(); // Récupère la liste des commandes
        $vue = new Vue("Commandes"); // Intancie la vue appropriée
        $vue->afficher(array("commandes" => $commandes)); // Affiche la liste des articles dans la vue 
    }



    /*******************************************************
  Affichage de la liste des commandes dans la vue concernée
    Entrée : 
  
    Sortie : 

    Retour : 
      
     *******************************************************/
    public function commande($idComm)
    {
        $articles = $this->cmd->getArticlesCommande($idComm);
        if (!empty($articles)) {
            $objClient = new Client();
            $client = $objClient->getClient($this->cmd->getIdClientCommande($idComm));
            $total = $this->cmd->getTotalCommande($idComm);

            $vue = new Vue("commande"); // Instancie la vue appropriée
            $vue->afficher(array(
                "client" => $client,
                "articles" => $articles,
                "total" => $total,
                "idComm" => $idComm
            )); // Affiche la liste des clients dans la vue
        } else
            throw new Exception("Echec de l'affichage de la commande N°$idComm");
    }
}
