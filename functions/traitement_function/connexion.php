<?php
include '../../functions/function.php';
if($_POST != null){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(connexion($username, $password) == true){
        header('Location: ../../index.php');
    }
    else {
        echo '<div class="alert alert-danger" role="alert">
        Nom d\'utilisateur ou mot de passe incorrect
        </div>';
        connexion($username, $password);
    }
}
?>