<?php
include 'functions.php';
$suppression_user = $_POST['user_suppr'];
echo $suppression_user;
if (empty($suppression_user)){
    echo "Le nom d'utilisateur n'a pas été rempli. Revenez en arrière pour rentrer à nouveau l'utilisateur que vous souhaitez supprimer.";
    exit();
}
deleteUser($suppression_user);
header('Location: page07.php');
exit();
?>