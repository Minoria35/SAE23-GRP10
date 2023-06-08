<?php
include 'functions.php';
$suppression_partenaire = $_POST['partenaire_suppr'];
echo $suppression_partenaire;
if (empty($suppression_partenaire)) {
    echo "Le nom du partenaire n'a pas été rempli. Vous allez être redirigé vers la page de création de partenaires.";
    header('Refresh: 5; URL=page07.php');}

deletePartner($suppression_partenaire);
header('Location: page07.php');
exit();
?>