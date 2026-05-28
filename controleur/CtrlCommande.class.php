<?php
require_once "modele/commande.class.php";
require_once "modele/client.class.php";

/*************************************
Contrôleur Commande (MVC minimaliste)
Affiche les données directement en JSON
*************************************/
class ctlCommande {

  private $cmd;

  public function __construct() {
    $this->cmd = new Commande();
  }

  /* Affiche la liste des commandes */
  public function commandes() {
    $commandes = $this->cmd->getCommandes();
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($commandes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
  }

  /* Affiche les détails d'une commande */
  public function commande($idComm) {
    $articles = $this->cmd->getArticlesCommande($idComm);
    if (!empty($articles)) {
        $objClient = new Client();
        $client = $objClient->getClient($this->cmd->getIdClientCommande($idComm));
        $total = $this->cmd->getTotalCommande($idComm);

        $donnees = array(
            "client" => $client,
            "total" => $total,
            "idComm" => $idComm,
            "articles" => $articles
        );
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($donnees, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    else
        throw new Exception("Echec de l'affichage de la commande N°$idComm");
  }
}