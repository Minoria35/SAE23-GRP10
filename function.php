<?php
function addUser($partenaire) {

    $file = 'data/partenaires.json';
    $json = file_get_contents($file);
    $users = json_decode($json, true);
    $users[$partenaire] = [
        "partenaire" => $partenaire
    ];
    $json = json_encode($users);
    file_put_contents($file, $json);
}

function deleteUser($partenaire_suppr) {
    $file = 'data/partenaires.json';
    $json = file_get_contents($file);
    $users = json_decode($json, true);
    unset($users[$partenaire_suppr]);
    $json = json_encode($users);
    file_put_contents($file, $json);
}
?>