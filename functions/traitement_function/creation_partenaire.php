<?php
include '..\admin_function.php';
$creation_partenaire = $_POST['partenaire'];

if (empty($creation_partenaire)) {
    echo "Le nom du partenaire n'a pas été rempli. Vous allez être redirigé vers la page de création de partenaires.";
    header('Refresh: 5; URL=page07.php');
    exit();
}
addPartner($creation_partenaire);
header('Location: ..\Intranet\gestion_partner.php');
exit();



exit();
?>
