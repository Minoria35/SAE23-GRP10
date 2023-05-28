<?php
    include '../function.php';

    $json = json_decode(file_get_contents('../../data/users.json'), true);

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
    $roles = $_POST['role'];

    /*var_dump($username);
    var_dump($password);
    var_dump($password2);
    var_dump($email);
    var_dump($role);*/

    $usernameExists = false;
    foreach ($json as $user) {
        if ($user['username'] == $username) {
            $usernameExists = true;
            break;
        }
    }

    if ($usernameExists) {
        echo '
        <div class="alert alert-danger" role="alert">
            Le nom d\'utilisateur existe déjà
        </div>';
    } elseif ($password !== $password2) {
        echo '
        <div class="alert alert-danger" role="alert">
            Les mots de passe ne correspondent pas
        </div>';
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $new_user = array(
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'role' => $roles
        );
        
        array_push($json, $new_user);
        file_put_contents('../../data/users.json', json_encode($json));
        header('Location: ../../Intranet/admin.php');
        exit();
    }
?>