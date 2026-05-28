<?php
/* Point d'entrée minimal : routeur MVC */
session_start(); // démarrer la session pour l'authentification
require_once "includes/default_config.php";
require_once "modele/database.class.php";
require_once "controleur/routeur.class.php";

$routeur = new Routeur();
$routeur->routerRequete();