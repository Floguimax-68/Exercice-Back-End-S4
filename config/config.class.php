<?php
// class contenant les parametres de configuration de l'application
abstract class Config
{
    //definition des parametre de connexion a la base de données
    public static $DB_host = "localhost";
    public static $DB_name = "magasin";
    public static $DB_user = "root";
    public static $DB_pwd  = "";

    //definition des parametre du site
    public const TITRE_ONGLET = "Magasin";
    public const NOM_SITE     = "Web Shop";

    public const MENU = "
        <a class='lien' href='index.php?action=clients'>Clients</a>
        <a class='lien' href='index.php?action=articles'>Articles</a>
        <a class='lien' href='index.php?action=commandes'>Commandes</a>
    ";
}
