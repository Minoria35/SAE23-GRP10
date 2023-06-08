<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];

    if (!empty($prenom) && !empty($nom)) {
        // Charger les données existantes du fichier JSON
        $jsonFile = file_get_contents('../../data/annuaire.json');
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
        file_put_contents('../../data/annuaire.json', $nouveauJson);

    }
}

header('Location: ../../qui_sommes_nous.php');

?>