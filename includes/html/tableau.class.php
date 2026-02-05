<?php

/*************************************************  
 * classe pour afficher un tableau html
 * ************************************************ */

class Tableau
{

    /************************************************ 
retourne une ligne <tr> de tableau HTML
entréé : 
- $data : un tableau de données à afficher dans la ligne
- $tag : le type de balise (td ou th) dans la ligne
Retour : 
[string] : une ligne de tableau HTML*/

    public static function row($data, $tag = 'td')
    {
        $reponse = "";
        foreach ($data as $valeur) {
            $reponse .= "<$tag>$valeur</$tag>";
        }
        return "<tr>$reponse</tr>";
    }



    /************************************************ 
retourne une ligne <tr> de tableau HTML
entréé : 
- $data : un tableau de données à afficher dans la ligne
- $tag : le type de balise (td ou th) dans la ligne
Retour : 
[string] : une ligne de tableau HTML*/


    public static function head($data = [])
    {
        return '<table><thead>' . self::row($data, 'th') . '</thead>'; //self et pas $this car function static donc :: et pas ->
        return '<table>'
    }
}
