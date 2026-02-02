<?php
require "config/config.class.php";
require "controleur/routeur.class.php";


$conf = new Config();
$routeur = new Routeur();
$routeur->routerRequete();















//     if($_GET["action"] == "clients")
//       clients();                                                            // Affichage de la liste des clients

//     else if($_GET["action"] == "articles")
//       articles();                                                           // Affichage de la liste des articles

//     else if($_GET["action"] == "commandes")
//       commandes();                                                          // Affichage de la liste des commandes

//     else if($_GET["action"] == "commande")
//       if(isset($_GET["idComm"])) {
//         $idComm = (int)$_GET["idComm"];
//         if($idComm > 0)
//           commande($idComm);                                                // Affichage d'une commande
//         else
//           throw new Exception("Identifiant de commande invalide");
//       }
//       else
//         throw new Exception("Aucun identifiant de commande");

//     else
//       throw new Exception("Action non valide");
//   }
//   else                                                                      // Page d'accueil
//     accueil(); 
// }
// catch (Exception $e) {                                                      // Page d'erreur
//   erreur($e->getMessage());
// }   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement