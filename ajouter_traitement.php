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