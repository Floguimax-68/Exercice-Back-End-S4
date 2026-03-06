<?php
$titre = "Liste des articles";
?>

<div class="resultat">
  <?php
  if (count($articles)) {
require_once "includes/html/Tableau.class.php";

$tableau = new Tableau();
echo $tableau->head(array_keys($articles[0]));
echo $tableau->body($articles);
echo $tableau->foot();


  } else
    echo "<div class='reponse'>Aucun article n'est enregistré dans la liste</div>";
  ?>
  <!-- //   // Affichage des titres de colonnes du tableau
  //   echo '<table><tr>';
  //   foreach ($articles[0] as $cle => $valeur) {
  //     echo '<th>' . $cle . '</th>';
  //   }
  //   echo '</tr>';

  //   // Affichage des lignes du tableau
  //   foreach ($articles as $ligne) {
  //     echo '<tr>';
  //     // Affichage des valeurs d'une ligne
  //     foreach ($ligne as $valeur) {
  //       echo '<td>' . $valeur . '</td>';
  //     }
  //     echo '</tr>';
  //   }
  //   echo '</table>'; -->
</div>