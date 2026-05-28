<?php

/************************************************************
Classe Config : Configuration personnalisée du site
Classe abstraite contenant les constantes et propriétés statiques
************************************************************/
abstract class Config {

    /* Propriétés statiques : paramètres de l'environnement informatique */
    public static $DB_host = "localhost";
    public static $DB_name = "epiphanoffnco";
    public static $DB_user = "root";
    public static $DB_pwd = "";

    /* Constantes : paramètres personnalisables */
    public const TITRE_ONGLET = "Épiphanoff & Co. - Bijouterie de Luxe";
    public const NOM_SITE = "Épiphanoff & Co.";
}
