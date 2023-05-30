<?php
include 'functions.php';

$titre = "Bibliothèque numérique";
$pageactive = "";
setup("Connexion");
pageheader($titre);
pagenavbar($pageactive);
if (authentifie()) {
    header('Location: page01.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <form method="post" action="connexion_traitement.php">
        <label for="user">Nom d'utilisateur:</label>
        <input type="text" name="user" id="user"><br>
        <label for="mdp">Mot de passe:</label>
        <input type="password" name="mdp" id="mdp"><br>
        <input type="submit" value="Connexion">
    </form>
<br>
<p>Si vous souhaitez accéder à la page Administration ou Gestion, veuillez vous connecter avec un compte administrateur. (ici pour les besoins du TP, tous les mots de passe sont <strong>"bonjour"</strong></p>
</body>
</html>
