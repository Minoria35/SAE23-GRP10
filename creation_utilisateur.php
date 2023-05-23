<?php
include 'functions.php';
$creation_user = $_POST['user'];
$mdp_creation = $_POST['mdp'];
$role_creation = $_POST['role'];

//echo $mdp_creation
if (empty($creation_user) || empty($mdp_creation)) {
    echo "Le nom d'utilisateur et/ou le mot de passe n'ont pas été remplis. Vous allez être redirigé vers la page de création d'utilisateurs.";
    header('Refresh: 5; URL=page07.php');
    exit();
}
addUser($creation_user, $mdp_creation, $role_creation);
header('Location: page07.php');
exit();

$suppression_user = $_POST['user_suppr'];
echo $suppression_user;
deleteUser($suppression_user);

exit();
?>