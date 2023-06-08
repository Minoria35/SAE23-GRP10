<?php
include 'functions\admin_function.php';
setup('Partenaires');
pageheader('Partenaires', './partenaires.php');
navbar('Partenaires');

}
?>

<br>
    <h1 class="my-4 text-center">Liste des partenaires</h1>

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
