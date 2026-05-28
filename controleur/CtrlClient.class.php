<?php
require_once "modele/client.class.php";

/*************************************
Contrôleur Client (MVC minimaliste)
Affiche les données directement en JSON
*************************************/
class ctlClient {

  private $client;

  public function __construct() {
    $this->client = new Client();
  }

  /* Affiche la liste des clients */
  public function Clients() {
    $clients = $this->client->getClients();
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($clients, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
  }
}