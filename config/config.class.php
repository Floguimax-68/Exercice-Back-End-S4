<?php

abstract class Config
{


    // public static $DBHost = "localhost";
    // public static $DBName = "magasin";
    // public static $DBUser = "root";
    // public static $DBPwd  = "";


    public const TITRE_ONGLET = "Magasin";
    public const NOM_SITE     = "Web Shop";

    public const MENU = "
        <a class='lien' href='index.php?action=clients'>Clients</a>
        <a class='lien' href='index.php?action=articles'>Articles</a>
        <a class='lien' href='index.php?action=commandes'>Commandes</a>
    ";
}
