<?php
require_once "vue/vue.class.php";

class CtlPage {

    public function accueil(){
        $vue = new Vue("Accueil");
        $vue->afficher(array());
    }

    public function boutique(){
        $vue = new Vue("Boutique");
        $vue->afficher(array());
    }

    public function erreur($message){
        $vue = new Vue("Erreur");
        $vue->afficher(array("message" => $message));
    }
    

}