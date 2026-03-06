<?php
$titre = "Liste des clients";
?>

<div class="resultat">
  <?php


  if (count($clients)) {
    // $tableau = new Tableau();
    require_once "includes/html/Tableau.class.php";
    echo Tableau::head(array_keys($clients[0])); /* si :: pas besoin de declarer un nouveau Obj TABLEAU a chaque appel de $ tableau*/
    echo Tableau::body($clients);
    echo Tableau::foot();
  } else
    echo "<div class='reponse'>Aucun client n'est enregistré dans la liste</div>";
  ?>
  <!-- // // Affichage des titres de colonnes duTableau::     // echo '<table><tr>';
      // foreach($clients[0] as $cle => $valeur) {
      //   echo '<th>'.$cle.'</th>';
      // }
      // echo '</tr>';
      
      // // Affichage des lignes duTableau::     // foreach($clients as $ligne) {
      //   echo '<tr>';
      //   // Affichage des valeurs d'une ligne
      //   foreach($ligne as $valeur) {
      //     echo '<td>'.$valeur.'</td>';
      //   }
      //   echo '</tr>';
      // }
      // echo '</table>'; -->

      <p>
        <a href="index.php?action=ajoutClient">
          <button type="button" class="valid">Ajouter un client</button>
        </a>
      </p>
</div>