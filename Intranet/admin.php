<?php
    include '..\functions\function.php';
    include '..\functions\admin_function.php';
    setup('admin');
    pageheader('admin', '.\Intranet\admin.php');
    navbar('.\Intranet\admin.php');

    showUsers();
?>

<div class="container">
    <div class="row">
        <h1>Créer un utilisateur</h1>
        <div class="col-md-12">
        <form action="../functions/traitement_function/add_user.php" method="post">
            <input type="text" class="form-control" id="username" name="username" placeholder="Nom d'utilisateur"> <br>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe"> <br>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirmer le mot de passe"> <br>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email"> <br>
            <select id="role" name="role" class="form-control"> <br>
                <option value="admin">Admin</option>
                <option value="direction">Direction</option>
                <option value="managers">Managers</option>
                <option value="salarie">Salarié</option>
            </select> <br>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Créer</button>
        </form>
        </div>
    </div>
</div>

<?php
    footer();
?>