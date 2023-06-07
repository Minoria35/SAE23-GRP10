<?php
    include 'functions/function.php';
    setup('Qui sommes-nous');
    pageheader('Qui sommes-nous', './qui_sommes_nous.php');
    navbar('Qui sommes-nous');
echo '
     <br>
  <h2 id="texteAGlisser">Présentation de l\'entreprise</h2>
  <br>
<div class=container>
  <h3>Qui sommes-nous ?</h3>
  <br>
  <p>

Nous sommes une jeune entreprise spécialisée dans les bons plats à simplement réchauffer au micro-ondes qui ont simplement voulu vivre de leur passion, l\'élaboration de plats goûtus, de qualité, en en faisant profiter les papilles de chacun d\'entre vous qui nous ferait confiance. Retrouvez sur notre site différentes pages permettant d\'en connaître plus sur l\'entreprise.</p>
<br>
<h4>Membres de l\'entreprise</h4>
<h5><strong>- Roger Gagnon :</strong> directeur général</h5>
<h5><strong>- Octave Paimboeuf :</strong> cheffe culinaire</h5>
<h5><strong>- Virginie Proulx :</strong> Ingénieure en industrialisation</h5>
<h5><strong>- Thibault Marmion :</strong> Responsable communication</h5>
<br>
<h3>Le mot de la direction</h3>
<p>

Cette entreprise a vu le jour il y a déjà trois ans et demi maintenant. Depuis un an, nous nous efforçons à vous fournir des produits d\'une qualité incomparable. Chacun de nos plats est confectionné en France (à Saint-Malo, 35400) avec des produits 100% français, ce qui fait la force et la qualité de notre entreprise. Présents à Saint-Malo, nous prévoyons dans le futur de nous agrandir en ouvrant différents centres de production en France pour produire vos plats encore plus proche de vous, où que vous soyez.
<br>
<h3>Activités de Plaprêt</h3>
<h5>Notre engagement avec Restos du Cœur</h5>
<p>
Chez Plaprêt, nous nous engageons à faire don d\'au moins 500 plats prêts à la consommation par an, pour un monde meilleur.
 </p>
<h5>Notre participation au programme télévisé "La meilleure entreprise de France"</h5>
<p>L\'année dernière, Plaprêt, fort de son innovation pour son dernier produit, un mélange de différents épices à mettre sur tous vos plats, a été mis à l\'honneur dans l\'émission présentée sur France 2 "La meilleure entreprise de France". Nous avons pu mettre à l\'honneur notre entrepot 100% éco-responsable et nos produits 100% français. </p>
<br>
<h3>Partenaire</h3>
<p style="float:left"><img src="images/logo.png" alt="Logo_partenaire"></p>

<p>Nous sommes fiers de travailler continuellement avec notre partenaire FD, spécialiste dans l\'industrialisation éco-responsable. Ce parteneriat représente un enjeu majeur dans le développement de notre entreprise.</p>
<br><br><br><br>
</div>
';



     function afficherAnnuaire() {
    // Chemin du fichier annuaire JSON
    $cheminFichier = './data/annuaire.json';

    // Lire le contenu du fichier JSON
    $contenuFichier = file_get_contents($cheminFichier);

    // Décoder le contenu JSON en un tableau associatif
    $annuaire = json_decode($contenuFichier, true);

    // Vérifier si le décodage a réussi
    if ($annuaire === null) {
        echo "Erreur lors de la lecture du fichier annuaire.";
        return;
    }

    // Parcourir les personnes dans l'annuaire et les afficher
    foreach ($annuaire as $personne) {
        $photo = $personne['photo'];
        $nom = $personne['nom'];
        $prenom = $personne['prenom'];

        echo '<div class="person">';
        echo '<img src="' . $photo . '" alt="Photo" width="100" height="100">';
        echo '<h3>' . $prenom . ' ' . $nom . '</h3>';
        echo '<hr>';
        echo '</div>';
    }
}
echo "<div class='text-center'>";
echo '<h1>' . 'Annuaire de l\'entreprise' . '</h1>';;
    afficherAnnuaire();
    echo "</div>";
?>

<div class="text-center">
<button onclick="AjouterPersonne()">Ajouter</button>
<button onclick="ModifierPersonne()">Modifier</button>
<button onclick="SupprimerPersonne()">Supprimer</button>



<div id="formulaire" style="display: none;">
    <form method="POST">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom"><br><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom"><br><br>

        <label for="photo">Photo :</label>
        <input type="text" id="photo" name="photo"><br><br>

        <input type="submit" value="Ajouter">
    </form>
