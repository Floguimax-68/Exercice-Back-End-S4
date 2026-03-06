<?php
require_once "controleur/CtrlClient.class.php";
require_once "controleur/CtrlArticle.class.php";
require_once "controleur/CtrlCommande.class.php";
require_once "controleur/CtrlPage.class.php";
/*************************************
Classe pour le routeur
*************************************/
class Routeur {

  private $ctlClient;    
  private $ctlArticle;    
  private $ctlCommande;    
  private $ctlPage;   
  
  
  public function __construct() {
    $this->ctlClient = new CtlClient();
    $this->ctlArticle = new CtlArticle();
    $this->ctlCommande = new CtlCommande();
    $this->ctlPage = new CtlPage();
  }


  public function routerRequete(){
    try {
        if(isset($_GET["action"])) {
            switch ($_GET["action"]){
            case  "clients":
                $this->ctlClient->clients();
                break;

            case "articles":
                $this->ctlArticle->articles();
                break;

            case "commandes":
                $this->ctlCommande->commandes();
                break;

            case "commande":
                if(isset($_GET["idComm"])) {
                $idComm = (int)$_GET["idComm"];
                if($idComm > 0)
                    $this->ctlCommande->commande($idComm);
                else
                    throw new Exception("Identifiant de commande invalide");
                }
                else
                    throw new Exception("Aucun identifiant de commande");
                break;

            case "ajoutClient":
                $this->ctlClient->ajoutClient(); break;
                
            default: 
                throw new Exception("Action non valide");       
            }     
        }
        else                                                                      
            $this->ctlPage->accueil(); 
        }


        catch (Exception $e) {                                                      // Page d'erreur
        $this->ctlPage->erreur($e->getMessage());
        }   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement
        }


}