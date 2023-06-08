<?php
include '..\admin_function.php';
$suppression_partenaire = $_POST['partenaire_suppr'];
if (empty($suppression_partenaire)) {
    echo "Le nom du partenaire n'a pas été rempli. Vous allez être redirigé vers la page de création de partenaires.";
    header('Refresh: 5; URL=..\..\Intranet\gestion_partner.php');
    exit();}

deletePartner($suppression_partenaire);
header('Location: ..\..\Intranet\gestion_partner.php');
exit();

?>
