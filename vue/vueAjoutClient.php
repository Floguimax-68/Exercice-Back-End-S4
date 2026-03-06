<?php
$titre = 'Ajout d\'un client'
?>

<div class="resultat">
<form action="index.php?action=enregClient" method="post">


<?php
require_once "includes/html/formulaire.class.php";


$form = new Formulaire();

echo $form->inpuText("nom", "Nom");
echo $form->inpuText("prenom", "Prénom");
echo $form->inpuText("age", "Âge");
echo $form->inpuText("adresse", "Adresse");
echo $form->inpuText("ville", "Ville");
echo $form->inpuText("mail", "Email");
echo $form->submit("");
?> </form> </div>