<?php
session_start();
include 'functions.php';
if (isset($_POST['user']) && isset($_POST['mdp'])) {
    if (connexion($_POST['user'], $_POST['mdp'])) {
        header('Location: page01.php');
        exit;
    } else {
        echo"Nom d'utilisateur ou mot de passe incorrect. Vous allez être redirigé vers la page de connexion.";
    }
}
header('Refresh: 5; URL=connexion_user.php');
?>
