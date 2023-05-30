<?php
include 'functions.php';

$titre = "Bibliothèque numérique";
$pageactive = "";
setup("Page de gestion des utilisateurs");
pageheader($titre);
pagenavbar($pageactive);

if (!authentifie()) {
    header('Location: connexion_user.php');
}
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] == 'admin') {
}
else {
  echo 'Désolé, seuls les administrateurs peuvent accéder à cette page. Vous pouvez vous connecter en administrateur et vous accéderez à la page.';

  exit;
   }
?>
<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Ajout d'utilisateur</title>
</head>
<body>
<div class="sidenav">
  <div class="login-main-text">
  <br>
    <h4>Entrez le nom d'utilisateur et le mot de passe que vous souhaitez créer :</h4>
  </div>
</div>
<div class="main">
  <div class="col-md-6 col-sm-12">
    <div class="login-form">
      <form action="creation_utilisateur.php" method="post">
        <div class="form-group">
          <label for="user">Utilisateur</label>
          <input type="text" class="form-control" name="user" id="user" placeholder="Utilisateur">
        </div>
        <div class="form-group">
          <label for="mdp">Mot de passe</label>
          <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe">
        </div>
        <div class="form-group">
          <label for="role">Rôle</label>
          <input type="text" class="form-control" name="role" id="role" placeholder="Utilisateur">
        </div>
        <button type="submit" class="btn btn-black">Créer l'utilisateur</button>      
      </form>
    </div>
  </div>
</div>
<div class="main">
  <div class="col-md-6 col-sm-12">
    <div class="login-form">
      <form action="suppression_utilisateur.php" method="post">
        <div class="form-group">
        <br>
        <h3>Si vous souhaitez supprimer un utilisateur, saisissez son nom d'utilisateur ci-dessous :</h3>
          <label for="user_suppr">Utilisateur</label>
          <input type="text" class="form-control" name="user_suppr" id="user_suppr" placeholder="Utilisateur">
        </div>
        <button type="submit" class="btn btn-black">Supprimer l'utilisateur</button>      
      </form>
      </div>
      </div>
      </div>
    </div>
  </div>
</div>
</body>