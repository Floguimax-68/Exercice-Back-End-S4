<?php

require_once "controleur/CtlAuth.class.php";
require_once "controleur/CtrlClient.class.php";
require_once "controleur/CtrlCommande.class.php";
require_once "controleur/CtrlPage.class.php";

/* Classe Routeur : gestion du routage MVC */
class Routeur {
    
    private $ctlAuth;
    private $ctlClient;
    private $ctlCommande;
    private $ctlPage;
    
    public function __construct() {
        $this->ctlAuth = new CtlAuth();
        $this->ctlClient = new CtlClient();
        $this->ctlCommande = new CtlCommande();
        $this->ctlPage = new CtlPage();
    }
    
    public function routerRequete() {
        try {
            if(isset($_GET["action"])) {
                switch ($_GET["action"]) {
                    case "authentification":
                        $this->ctlAuth->afficherAuth();
                        break;
                    case "accueil":
                        $this->ctlPage->accueil();
                        break;
                    case "compte":
                        $this->ctlAuth->afficherCompte();
                        break;
                    case "deconnexion":
                        $this->ctlAuth->deconnexion();
                        break;
                    case "inscription":
                        $this->ctlAuth->pousserInscription();
                        break;
                    case "connexion":
                        $this->ctlAuth->pousserConnexion();
                        break;
                    case "clients":
                        $this->ctlClient->clients();
                        break;
                    case "commandes":
                        $this->ctlCommande->commandes();
                        break;
                    case "commande":
                        if(isset($_GET["idComm"])) {
                            $idComm = (int)$_GET["idComm"];
                            if($idComm > 0) {
                                $this->ctlCommande->commande($idComm);
                            } else {
                                throw new Exception("ID commande invalide");
                            }
                        } else {
                            throw new Exception("ID manquant");
                        }
                        break;
                    default:
                        throw new Exception("Action invalide");
                }
            } else {
                $this->ctlAuth->afficherAuth();
            }
        } catch (Exception $e) {
            echo "ERREUR : " . htmlspecialchars($e->getMessage());
        }
    }
}
