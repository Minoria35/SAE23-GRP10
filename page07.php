<?php
include 'functions.php';

$pageactive = "";
setup("Page de gestion des partenaires");
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
  <title>Ajout de partenaire</title>
</head>
<body>
<div class="sidenav">
  <div class="login-main-text">
  <br>
    <h4>Entrez le nom du partenaire que vous souhaitez créer :</h4>
  </div>
</div>
<div class="main">
  <div class="col-md-6 col-sm-12">
    <div class="login-form">
      <form action="creation_partenaire.php" method="post">
        <div class="form-group">
          <label for="partenaire">Partenaire</label>
          <input type="text" class="form-control" name="partenaire" id="partenaire" placeholder="Nom du partenaire à rentrer ici">
        </div>
        <button type="submit" class="btn btn-black">Créer le partenaire</button>      
      </form>
    </div>
  </div>
</div>
<div class="main">
  <div class="col-md-6 col-sm-12">
    <div class="login-form">
      <form action="suppression_partenaire.php" method="post">
        <div class="form-group">
        <br>
        <h3>Si vous souhaitez supprimer un partenaire, saisissez son nom ci-dessous :</h3>
          <label for="partenaire_suppr">Partenaire</label>
          <input type="text" class="form-control" name="partenaire_suppr" id="partenaire_suppr" placeholder="Nom du partenaire à supprimer ici">
        </div>
        <button type="submit" class="btn btn-black">Supprimer le partenaire</button>      
      </form>
      </div>
      </div>
      </div>
    </div>
  </div>
</div>
</body>