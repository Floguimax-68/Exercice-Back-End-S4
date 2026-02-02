<?php

class Config
{
    // Definition des paramètres de la BDD
    public $DBHost = "localhost";
    public $DBName = "magasin";
    public $DBUser = "root";
    public $DBPWD = "";
    // Définition des paramètres du site
    public $titreOnglet = "Magasin";   // Titre de l'onglet
    public $nomSite = "Web Shop";   // Titre de l'onglet
    // Menu par défaut
    public $menu = "<a class='lien' href='index.php?action=clients'>Clients</a>
                <a class='lien' href='index.php?action=articles'>Articles</a>
                <a class='lien' href='index.php?action=commandes'>Commandes</a>";
}
