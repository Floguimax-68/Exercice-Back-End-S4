<?php

require_once "config/config.class.php"; // inclusion de la classe de configuration du fichier config.class.php
require_once "html/tableau.class.php"; // inclusion de la classe Tableau pour la génération de tableaux HTML

/************************************************************************* */
/********************************************* */
/************************************************************************* */


$conf = new stdClass(); // creation d'un objet de type stdClass pour stocker les paramètres de configuration

$conf->DBHost = Config::$DB_host ?? "localhost"; // utilisation de l'opérateur de coalescence nulle pour assigner la valeur de DB_host à DBHost, ou "localhost" si DB_host n'est pas défini
$conf->DBName = Config::$DB_name ?? "magasin";  // utilisation de l'opérateur de coalescence nulle pour assigner la valeur de DB_name à DBName, ou "magasin" si DB_name n'est pas défini
$conf->DBUser = Config::$DB_user ?? "root"; // utilisation de l'opérateur de coalescence nulle pour assigner la valeur de DB_user à DBUser, ou "root" si DB_user n'est pas défini
$conf->DBPwd = Config::$DB_pwd ?? "";   // utilisation de l'opérateur de coalescence nulle pour assigner la valeur de DB_pwd à DBPwd, ou une chaîne vide si DB_pwd n'est pas défini
//Config::$DB_... défini dans le fichier config personalisé ? oui je garde la valeur et de la met dans DB... sinon je met la valeur par défaut

$conf->titreOnglet = Config::TITRE_ONGLET;  // assignation de la constante TITRE_ONGLET à la propriété titreOnglet de l'objet de configuration
$conf->nomSite = Config::NOM_SITE;  // assignation de la constante NOM_SITE à la propriété nomSite de l'objet de configuration
$conf->menu = Config::MENU; // assignation de la constante MENU à la propriété menu de l'objet de configuration