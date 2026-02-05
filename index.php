<?php
require "controleur/controleur.php";
require "controleur/routeur.class.php";
require_once "includes/default_config.php";


$routeur = new Routeur();
$routeur->routerRequete();