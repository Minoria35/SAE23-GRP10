<?php
include 'functions.php';
$titre = "Bibliothèque numérique";
$pageactive = "";
setup("Liste des utilisateurs");
pageheader($titre);
pagenavbar($pageactive);
if (!authentifie()) {
    header('Location: connexion_user.php');
}
?>

<br>
    <h1 class="my-4 text-center">Liste des utilisateurs</h1 >

    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Utilisateur</th>
                        <th scope="col">Mot de passe</th>
                        <th scope="col">Rôle</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $users = json_decode(file_get_contents("data/users.json"), true);
                    foreach ($users as $user) {
                    ?>
                        <tr>
                            <td><?php echo $user['user'] ?></td>
                            <td><?php echo $user['mdp'] ?></td>
                            <td><?php echo implode(" ",$user['role']) ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>