<?php
    include '../functions/function.php';
    setup('Connexion');
    pageheader('Connexion', './functions/connexion.php');
    navbar('../functions/connexion.php');

?>

<form action="./connexion.php" method="post">
    <div class="form-group">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Nom d'utilisateur">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>


<?php

    if($_POST != null){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if(connexion($username, $password) == true){
            header('Location: ../index.php');
        }
        else {
            echo '<div class="alert alert-danger" role="alert">
            Nom d\'utilisateur ou mot de passe incorrect
            </div>';
            connexion($username, $password);
        }
    }

    footer();
?>