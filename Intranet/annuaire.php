<?php 

include "../functions/function.php";

setup("Annuaire");
pageheader("Annuaire", "../Intranet/annuaire.php");
navbar("Annuaire");

function afficherAnnuaire() {
    // Chemin du fichier annuaire JSON
    $cheminFichier = '../data/annuaire.json';

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
        echo '<img src="' . $photo . '.png" alt="Photo" width="100" height="100">';
        echo '<h3>' . $prenom . ' ' . $nom . '</h3>';
        echo '<hr>';
        echo '</div>';
    }
}
echo "<div class='text-center'>";
echo '<h1>' . 'Annuaire de l\'entreprise' . '</h1>';
    afficherAnnuaire();
    echo "</div>";
?>

<div class="text-center">
<button onclick="AjouterPersonne()">Ajouter</button>
<button onclick="ModifierPersonne()">Modifier</button>
<button onclick="SupprimerPersonne()">Supprimer</button>



<div id="formulaire" style="display: none;">
    <form action="./functions/traitement_function/ajouter_traitement.php" method="POST">
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
        var formulaire = document.getElementById("formulaire");
            if (formulaire.style.display === "none") {
                formulaire.style.display = "block";
            } else {
                formulaire.style.display = "none";
            }
        }
    
</script>


<script>
    function ModifierPersonne() {
        var formulaire1 = document.getElementById("formulaire1");
            if (formulaire1.style.display === "none") {
                formulaire1.style.display = "block";
            } else {
                formulaire1.style.display = "none";
            }
        }
</script>

<div id="formulaire1" style="display: none;">
    <form action="./functions/traitement_function/modifier_traitement.php" method="POST">
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

<div id="formulaire2" style="display: none;">
<form action="./functions/traitement_function/supprimer_traitement.php" method="POST">
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom"><br><br>

    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom"><br><br>

    <input type="submit" value="Supprimer définitivement">
</form>
</div>

<script>
    function SupprimerPersonne() {
        var formulaire2 = document.getElementById("formulaire2");
            if (formulaire2.style.display === "none") {
                formulaire2.style.display = "block";
            } else {
                formulaire2.style.display = "none";
            }
        }
</script>
</div>

<?php
footer();
?>
