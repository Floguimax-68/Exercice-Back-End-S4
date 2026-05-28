<?php

/************************************************************
default_config.php : Configuration par défaut
Initialise les paramètres de configuration dans l'objet $Conf
Utilise la fusion null (??) pour remplacer les valeurs defaults
************************************************************/

require_once "config/config.class.php";

$Conf = new stdClass(); // Objet vide

/* Paramètres de l'environnement informatique */
$Conf->DBHost = Config::$DB_host ?? "localhost";
$Conf->DBName = Config::$DB_name ?? "epiphanoffnco";
$Conf->DBUser = Config::$DB_user ?? "root";
$Conf->DBPwd = Config::$DB_pwd ?? "";

/* Paramètres personnalisables */
$Conf->titreOnglet = Config::TITRE_ONGLET;
$Conf->nomSite = Config::NOM_SITE;
