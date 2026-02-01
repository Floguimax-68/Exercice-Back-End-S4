<?php
  $titre = "Liste des clients";
?>

<div class="resultat">
  <?php
    if (count($clients)) {
      // Affichage des titres de colonnes du tableau
      echo '<table><tr>';
      foreach($clients[0] as $cle => $valeur) {
        echo '<th>'.$cle.'</th>';
      }
      echo '</tr>';
      
      // Affichage des lignes du tableau
      foreach($clients as $ligne) {
        echo '<tr>';
        // Affichage des valeurs d'une ligne
        foreach($ligne as $valeur) {
          echo '<td>'.$valeur.'</td>';
        }
        echo '</tr>';
      }
      echo '</table>';
    }
    else
      echo "<div class='reponse'>Aucun client n'est enregistré dans la liste</div>";
  ?>
</div>