</div>

<script>
    function AjouterPersonne() {
        document.getElementById("formulaire").style.display = "block";
    }
</script>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $photo = $_POST['photo'];

    // Vérifier si tous les champs sont remplis
    if (!empty($prenom) && !empty($nom) && !empty($photo)) {
        // Charger les données existantes du fichier JSON
        $jsonFile = file_get_contents('./data/annuaire.json');
        $annuaire = json_decode($jsonFile, true);

        // Créer un nouvel enregistrement
        $nouvellePersonne = array(
            'prenom' => $prenom,
            'nom' => $nom,
            'photo' => $photo
        );

        // Ajouter la nouvelle personne à l'annuaire
        $annuaire[] = $nouvellePersonne;

        // Convertir l'annuaire en format JSON
        $nouveauJson = json_encode($annuaire, JSON_PRETTY_PRINT);

        // Écrire le nouveau JSON dans le fichier
        file_put_contents('./data/annuaire.json', $nouveauJson);

    }
}

?>

<script>
    function ModifierPersonne() {
        document.getElementById("formulaire1").style.display = "block";
    }
</script>

<div id="formulaire1" style="display: none;">
    <form method="POST">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom"><br><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom"><br><br>

        <label for="photo">Photo :</label>
        <input type="text" id="photo" name="photo"><br><br>

        <label for="nouveauPrenom">Nouveau prénom :</label>
        <input type="text" id="nouveauPrenom" name="nouveauPrenom"><br><br>

        <label for="nouveauNom">Nouveau nom :</label>
        <input type="text" id="nouveauNom" name="nouveauNom"><br><br>

        <label for="nouvellePhoto">Nouvelle photo :</label>
        <input type="text" id="nouvellePhoto" name="nouvellePhoto"><br><br>

        <input type="submit" value="Modifier définitivement">
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs du formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $photo = $_POST['photo'];
    $nouveauPrenom = $_POST['nouveauPrenom'];
    $nouveauNom = $_POST['nouveauNom'];
    $nouvellePhoto = $_POST['nouvellePhoto'];

    // Vérifier si tous les champs sont remplis
    if (!empty($prenom) && !empty($nom) && !empty($nouveauPrenom) && !empty($nouveauNom) && !empty($nouvellePhoto)) {
        // Charger les données existantes du fichier JSON
        $jsonFile = file_get_contents('./data/annuaire.json');
        $annuaire = json_decode($jsonFile, true);

        // Parcourir l'annuaire pour trouver la personne à modifier
        foreach ($annuaire as &$personne) {
            if ($personne['prenom'] === $prenom && $personne['nom'] === $nom) {
                // Modifier les données de la personne
                $personne['prenom'] = $nouveauPrenom;
                $personne['nom'] = $nouveauNom;
                $personne['photo'] = $nouvellePhoto;
                break;
            }
        }

        // Convertir l'annuaire en format JSON
        $nouveauJson = json_encode($annuaire, JSON_PRETTY_PRINT);

        // Écrire le nouveau JSON dans le fichier
        file_put_contents('./data/annuaire.json', $nouveauJson);


        // Réinitialiser le formulaire et masquer le formulaire
        echo '<script>document.querySelector("form").reset(); document.getElementById("formulaire").style.display = "none";</script>';
    }
}
?>

<div id="formulaire2" style="display: none;">
<form method="POST">
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom"><br><br>

    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom"><br><br>

    <input type="submit" value="Supprimer définitivement">
</form>
</div>

<script>
    function SupprimerPersonne() {
        document.getElementById("formulaire2").style.display = "block";
    }
</script>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];

    if (!empty($prenom) && !empty($nom)) {
        // Charger les données existantes du fichier JSON
        $jsonFile = file_get_contents('./data/annuaire.json');
        $annuaire = json_decode($jsonFile, true);

        // Parcourir l'annuaire pour trouver la personne à supprimer
        foreach ($annuaire as $index => $personne) {
            if ($personne['prenom'] === $prenom && $personne['nom'] === $nom) {
                // Supprimer la personne du tableau
                unset($annuaire[$index]);
                break;
            }
        }

        // Réindexer le tableau après la suppression
        $annuaire = array_values($annuaire);

        // Convertir l'annuaire en format JSON
        $nouveauJson = json_encode($annuaire, JSON_PRETTY_PRINT);

        // Écrire le nouveau JSON dans le fichier
        file_put_contents('./data/annuaire.json', $nouveauJson);

    }
}
?>
</div>
