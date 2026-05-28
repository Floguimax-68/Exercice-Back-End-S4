<?php

/************************************************************
Classe Vue : Gestion centralisée de l'affichage des vues
Utilise extract() pour convertir les données en variables
************************************************************/
class Vue {

    private $fichierVue;

    /************************************************************
    Constructeur : initialise le chemin du fichier vue
    
    Entrée :
        $action [string] : nom de l'action (ex: "Auth" → "vue/vueAuth.php")
    ************************************************************/
    public function __construct($action) {
        $this->fichierVue = "vue/vue" . $action . ".php";
    }

    /************************************************************
    Affiche la vue avec le gabarit
    Extrait les données dans des variables pour la vue
    
    Entrée :
        $donnees [array] : tableau associatif des données à afficher
    ************************************************************/
    public function afficher($donnees) {
        global $Conf;
        
        $titre = $Conf->titreOnglet ?? "Épiphanoff & Co.";
        $nomSite = $Conf->nomSite ?? "Épiphanoff & Co.";

        // Extraire les données en variables
        extract($donnees);

        // Capturer le contenu de la vue
        ob_start();
        require $this->fichierVue;
        $contenu = ob_get_clean();

        // Inclure le gabarit
        require "vue/gabarit.php";
    }
}
