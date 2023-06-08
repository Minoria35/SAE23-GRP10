<?php
include 'functions.php';
$creation_partenaire = $_POST['partenaire'];

if (empty($creation_partenaire)) {
    echo "Le nom du partenaire n'a pas été rempli. Vous allez être redirigé vers la page de création de partenaires.";
    header('Refresh: 5; URL=page07.php');
    exit();
}
addUser($creation_partenaire);
header('Location: page07.php');
exit();

$suppression_partenaire = $_POST['user_suppr'];
echo $suppression_partenaire;
deleteUser($suppression_partenaire);

exit();
?>