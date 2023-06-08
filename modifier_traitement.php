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