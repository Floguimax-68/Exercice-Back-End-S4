<?php
  $titre = "Commande n°$idComm";
?>

<div class="resultat">
  <div class="titreCommande">Client :</div>
  <div><?= $client["nom"]." ".$client["prenom"] ?></div>
  <div><?= $client["adresse"] ?></div>
  <div><?= $client["ville"] ?></div>
  <div class="titreCommande">Articles :</div>
  <?php
    if (count($articles)) {
      // Affichage des titres de colonnes du tableau
      echo '<table><tr>';
      foreach($articles[0] as $cle => $valeur)
      {
        echo '<th>'.$cle.'</th>';
      }
      echo '</tr>';
      
      // Affichage des lignes du tableau
      foreach($articles as $ligne)
      {
        echo '<tr>';
        // Affichage des valeurs d'une ligne
        foreach($ligne as $valeur)
        {
          echo '<td>'.$valeur.'</td>';
        }
        echo '</tr>';
      }
      echo '</table>';

      echo "<div class='titreCommande'>Total : $total &euro;</div>";
    }
    else
      echo "<div class='reponse'>La commande ne contient pas d'article</div>";
  ?>
</div>
