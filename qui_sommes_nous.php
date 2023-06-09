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
<h3>Le mot de la direction</h3>
<p>
Cette entreprise a vu le jour il y a déjà trois ans et demi maintenant. Depuis un an, nous nous efforçons à vous fournir des produits d\'une qualité incomparable. Chacun de nos plats est confectionné en France (à Saint-Malo, 35400) avec des produits 100% français, ce qui fait la force et la qualité de notre entreprise. Présents à Saint-Malo, nous prévoyons dans le futur de nous agrandir en ouvrant différents centres de production en France pour produire vos plats encore plus proche de vous, où que vous soyez.
<br>
<br>
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
<?php
footer();
?>
