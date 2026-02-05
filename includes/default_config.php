<?php

require_once "config/config.class.php";

$conf = new stdClass(); // Objet vide

$conf->DBHost = Config::$DB_host ?? "localhost";
$conf->DBName = Config::$DB_name ?? "magasin";
$conf->DBUser = Config::$DB_user ?? "root";
$conf->DBPwd = Config::$DB_pwd ?? "";


$conf->titreOnglet = Config::TITRE_ONGLET;
$conf->nomSite = Config::NOM_SITE;
$conf->menu = Config::MENU;