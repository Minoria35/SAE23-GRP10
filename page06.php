<?php
include 'functions.php';
$pageactive = "";
setup("Liste des partenaires");
pageheader($titre);
pagenavbar($pageactive);
if (!authentifie()) {
    header('Location: connexion_user.php');
}
?>

<br>
    <h1 class="my-4 text-center">Liste des partenaires</h1 >

    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Partenaire</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $partenaires = json_decode(file_get_contents("data/partenaires.json"), true);
                    foreach ($partenaires as $user) {
                    ?>
                        <tr>
                            <td><?php echo $user['partenaire'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>