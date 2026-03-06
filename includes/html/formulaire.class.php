<?php

/*************************************************  
 * classe pour afficher un tableau html
 * ************************************************ */

class Formulaire
{
    public function inpuText($name, $label = "")
    {
        return "<label class='form_elt'>
                    <span>$label</span> <input type='text' class='texte' name='$name' value=''>
                </label>";
} 


public function submit($name){
     return "<button class='valid' name='$name'>Valider</button>"; 
}

}